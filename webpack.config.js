var webpack = require('webpack');
var path = require('path');

//var BUILD_DIR = path.resolve(__dirname, 'src/client/public');
//var APP_DIR = path.resolve(__dirname, 'src/client/app');

//Changement du routage
var BUILD_DIR = path.resolve(__dirname, 'public/output');
var APP_DIR = path.resolve(__dirname, 'public/react');

var config = {
  module : {
    rules : [
      {
        test : /\.jsx?/,
        include : APP_DIR,
        loader : 'babel-loader'
      }
    ]
  },
  entry: APP_DIR + '/index.jsx',
  output: {
    path: BUILD_DIR,
    filename: 'bundle.js'
  }
};

module.exports = config;
