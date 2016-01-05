Motörhead Tegetarius
====================

Just a demo app for interview at Tegeta Motors.

## Requirements

#### Lumen requirements

 - PHP >= 5.5.9
 - OpenSSL PHP Extension
 - Mbstring PHP Extension
 - Tokenizer PHP Extension

#### App requirements
 - node (with npm)
 - bower
 - gulp
 - composer
 - bower

## Setting up

 - Copy `.env.example` to `.env` and configure database, cache, session, etc drivers (you can set `session` and `cache` drivers to `file` instead of `redis` or `memcached`).
 - Install PHP dependencies `composer install`
 - Node development dependencies `npm install`
 - Front-end libraries and assets `bower install`
 - Build raw (CoffeeScript, Stylus) files `gulp build` or run a watcher task `gulp watch`
 - Run database migrations `php artisan migrate` (remember to set database config correctly in `.env` file)
 - Run a local server `php artisan serve --port=8888`

## Notes

The app uses 3 minute caching for statistics. Set `cache` driver to `array` in config to disable cache and see updates immediately.

I have already set up a tunnel to my local server. https://tegeta.localtunnel.me should be available if my computer is connected to network.
