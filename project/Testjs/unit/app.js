'use strict';

const helperTestFunction = require('./helpers.js');

document.addEventListener('DOMContentLoaded', () => {
  var create = document.querySelector('.create');
  var cancel = document.querySelector('.cancel');
  var loadposition = document.querySelector('.response');
  [
    { button: create, value: true, },
    { button: cancel, value: false, }
  ].forEach((input) => {
    input.button.addEventListener('click', buttonPress.bind(undefined, input.value));
  });

  function buttonPress(shouldPass) {
    helperTestFunction(shouldPass)
      .then((value) => {
        loadposition.innerHTML = `Successfully created a test action: ${value}`;
      })
      .catch((err) => {
        loadposition.innerHTML = `Rejected this test action with errors: ${err}`;
      });
  }
});
