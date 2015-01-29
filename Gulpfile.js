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
            'app/assets/javascripts/Validform_v5.3.2_min.js',
            'app/assets/javascripts/moment.min.js',
            'app/assets/javascripts/zh-cn.min.js',
            'app/assets/javascripts/emojify.min.js',
            'app/assets/javascripts/jquery.scrollUp.js',
            'app/assets/javascripts/jquery.pjax.js',
            'app/assets/javascripts/nprogress.js',
            'app/assets/javascripts/jquery.autosize.min.js',
            'app/assets/javascripts/prism.js',
            'app/assets/javascripts/jquery.textcomplete.js',
            'app/assets/javascripts/emoji.js',
            'app/assets/javascripts/marked.min.js',
            'app/assets/javascripts/localforage.min.js',
            'app/assets/javascripts/jquery.inline-attach.min.js',
            'app/assets/javascripts/ekko-lightbox.js',
            'app/assets/javascripts/rainyday.min.js',
            'app/assets/javascripts/front.js'
        ],
        styles: [
            'app/assets/stylesheets/bootstrap.min.css',
            'app/assets/stylesheets/font-awesome.min.css',
            'app/assets/stylesheets/style.css',
            'app/assets/stylesheets/nprogress.css'
        ],
        fonts: [
            'app/assets/fonts/**/*'
        ],
        images: [
        	'app/assets/images/**/*'
        ]
    }
};

// CSS task
gulp.task('css', function() {

    // Cleanup old assets
    del.sync(['public/assets/css/styles-*.css']);

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
gulp.task('js', function() {

    // Cleanup old assets
    del.sync(['public/assets/js/scripts-*.js']);

    // Concat and uglify the JavaScript assets
    // Afterwards add the MD5 hash to the filename
    return gulp.src(paths.frontend.scripts)
        .pipe(concat('scripts.js'))
        .pipe(uglify())
        .pipe(rev())
        .pipe(filename({ bundleName: 'frontend.scripts' })) // This will create/update the assets.json file
        .pipe(gulp.dest('public/assets/js'));
});

/*// Font task
gulp.task('font', function() {

    // Cleanup old assets
    del.sync(['public/assets/fonts']);

    // Concat and uglify the JavaScript assets
    // Afterwards add the MD5 hash to the filename
    return gulp.src(paths.frontend.fonts)
        .pipe(gulp.dest('public/assets/fonts'));
});

// 静态图像
gulp.task('image', function() {

    // Cleanup old assets
    del.sync(['public/assets/img']);

    return gulp.src(paths.frontend.images)
        // Pass in options to the task
        .pipe(imagemin({optimizationLevel: 5}))
        .pipe(gulp.dest('public/assets/img'));
});*/

gulp.task('build', ['css', 'js']);

gulp.task('watch', ['build'],  function(){
    gulp.watch(paths.frontend.styles, ['css']);
    gulp.watch(paths.frontend.scripts, ['js']);
    // gulp.watch(paths.frontend.fonts, ['font']);
    // gulp.watch(paths.frontend.images, ['image']);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['watch']);