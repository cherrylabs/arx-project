module.exports = {
    /**
     * File paths configuration
     */
    src_dir: 'resources/assets', // This is your work folder when magic happens
    public_dir: 'public/assets', // This is the destinary folders where files are compiled or processed
    pkg_dir: 'bower_components', // This is the bower directory when bower copy the files
    plugins_dir: 'public/assets/plugins', // This is where plugins where copied
    js_dir: 'js', // default js folder name, you can rename it "scripts" if you want
    css_dir: 'css', // default css folder name, you can rename it "stylesheets" if you want
    img_dir: 'img', // default img folder name, you can rename it "images" if you want
    fonts_dir: 'fonts', // default fonts folder name, you can rename it "fontzy" if you want

    /**
     * Main files that you want concatenate and compress in one file
     *
     */
    main_files: {

        css: {
            /**
             * Here you can put your main stylesheets
             *
             * For perf reason is better to import css inside one main.scss
             *
             */
            main: [
                '<%= src_dir  %>/scss/main.scss'
            ]

            /**
             * You can add as many files as you need : the key (ex plugins) = the filename
             *
             * @example if you want to separate plugins :
             *
             * plugins : [
             *   '<%= src_dir  %>/scss/plugins.scss'
             * ]
             *
             */
        },

        js: {
            /**
             * Here you can put the main plugins that you use everywhere
             *
             * It will be concatened and compressed in one file
             *
             * For debug reason is more convenient to separate plugins from your own code =>
             *
             * it will create a plugins.js and main.js that you need to add to your html page
             */
            plugins: [
                "<%= pkg_dir %>/jquery/jquery.js",
                "<%= pkg_dir %>/bootstrap/dist/js/bootstrap.min.js",
                "<%= pkg_dir %>/angular/angular.js"
            ],

            /**
             * Here you can put your main script
             */
            main: [
                '<%= src_dir  %>/js/main.js'
            ]
        },

        /**
         * Extra folders that you need to process
         *
         * By default if you have for example : components/home/home.js in your src_folder
         * => it will create a components/home.js in the public dir
         */
        js_folders: {
            "components": "*",
            "shared": "*"
        },

        fonts: [
            '<%= pkg_dir %>/bootstrap-sass-official/assets/fonts/bootstrap/*',
            '<%= pkg_dir %>/font-awesome/fonts/*'
        ],

        img: [
            //example : 'vendor/arx/core/public/dist/img/arx-logo.png'
        ],

        /**
         * Extra folders that you need to copy inside
         */
        copy: {
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
         * Declare your Require dependencies here if you want to use Browserify or RequireJs (Optionnal)
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
    * Files that will be watched
    */
    watch: {
        'css': [
            '<%= src_dir %>/scss/*.scss',
            '<%= src_dir %>/scss/**/*.scss'
        ],
        'js': [
            '<%= src_dir %>/js/*.js',
            '<%= src_dir %>/js/**/*.js'
        ],
        'dev': [
            './gulpfile.js',
            './gulp-config.js'
        ]
    },

    /**
     * Files that you want to check the change and that trig a LiveReload
     */
    livereload: [
        './app/**/*.php',
        './resources/views/**/*.php',
        './<%= public_dir %>/css/*.css',
        './<%= public_dir %>/js/*.js'
    ]
};