'use strict';

var path = require('path');
var cwd = __dirname;

module.exports = {
  entry: './public/js/bundle.js',
  output: {
    filename: './public/js/webpackbundle.js',
  },
  module: {
    loaders: [
      { test: /\.css$/, loader: "style!css" }
    ]
  },
  colors: true,
  devtool: 'source-map',
};
