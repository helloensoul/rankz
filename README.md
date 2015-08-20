# Rankz
A WordPress plugin which contains a bunch of customizations for Shaba WordPress theme.

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

* **Rankz first setup**<br>
  `add_theme_support('rankz-init');`
* **Clean WordPress**<br>
  `add_theme_support('rankz-clean-up');`
* **Disable comments**<br>
  `add_theme_support('rankz-disable-comments');`
* **Disable editors**<br>
  `add_theme_support('rankz-disable-editors');`
* **Disable widgets**<br>
  `add_theme_support('rankz-disable-widgets');`
* **Remove WordPress default image sizes**<br>
  `add_theme_support('rankz-remove-default-image-sizes');`
* **Menu Humility plugin**<br>
  `add_theme_support('rankz-menu-humility');`
* **Font Awesome icons on menus**<br>
  `add_theme_support('rankz-font-awesome-menu');`
* **Admin login**<br>
  `add_theme_support('rankz-admin-login', 'ensoul.it', '#E41B44');`
* **Bootstrap Nav walker**<br>
  `add_theme_support('rankz-bootstrap-nav-walker');`<br>
  Replace your templates/header.php with the code below:
  ```html
  <header class="banner navbar navbar-default navbar-static-top" role="banner">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only"><?= __('Toggle navigation', 'shaba'); ?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.svg" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/dist/images/logo.png'" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>">
        </a>
      </div>

      <nav class="collapse navbar-collapse" role="navigation">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new Ensoul\Rankz\BootstrapNavWalker\NavWalker(), 'menu_class' => 'nav navbar-nav']);
        endif;
        ?>
      </nav>
    </div>
  </header>
  ```
