

var Util = {
    load: function (callback) {
        callback();
        $(window).on('load', callback);
    }, // load

    resize: function (callback) {
        callback();
        $(window).on('resize', callback);
    }, // resize
}; // Util

//check if function exist

if(typeof log != 'function'){
    (function () {
        var method;
        var noop = function () { };
        var methods = [
            'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
            'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
            'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
            'timeStamp', 'trace', 'warn'
        ];
        var length = methods.length;
        var console = (window.console = window.console || {});

        while (length--) {
            method = methods[length];

            // Only stub undefined methods.
            if (!console[method]) {
                console[method] = noop;
            }
        }


        if (Function.prototype.bind) {
            window.log = Function.prototype.bind.call(console.log, console);
        }
        else {
            window.log = function() {
                Function.prototype.apply.call(console.log, console, arguments);
            };
        }
    })();
}