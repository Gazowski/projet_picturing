"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.Filter = void 0;

var _ajax = require("./ajax.js");

var _Ad = require("./Ad.js");

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var Filter = function Filter(el) {
  var _this = this;

  _classCallCheck(this, Filter);

  _defineProperty(this, "init", function (e) {
    var method = _this._ad ? 'get_ads' : '';

    _this._elFilter.addEventListener('change', function () {
      var paramAjax = {
        method: "POST",
        json: true,
        action: "index.php/ajax_controller/".concat(method),
        data_to_send: _this._elFilter.options[_this._elFilter.selectedIndex].value
      };
      (0, _ajax.requeteAjax)(paramAjax, function (reponse_ajax) {
        console.log(_this._el.nextSibling);
        _this._el.nextElementSibling.innerHTML = reponse_ajax;
        var liste = document.querySelector('[data-component="Ad"]');
        new _Ad.Ad(liste);
      });
    });
  });

  // declaration des variables 
  this._el = el, this._elFilter = this._el.querySelector('select');
  console.log(this._el);
  this._ad = document.querySelector('[data-component="Ad"]'); // initialise les comportements

  this.init();
};

exports.Filter = Filter;