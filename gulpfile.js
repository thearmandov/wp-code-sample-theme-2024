const gulp = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const sourcemaps = require('gulp-sourcemaps')
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer')
const cleanCSS = require('gulp-clean-css')
const rename = require('gulp-rename')
const browserSync = require('browser-sync').create()


const paths = {
    scss: {
        src: 'assets/scss/**/*.scss',
        dest: 'assets/css/'
    }
}

function compileSass() {
    return gulp.src(paths.scss.src)
        .pipe(sourcemaps.init())
        .pipe(sass().on('err', sass.logError))
        .pipe(postcss([autoprefixer()]))
        .pipe(cleanCSS())
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(paths.scss.dest))
        .pipe(browserSync.stream())
}

function watchFiles() {
    gulp.watch(paths.scss.src, compileSass)
}

const build = gulp.series(compileSass)
const watch = gulp.parallel(watchFiles)

exports.sass = compileSass
exports.build = build
exports.watch = watch
exports.default = build