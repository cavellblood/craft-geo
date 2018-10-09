# Geo Plugin for Craft CMS

A simple plugin to get information about your users location.

## Installation

To install Geo, follow these steps:

1.  Upload the `geo` folder to your `craft/plugins/` folder.
2.  Go to Settings &rarr; Plugins from your Craft control panel and install the Geo plugin.
3.  Click on “Geo” to go to the plugin’s settings page, and configure the plugin.

## Usage

```twig
{#
 # The following will cache the users location from their IP, so subsequent
 # api calls are not made, but just looked up in the cache:
#}
{% set data = craft.geo.info(true) %}

{# which is the same as: #}
{% set data = craft.geo.info() %}

{# An Api call is made on every page view: #}
{% set data = craft.geo.info(false) %}

{# You can then access the data like this: #}
{{ data.country_code }}
```

Variables available in Craft twig templates:

```twig
location: {{ craft.geo.info.country_name }}
ip: {{ craft.geo.info.ip }}
country_code: {{ craft.geo.info.country_code }}
country_name: {{ craft.geo.info.country_name }}
region_code: {{ craft.geo.info.region_code }}
region_name: {{ craft.geo.info.region_name }}
city: {{ craft.geo.info.city }}
zipcode: {{ craft.geo.info.zipcode }}
latitude: {{ craft.geo.info.latitude }}
longitude: {{ craft.geo.info.longitude }}
metro_code: {{ craft.geo.info.metro_code }}
areacode: {{ craft.geo.info.areacode }}
cached: {{ craft.geo.info.cached }}
```

You are limited to 10,000 requests an hour for this plugin. It caches a single IP
address for 12 hours by default. You can config this with a config file as explained below.

### Overriding plugin settings

If you create a [config file](https://docs.craftcms.com/v2/config-settings.html) in your `craft/config` folder called `geo.php`, you can override
the plugin’s settings in the control panel. Since that config file is fully [multi-environment](https://docs.craftcms.com/v2/multi-environment-configs.html) aware, this is
a handy way to have different settings across multiple environments.

Here’s what that config file might look like along with a list of all of the possible values you can override.

```php
<?php

return array(
    // This is the IP address used if in devMode or visiting your site
    // from the local computer to the server.
    // i.e. 8.8.8.8 - Google
    'defaultIp' => '8.8.8.8',

    // Number of seconds to cache the results
    'cacheTime' => '43200',

    // API Key for IPAPI.com - which replaced Nekudo on 2018/10/08
    // https://github.com/nekudocom/shiny_geoip/blob/master/README.md#readme
    // A free account can be created here: https://ipapi.com/product
    'ipApiKey' => 'APIKEYHERE'
);
```

If [`devMode` is enabled](https://docs.craftcms.com/v2/config-settings.html#devmode) or if visiting the site from the server itself (local development) then the `defaultIp` address will be used.

## TODO
* Add additional API endpoints for API redundancy.
* Modularize enpoints so you can add your own endpoint plugins.

## Licence

MIT.

Pull requests welcome.