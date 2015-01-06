var gulp = require('gulp');
var del = require('del');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rev = require('gulp-rev');
var filename = require('gulp-asset-manifest');
var imagemin = require('gulp-imagemin');
var minifycss = require('gulp-minify-css');

// Paths to your asset files
var paths = {
    frontend: {
        scripts: [
            'app/assets/javascripts/jquery.min.js',
            'app/assets/javascripts/bootstrap.min.js',
            'app/assets/javascripts/jquery.ad-gallery.js',
            'app/assets/javascripts/snowfall.jquery.min.js',
            'app/assets/javascripts/Validform_v5.3.2_min.js'
        ],
        styles: [
            'app/assets/stylesheets/bootstrap.min.css',
            'app/assets/stylesheets/style.css'
        ],
        fonts: [
            'app/assets/fonts/**/*'
        ],
        images: [
        	'app/assets/images/**/*'
        ]
    }
};

// Not all tasks need to use streams
// A gulpfile is just another node program and you can use all packages available on npm
gulp.task('clean', function(cb) {
  // You can use multiple globbing patterns as you would with `gulp.src`
  del(['public/assets'], cb);
});

// CSS task
gulp.task('css', ['clean'], function() {

    // Prefix, compress and concat the CSS assets
    // Afterwards add the MD5 hash to the filename
    return gulp.src(paths.frontend.styles)
        .pipe(concat('styles.css'))
        .pipe(rev())
        .pipe(filename({ bundleName: 'frontend.styles' })) // This will create/update the assets.json file
        .pipe(minifycss())
        .pipe(gulp.dest('public/assets/css'));
});

// JavaScript task
gulp.task('js', ['clean'], function() {

    // Concat and uglify the JavaScript assets
    // Afterwards add the MD5 hash to the filename
    return gulp.src(paths.frontend.scripts)
        .pipe(concat('scripts.js'))
        .pipe(uglify())
        .pipe(rev())
        .pipe(filename({ bundleName: 'frontend.scripts' })) // This will create/update the assets.json file
        .pipe(gulp.dest('public/assets/js'));
});

// JavaScript task
gulp.task('font', ['clean'], function() {

    // Concat and uglify the JavaScript assets
    // Afterwards add the MD5 hash to the filename
    return gulp.src(paths.frontend.fonts)
        .pipe(gulp.dest('public/assets/fonts'));
});

// 静态图像
gulp.task('image', ['clean'], function() {
  return gulp.src(paths.frontend.images)
    // Pass in options to the task
    .pipe(imagemin({optimizationLevel: 5}))
    .pipe(gulp.dest('public/assets/img'));
});

gulp.task('build', ['css', 'js', 'font', 'image']);

gulp.task('watch', ['build'],  function(){
    gulp.watch(paths.frontend.styles, ['css']);
    gulp.watch(paths.frontend.scripts, ['js']);
    gulp.watch(paths.frontend.images, ['image']);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['watch']);