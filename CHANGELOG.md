### HEAD
* Improve `admin-login` module to work with [Sage 9](https://github.com/roots/sage)

### 2.1.0: Gen 9th, 2018
* Update `itsensoul` organization name with `helloensoul`
* Re-enable media page in WordPress settings
* Remove the feature to create and add the `Home` page to the menu
* Improve `Modules` section in the README.md
* Don't do `active` fix for CPT if no archive page
* Improve `remove_dashboard_widgets` function after latest Soil updates
* Add `Contributing` guidelines in the README.md
* Add ISSUE_TEMPLATE.md

### 2.0.0: Nov 7th, 2016
* Add .gitattributes
* Travis updates
* Use `home_url` in `root_relative_url`
* Remove support for Yoast SEO ACF
* Delete `remove_meta_box('slugdiv', 'page/post', 'normal');` from the clean-up module

### 1.2.3: Mar 30th, 2016
* Fix for admin-login css according to the new buttons design of the latest WordPress version

### 1.2.2: Feb 22nd, 2016
* Remove default image size `medium_large` that was implemented with WordPress 4.4 ([#11](https://github.com/helloensoul/rankz/issues/11))

### 1.2.1: Jan 15th, 2016
* Remove useless functions in init module ([#10](https://github.com/helloensoul/rankz/issues/10))
* Remove `template-home.php` as default page template for the home page in init module ([#10](https://github.com/helloensoul/rankz/issues/10))
* Split clean-up module in three different modules([#10](https://github.com/helloensoul/rankz/issues/10))
* Add support for validate ACF fields with Yoast SEO plugin (> 3.0) ([#10](https://github.com/helloensoul/rankz/issues/10))
* Remove disable-editor functions in favor of bedrock default settings ([#10](https://github.com/helloensoul/rankz/issues/10))
* Remove `dashboard_footer` function in clean-up module ([#10](https://github.com/helloensoul/rankz/issues/10))
* Update README.md ([#10](https://github.com/helloensoul/rankz/issues/10))

### 1.2.0: Dec 18th, 2015
* Move Bootstrap Nav Walker functions to utils.php ([#8](https://github.com/helloensoul/rankz/issues/8))
* Improve modules comments ([#7](https://github.com/helloensoul/rankz/issues/7))
* Remove nav walker closure ([#6](https://github.com/helloensoul/rankz/issues/6))
* Adding `.menu-item` class to all `<li>` tags in walker and spaces fix in other files ([#5](https://github.com/helloensoul/rankz/issues/5))
* Support placeholder links ([#4](https://github.com/helloensoul/rankz/issues/4))
* Add priority for loading modules (compatibility with Shaba 1.2.0+) ([#3](https://github.com/helloensoul/rankz/issues/3))
* Add support for Travis CI and fixes for ruleset.xml ([#1](https://github.com/helloensoul/rankz/issues/1)) ([#2](https://github.com/helloensoul/rankz/issues/2))
* Remove `add_theme_support('rankz-menu-humility);` module
* Update README.md

### 1.1.0: Sept 21st, 2015
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
