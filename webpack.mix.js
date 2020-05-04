const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/sass/style.scss', 'public/css')
   .js('resources/js/app.js', 'public/js')
   .js('resources/js/load_more.js', 'public/js')
   .js('resources/js/view_more_comment.js', 'public/js')
   .js('resources/js/control_block.js', 'public/js')
   .js('resources/js/functions.js', 'public/js')
   .js('resources/js/store_comment.js', 'public/js')
   .js('resources/js/update_delete_comment.js', 'public/js')
   .js('resources/js/store_react.js', 'public/js')
   .js('resources/js/preview_image.js', 'public/js')
   .js('resources/js/preview_avatar.js', 'public/js')
   .js('resources/js/preview_cover.js', 'public/js')
   .js('resources/js/store_react_comment.js', 'public/js')
   .js('resources/js/notifications.js', 'public/js')
   .js('resources/js/friend_requests.js', 'public/js')
   .js('resources/js/search_people.js', 'public/js')
   .js('resources/js/friend_suggestion.js', 'public/js')
   .copyDirectory('resources/views/theme', 'public/theme');
