<?php
namespace Craft;

use geertw\IpAnonymizer\IpAnonymizer;

class Geo_LocationService extends BaseApplicationComponent
{
    public function getInfo($doCache)
    {
        $data = array(
            'ip' => '',
            'country_code' => '',
            'country_name' => '',
            'region_code' => '',
            'region_name' => '',
            'city' => '',
            'zipcode' => '',
            'latitude' => '',
            'longitude' => '',
            'metro_code' => '',
            'areacode' => '',
            'timezone' => '',
            'cached' => false
        );

        $devMode = craft()->config->get('devMode');

        $ip = craft()->request->getIpAddress();

        $localIps = array('127.0.0.1','::1');

        if(in_array($ip,$localIps) or $devMode)
        {
            $ip = craft()->config->get('defaultIp', 'geo');
        }

        // Anonymized IP
        $ipAnonymizer = new IpAnonymizer();
        $ip = $ipAnonymizer->anonymize($ip);

        $cachedData = craft()->cache->get('craft.geo.'.$ip);

        if ($cachedData){
            $cached = json_decode($cachedData,true);
            $cached['cached']= true;
            return $cached;
        }

        $apiOne = $this->getIpApiData($ip);

        if (!empty($apiOne)){
            $data = array_merge($data, $apiOne);
        }

        if($doCache){
            $seconds = craft()->config->get('cacheTime', 'geo');
            craft()->cache->add('craft.geo.'.$ip,json_encode($data),$seconds);
        }

        return $data;
    }


    private function getIpApiData($ip){

        $apiKey = craft()->config->get('ipApiKey', 'geo');
        $url = $ip . '?access_key=' . $apiKey;
        $ipApiClient = new \Guzzle\Http\Client('http://api.ipapi.com');
        $response = $ipApiClient->get($url, array(), array('exceptions' => false))->send();

        if (!$response->isSuccessful()) {
            return array();
        }

        $json = json_decode($response->getBody());
        if (property_exists($json, 'error') && $json->success === false) {
            $errors = array(
                'error' => array(
                    'type' => $json->error->type,
                    'info' => $json->error->info,
                ),
            );

            if ($json->error->type == 'missing_access_key') {
                $errors['error']['solution'] = 'Add your API key to craft/config/geo.php. If this file doesn\'t exist, copy config.php from craft/plugins/geo and save it as geo.php in the craft/config directory.';
            }

            return $errors;
        }

        $data = array(
            'ip' => $json->ip,
            'country_code' => $json->country_code,
            'country_name' => $json->country_name,
            'region_name' => $json->region_name,
            'zipcode' => $json->zip,
            'city' => $json->city,
            'latitude' => $json->latitude,
            'longitude' => $json->longitude,
            'cached' => false
        );

        return $data;
    }

}
