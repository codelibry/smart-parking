var gulp          = require('gulp');
var browserSync   = require('browser-sync').create();
var autoprefixer  = require('autoprefixer');
var postcss       = require('gulp-postcss');
var sass          = require('gulp-sass')(require('sass'));

var sassPaths = [
  'node_modules/foundation-sites/scss',
  'node_modules/motion-ui/src'
];

function styles() {
  return gulp.src('scss/app.scss')
    .pipe(sass({
      includePaths: sassPaths,
      outputStyle: 'compressed' // minified css
    }).on('error', sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(gulp.dest('css'))
    .pipe(browserSync.stream());
};

function serve() {
  browserSync.init({
    server: "./"
  });

  gulp.watch("scss/*.scss", styles);
  gulp.watch("*.php").on('change', browserSync.reload);
}

gulp.task('sass', styles);
gulp.task('serve', gulp.series('sass', serve));
gulp.task('default', gulp.series('sass', serve));
