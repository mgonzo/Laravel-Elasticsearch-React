var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
});

const gulp = require('gulp');
const babel = require('gulp-babel');
const concat = require('gulp-concat');
 
gulp.task('default', function () {
      return gulp.src('resources/assets/react/*.jsx')
          .pipe(babel({
                        presets: ['es2015', 'react']
                    }))
        .pipe(concat('components.js'))
        .pipe(gulp.dest('public/js'));
});
