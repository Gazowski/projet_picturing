"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.List = void 0;

var _ajax = require("./ajax.js");

var _display_alert = require("./display_alert.js");

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var List = /*#__PURE__*/function () {
  function List(el) {
    _classCallCheck(this, List);

    // déclaration des variables
    this._el = el;
    this._rows = this._el.querySelectorAll('[data-row]'); // initialise les comportements

    this.init();
  }

  _createClass(List, [{
    key: "init",
    value: function init(e) {
      var _iteratorNormalCompletion = true;
      var _didIteratorError = false;
      var _iteratorError = undefined;

      try {
        for (var _iterator = this._rows[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
          var row = _step.value;
          new Row(row);
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
    }
  }]);

  return List;
}();

exports.List = List;

var Row = function Row(row) {
  var _this = this;

  _classCallCheck(this, Row);

  _defineProperty(this, "init", function () {
    _this.init_message();

    if (_this._button) _this.add_name_to_button();
    if (_this._button) _this.add_action_to_button();
  });

  _defineProperty(this, "init_message", function () {
    if (_this.table == 'member') _this.message = 'Voulez-vous activez ce membre ?';else _this.message = 'voulez-vous activez cette annonce ?';
  });

  _defineProperty(this, "add_name_to_button", function () {
    var name = _this._button.dataset.active == 1 ? 'Bannir' : 'Activer';
    _this._button.innerHTML = name;
  });

  _defineProperty(this, "add_action_to_button", function () {
    _this._button.addEventListener('click', function () {
      (0, _display_alert.display_alert)(_this.message, _this.activate_elt);
    });
  });

  _defineProperty(this, "banish_user", function () {// utiliser le tag <base> pour mémoriser l'url de base 
    // https://developer.mozilla.org/fr/docs/Web/HTML/Element/base
  });

  _defineProperty(this, "activate_elt", function () {
    var paramAjax = {
      method: "POST",
      json: true,
      action: "index.php/ajax_controller/activate_".concat(_this.table),
      data_to_send: _this.id
    };
    (0, _ajax.requeteAjax)(paramAjax, function (reponse_ajax) {
      console.log(reponse_ajax);
      if (reponse_ajax == 1) _this._row.remove();
    });
  });

  this._row = row;
  this._button = this._row.querySelector('button');
  this.id = this._row.id;
  this.table = this._row.dataset.row;
  this.message = '';
  this.init();
};