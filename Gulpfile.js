var gulp = require('gulp');
var sass = require('gulp-sass')
var chug = require('gulp-chug');
var argv = require('yargs').argv;

config = [
    '--rootPath',
    argv.rootPath || '../../../../../../../web/assets/',
    '--nodeModulesPath',
    argv.nodeModulesPath || '../../../../../../../node_modules/'
];

const RESOURCES_PATH = 'app/Resources'
const COMPILED_PATH = 'web'

gulp.task('admin', function() {
    gulp.src('vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Gulpfile.js', { read: false })
        .pipe(chug({ args: config }))
    ;
});

gulp.task('shop', function() {
    gulp.src('vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Gulpfile.js', { read: false })
        .pipe(chug({ args: config }))
    ;
});

gulp.task('scss', function () {
  return gulp.src(RESOURCES_PATH + '/scss/*.scss')
  .pipe(sass({sourceComments: 'map', errLogToConsole: true}))
  .on('error', function (err) {
    console.log(err.toString())
    this.emit('end')
  })
  .pipe(gulp.dest(COMPILED_PATH + '/css'))
})


gulp.task('watch', function () {
  gulp.watch(RESOURCES_PATH + '/scss/*.scss', ['scss'])
})

gulp.task('default', ['admin', 'shop', 'scss']);
