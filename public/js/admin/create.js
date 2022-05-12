/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/create.js":
/*!**************************************!*\
  !*** ./resources/js/admin/create.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var bottone = document.getElementById('bottone');

if (bottone) {
  bottone.addEventListener('click', function () {
    /* NOME */
    var nome = document.getElementById('name');

    if (nome.value.length < 5) {
      nome.setCustomValidity('Il nome deve essere più lungo di 5 caratteri');
    } else {
      nome.setCustomValidity('');
    } //Prezzo del piatto


    var price = document.getElementById('price');

    if (price.value <= 1 || price.value >= 1000) {
      price.setCustomValidity('Il prezzo selezionato non è valido, min-1/ max-999');
    } else {
      price.setCustomValidity('');
    } //Controllo lunghezza lista dei piatti


    var description = document.getElementById('description');

    if (description.value.length < 1) {
      description.setCustomValidity('La descrizione deve essere lunga almeno 20 caratteri');
    } else {
      description.setCustomValidity('');
    } //Controllo lista ingredienti


    var ingredients = document.getElementById('ingredients');

    if (ingredients.value.length < 5) {
      ingredients.setCustomValidity('La lista deve essere più lunga di 5 caratteri');
    } else {
      ingredients.setCustomValidity('');
    } //Controlli select Food type


    var food_type = document.getElementById('food_type');

    if (food_type.value == '') {
      food_type.setCustomValidity('Scegli il tipo di piatto');
    } else {
      food_type.setCustomValidity('');
    } //Controlli select categoria


    var category = document.getElementById('category');

    if (category.value == '') {
      category.setCustomValidity('Scegli una categoria');
    } else {
      category.setCustomValidity('');
    }
  });
}

/***/ }),

/***/ 4:
/*!********************************************!*\
  !*** multi ./resources/js/admin/create.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\booleanLaravel\DeliverBoo\resources\js\admin\create.js */"./resources/js/admin/create.js");


/***/ })

/******/ });