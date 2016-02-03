'use strict';

// required external components
import angular from 'angular';
import $ from 'jquery';

// required utils components
import Debug from './lib/debug';
import './lib/helpers';

// required project specific components
import Manager from './components/manager';
import Pickup from './components/pickup';

// defaults modules
let dependencies = [];

// expose Debug class
window.Debug = Debug;

/**
 * Modules (`$.modules`) are used with the DOM routing
 */
$.modules = {
        'common': () => {
        // preload
        $(document.body).addClass('loading');

// inform Google Analytics of the change
if (typeof window.ga !== 'undefined') {
    let tracked = document.location.href.replace(document.location.origin, '');
    window.ga('send', 'pageview', tracked);
}

return {
    isInitialized: false,

    load() {
    // ensure to execute common function once
    if (!this.isInitialized) {
        Debug.bench('common:load');
        this.isInitialized = true;
    }
},

finalize() {
    angular.module('app', dependencies);

    // bootstrap the app (async)
    angular.bootstrap(document, ['app']);

    setTimeout(function () {
        $(document.body).removeClass('loading');
    }, 0);

    Debug.bench('common:finalize', true);
}
};
},

'tpl_pages_home': () => {
    return {
        load() {
        // init Home Carousel
        $('#homeCarousel').carousel();
    }
};
},



'tpl_pages_service': () => {
    return {
        load() {
        // init Owl Carousel
        $('.owl-carousel').owlCarousel({
            items : 4,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3],
            navigation: true,
            navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            pagination: false,
        });
    }
};
},

'tpl_user_manager': () => {
    return {
        load() {
        Debug.bench('tpl_pickup:load');
        dependencies.push('manager');
    }
};
},

/**
 * Load Pickup page
 *
 * @returns {{load}}
 */
'tpl_user_pickup': () => {
    return {
        load() {
        Debug.bench('tpl_pickup:load');

        // add pickup module declaration
        dependencies.push('pickup');
    }
};
}
};


$(document).ready(() => {
    $.fire('common');

$.loadEvents($(document.body).attr('class'), (classnm) => {
    $.fire(classnm);
});

$.fire('common', 'finalize');
});