const mix = require('laravel-mix');

// Kopiowanie i kompilacja plików CSS i JS
mix.copy('resources/css/style.css', 'public/css/style.css')
   .copy('resources/css/slide.css', 'public/css/slide.css')
   .copy('resources/css/photos.css', 'public/css/photos.css')
   .copy('resources/js/slide.js', 'public/js/slide.js')
   .copy('resources/js/photos.js', 'public/js/photos.js');
