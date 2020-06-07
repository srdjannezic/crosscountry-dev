// /////////////////////////////////////////////////
// GULP
// /////////////////////////////////////////////////

var gulp = require('gulp');

// /////////////////////////////////////////////////
// GULP tasks
// /////////////////////////////////////////////////

var sass = require('gulp-sass');
var plumber = require('gulp-plumber');
var uglify = require('gulp-uglify');
var minifyCSS = require('gulp-minify-css');
var browserSync = require("browser-sync");
var cssnano = require('gulp-cssnano');
var reload = browserSync.reload;



// /////////////////////////////////////////////////
// STYLES
// /////////////////////////////////////////////////

gulp.task('styles', function(){
  return gulp.src('assets/sass/**/*.scss')
  	.pipe(plumber())
    .pipe(sass()) // Using gulp-sass
    .pipe(gulp.dest('assets/pre-css'))
    .pipe(minifyCSS())
    .pipe(cssnano({zindex: false}))
    .pipe(gulp.dest('assets/css'))
    .pipe(reload({stream:true}));
});

// /////////////////////////////////////////////////
// HTML Task
// /////////////////////////////////////////////////

gulp.task("html", function(){
    gulp.src("**/*.php")
    .pipe(reload({stream:true}));
});

// /////////////////////////////////////////////////
// COMPILE VUE
// /////////////////////////////////////////////////

// gulp.task('scripts', () => gulp.src('assets/vue-estimete/*.js')
//     .pipe(babel({ plugins: ['@babel/plugin-transform-modules-amd'] }))
//     .pipe(gulp.dest('assets/javascript'))
//     .pipe(browserSync.stream())
// );
 
// gulp.task('vue', () => gulp.src('assets/vue-estimete/components/*.vue')
//     .pipe(vueComponent({ debug: true, loadCssMethod: 'loadCss' }))
//     .pipe(babel({ plugins: ['@babel/plugin-transform-modules-amd'] }))
//     .pipe(rename({ extname: '.js' }))
//     .pipe(gulp.dest('assets/javascript/components'))
//     .pipe(browserSync.stream())
// );


// /////////////////////////////////////////////////
// Browser-Sync Task
// /////////////////////////////////////////////////

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "http://cc.localhost",
        files: ["**/*.php"]
    });
});



// /////////////////////////////////////////////////
// WATCH
// /////////////////////////////////////////////////
gulp.task('watch', function(){
    gulp.watch('assets/sass/**/*.scss', ['styles']);
});



// /////////////////////////////////////////////////
// Default Task
// /////////////////////////////////////////////////

gulp.task('default',[ 'styles', 'html', 'browser-sync', 'watch' ]);