"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.Detail = void 0;

var _ajax = require("./ajax.js");

var _display_alert = require("./display_alert.js");

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var Detail = function Detail(el) {
  var _this = this;

  _classCallCheck(this, Detail);

  _defineProperty(this, "init", function (e) {
    if (_this._btn_supervisor) {
      _this.add_name_to_btn_supervisor();

      _this.add_action_to_btn_supervisor();
    }

    if (_this._btn_bid) _this.display_btn_bid();
    if (_this._btn_owner) _this.display_btn_owner();
    if (_this._rating) _this.display_rating();
    if (_this._btn_modif) _this._btn_modif.addEventListener('click', _this.modify_data); // pas de fonction fleché car l'évènement doit être supprimer

    if (_this._btn_delete) _this._btn_delete.addEventListener('click', function () {
      (0, _display_alert.display_alert)('confirmez la suppression', _this.delete_data);
    });
    if (_this._btn_upgrade_to_supervisor) _this._btn_upgrade_to_supervisor.addEventListener('click', function () {
      (0, _display_alert.display_alert)('confirmez la promotion', _this.upgrade_to_supervisor);
    });
    var _iteratorNormalCompletion = true;
    var _didIteratorError = false;
    var _iteratorError = undefined;

    try {
      var _loop = function _loop() {
        var star = _step.value;
        star.addEventListener('click', function () {
          _this.rate_user(star);
        });
      };

      for (var _iterator = _this._stars[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
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

  _defineProperty(this, "add_name_to_btn_supervisor", function () {
    var name = '';
    if (_this._el.dataset.banish == 1) name = 'Débannir';else if (_this._btn_supervisor.dataset.active == 1) name = 'Bannir';else name = 'Activer';
    _this._btn_supervisor.innerHTML = name;
  });

  _defineProperty(this, "add_action_to_btn_supervisor", function () {
    console.log(_this._el.dataset.banish);

    if (_this._el.dataset.banish == 1) {
      _this._btn_supervisor.addEventListener('click', function () {
        _this.confirm_unban();
      });
    } else if (_this._btn_supervisor.dataset.active == 1) {
      _this._btn_supervisor.addEventListener('click', function () {
        _this.confirm_banish();
      });
    } else {
      _this._btn_supervisor.addEventListener('click', function () {
        _this.confirm_activation();
      });
    }
  });

  _defineProperty(this, "confirm_unban", function () {
    (0, _display_alert.display_alert)('Voulez vous débannir ce membre', _this.unban_member);
  });

  _defineProperty(this, "unban_member", function () {
    _this._btn_supervisor.removeEventListener('click', function () {
      _this.confirm_unban();
    });

    var paramAjax = {
      method: "POST",
      json: true,
      action: "index.php/ajax_controller/unban_member",
      data_to_send: _this._el.dataset.idElt
    };
    (0, _ajax.requeteAjax)(paramAjax, function (reponse_ajax) {
      console.log(reponse_ajax);

      if (reponse_ajax) {
        (0, _display_alert.display_alert)('le membre à été débanni');
        window.setTimeout(function () {
          window.location = document.referrer;
        }, 1500);
      }
    });
  });

  _defineProperty(this, "confirm_banish", function () {
    (0, _display_alert.display_alert)("Voulez-vous bannir ce membre' ?", _this.banish_user);
  });

  _defineProperty(this, "banish_user", function () {
    _this._btn_supervisor.removeEventListener('click', function () {
      _this.confirm_banish();
    });

    var paramAjax = {
      method: "POST",
      json: true,
      action: "index.php/ajax_controller/ban_member",
      data_to_send: _this._el.dataset.idElt
    };
    (0, _ajax.requeteAjax)(paramAjax, function (reponse_ajax) {
      console.log(reponse_ajax);

      if (reponse_ajax) {
        (0, _display_alert.display_alert)('le membre à été banni');
        window.setTimeout(function () {
          window.location = document.referrer;
        }, 2000);
      }
    });
  });

  _defineProperty(this, "confirm_activation", function () {
    (0, _display_alert.display_alert)("Voulez-vous activez ".concat(_this.table == 'ad' ? 'cette annonce' : 'ce membre', " ?"), _this.activate_elt);
  });

  _defineProperty(this, "activate_elt", function () {
    _this._btn_supervisor.removeEventListener('click', function () {
      _this.confirm_activation();
    });

    var paramAjax = {
      method: "POST",
      json: true,
      action: "index.php/ajax_controller/activate_".concat(_this.table),
      data_to_send: _this._el.dataset.idElt
    };
    (0, _ajax.requeteAjax)(paramAjax, function (reponse_ajax) {
      console.log(reponse_ajax);

      if (reponse_ajax == 1) {
        (0, _display_alert.display_alert)(_this.table == 'ad' ? 'l\'annonce a été activée' : 'le membre à été activé');
        window.setTimeout(function () {
          window.location = document.referrer;
        }, 2000);
      }
    });
  });

  _defineProperty(this, "display_btn_bid", function () {
    if (_this._el.dataset.user != _this._el.dataset.owner) {
      _this._btn_bid.classList.remove('display_none');
    }
  });

  _defineProperty(this, "display_btn_owner", function () {
    if (_this._el.dataset.user != 0 && _this._el.dataset.user == _this._el.dataset.owner) {
      _this._btn_owner.classList.remove('display_none');
    }
  });

  _defineProperty(this, "display_rating", function () {
    if (_this._el.dataset.user != 0 && _this._el.dataset.user != _this._el.dataset.owner) {
      _this._rating.classList.remove('display_none');
    }
  });

  _defineProperty(this, "modify_data", function () {
    _this.toggle_editable_data();

    _this.toggle_btn();
  });

  _defineProperty(this, "toggle_btn", function () {
    var new_action = '',
        old_action = '';

    if (_this._btn_modif.innerHTML == 'valider') {
      _this._btn_modif.innerHTML = 'modifier';
      old_action = _this.store_new_data;
      new_action = _this.modify_data;
    } else {
      _this._btn_modif.innerHTML = 'valider';
      old_action = _this.modify_data;
      new_action = _this.store_new_data;
    }

    _this._btn_modif.removeEventListener('click', old_action);

    _this._btn_modif.addEventListener('click', new_action);
  });

  _defineProperty(this, "toggle_editable_data", function () {
    var _iteratorNormalCompletion2 = true;
    var _didIteratorError2 = false;
    var _iteratorError2 = undefined;

    try {
      for (var _iterator2 = _this._data[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
        var data = _step2.value;

        if (!data.hasAttribute('data-editable')) {
          if (!data.classList.contains('grey')) {
            data.classList.add('grey');
          } else {
            data.classList.remove('grey');
          }
        }
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

    var _iteratorNormalCompletion3 = true;
    var _didIteratorError3 = false;
    var _iteratorError3 = undefined;

    try {
      for (var _iterator3 = _this._editable_data[Symbol.iterator](), _step3; !(_iteratorNormalCompletion3 = (_step3 = _iterator3.next()).done); _iteratorNormalCompletion3 = true) {
        var _data = _step3.value;

        if (_data.contentEditable == 'false') {
          _data.contentEditable = true;

          _data.classList.add('editable');
        } else {
          _data.contentEditable = false;

          _data.classList.remove('editable');
        }
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
  });

  _defineProperty(this, "store_new_data", function () {
    _this.prepare_data();

    (0, _display_alert.display_alert)('valider les modifications', _this.send_data_to_db);

    _this.toggle_btn();

    _this.toggle_editable_data();
  });

  _defineProperty(this, "prepare_data", function () {
    var _iteratorNormalCompletion4 = true;
    var _didIteratorError4 = false;
    var _iteratorError4 = undefined;

    try {
      for (var _iterator4 = _this._editable_data[Symbol.iterator](), _step4; !(_iteratorNormalCompletion4 = (_step4 = _iterator4.next()).done); _iteratorNormalCompletion4 = true) {
        var data = _step4.value;
        _this.ajax_data[data.id] = data.innerHTML;
      }
    } catch (err) {
      _didIteratorError4 = true;
      _iteratorError4 = err;
    } finally {
      try {
        if (!_iteratorNormalCompletion4 && _iterator4["return"] != null) {
          _iterator4["return"]();
        }
      } finally {
        if (_didIteratorError4) {
          throw _iteratorError4;
        }
      }
    }
  });

  _defineProperty(this, "send_data_to_db", function () {
    var paramAjax = {
      method: "POST",
      json: true,
      action: "index.php/ajax_controller/update_".concat(_this._el.dataset.table),
      data_to_send: _this.ajax_data
    };
    (0, _ajax.requeteAjax)(paramAjax, function (reponse_ajax) {
      console.log(reponse_ajax);

      if (reponse_ajax == 1) {
        (0, _display_alert.display_alert)('les modifications ont été enregistrées');
        window.setTimeout(function () {
          window.location = document.referrer;
        }, 2000);
      }
    });
  });

  _defineProperty(this, "rate_user", function (star) {
    console.log(star.dataset.star);
    var ajax_data = {
      'rated_user': _this._el.dataset.owner,
      'rating': star.dataset.star
    };
    var paramAjax = {
      method: "POST",
      json: true,
      action: "index.php/ajax_controller/rate_user",
      data_to_send: ajax_data
    };
    (0, _ajax.requeteAjax)(paramAjax, function (reponse_ajax) {
      console.log(reponse_ajax);

      if (reponse_ajax) {
        (0, _display_alert.display_alert)('la note a été enregistrée');
      }
    });
  });

  _defineProperty(this, "delete_data", function () {
    var paramAjax = {
      method: "POST",
      json: true,
      action: "index.php/ajax_controller/delete_".concat(_this._el.dataset.table),
      data_to_send: _this.ajax_data
    };
    (0, _ajax.requeteAjax)(paramAjax, function (reponse_ajax) {
      console.log(reponse_ajax);

      if (reponse_ajax == 1) {
        (0, _display_alert.display_alert)('suppression effectuée'); // si suppression de compte , redirection vers le login

        var new_url = _this._el.dataset.table == 'ad' ? document.referrer : "".concat(document.baseURI, "/auth/logout");
        window.setTimeout(function () {
          window.location = new_url;
        }, 2000);
      }
    });
  });

  _defineProperty(this, "upgrade_to_supervisor", function () {
    var paramAjax = {
      method: "POST",
      json: true,
      action: "index.php/ajax_controller/upgrade_to_supervisor",
      data_to_send: _this._el.dataset.idElt
    };
    (0, _ajax.requeteAjax)(paramAjax, function (reponse_ajax) {
      console.log(reponse_ajax);

      if (reponse_ajax == 1) {
        (0, _display_alert.display_alert)('le membre à été promu !');
        window.setTimeout(function () {
          window.location = document.referrer;
        }, 2000);
      }
    });
  });

  // declaration des variables 
  console.log(el);
  this._el = el;
  this._id_elt = this._el.querySelector('[data-id-elt]');
  this._btn_modif = this._el.querySelector('[data-btn-modif]');
  this._data = this._el.querySelectorAll('li span');
  this._editable_data = this._el.querySelectorAll('[data-editable]');
  this._btn_bid = this._el.querySelector('[data-btn-bid]');
  this._btn_owner = this._el.querySelector('[data-btn-owner]');
  this._btn_delete = this._el.querySelector('[data-btn-delete]');
  this._btn_supervisor = this._el.querySelector('[data-active]');
  this._btn_upgrade_to_supervisor = this._el.querySelector('[data-upgrade-to-supervisor]');
  this._rating = this._el.querySelector('[data-rating]');
  this._stars = this._el.querySelectorAll('[data-star]');
  this.table = this._el.dataset.table;
  this.ajax_data = {}; // initialise les comportements

  this.init();
};

exports.Detail = Detail;