/**
 * Gulps Variables
 */
var args = require('yargs').argv;
var browserify = require('gulp-browserify');
var concat = require('gulp-concat');
var connect = require('gulp-connect');
var imagemin = require('gulp-imagemin');
var gulp = require('gulp');
var gulpif = require('gulp-if');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');
var gutil = require('gulp-util');
var include = require('gulp-include');
var ngAnnotate = require('gulp-ng-annotate');
var notify = require('gulp-notify');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var size = require('gulp-filesize');
var sourcemaps = require('gulp-sourcemaps');
var expect = require('gulp-expect-file');
var todo = require('gulp-todo');
var uglify = require('gulp-uglify');
var watch = require('gulp-watch');
var _ = require('lodash');
var fs = require('fs');

/**
 * Include the config file
 */
var config = require('./gulp-config.js');

var DEVMODE = true;

if (args.prod || args.production) {
    DEVMODE = false;
}

/**
 * Gulp accessibles Tasks
 */
gulp.task('default', function () {
    gulp.start('build', 'watch');
});

gulp.task('dev', function () {
    gulp.start('css', 'js', 'copy');

    gulp.src('./').pipe(notify(' ʕ•ᴥ•ʔ <( Dev build complete! ) '));
    gutil.log(gutil.colors.inverse(' ʕ•ᴥ•ʔ <( Dev build complete! ) '));
});

gulp.task('build', function () {
    DEVMODE = false;
    gulp.start('css', 'js', 'copy', 'img');
    gulp.src('./').pipe(notify(' ʕ•ᴥ•ʔ <( Build complete! ) '));
    gutil.log(gutil.colors.inverse(' ʕ•ᴥ•ʔ <( Build complete! ) '));
});

gulp.task('server', function () {
    connect.server({
        root: '.',
        livereload: true
    });
});

// allow to use `--watch` to start watch
// ex. `gulp css --watch`
if (args.watch) {
    gulp.start('watch');
}

/**
 * Tasks @see handleXXX function to see what happens
 */

gulp.task('css', handleCSS);
gulp.task('js', handleJS);
gulp.task('img', handleImg);
gulp.task('watch', handleWatch);
gulp.task('copy', handleCopy);

/**
 * Handlers
 * =========>
 */
function handleCopy() {
    var file = '';

    /**
     * Copy main fonts to the fonts directory
     */
    for (var i = 0, len = config.main_files.fonts.length; i < len; i++) {
        file = config.main_files.fonts[i].replace('<%= pkg_dir %>', config.pkg_dir);
        gulp.src(file)
            .pipe(gulp.dest(config.public_dir + '/' + config.fonts_dir));
    }

    /**
     * Copy extra folders
     */
    _.forEach(config.main_files.copy, function(items, name) {
        if (Object.prototype.toString.call(config.main_files.copy[name]) !== '[object Array]') {
            config.main_files.copy[name] = [config.main_files.copy[name]];
        }

        for (var i = 0, len = config.main_files.copy[name].length; i < len; i++) {
            file = smrtr(config.main_files.copy[name][i], config);

            if (fs.lstatSync(file).isDirectory()) {
                gulp.src(file + '/**/*', {base: file})
                    .pipe(gulp.dest(config.public_dir + '/' + name));
            } else {
                gulp.src(file)
                    .pipe(gulp.dest(config.public_dir + '/' + name));
            }
        }
    });

    /**
    * Copy Plugins to public_dir/plugins
    */
    for (var plugin in config.plugin_files.copy) {
        if (Object.prototype.toString.call(config.plugin_files.copy[plugin]) !== '[object Array]') {
            config.plugin_files.copy[plugin] = [config.plugin_files.copy[plugin]];
        }

        for (var i = 0, len = config.plugin_files.copy[plugin].length; i < len; i++) {
            file = smrtr(config.plugin_files.copy[plugin][i], config);

            if (fs.lstatSync(file).isDirectory()) {
                gulp.src(file + '/**/*', {base: file})
                    .pipe(gulp.dest(config.public_dir + '/plugins/' + plugin));
            } else {
                gulp.src(file)
                    .pipe(gulp.dest(config.public_dir + '/plugins/' + plugin));
            }
        }
    }
}

function handleImg(){

    gulp.src(smrtr(config.main_files.img, config))
        .pipe(imagemin({
            progressive: true,
            interlaced: true,
            svgoPlugins: [{removeUnknownsAndDefaults: false}]
        }))
        .pipe(gulp.dest(config.public_dir + '/' + config.img_dir));
}


