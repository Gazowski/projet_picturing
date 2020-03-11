"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.Alert = void 0;

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Alert = /*#__PURE__*/function () {
  function Alert(el) {
    _classCallCheck(this, Alert);

    // déclaration des variables
    this._el = el; // initialise les comportements

    this.init();
  }

  _createClass(Alert, [{
    key: "init",
    value: function init(e) {
      var _this = this;

      this._el.addEventListener('click', function () {
        _this._el.innerHTML = '';
      });
    }
  }]);

  return Alert;
}();

exports.Alert = Alert;