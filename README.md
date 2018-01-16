# Rankz
[![Packagist](https://img.shields.io/packagist/v/ensoul/rankz.svg?style=flat-square)](https://packagist.org/packages/ensoul/rankz)
[![Packagist Downloads](https://img.shields.io/packagist/dt/ensoul/rankz.svg?style=flat-square)](https://packagist.org/packages/ensoul/rankz)
[![Build Status](https://img.shields.io/travis/helloensoul/rankz.svg?style=flat-square)](https://travis-ci.org/helloensoul/rankz)

A WordPress plugin which contains a bunch of customizations for Sage WordPress theme.

## Requirements

* [PHP](https://secure.php.net/manual/en/install.php) >= 5.4.x
* [WordPress](https://wordpress.org/download/) >= 4.7.x

## Installation

You can install this plugin via the command-line or the WordPress admin panel.

### via Command-line

If you're [using Composer to manage WordPress](https://roots.io/using-composer-with-wordpress/), add Rankz to your project's dependencies.

```sh
composer require ensoul/rankz
```

Then activate the plugin via [wp-cli](http://wp-cli.org/commands/plugin/activate/).

```sh
wp plugin activate rankz
```

### via WordPress Admin Panel

1. Download the [latest zip](https://github.com/helloensoul/rankz/releases/latest) of this repo.
2. In your WordPress admin panel, navigate to Plugins->Add New
3. Click Upload Plugin
4. Upload the zip file that you downloaded.

## Modules

* **Rankz first setup**<br>
  `add_theme_support('rankz-init');`

* **Clean WordPress**<br>
  `add_theme_support('rankz-clean-up');`

* **Disable Customizer**<br>
  `add_theme_support('rankz-disable-customizer');`

* **Disable core update notice for non admin users**<br>
  `add_theme_support('rankz-disable-update-notice');`

* **Disable comments**<br>
  `add_theme_support('rankz-disable-comments');`

* **Disable widgets**<br>
  `add_theme_support('rankz-disable-widgets');`

* **Add Font Awesome icons to menu** ([more info](https://github.com/helloensoul/rankz/wiki/Add-Font-Awesome-icons-to-menu))<br>
  `add_theme_support('rankz-font-awesome-menu');`

* **Admin login customization** ([more info](https://github.com/helloensoul/rankz/wiki/Admin-login-customization))<br>
  `add_theme_support('rankz-admin-login', '#e50040', 'dist/images/login-logo.png', 'https://example.com');`

* **Google Analytics with anonymizeIP** ([more info](https://github.com/helloensoul/rankz/wiki/Google-Analytics-with-anonymizeIP))<br>
  `add_theme_support('rankz-google-analytics', 'UA-XXXXX-Y');`

And in a format you can copy & paste into your theme:
```php
/**
 * Enable features from Rankz when plugin is activated
 */
add_theme_support('rankz-init');
add_theme_support('rankz-clean-up');
add_theme_support('rankz-disable-customizer');
add_theme_support('rankz-disable-update-notice');
add_theme_support('rankz-disable-comments');
add_theme_support('rankz-disable-widgets');
add_theme_support('rankz-font-awesome-menu');
add_theme_support('rankz-admin-login', '#e50040', 'dist/images/login-logo.png', 'https://example.com');
add_theme_support('rankz-google-analytics', 'UA-XXXXX-Y');
```

## Contributing

1. [Fork it](https://github.com/helloensoul/rankz/fork)
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create a new Pull Request
