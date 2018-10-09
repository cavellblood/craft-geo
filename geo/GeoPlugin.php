<?php
namespace Craft;

class GeoPlugin extends BasePlugin
{
    public function getName()
    {
         return Craft::t('Geo');
    }

    public function getVersion()
    {
        return '1.5.3';
    }

    public function getDeveloper()
    {
        return 'Luke Holder';
    }

    public function getDeveloperUrl()
    {
        return 'http://lukeholder.com';
    }

    public function getPluginUrl()
    {
        return 'https://github.com/lukeholder/craft-geo';
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return $this->getPluginUrl().'/blob/master/readme.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/lukeholder/craft-geo/master/releases.json';
    }

    public function init() {
        require_once 'vendor/autoload.php';
    }

    /**
     * @return mixed
     */
    public function getSettingsHtml()
    {
        return craft()->templates->render('geo/_settings', array(
            'settings' => $this->getSettings()
        ));
    }

    /**
     * @param array|BaseModel $values
     */
    public function setSettings($values)
    {
        if (!$values)
        {
            $values = array();
        }

        if (is_array($values))
        {
            // Merge in any values that are stored in craft/config/geo.php
            foreach ($this->getSettings() as $key => $value)
            {
                $configValue = craft()->config->get($key, 'geo');

                if ($configValue !== null)
                {
                    $values[$key] = $configValue;
                }
            }
        }

        parent::setSettings($values);
    }

    /**
     * @return array
     */
    protected function defineSettings()
    {
        return array(
            'defaultIp' => array(AttributeType::String, 'label' => 'Default IP', 'default' => '8.8.8.8'),
            'cacheTime' => array(AttributeType::String, 'label' => 'Cache Time', 'default' => '43200'),
            'ipApiKey' => array(AttributeType::String, 'label' => 'ipapi.com API Access Key', 'required' => true, 'default' => ''),
        );
    }


}
