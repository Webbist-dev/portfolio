process.env.NODE_ENV = 'development';


var gulp = require('gulp'),
    sass = require('gulp-sass'),
    compass = require('gulp-compass'),
    minifycss = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    sourcemaps = require('gulp-sourcemaps'),
    gulpif = require('gulp-if'),
    clean = require('gulp-clean'),
    livereload = require('gulp-livereload'),
    browserSync = require('browser-sync');
    
var env = process.env.NODE_ENV;

// BrowserSync
gulp.task('browser-sync', function() {
    browserSync({
       proxy: "AB2014"
   });
});

// SASS tasks
gulp.task('sass', function() {
   return gulp.src('sass/**/*.scss')
       .pipe(compass({
          config_file: 'config.rb',
          css: 'stylesheets',
          sass: 'sass',
          bundle_exc: true
        }))
        .on('error', function (err) {
        	$.util.log(err.message);
        	this.emit('end');
        })
       .pipe(gulpif(env === 'development', sass({errLogToConsole: true})))
       .pipe(gulpif(env === 'production', sass({errLogToConsole: true})))
       .pipe(gulpif(env === 'production', minifycss()))
       .pipe(gulp.dest('stylesheets'))
       .pipe(browserSync.reload({stream:true}));
});

// JS tasks
gulp.task('js', function() {
    return gulp.src([
            //'src_js/foundation.equalizer.js',
            //'src_js/jquery-ui.js',
            'src_js/smartresize.js',
            'src_js/app.js'
        ])
        // .pipe(gulpif(env === 'development', sourcemaps.init()))
        .pipe(gulpif(env === 'production', uglify()))
        .pipe(concat('script.js'))
        // .pipe(gulpif(env === 'development', sourcemaps.write()))
        .pipe(gulp.dest('js'))
        .pipe(browserSync.reload({stream:true}));
});

// Clean
gulp.task('clean', function() {
    return gulp.src(['stylesheets/styles.css', 'javascripts/script.js'], {read: false})
        .pipe(clean());
});

// Reload all Browsers
gulp.task('bs-reload', function () {
    browserSync.reload();
});

// Watch task
gulp.task('default', ['sass', 'js'], function() {

        // Watch .scss files
        gulp.watch('sass/**/*.scss', ['sass']);      

        // Watch .js files
        gulp.watch('src_js/**/*.js', ['js']);
        
        // gulp.watch("*.html", ['bs-reload']); 

});