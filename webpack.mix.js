const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('app/Resources/js/app.js', 'public/js').vue();

mix.extract();

if (mix.inProduction()) {
  // mix.version();
} else {
  mix.sourceMaps();
  mix.browserSync({
    proxy: {
      target: 'localhost:80',
      ws: true,
    },
    open: false,
    tunnel: false,
    files: [
      './app/Resources/js/**/*.js',
      './app/Resources/js/**/*.vue',
    ],
  });
}