function handleCSS() {

    _.forEach(config.main_files.css, function(items, name) {
        gulp.src(config.src_dir + '/scss/'+name+'.scss')
            .pipe(gulpif(DEVMODE, sourcemaps.init()))
            .pipe(sass({
                errLogToConsole: true
            }))
            //.pipe(gulpif(!DEVMODE, csso()))
            .pipe(gulpif(!DEVMODE, size()))
            .pipe(gulpif(DEVMODE, sourcemaps.write('./')))
            .pipe(gulp.dest(config.public_dir + '/' + config.css_dir));
    });
}


function handleJS() {

    //console.log('Config', config);
    if(typeof config.plugin_files.shim !== 'undefined'){
        var shim = config.plugin_files.shim;
    } else {
        var shim = {};
    }
    
    // Concat files in main_files
    _.forEach(config.main_files.js, function(items, name) {

        items = smrtr(items, config);

        gulp.src(items)
            .pipe(expect(items))
            /*.pipe(browserify({
                debug: false,
                shim : shim
            }))*/
            .pipe(include())
            .pipe(ngAnnotate({
                single_quotes: true
            }))
            .pipe(concat( name + '.js'))
            .pipe(gulp.dest(config.public_dir + '/'+ config.js_dir))
            .on('error', swallowErrors);

        if(!DEVMODE){
            gulp.src(config.public_dir + '/' + config.js_dir +'/'+name+'.js')
                .pipe(uglify({mangle:false}))
                .pipe(rename(name+'.min.js'))
                .pipe(gulp.dest(config.public_dir + '/' + config.js_dir));
        }
    });

    if(typeof config.main_files.js_folders !== 'undefined'){

        _.forEach(config.main_files.js_folders, function(items, name) {

            fs.readdir(config.src_dir + '/'+config.js_dir+'/'+name+'/', function (err, files) {
                if (files) {
                    for (var i = 0, len = files.length; i < len; i++) {
                        gulp.src(config.src_dir + '/'+ config.js_dir+'/'+name+'/' + files[i] + '/' + files[i] + '.js')
                            /*.pipe(browserify({
                                debug: false,
                                shim : shim
                            }))*/
                            .pipe(include())
                            .pipe(ngAnnotate({
                                single_quotes: true
                            }))
                            .pipe(gulp.dest(config.public_dir + '/'+ config.js_dir+'/'+name+'/'))
                            .on('error', swallowErrors);

                        if(!DEVMODE){
                            gulp.src(config.public_dir + '/'+ config.js_dir+'/'+name+'/'+ files[i] + '.js')
                                .pipe(uglify({mangle:false}))
                                .pipe(rename(files[i]+'.min.js'))
                                .pipe(gulp.dest(config.public_dir + '/'+ config.js_dir +'/'+name));
                        }
                    }
                }
            });
        });
    }
}

/**
 * Files Watch Handler
 */
function handleWatch() {
    DEVMODE = true;

    gulp.start('server');

    var watch_css = smrtr(config.watch.css, config);
    var watch_js = smrtr(config.watch.js, config);
    var watch_dev = smrtr(config.watch.dev, config);

    gulp.watch(watch_js, ['js']);

    gulp.watch(watch_css, ['css']);

    gulp.watch(watch_dev, ['dev']);

    gulp.watch(config.livereload)
        .on('change', function (file) {
            gulp.src(file.path)
                .pipe(connect.reload())
                .pipe(notify(' ʕ•ᴥ•ʔ <( Reload! ) '));
            gutil.log(gutil.colors.inverse(' ʕ•ᴥ•ʔ <( Reload! ) '));
        });

    gutil.log(gutil.colors.inverse(' ( Ready to work! )> ᕙ(`▽´)ᕗ '));
}

/**
 * Helpers method
 * ==============>
 */

/**
 * Smrtr function
 *
 * Little method to apply dynamic variables from gulp-config
 */
function smrtr(arr, data) {

    if (typeof arr === 'string') {
        return _.template(arr)(data);
    }

    return _.map(arr, function (item) {
        return smrtr(item, data);
    });
}

/**
 * Little method to output better errors
 *
 * @param error
 */
function swallowErrors(error) {
    var message = '';

    if (error && error.toString()) {
        message = error.toString();
    }

    gutil.log(gutil.colors.red('✖', message));

    gulp.src('./').pipe(notify('✖ Error'));

    this.emit('end');
}
