# Arx starter project

[![Latest Stable Version](https://poser.pugx.org/arx/core/v/stable.png)](https://packagist.org/packages/arx/core) [![Total Downloads](https://poser.pugx.org/arx/core/downloads.png)](https://packagist.org/packages/arx/core) [![Latest Unstable Version](https://poser.pugx.org/arx/core/v/unstable.png)](https://packagist.org/packages/arx/core)

If your new with Laravel, we highly recommend you to read his wonderfull docs here : [http://laravel.com/docs](http://laravel.com/docs)

## Requirements

- PHP > 5.3
- Composer [follow these steps](http://getcomposer.org/doc/00-intro.md)

## Recommended

 - Nodejs to handle your asset package
 - Bower to install package
 - Grunt

## What's bundled here ?

Arx project propose a clean startup project template to start with. It includes :

 - Laravel
 - Arx Core as an extension of Laravel (see https://github.com/cherrylabs/arx-core) for more informations
 - Usefull extra vendors package like :
    - better debug var_dump with Kint
    - Assets management
    - ide-helper generator
    - laravel debug-bar
    - grunt generator

Vagrantfile
VagrantInstall.sh


## How to install ?

    sudo php composer{link to you composer phar or global} create arx/project {Your folder destination} --prefer-source

### Permissions

/!\ After installing Laravel, you may need to grant the web server write permissions to the app/storage directories. See the [Installation documentation for more details on configuration](http://laravel.com/docs/installation).

## How to run ?

If you have Mamp\Wamp or you have simply run to the localhost/{path to your project}

If you don't, you can run in the terminal (at the root of your project)

    php artisan serve

Then you will get access to your project via : http://localhost:8000

## Run with Vagrant (best way)

You can start the project with Vagrant too.

Just download vagrant [here](https://www.vagrantup.com/downloads.html)

Then in your terminal at the project root just run : 

    vagrant up
    
That's it :-)

Run in the terminal : 

    php artisan assets:publish arx/core
    php artisan debugbar:publish

## How to report a bug or suggestion ?

If you want to report a bug or a suggestion, please go to our centralized issue tracker  [our issue tracker](https://github.com/cherrylabs/arx/issues?labels=bug&milestone=&page=1&state=open)

## How to contribute ?

If you want to contribute to the Arx project, please go on our [Arx-contrib repository](https://github.com/cherrylabs/arx-contrib)

