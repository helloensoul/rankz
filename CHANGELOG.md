### HEAD
* Remove `template-home.php` as default page template for the home page in init module
* Split clean-up module in three different modules
* Add support for validate ACF fields with Yoast SEO plugin (> 3.0)
* Remove disable-editor functions in favor of bedrock default settings
* Remove `dashboard_footer` function in clean-up module
* Update README.md

### 1.2.0: Dec 18th, 2015
* Move Bootstrap Nav Walker functions to utils.php ([#8](https://github.com/roots/soil/issues/8))
* Improve modules comments ([#7](https://github.com/roots/soil/issues/7))
* Remove nav walker closure ([#6](https://github.com/roots/soil/issues/6))
* Adding `.menu-item` class to all `<li>` tags in walker and spaces fix in other files ([#5](https://github.com/roots/soil/issues/5))
* Support placeholder links ([#4](https://github.com/roots/soil/issues/4))
* Add priority for loading modules (compatibility with Shaba 1.2.0+) ([#3](https://github.com/roots/soil/issues/3))
* Add support for Travis CI and fixes for ruleset.xml ([#1](https://github.com/roots/soil/issues/1)) ([#2](https://github.com/roots/soil/issues/2))
* Remove `add_theme_support('rankz-menu-humility);` module
* Update README.md

### 1.1.0: Sept 21th, 2015
* Added support for `add_theme_support('rankz-google-analytics);` with anonymizeIp for european Cookie Law

### 1.0.0: Aug 3rd, 2015
* Added `add_theme_support('rankz-init');` for first Shaba setup
* Added `add_theme_support('rankz-clean-up');`, a bunch of functions to clean up WordPress dashboard
* Added `add_theme_support('rankz-disable-comments');` to disable comments on whole website
* Added `add_theme_support('rankz-disable-widgets');` to disable widgets on whole website
* Added `add_theme_support('rankz-disable-editors');` to disable editors on WordPress dashboard
* Added `add_theme_support('rankz-remove-default-image-sizes');` to remove default WordPress image sizes and hide Media page in WordPress settings
* Added `add_theme_support('rankz-menu-humility');`, a snippet to push all Custom Post Types at the bottom of the admin menu
* Added `add_theme_support('rankz-font-awesome-menu');` to add Font Awesome icons in the WordPress menus
* Added `add_theme_support('rankz-admin-login', 'URL', '#HEX-COLOR');` to customize WordPress admin login page with differents colours, custom logo and custom url link for logo
* Added `add_theme_support('rankz-bootstrap-nav-walker');` an alternative to soil-nav-walker with bootstrap structures and classes
