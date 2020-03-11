"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.Thread = void 0;

var _ajax = require("./ajax.js");

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var Thread = function Thread(el) {
  var _this = this;

  _classCallCheck(this, Thread);

  _defineProperty(this, "init", function (e) {
    console.log(_this._threads);
    var _iteratorNormalCompletion = true;
    var _didIteratorError = false;
    var _iteratorError = undefined;

    try {
      for (var _iterator = _this._threads[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
        var thread = _step.value;
        new Conversation(thread); //this.thread.addEventListener('click', (e)=>this.open_thread)
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
  this._el = el, this._threads = this._el.querySelectorAll('[data-thread]');
  console.log(this._el); // initialise les comportements

  this.init();
};

exports.Thread = Thread;

var Conversation = function Conversation(el) {
  var _this2 = this;

  _classCallCheck(this, Conversation);

  _defineProperty(this, "init", function () {
    var _iteratorNormalCompletion2 = true;
    var _didIteratorError2 = false;
    var _iteratorError2 = undefined;

    try {
      for (var _iterator2 = _this2._messages[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
        var msg = _step2.value;
        _this2._conversation_field = _this2._el.querySelector('[data-conversation]');
        msg.addEventListener('click', _this2.open_conversation);
      }
    } catch (err) {
      _didIteratorError2 = true;
      _iteratorError2 = err;
    } finally {
      try {
        if (!_iteratorNormalCompletion2 && _iterator2["return"] != null) {
          _iterator2["return"]();
        }
      } finally {
        if (_didIteratorError2) {
          throw _iteratorError2;
        }
      }
    }
  });

  _defineProperty(this, "open_conversation", function () {
    _this2._msg = _this2._el.querySelector('[data-msg]');

    _this2._msg.removeEventListener('click', _this2.open_conversation);

    console.log("zone messages = " + _this2._el.querySelector('[data-conversation]'));
    var paramAjax = {
      method: "POST",
      json: true,
      action: "index.php/ajax_controller/messages_thread",
      data_to_send: _this2._el.dataset.thread
    };
    (0, _ajax.requeteAjax)(paramAjax, function (reponse_ajax) {
      _this2.display_conversation(reponse_ajax);
    });
  });

  _defineProperty(this, "display_conversation", function (conversation) {
    conversation = JSON.parse(conversation); //console.log(conversation)

    var emptyTest = conversation.length; //console.log(emptyTest);

    var _iteratorNormalCompletion3 = true;
    var _didIteratorError3 = false;
    var _iteratorError3 = undefined;

    try {
      for (var _iterator3 = conversation[Symbol.iterator](), _step3; !(_iteratorNormalCompletion3 = (_step3 = _iterator3.next()).done); _iteratorNormalCompletion3 = true) {
        var message = _step3.value;
        console.log(message.thread_id);
        _this2._conversation_field.innerHTML += "\n                <i>le ".concat(message.cdate, "</i> message de <b><a href='").concat(document.baseURI, "/member/").concat(message.sender_id, "'>").concat(message.user_name, "</a></b>\n                <p>").concat(message.body, "</p>\n                <div class=\"line_n\"></div>\n            ");
      }
    } catch (err) {
      _didIteratorError3 = true;
      _iteratorError3 = err;
    } finally {
      try {
        if (!_iteratorNormalCompletion3 && _iterator3["return"] != null) {
          _iterator3["return"]();
        }
      } finally {
        if (_didIteratorError3) {
          throw _iteratorError3;
        }
      }
    }

    _this2._conversation_field.innerHTML += "\n        <form method=\"POST\" action=\"index.php/message/reply\">\n        <textarea name=\"answer\" rows=\"3\" cols=\"33\"></textarea>\n        <input type=\"hidden\" name=\"id_msg\" value=\"".concat(conversation[0].id, "\">\n        <input class=\"button\" type=\"submit\" value=\"repondre\">\n      \n        </form>\n        ");

    _this2._msg.addEventListener('click', _this2.toggle_conversation);
  });

  _defineProperty(this, "toggle_conversation", function () {
    _this2._conversation_field.classList.toggle('display_none');
  });

  this._el = el;
  this._messages = this._el.querySelectorAll('[data-msg]');
  this.init();
};