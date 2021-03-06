# Changelog Craft CMS Geo Plugin

## Version 1.5.3 ([@cavellblood](https://github.com/cavellblood))
### Fixed
* Plugin wasn’t reading values from the control panel settings but only the config file. The config file can still be used but the plugin now respects any keys set in the control panel.


## Version 1.5.2 ([@cavellblood](https://github.com/cavellblood))
### Added
* `defaultIp` and `cacheTime` can now be set in the Craft control panel. If these keys are set in the `config/geo.php` it will override the control panel setting and add a warning.

## Version 1.5.1 ([@cavellblood](https://github.com/cavellblood))
### Added
* `ipApiKey` can now be set in the Craft control panel. If it is set in the `config/geo.php` it will override the control panel setting and add a warning.

## Version 1.5.0 ([@cavellblood](https://github.com/cavellblood))
### Added
* New configuration key `ipApiKey`.

### Improved
* Use IP Anonymizer from [`geertw/php-ip-anonymizer`](https://github.com/geertw/php-ip-anonymizer) via composer.
* Updated `Geo_LocationService` to use [ipapi.com](https://ipapi.com) for geo IP lookup. Requires a free account to use. The previous `geoip.nekudo.com` api service was discontinued and became the new `api.ipapi.com`. [See announcement](https://github.com/nekudocom/shiny_geoip/blob/master/README.md#readme).

### Changed
* `defaultIp` in `config.php` is now set to `8.8.8.8`.

## Version 1.4 ([@marzepani](https://github.com/marzepani))
### Added
* IP anonymizer

### Fixed
* Removed deprecated service (telize.com)

## Version 1.3
* _todo_

## Version 1.2
### Added
* Cache option in template tag.
* Configuration using standard environment aware craft config files.

## Version 1.0
* Initial release