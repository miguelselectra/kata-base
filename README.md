# Base code for testing

Basic configuration to start doing a kata or learn to do tests in the following languages:
- PHP with PHPUnit
- Javascript with Jest

# Language specific settings

## PHP
1. Install [composer](https://getcomposer.org/) `curl -sS https://getcomposer.org/installer | php`
2. Clone the repository `git clone git@github.com:miguelselectra/kata-base.git`
3. `composer install` (inside the php folder)
4. `./vendor/bin/phpunit`

## Javascript
1. Install [Node](http://nodejs.org/)
2. Clone the repository `git clone git@github.com:miguelselectra/kata-base.git`
3. `npm install` (inside the javascript folder)
4. `npm test`

# Documentación
## Javascript
[Jest](https://jestjs.io)

## PHP
[PHPUnit](https://phpunit.readthedocs.io/)

[Prophecy](https://github.com/phpspec/prophecy) for tests doubles
