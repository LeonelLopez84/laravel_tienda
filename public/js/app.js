/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.l = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };

/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
/******/ 	};

/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};

/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

eval("$.fn.editable.defaults.mode='inline';\n$.fn.editable.defaults.ajaxOptions = {type: \"POST\"}\n$.fn.editable.defaults.send = \"always\";\n\n$(document).ready(function() {\n\n\n\t$(\".set-guide-number\").editable({ajaxOptions:{type: \"PUT\"}});\n\t$(\".select-status\").editable(\n\t{\n\t\tsource:[\n\t\t\t\t{value:\"Creado\",text:\"Creado\"},\n\t\t\t\t{value:\"Enviado\",text:\"Enviado\"},\n\t\t\t\t{value:\"Recibido\",text:\"Recibido\"}\n\t\t\t],\n\t\t ajaxOptions:{type: \"PUT\"}\n   \t});\n});\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC5qcz84YjY3Il0sInNvdXJjZXNDb250ZW50IjpbIiQuZm4uZWRpdGFibGUuZGVmYXVsdHMubW9kZT0naW5saW5lJztcbiQuZm4uZWRpdGFibGUuZGVmYXVsdHMuYWpheE9wdGlvbnMgPSB7dHlwZTogXCJQT1NUXCJ9XG4kLmZuLmVkaXRhYmxlLmRlZmF1bHRzLnNlbmQgPSBcImFsd2F5c1wiO1xuXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcblxuXG5cdCQoXCIuc2V0LWd1aWRlLW51bWJlclwiKS5lZGl0YWJsZSh7YWpheE9wdGlvbnM6e3R5cGU6IFwiUFVUXCJ9fSk7XG5cdCQoXCIuc2VsZWN0LXN0YXR1c1wiKS5lZGl0YWJsZShcblx0e1xuXHRcdHNvdXJjZTpbXG5cdFx0XHRcdHt2YWx1ZTpcIkNyZWFkb1wiLHRleHQ6XCJDcmVhZG9cIn0sXG5cdFx0XHRcdHt2YWx1ZTpcIkVudmlhZG9cIix0ZXh0OlwiRW52aWFkb1wifSxcblx0XHRcdFx0e3ZhbHVlOlwiUmVjaWJpZG9cIix0ZXh0OlwiUmVjaWJpZG9cIn1cblx0XHRcdF0sXG5cdFx0IGFqYXhPcHRpb25zOnt0eXBlOiBcIlBVVFwifVxuICAgXHR9KTtcbn0pO1xuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvanMvYXBwLmpzIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);