const path = require('path');

module.exports = {
  entry: './assets/scripts/babel/main.js',
  output: {
    filename: 'main.js',
    path: path.resolve(__dirname, './assets/scripts/bundle/'),
  },
};