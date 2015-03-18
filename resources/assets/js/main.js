/**
 * Define here your dependencies
 *
 * @type {exports}
 */

var config = require('./config');

var _ = require('lodash');

var $ = jQuery = require('jquery');

require('angular', {expose: 'angular'});

var bootstrap = require('bootstrap');

/**
 * App function loader
 *
 * @type {{common: {init: Function}, home: {init: Function}}}
 */
var App = {

    common: {
        init: function() {

        },
        is_touch_device : function(){
            return !!('ontouchstart' in window) // works on most browsers
                || !!('onmsgesturechange' in window); // works on ie10
        }
    },

    /**
     * @todo Clean template logic move to functions
     */
    tpl_home: {
        init : function(){

        }
    }
};

/**
 * The routing fires all common scripts, followed by the page specific scripts.
 *
 * @type {{fire: Function, loadEvents: Function}}
 */
var UTIL = {
    fire: function (func, funcname, args) {
        var namespace = App;
        funcname = (funcname === undefined) ? 'init' : funcname;
        if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
            namespace[func][funcname](args);
        }
    },
    loadEvents: function () {
        UTIL.fire('common');

        $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
            UTIL.fire(classnm);
        });

        UTIL.fire('common', 'finalize');
    }
};

angular.element(document).ready(UTIL.loadEvents);

angular.module('home', [])
    .controller('homeController', homeController);

/**
 * @ngInject
 */
function homeController($scope) {

    $scope.items = [];

    $scope.addItem = function(){
        $scope.items.push({
            title : $scope.item.title,
            author : $scope.name
        })
    }
}