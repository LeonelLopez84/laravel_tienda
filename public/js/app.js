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
/******/ 	return __webpack_require__(__webpack_require__.s = 11);
/******/ })
/************************************************************************/
/******/ ({

/***/ 11:
/***/ function(module, exports) {

eval("$.fn.editable.defaults.mode='inline';\n$.fn.editable.defaults.ajaxOptions={type:'POST'};\n$.fn.editable.defaults.send = \"always\";\n\n$(document).ready(function() {\n\n\n\t$(\".set-guide-number\").editable({ajaxOptions: {\n     type: 'PUT'\n   }  });\n\t$(\".select-status\").editable(\n\t\t{\n\t\t\tsource:[\n\t\t\t\t{value:\"creado\",text:\"Creado\"},\n\t\t\t\t{value:\"envio\",text:\"Enviado\"},\n\t\t\t\t{value:\"recibido\",text:\"Recibido\"}\n\t\t\t]\n\t\t});\n});\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMTEuanMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vcmVzb3VyY2VzL2Fzc2V0cy9qcy9hcHAuanM/OGI2NyJdLCJzb3VyY2VzQ29udGVudCI6WyIkLmZuLmVkaXRhYmxlLmRlZmF1bHRzLm1vZGU9J2lubGluZSc7XG4kLmZuLmVkaXRhYmxlLmRlZmF1bHRzLmFqYXhPcHRpb25zPXt0eXBlOidQT1NUJ307XG4kLmZuLmVkaXRhYmxlLmRlZmF1bHRzLnNlbmQgPSBcImFsd2F5c1wiO1xuXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcblxuXG5cdCQoXCIuc2V0LWd1aWRlLW51bWJlclwiKS5lZGl0YWJsZSh7YWpheE9wdGlvbnM6IHtcbiAgICAgdHlwZTogJ1BVVCdcbiAgIH0gIH0pO1xuXHQkKFwiLnNlbGVjdC1zdGF0dXNcIikuZWRpdGFibGUoXG5cdFx0e1xuXHRcdFx0c291cmNlOltcblx0XHRcdFx0e3ZhbHVlOlwiY3JlYWRvXCIsdGV4dDpcIkNyZWFkb1wifSxcblx0XHRcdFx0e3ZhbHVlOlwiZW52aW9cIix0ZXh0OlwiRW52aWFkb1wifSxcblx0XHRcdFx0e3ZhbHVlOlwicmVjaWJpZG9cIix0ZXh0OlwiUmVjaWJpZG9cIn1cblx0XHRcdF1cblx0XHR9KTtcbn0pO1xuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvanMvYXBwLmpzIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTsiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }

/******/ });