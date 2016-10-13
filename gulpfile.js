const elixir = require('laravel-elixir')

require('laravel-elixir-remove')

elixir.ready(function() {
  elixir.webpack.mergeConfig({
    node: {
      fs: "empty"
    },
    babel: {
        presets: ['es2015', 'stage-2'],
        plugins: ['transform-runtime'],
        comments: false
    },
    module: {
      preLoaders: [
        { test: /\.js?$/, loader: 'eslint', exclude: /node_modules/ },
        { test: /\.vue?$/, loader: 'eslint', exclude: /node_modules/ }
      ],
      loaders: [
        { test: /\.css$/, loader: 'css' },
        { test: /.*\.(ttf|eot|woff|woff2|svg)(\?.*)?$/i, include: /fonts/, loader: 'url' },
        { test: /\.jade$/, loader: 'jade' },
        { test: /\.js$/, loader: 'babel', exclude: /node_modules/ },
        { test: /\.less$/, loader: 'less' },
        { test: /\.vue$/, loader: 'vue' }
      ]
    },
    eslint: {
      formatter: require('eslint-friendly-formatter'),
      failOnWarning: false,
      failOnError: true
    }
  });
});

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

elixir(mix => {

  // mix.styles(['ghost-vendor.css','ghost-admin.css'], 'public/css/build.css')

  mix.remove('./public/css/')
  mix.styles(['bootstrap.css', 'ghost-admin.css'], 'public/css/app.css')
  mix.styles('*.css', 'public/css/app.css')
  mix.less(['admin.less', 'skins/skin-blue.less'], 'public/css/admin-lte.css')
  mix.sass('custom.sass', 'public/css/custom.css')
  // mix.styles(['./public/css/app.css', './public/css/admin-lte.css', './public/css/custom.css'], 'public/css/build.css')
  // mix.remove(['./public/css/app.css', './public/css/admin-lte.css', './public/css/custom.css'])

  mix.webpack('app.js', 'public/js/build.js');
});
