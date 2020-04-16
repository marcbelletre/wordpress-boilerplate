# Wordpress theme boilerplate #

Lightweight boilerplate for Wordpress themes.

### Getting started ###

*  Download Wordpress from [wordpress.org](https://wordpress.org/download/)  
*  Clone or download this repository into `wp-content/themes/{your_theme_name}`
*  Create a new database for your Wordpress site
*  Go to your website URL and follow the installation steps
*  Replace theme description in `style.css`
*  Search and replace every occurence of `THEME_DOMAIN` by a custom prefix in the `includes/functions` directory

### Development ###

This project uses yarn, composer and webpack.  
Plugins should be installed with composer from [WPackagist](https://wpackagist.org)  
WP Super Cache and Advanced Custom Fields Pro are required by default. Make sure to activate them after install.

Install dependencies:

    $ composer install
    $ yarn install

Compile assets:

    $ yarn watch

### ACF Pro ###

ACF Pro is required by default and requires a valid key. This key should be set in a `.env` file in the theme's root:

    ACF_PRO_KEY=***
