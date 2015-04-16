/**
 * App function loader
 *
 * @type {{common: {init: Function}, home: {init: Function}}}
 */
var App = {

    common: {
        init: function() {
            console.log('Common init from main.js');
        },
        is_touch_device : function(){
            return !!('ontouchstart' in window) // works on most browsers
                || !!('onmsgesturechange' in window); // works on ie10
        }
    },

    /**
     * @example This will be trigger when a page have class tpl-home in the body
     */
    tpl_home: {
        init : function(){
            console.log('INIT from main.js@tpl_home trigged by body.tpl-home class');
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

$(document).ready( UTIL.loadEvents );

/**
 * Example of include JS with gulp-include
 */
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
homeController.$inject = ['$scope'];


angular.module('home', [])
    .controller('homeController', homeController);

