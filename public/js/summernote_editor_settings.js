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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/summernote_editor_settings.js":
/*!****************************************************!*\
  !*** ./resources/js/summernote_editor_settings.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Settings for summernote editor.
 */
$(document).ready(function () {
  $(document).ready(function () {
    var editor = $('#description');
    var configFull = {
      lang: 'ru-RU',
      // default: 'en-US'
      shortcuts: false,
      airMode: false,
      minHeight: 200,
      // set minimum height of editor
      maxHeight: 500,
      // set maximum height of editor
      focus: false,
      // set focus to editable area after initializing summernote
      disableDragAndDrop: false,
      callbacks: {
        onImageUpload: function onImageUpload(files) {
          uploadFile(files);
        },
        onMediaDelete: function onMediaDelete($target, editor, $editable) {
          var fileURL = $target[0].src;
          deleteFile(fileURL); // remove element in editor

          $target.remove();
        }
      }
    }; // Featured editor

    editor.summernote(configFull); // Upload file on the server.

    function uploadFile(filesForm) {
      data = new FormData(); // Add all files from form to array.

      for (var i = 0; i < filesForm.length; i++) {
        data.append("files[]", filesForm[i]);
      }

      $.ajax({
        data: data,
        type: "POST",
        url: "/ajax/uploader/upload",
        cache: false,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType: false,
        processData: false,
        success: function success(images) {
          //console.log(images);
          // If not errors.
          if (typeof images['error'] == 'undefined') {
            // Get all images and insert to editor.
            for (var i = 0; i < images['url'].length; i++) {
              editor.summernote('insertImage', images['url'][i], function ($image) {//$image.css('width', $image.width() / 3);
                //$image.attr('data-filename', 'retriever')
              });
            }
          } else {
            // Get user's browser language.
            var userLang = navigator.language || navigator.userLanguage;

            if (userLang == 'ru-RU') {
              var error = 'Ошибка, не могу загрузить файл! Пожалуйста, проверьте файл или ссылку. ' + 'Изображение должно быть не менее 500px!';
            } else {
              var error = 'Error, can\'t upload file! Please check file or URL. Image should be more then 500px!';
            }

            alert(error);
          }
        }
      });
    } // Delete file from the server.


    function deleteFile(file) {
      data = new FormData();
      data.append("file", file);
      $.ajax({
        data: data,
        type: "POST",
        url: "/ajax/uploader/delete",
        cache: false,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType: false,
        processData: false,
        success: function success(image) {//console.log(image);
        }
      });
    }
  });
});

/***/ }),

/***/ 1:
/*!**********************************************************!*\
  !*** multi ./resources/js/summernote_editor_settings.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/home/code/intrade/resources/js/summernote_editor_settings.js */"./resources/js/summernote_editor_settings.js");


/***/ })

/******/ });