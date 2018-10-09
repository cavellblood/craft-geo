# Geo Plugin for Craft CMS

A simple plugin to get information about your users location.

Put the `geo` folder in your `craft/plugins` folder.

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

If you are in Craft’s `devMode` or visiting the site from the server itself then a default IP address will be used.
This setting is configurable by creating a `geo.php` file in your `craft/config` folder. An example of this file is found in the geo-examples folder.

## TODO
* Add additional API endpoints for API redundancy.
* Modularize enpoints so you can add your own endpoint plugins.

## Licence

MIT.

Pull requests welcome.