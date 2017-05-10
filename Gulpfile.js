var gulp = require('gulp')
var sass = require('gulp-sass')
var chug = require('gulp-chug')
var argv = require('yargs').argv
var minify = require('gulp-minify')
var concat = require('gulp-concat')

var config = [
  '--rootPath',
  argv.rootPath || '../../../../../../../web/assets/',
  '--nodeModulesPath',
  argv.nodeModulesPath || '../../../../../../../node_modules/'
]

const RESOURCES_PATH = 'app/themes/GalerieTheme'
const COMPILED_PATH = 'web'

gulp.task('admin', function () {
  gulp.src('vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Gulpfile.js', { read: false }).pipe(chug({ args: config }))
})

gulp.task('shop', function () {
  gulp.src('vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Gulpfile.js', { read: false }).pipe(chug({ args: config }))
})

gulp.task('scss', function () {
  return gulp.src(RESOURCES_PATH + '/scss/*.scss')
  .pipe(sass({sourceComments: 'map', errLogToConsole: true}))
  .on('error', function (err) {
    console.log(err.toString())
    this.emit('end')
  })
  .pipe(gulp.dest(COMPILED_PATH + '/css'))
})

gulp.task('js', function () {
  return gulp.src(RESOURCES_PATH + '/js/*.js')
  .pipe(concat('main.js'))
  .pipe(gulp.dest(COMPILED_PATH + '/js'))
})

gulp.task('watch', function () {
  gulp.watch(RESOURCES_PATH + '/scss/*.scss', ['scss'])
  gulp.watch(RESOURCES_PATH + '/js/*.js', ['js'])
})

gulp.task('default', ['admin', 'shop', 'scss', 'js'])
