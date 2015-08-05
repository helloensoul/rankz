# Rankz
A WordPress plugin which contains a bunch of customizations for Wordpress themes.

## Requirements

<table>
  <thead>
    <tr>
      <th>Prerequisite</th>
      <th>How to check</th>
      <th>How to install</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>PHP &gt;= 5.4.x</td>
      <td><code>php -v</code></td>
      <td>
        <a href="http://php.net/manual/en/install.php">php.net</a>
      </td>
    </tr>
  </tbody>
</table>

## Installation

You can install this plugin via the command-line or the WordPress admin panel.

### via Command-line

If you're [using Composer to manage WordPress](https://roots.io/using-composer-with-wordpress/), add Rankz to your project's dependencies.

```sh
composer require ensoul/rankz 1.0.0
```

Then activate the plugin via [wp-cli](http://wp-cli.org/commands/plugin/activate/).

```sh
wp plugin activate rankz
```

### via WordPress Admin Panel

1. Download the [latest zip](https://github.com/itsensoul/rankz/archive/master.zip) of this repo.
2. In your WordPress admin panel, navigate to Plugins->Add New
3. Click Upload Plugin
4. Upload the zip file that you downloaded.

## Modules

* **Clean WordPress**<br>
  `add_theme_support('rankz-clean-up');`
