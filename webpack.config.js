const path = require('path');

module.exports = {
  entry: './assets/scripts/babel/main.js',
  output: {
    path: path.resolve(__dirname, './assets/scripts/webpack'),
    filename: 'bundle.js'
  }
};