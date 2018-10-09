<?php
namespace Craft;

class GeoVariable
{

    public function info($cache=true)
    {
        return craft()->geo_location->getInfo($cache);
    }

    public function getPlugin()
    {
        return craft()->plugins->getPlugin('geo');
    }

    public function getPluginName()
    {
        return $this->getPlugin()->getName();
    }

    public function getPluginVersion()
    {
        return $this->getPlugin()->getVersion();
    }

    public function getPluginUrl()
    {
        return $this->getPlugin()->getPluginUrl();
    }

}
