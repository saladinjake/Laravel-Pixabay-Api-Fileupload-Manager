'use strict';

module.exports = karmaConfig;

function karmaConfig(configuration) {
  configuration.set({
    autoWatch: true,
    basePath: '',
    browsers: ['Chrome'],
    colors: true,
    preprocessors: {
      'Testjs/unit/**/*.js': ['webpack'],
    },
    files: [
      'Testjs/unit/**/*.spec.js'
    ],
    frameworks: [
      'mocha',
      'sinon-chai'
    ],
    reporters: ['progress'],
    port: 8123,
    singleRun: false,
  });
}
