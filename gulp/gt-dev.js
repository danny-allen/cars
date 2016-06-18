/* jshint node:true */
'use strict';

/**
 * Require
 * Get the libs for this file.
 */
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();



/**
 * wiredep
 * 
 * Inject bower components with dev.
 */
gulp.task('wiredep', function() {
    var wiredep = require('wiredep').stream;

    // gulp.src('app/styles/*.scss')
    //     .pipe(wiredep())
    //     .pipe(gulp.dest('app/styles'));

    gulp.src(['app/views/index.volt'])
        .pipe(wiredep({
            ignorePath: /^(\/|\.+(?!\/[^\.]))+\.+/,
            devDependencies: true, // default: false
        }))
        .pipe(gulp.dest('app/views'));
});