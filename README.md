Sites
=====

FlatTurtle sites

Installation
------------

*This repository is a copy of the Laravel framework with minor modifications. The Laravel framework requires PHP >= 5.3.7 and the MCrypt PHP extension.*

Clone this repository and install the Laravel framework and other dependencies:

	composer install

Make sure the folders in `app/storage` are writable.

The `composer install` command will automatically trigger the `php artisan flatturtle:install`. This command publishes the **SiteCore** configuration files and assets to your local installation.

Updating
--------

To update the **SiteCore** to the latest version run:

	composer update flatturtle/sitecore

This will pull the latest changes from the git repository. It will automatically trigger the `php artisan flatturtle:update` command that publishes assets to your local installation.

Also, double check if the configuration file was modified and change your local version accordingly. You can overwrite your local configuration file with the latest version by using the `php artisan flatturtle:install` command.

Configuration
-------------

After installing the **SiteCore** there will be a configuration file located in `app/config/packages/flatturtle/sitecore`.

Templating
----------

The **SiteCore** contains a default template file. If you wish to modify this template execute the following:

	php artisan view:publish flatturtle/sitecore

This will copy the template file to `app/views/flatturtle/sitecore` so that you can modify it.

Carousel
--------

All images placed in the `public/carousel` folder will automatically be used for the carousel.

Content
-------

The `content` folder contains the site's content. You can include markdown (.md) and HTML (.html) files. Markdown files will be parsed using parsedown.org.

You can order your site's content by adding numbers in front of the file name:

	01-first_block.md
	02-second_block.html

Commands
--------

These are the included artisan commands:

### flatturtle:install

Used when installing the **SiteCore** for the first time. This will:

 - Publish the configuration file to `app/config/packages/flatturtle/sitecore/config.php`
 - Publish assets to `public/packages/flatturtle/sitecore`
 - Generate a Laravel application key
 - Clear application cache
 - Create the content directory if it does not exists

### flatturtle:update

 - Publish assets to `public/packages/flatturtle/sitecore`
 - Clear application cache

Copyright and license
---------------------

2012-2013 - FlatTurtle

Code is licensed under AGPLv3
