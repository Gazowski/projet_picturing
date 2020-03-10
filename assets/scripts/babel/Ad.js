"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.Ad = void 0;

var _ajax = require("./ajax.js");

var _Detail = require("./Detail.js");

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var Ad = function Ad(el) {
  var _this = this;

  _classCallCheck(this, Ad);

  _defineProperty(this, "init", function (e) {
    var _iteratorNormalCompletion = true;
    var _didIteratorError = false;
    var _iteratorError = undefined;

    try {
      var _loop = function _loop() {
        var tile = _step.value;
        tile.addEventListener('click', function () {
          sessionStorage.setItem('id_ad', tile.dataset.jsTile); //sessionStorage.setItem('owner', tile.dataset.jsOwner);

          var paramAjax = {
            method: "GET",
            action: "index.php/ajax_controller/display_ad/" + tile.dataset.jsTile
          };
          (0, _ajax.requeteAjax)(paramAjax, function (reponse_ajax) {
            _this._el.classList.remove('parent');

            _this._el.innerHTML = reponse_ajax;
            var //filter = document.querySelector('[data-component="filter"]'),
            new_el = document.querySelector('[data-component="detail"]'); //filter.remove()

            new _Detail.Detail(new_el);
          });
        });
      };

      for (var _iterator = _this._elTiles[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
        _loop();
      }
    } catch (err) {
      _didIteratorError = true;
      _iteratorError = err;
    } finally {
      try {
        if (!_iteratorNormalCompletion && _iterator["return"] != null) {
          _iterator["return"]();
        }
      } finally {
        if (_didIteratorError) {
          throw _iteratorError;
        }
      }
    }
  });

  // declaration des variables 
  this._el = el, this._elTiles = this._el.querySelectorAll('[data-js-Tile]'); //this._elTiles = this._el.querySelectorAll('[data-js-owner]');

  console.log(this._el); // initialise les comportements

  this.init();
};

exports.Ad = Ad;