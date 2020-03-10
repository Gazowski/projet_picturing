"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.Form = void 0;

var _ajax = require("./ajax.js");

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var Form = function Form(el) {
  var _this = this;

  _classCallCheck(this, Form);

  _defineProperty(this, "init", function (e) {
    var select_category = '';
    var _iteratorNormalCompletion = true;
    var _didIteratorError = false;
    var _iteratorError = undefined;

    try {
      var _loop = function _loop() {
        var input = _step.value;

        if (input.dataset.jsInput == 'category') {
          select_category = input;
        }

        if (input.dataset.jsInput == 'group') {
          input.addEventListener('change', function () {
            if (input.value == '4') {
              // 4 = fournisseur
              _this._boxGoldenSupplier.classList.remove('display_none');
            } else if (!_this._boxGoldenSupplier.classList.contains('display_none')) {
              _this._boxGoldenSupplier.classList.add('display_none');
            }
          });
        }

        if (input.dataset.jsInput == 'type') {
          input.addEventListener('change', function () {
            var paramAjax = {
              method: "POST",
              json: true,
              action: "index.php/ajax_controller/get_category_name",
              data_to_send: input.options[input.selectedIndex].value
            };
            (0, _ajax.requeteAjax)(paramAjax, function (reponse_ajax) {
              select_category.innerHTML = reponse_ajax;
            });
          });
        }
      };

      for (var _iterator = _this._elInputs[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
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

  // déclaration des variables
  this._el = el;
  this._elInputs = this._el.querySelectorAll('[data-js-input]');
  this._boxGoldenSupplier = this._el.querySelector('[data-js-input="golden"]'); // initialise les comportements

  this.init();
};

exports.Form = Form;