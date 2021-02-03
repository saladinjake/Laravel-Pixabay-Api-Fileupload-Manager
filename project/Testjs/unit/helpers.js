'use strict';

module.exports = helperTestFunction;

function helperTestFunction(shouldPass) {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (shouldPass) {
        return resolve('I have been testeed successfully');
      }
      else {
        return reject('Bad this test failed');
      }
    }, 10);
  });
}
