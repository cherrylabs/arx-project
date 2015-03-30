/**
 * Gulps utilites
 */
var args = require('yargs').argv,
    browserify = require('gulp-browserify'),
    concat = require('gulp-concat'),
    connect = require('gulp-connect'),
    csso = require('gulp-csso'),
    gulp = require('gulp'),
    gulpif = require('gulp-if'),
    gutil = require('gulp-util'),
    include = require('gulp-include'),
    ngAnnotate = require('gulp-ng-annotate'),
    notify = require('gulp-notify'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    size = require('gulp-filesize'),
    sourcemaps = require('gulp-sourcemaps'),
    expect = require('gulp-expect-file'),
    todo = require('gulp-todo'),
    uglify = require('gulp-uglify'),
    watch = require('gulp-watch'),
    _ = require('lodash'),
    fs = require('fs');

/**
 * Here is your config file
 *
 * @type {exports}
 */
var config = require('./gulp-config.js');

var DEVMODE = true;

if (args.prod || args.production) {
    DEVMODE = false;
}

// hide console notify text
notify.logLevel(0);

/**
 * Gulp Tasks
 */

gulp.task('css', handleCSS);
gulp.task('js', handleJS);
gulp.task('copy', handleCopy);

gulp.task('default', function () {
    gulp.start('build', 'watch');
});

gulp.task('watch', handleWatch);

gulp.task('dev', function () {
    gulp.start('css', 'js', 'copy');

    gulp.src('./').pipe(notify(' ʕ•ᴥ•ʔ <( Dev build complete! ) '));
    gutil.log(gutil.colors.inverse(' ʕ•ᴥ•ʔ <( Dev build complete! ) '));
});

gulp.task('build', function () {
    DEVMODE = false;

    gulp.start('css', 'js', 'copy');

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

function handleCopy() {
    var file = '';

    // fonts
    for (var i = 0, len = config.plugin_files.fonts.length; i < len; i++) {
        file = config.plugin_files.fonts[i].replace('<%= pkg_dir %>', config.pkg_dir);

        gulp.src(file)
            .pipe(gulp.dest(config.public_dir + '/fonts'));
    }

    // packages
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


function handleCSS() {
    // main
    gulp.src(config.src_dir + '/scss/main.scss')
        .pipe(gulpif(DEVMODE, sourcemaps.init()))
        .pipe(sass({
            errLogToConsole: true
        }))
        //.pipe(gulpif(!DEVMODE, csso()))
        .pipe(gulpif(!DEVMODE, size()))
        .pipe(gulpif(DEVMODE, sourcemaps.write('./')))
        .pipe(gulp.dest(config.public_dir + '/css'));

    // plugins
    gulp.src(config.src_dir + '/scss/plugins.scss')
        .pipe(gulpif(DEVMODE, sourcemaps.init()))
        .pipe(sass({
            errLogToConsole: true
        }))
        //.pipe(gulpif(!DEVMODE, csso()))
        .pipe(gulpif(!DEVMODE, size()))
        .pipe(gulpif(DEVMODE, sourcemaps.write('./')))
        .pipe(gulp.dest(config.public_dir + '/css'));
}


function handleJS() {

    var shim = config.plugin_files.shim;
    
    gulp.src(config.src_dir + '/js/main.js')
        .pipe(browserify({
            debug: true,
            shim : shim
        }))
        .pipe(gulp.dest(config.public_dir + '/js/'))

    // shared
    fs.readdir(config.src_dir + '/js/shared/', function (err, files) {
        if (files) {
            for (var i = 0, len = files.length; i < len; i++) {
                gulp.src(config.src_dir + '/js/shared/' + files[i] + '/' + files[i] + '.js')
                    .pipe(include())
                    .pipe(ngAnnotate({
                        single_quotes: true
                    }))
                    .on('error', swallowErrors)
                    .pipe(gulpif(!DEVMODE, uglify()))
                    .pipe(gulp.dest(config.public_dir + '/js/shared'))
                    .pipe(gulpif(!DEVMODE, size()));
            }
        }
    });


    // components
    fs.readdir(config.src_dir + '/js/components/', function (err, files) {
        if (files) {
            for (var i = 0, len = files.length; i < len; i++) {
                gulp.src(config.src_dir + '/js/components/' + files[i] + '/' + files[i] + '.js')
                    .pipe(include())
                    .pipe(ngAnnotate({
                        single_quotes: true
                    }))
                    .on('error', swallowErrors)
                    .pipe(gulpif(!DEVMODE, uglify()))
                    .pipe(gulp.dest(config.public_dir + '/js/components'))
                    .pipe(gulpif(!DEVMODE, size()));
            }
        }
    });


    // plugins
    var files = [];

    for (var i = 0, len = config.plugin_files.js.length; i < len; i++) {
        files.push(config.plugin_files.js[i].replace('<%= pkg_dir %>', config.pkg_dir));
    }

    gulp.src(files)
        .pipe(concat('plugins.js'))
        .pipe(gulpif(!DEVMODE, uglify()))
        .on('error', swallowErrors)
        .pipe(gulp.dest(config.public_dir + '/js'))
        .pipe(gulpif(!DEVMODE, size()));


    // config
    gulp.src(config.src_dir + '/js/config.js')
        .pipe(gulpif(!DEVMODE, uglify()))
        .on('error', swallowErrors)
        .pipe(rename('config.js'))
        .pipe(gulp.dest(config.public_dir + '/js'))
        .pipe(gulpif(!DEVMODE, size()));

    // Concat

    var main = smrtr(config.concat.main, config),
        plugins = smrtr(config.concat.plugins, config);


    gulp.src(plugins)
        .pipe(expect(plugins))
        .pipe(concat('plugins.min.js'))
        .pipe(gulp.dest(config.public_dir + '/js'))
        .on('error', swallowErrors);

    gulp.src(main)
        .pipe(expect(main))
        .pipe(concat('main.js'))
        .pipe(gulp.dest(config.public_dir + '/js'))
        .on('error', swallowErrors);

}


function handleWatch() {
    DEVMODE = true;

    gulp.start('server');

    gulp.watch([
        config.src_dir + '/js/*.js',
        config.src_dir + '/js/**/*.js'
    ], ['js']);

    gulp.watch([
        config.dist_dir + '/css/**/*.css',
        config.dist_dir + '/css/**/**/*.css',
    ], ['css']);

    gulp.watch([
        './gulpfile.js',
        './gulp-config.js',
    ], ['dev']);

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
 * Smrtr funcction
 *
 * apply
 */
function smrtr(arr, data) {

    if (typeof arr === 'string') {
        return _.template(arr)(data);
    }

    /**
     * Apply recursively the function
     */
    return _.map(arr, function (item) {
        return smrtr(item, data);
    });
}

function swallowErrors(error) {
    var message = '';

    if (error && error.toString()) {
        message = error.toString();
    }

    gutil.log(gutil.colors.red('✖', message));

    gulp.src('./').pipe(notify('✖ Error'));

    this.emit('end');
}
