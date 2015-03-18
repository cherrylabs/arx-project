/**
 * Define here your dependencies
 *
 * @type {exports}
 */

var config = require('./../../../gulp-config.js');

console.log('__config', config);

module.exports = function() {

    'use strict';

    config = {
        baseUrl: window.__app.baseUrl || '/assets/js',
        waitSeconds: 15,

        // for production
        // urlArgs: 'v0.0.1',
        // for developpement
        urlArgs: 'v' + new Date().getTime(),

        // alias libraries paths
        paths: {
            'angular':                      'vendor/angular.min',
            'angular-bootstrap':            '../plugins/angular-bootstrap/ui-bootstrap.min',
            'angular-bootstrap-tpls':       '../plugins/angular-bootstrap/ui-bootstrap-tpls.min'
            // ...
        },

        // add module that does not support AMD out of the box in a SHIM
        shim: {
            'angular': {
                deps: ['jquery'],
                exports: 'angular'
            },
            'angular-bootstrap': {
                deps: ['angular']
            }
            // ...
        },

        priority: [
            'jquery',
            'angular'
        ],

        // default load a module (kick start)
        deps: []
    };
};

