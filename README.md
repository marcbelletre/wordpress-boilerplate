# Wordpress theme boilerplate #

Lightweight boilerplate for Wordpress themes.

### Getting started ###

*  Download Wordpress from [wordpress.org](https://wordpress.org/download/)  
*  Clone or download this repository into `wp-content/themes/{your_theme_name}`
*  Replace theme description in `style.css`
*  Search and replace every occurence of `THEME_PREFIX` by a custom function prefix
*  Search and replace every occurence of `THEME_DOMAIN` by your theme domain name
*  Create a new database for your Wordpress site
*  Go to your website URL and follow the installation steps

### Development ###

This theme uses yarn and webpack.  

Install dependencies:

    $ yarn install

Compile assets:

    $ yarn watch
    $ yarn build

## Icons

This project comes with a built-in npm script that makes use of [svg-sprite](https://github.com/jkphl/svg-sprite) to generate an SVG sprite of your icons.  
To use it, install `svg-sprite` on your computer and put your SVG files in the `src/icons` directory then run the following command:

```bash
$ yarn sprite
```
