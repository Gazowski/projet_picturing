"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.class_mapping = void 0;

var _Ad = require("./Ad.js");

var _Form = require("./Form.js");

var _List = require("./List.js");

var _Alert = require("./Alert.js");

var _Detail = require("./Detail.js");

var _Filter = require("./Filter.js");

var _Thread = require("./Thread.js");

var class_mapping = {
  'Ad': _Ad.Ad,
  'form': _Form.Form,
  'list': _List.List,
  'alert': _Alert.Alert,
  'detail': _Detail.Detail,
  'filter': _Filter.Filter,
  'thread': _Thread.Thread
};
exports.class_mapping = class_mapping;