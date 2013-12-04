/**
 * @todo : better gruntFile for start project
 */

'use strict';

module.exports = function(grunt) {

    grunt.initConfig({
        // Metadata
        pkg: grunt.file.readJSON('package.json'),


        clean: {
            files: [
                'public/assets/css/main.min.css',
                'public/assets/js/main.min.js'
            ]
        }, // clean


        recess: {
            main: {
                options: {
                    compile: true,
                    compress: true
                },
                files: {
                    'public/assets/css/main.min.css': [
                        'public/assets/less/main.less'
                    ]
                }
            }, // main
        },


        uglify: {
            main: {
                options: {
                    banner: ''
                },
                files: {
                    'public/assets/js/main.min.js': [
                        'public/assets/js/main.js'
                    ]
                }
            }, // main
        }, // uglify


        jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
            all: [
                'Gruntfile.js',
                'public/assets/js/*.js',
                '!public/assets/js/*.min.js'
            ]
        }, // jshint


        shell: {
            done: {
                command: 'terminal-notifier -message "Bazinga! Grunt tasks done!" -title "Gruntfile.js" -sound Pop'
            }
        }, // shell


        connect: {
            server: {
                options: {
                    port: 8800,
                    base: '.'
                }
            }
        }, // connect


        watch: {
            less: {
                  files: [
                        'public/assets/less/*.less'
                  ],
                  tasks: ['recess', 'shell:done']
            },

            js: {
                  files: [
                    '<%= jshint.all %>'
                  ],
                  tasks: [/*'jshint',*/ 'uglify', 'shell:done']
            }
        }, // watch
    });

    grunt.loadNpmTasks('grunt-contrib-clean');
    // grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-connect');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-recess');
    grunt.loadNpmTasks('grunt-shell');


    grunt.event.on('watch', function(action, filepath, target) {
        grunt.log.writeln(target + ': ' + filepath + ' has ' + action);
    });


    // -- Tasks

    grunt.registerTask('before-test', [
        'clean'
    ]);
    grunt.registerTask('test', [
        'recess',
        'uglify'
    ]);
    grunt.registerTask('after-test', [
        'shell:done'
    ]);

    grunt.registerTask('js', [
        'uglify',
        'shell:done'
    ]);
    grunt.registerTask('css', [
        'recess',
        'shell:done'
    ]);

    grunt.registerTask('dev', [
        'connect',
        'watch'
    ]);

    grunt.registerTask('default', ['before-test', 'test', 'after-test']);
};
