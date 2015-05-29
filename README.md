# Arx starter project for Laravel 5

[![Latest Stable Version](https://poser.pugx.org/arx/core/v/stable.png)](https://packagist.org/packages/arx/core) [![Total Downloads](https://poser.pugx.org/arx/core/downloads.png)](https://packagist.org/packages/arx/core) [![Latest Unstable Version](https://poser.pugx.org/arx/core/v/unstable.png)](https://packagist.org/packages/arx/core)

## What's bundled here ?

Arx project propose a clean startup project template to start with Laravel 5. It includes :

 - Laravel
 - default usefull Laravel packages like : ide-helper, debugbar, etc.
 - Arx Core as an extension of Laravel (see https://github.com/cherrylabs/arx-core) for more informations
 - Arx/core improvements :
    - Tpl Engine to handle angular templating (exactly the same as blade the only difference with blade is that {{ }} are replaced with <% %> for better angular convenience and you have a helper $this->help() that you can call in a view to know what variables is availables
    - body attributes auto class attributes based on Paul Irish structure
    - better debug var_dump with Kint
    - Assets management
    - ide-helper generator
    - laravel debug-bar
    - gulp generator
    - angular generator (controller, directive, filter etc.)
    - Additionnal classes like a Image class helper, Dummy text generator, Hook helper, Opengraph reader etc.
    - Startup layouts with bootstrap structure
    - helpers for Bootstrap
    - Api usefull class and helpers
    - Useful traits to use in your model to handle fileupload, etc.
 - Angular + Bootstrap3 + common ui plugins
 - Vagrant config with PHP 5.4, benstalkd, mongo config if you need it
 - Gulp default config to handle your assets
 - default bower config with most used plugins in a startup project

To start with Arx project you can simply create a project with Composer like this : 

    composer create arx/project your_app_name


If your new with Laravel, we highly recommend you to read his wonderfull docs here : [http://laravel.com/docs](http://laravel.com/docs)

## Requirements

- PHP > 5.4
- Composer [follow these steps](http://getcomposer.org/doc/00-intro.md)

## Recommended

 - Nodejs to handle your asset package
 - Bower to install package
 - Gulp

## How to install ?

    sudo php composer{link to you composer phar or global} create arx/project {Your folder destination} --prefer-source
    # Example
    php composer create arx/project myapp --prefer-source

### Permissions

/!\ After installing Laravel, you may need to grant the web server write permissions to the app/storage directories. See the [Installation documentation for more details on configuration](http://laravel.com/docs/installation).

## How to run ?

### Run with Wamp|Mamp|Xampp etc.

If you have Mamp\Wamp you have to simply run to the localhost/{path to your project}. Example : localhost/myapp/public

### Run with your PHP CLI in the terminal

If you don't, you can run in the terminal* (at the root of your project)

    php artisan serve

Then you will get access to your project via : http://localhost:8000

* this option requires you to install the mcrypt extension [see](http://laravel.com/docs/5.0)

### Run with Vagrant (best way)

You can start the project with Vagrant too.

Just download vagrant [here](https://www.vagrantup.com/downloads.html)

Then in your terminal at the project root just run : 

    vagrant up
    
That's it, you can access via http://localhost:8080 :-)

## How to install assets

Arx project uses Gulp and Bower to make things pretty. You need to install [Node](http://nodejs.org/), [Bower](http://bower.io/#install-bower) and [Gulp](https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md).

Then at root of your project

Run in the terminal : 

    bower install
    npm install

### Philosophy

Elixir of Laravel is great but not usable in other case than a Laravel project and it's not really as flexible than using directly Gulp plugins...

Also, we decide to separate the config and the process logic so you can more easily copy-paste config assets in an other project and make a different processing of that.

That's why you have 2 files : 

- gulp-config.js
- gulpfile.js

Gulp-config it's almost at 90% where you will handle your assets. It handles most of the assets cases and offers a simplest way to make dynamic variables with <%= %> or organize your assets.

You can read the gulp-config for further informations of how it works.

### Optionnal

Arx come with an optionnal assets package for the demo or quick app prototyping. You can publish the assets with

    php artisan assets:publish arx/core

It will create a folder in public/packages/arx/core folder. But you can delete it if you don't need it.

## How to report a bug or suggestion ?

If you want to report a bug or a suggestion, please go to our centralized issue tracker  [our issue tracker](https://github.com/cherrylabs/arx/issues?labels=bug&milestone=&page=1&state=open)

## How to contribute ?

If you want to contribute to the Arx project, please go on our [Arx-contrib repository](https://github.com/cherrylabs/arx-contrib)
