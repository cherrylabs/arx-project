module.exports = {
    /**
     * File paths configuration
     */
    base_url: 'assets',
    src_dir: 'resources/assets',
    public_dir: 'public/assets',
    pkg_dir: 'bower_components',
    plugins_dir: 'public/assets/plugins',

    /**
     * Main files that you want concatenate and compress in one file for perf
     */
    main_files : {

        css : {
            /**
             * Here you can put your main stylesheets
             *
             * For convenient reason is better to import css inside your main.scss
             */
            main : [
                '<%= src_dir  %>/scss/main.scss'
            ]

            /**
             * You can add as many files as you need the key = the filename
             *
             * @example if you want to separate plugins :
             *
             * plugins : [
             *   '<%= src_dir  %>/scss/plugins.scss'
             * ]
             *
             */
        },

        js : {
            /**
             * Here you can put the main plugins that you use everywhere
             *
             * It will be concatened and compressed in one file
             *
             * For debug reason is more convenient to separate plugins from your own code
             */
            plugins : [
                "<%= pkg_dir %>/jquery/jquery.js",
                "<%= pkg_dir %>/bootstrap/dist/js/bootstrap.min.js",
                "<%= pkg_dir %>/angular/angular.js"
            ],

            /**
             * Here you can put your main script
             */
            main : [
                '<%= src_dir  %>/js/main.js'
            ]
        },

        /**
         * Extra folders that you need to process
         */
        js_folders : {
            "components" : "*",
            "shared" : "*"
        },

        fonts : [
            '<%= pkg_dir %>/bootstrap-sass-official/assets/fonts/bootstrap/*',
            '<%= pkg_dir %>/font-awesome/fonts/*'
        ],

        img : [
            //example : 'vendor/arx/core/public/dist/img/arx-logo.png'
        ],

        /**
         * Extra folders that you need to copy inside
         */
        copy : {
            /*'docs' : [
                'vendor/arx/core/README.md'
            ]*/
        }
    },

    /**
     * Extra Plugin Files that needs to be copied in public folder and are optionnal
     *
     * For example file that is used only for retro-compability or files that need link to extra assets or files used in
     * Require.js Flow
     *
     */
    plugin_files: {

        /**
         * Fonts to copy in the dist/fonts folders
         */
        fonts: [
            '<%= pkg_dir %>/bootstrap-sass-official/assets/fonts/bootstrap/*',
            '<%= pkg_dir %>/font-awesome/fonts/*'
        ],

        /**
         * Copy plugins to the public path in a public_dir/plugins folders
         *
         * key = name of the folders
         * value = file(s) or folders to copy
         */
        copy: {
            'modernizr': [
                '<%= pkg_dir %>/modernizr/modernizr.js'
            ],
            'html5shiv': [
                '<%= pkg_dir %>/html5shiv/dist'
            ]
        },

        /**
         * Declare your Require dependencies here if you want to use Browserify (Optionnal)
         */
        shim: {
            jquery: {
                path: 'bower_components/jquery/jquery.js',
                exports: 'jQuery'
            },
            angular: {
                path: 'bower_components/angular/angular.js',
                deps: ['jquery'],
                exports: 'angular'
            },
            bootstrap: {
                path: 'bower_components/bootstrap/dist/js/bootstrap.js',
                deps: ['jquery'],
                exports: 'bootstrap'
            }
        }
    },

    /**
    * Files that you want to check the change and that trig a LiveReload
    */
    livereload: [
        './app/**/*.php',
        './resources/views/**/*.php',
        './public/assets/css/*.css',
        './public/assets/js/*.js'
    ]
};