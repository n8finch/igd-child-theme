// Dependencies
var gulp = require('gulp');
var sass = require('gulp-sass');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var insert = require('gulp-insert');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
notify = require('gulp-notify');
var file = require('gulp-file');
var livereload = require('gulp-livereload');
var download = require('gulp-download-stream');
var browserSync = require('browser-sync').create();
//=================================================//

// Config
var assetsDir = '/assets/'
var config = {
	bowerDir: '/bower_components',
    jsDir: assetsDir + 'js',
	sassDir: assetsDir + 'scss',
	themeDir: '/',
}
//=================================================//

// browser-sync watched files
// automatically reloads the page when files changed
var browserSyncWatchFiles = [
  'style.css',
  './assets/app.js',
  './*.php'
];

// browser-sync options
// see: https://www.browsersync.io/docs/options/
var browserSyncOptions = {
  proxy: "igb.test",
  notify: true
};


//=================================================//

// Attach bower_components here
vendorJS = [
  'bower_components/jquery/dist/jquery.min.js',
  'bower_components/tether/dist/js/tether.min.js',
  'bower_components/bootstrap/dist/js/bootstrap.min.js'
]
vendorCSS = [
  'bower_components/bootstrap/dist/css/bootstrap.min.css'
]
//======================================================================//

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "igd.test"
    });
});

// Styles
gulp.task('styles', function() {
  return gulp.src('./assets/scss/style.scss')
  	.pipe(sourcemaps.init(''))
	.pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer('last 2 version'))
    .pipe(sourcemaps.write(''))
    .pipe(gulp.dest(''))
	.pipe(browserSync.stream())
    .pipe(notify({ message: 'Styles task complete' }));
});

// Scripts
gulp.task('scripts', function() {
  gulp.src('assets/js/*.js')
  .pipe(concat('app.js'))
  // .pipe(uglify())
  .pipe(gulp.dest('assets'))
  .pipe(browserSync.stream())
  .pipe(notify({ message: 'Scripts task complete' }));
});

// Compresses all of the bower JS assets included above
gulp.task('vendor_js', function() {
  gulp.src(vendorJS)
  .pipe(concat('vendor.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('assets'))
});

// Compresses all of the bower JS assets included above
gulp.task('vendor_css', function() {
  gulp.src(vendorCSS)
  .pipe(concat('vendor.min.css'))
  .pipe(gulp.dest('assets'))
});

gulp.task('watch', function() {

  gulp.watch('assets/scss/**/**', [ 'styles' ])
  gulp.watch('assets/js/*', ['scripts'])


});


// JS Hint
gulp.task('hint', function() {
  return gulp.src('js/*.js')
  .pipe(jshint())
  .pipe(jshint.reporter('jshint-stylish'))
});

gulp.task('default', ['styles', 'scripts', 'watch']);
