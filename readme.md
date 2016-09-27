# Froyo Story CMS

## Requirement

1. [Composer](https://getcomposer.org/doc/00-intro.md)
2. [NPM](https://nodejs.org)
3. PHP 5.6.4+
4. MySQL / PostgreSQL

## Installation

1. Clone this repository ```git clone git@github.com:FroyoStory/storycms.git storycms```
2. Enter working directory project ```cd storycms```
3. Run project depencies using command ```composer install``` and ```npm install```
4. Run database migration using command ```php artisan migrate```

## Sublime Text Notes

This project include ```.editorconfig```. Please install editorconfig plugins first using Sublime Packages Control.

1. How to install [Sublime Packages Control](https://packagecontrol.io/installation)
2. How to install editorconfig plugins just jump into Packages Control Menu -> Install Plugins -> Type editorconfig -> Hit Enter

## Frontend Development

If you are working with frontend stuff this project also include assets builder. Just run ```npm run dev``` for development
and for production just run ```npm run build```

## License 

This project is releasing under MIT license.
