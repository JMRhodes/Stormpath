// Include gulp
var $ = require('gulp-load-plugins')();
var gulp = require('gulp');
var sequence = require('run-sequence');

/**
 * File paths to various resources/assets are defined here.
 */
var PATHS = {
    js: 'public/js',
    css: 'public/css',
    sass: [
        'resources/assets/scss/*.scss',
        'resources/assets/scss/**/*.scss'
    ],
    jsApp: [
        'resources/assets/js/app/*.js',
        'resources/assets/js/app.js'
    ]
};

// Concatenate & Minify all theme javascript files
gulp.task('build:scripts:app', function () {
    return gulp.src(PATHS.jsApp)
        .pipe($.concat('app.js'))
        .pipe($.rename({
            suffix: '.min'
        }))
        .pipe($.uglify())
        .pipe(gulp.dest(PATHS.js));
});

// Compile min CSS
gulp.task('build:styles', function () {
    return gulp.src('resources/assets/scss/main.scss')
        .pipe($.sourcemaps.init())
        .pipe($.sass({
            includePaths: PATHS.sass,
            outputStyle: 'compressed'
        })
            .on('error', $.sass.logError))
        .pipe($.rename({
            basename: "app",
            suffix: '.min'
        }))
        .pipe($.sourcemaps.write('.'))
        .pipe(gulp.dest(PATHS.css))
});

// run JS lint on theme scripts
gulp.task('lint', function () {
    return gulp.src(PATHS.jsApp)
        .pipe($.jshint())
        .pipe($.jshint.reporter('jshint-stylish'))
        .pipe($.jscs())
        .pipe($.jscs.reporter());
});

// Watch tasks
gulp.task('watch', function () {
    // Watch .js files
    gulp.watch(PATHS.jsApp, ['build:scripts:app', 'lint']);
    // Watch .scss files
    gulp.watch(PATHS.sass, ['build:styles']);
});

// Build and minify the app resources/assets
gulp.task('build', function (done) {
    sequence([
        'build:scripts:app',
        'build:styles'
    ], done);
});

// Default task, run the build
gulp.task('default', ['build']);