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
        return '1.5.0';
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
}
