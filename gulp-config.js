module.exports = {
    /**
     * File paths
     */
    base_url: 'assets',
    src_dir: 'resources/assets',
    public_dir: 'public/assets',
    pkg_dir: 'bower_components',
    plugins_dir: 'public/assets/plugins',

    /**
     * Files that neeed to be concatened
     */
    concat: {
        css: {
            plugins: [
                "<%= pkg_dir %>/bootstrap/dist/js/bootstrap.min.js",
            ]
        },
        js: {
            plugins: [
                "<%= pkg_dir %>/jquery/jquery.min.js",
                "<%= pkg_dir %>/bootstrap/dist/js/bootstrap.min.js",
                "<%= pkg_dir %>/lodash/lodash.min.js"
            ],

            main: [
                '<%= src_dir  %>/js/main.js',
            ]
        }
    },

    /**
     *
     * Extra Plugin Files that needs to be copied
     *
     */
    plugin_files: {
        fonts: [
            '<%= pkg_dir %>/bootstrap-sass-official/assets/fonts/bootstrap/*',
            '<%= pkg_dir %>/font-awesome/fonts/*',
        ],
        // Copy to public_dir {dist}/plugins
        copy: {
            'modernizr': [
                '<%= pkg_dir %>/modernizr/modernizr.js'
            ],
            'html5shiv': [
                '<%= pkg_dir %>/html5shiv/dist'
            ]
        },
        shim: {
            jquery : {
                path: 'bower_components/jquery/jquery.js',
                exports : 'jQuery'
            },
            angular : {
                path: 'bower_components/angular/angular.js',
                deps: ['jquery'],
                exports: 'angular'
            },
            bootstrap : {
                path: 'bower_components/bootstrap/dist/js/bootstrap.js',
                deps: ['jquery'],
                exports : 'bootstrap'
            }
        },

        js: [
            '<%= pkg_dir %>/console-polyfill/index.js',
            // '<%= pkg_dir %>/bootstrap-sass-official/assets/javascripts/bootstrap/tooltip.js',
            // '<%= pkg_dir %>/bootstrap-sass-official/assets/javascripts/bootstrap/affix.js',
            // '<%= pkg_dir %>/bootstrap-sass-official/assets/javascripts/bootstrap/alert.js',
            // '<%= pkg_dir %>/bootstrap-sass-official/assets/javascripts/bootstrap/button.js',
            // '<%= pkg_dir %>/bootstrap-sass-official/assets/javascripts/bootstrap/carousel.js',
            // '<%= pkg_dir %>/bootstrap-sass-official/assets/javascripts/bootstrap/collapse.js',
            // '<%= pkg_dir %>/bootstrap-sass-official/assets/javascripts/bootstrap/dropdown.js',
            // '<%= pkg_dir %>/bootstrap-sass-official/assets/javascripts/bootstrap/modal.js',
            // '<%= pkg_dir %>/bootstrap-sass-official/assets/javascripts/bootstrap/popover.js',
            // '<%= pkg_dir %>/bootstrap-sass-official/assets/javascripts/bootstrap/scrollspy.js',
            // '<%= pkg_dir %>/bootstrap-sass-official/assets/javascripts/bootstrap/tab.js',
            // '<%= pkg_dir %>/bootstrap-sass-official/assets/javascripts/bootstrap/transition.js',
        ],
        // min vendor for quick testing or debug
        vendor: [
            '<%= pkg_dir %>/requirejs/require.js',
            '<%= pkg_dir %>/jquery/dist/jquery.min.js',
            '<%= pkg_dir %>/jquery/dist/jquery.min.map',
            '<%= pkg_dir %>/angular/angular.min.js',
            '<%= pkg_dir %>/angular/angular.min.js.map',
            '<%= pkg_dir %>/bootstrap/dist/js/bootstrap.min.js',
        ]
    },

    livereload: [
        './app/**/*.php',
        '!./app/storage/**/*',
        './resources/views/**/*.php',
        './resources/assets/**/js/**/*.js',
        './resources/assets/**/scss/**/*.scss'
    ]
};