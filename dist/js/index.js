"use strict";

/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/
(function () {
  // webpackBootstrap
  /******/
  var __webpack_modules__ = {
    /***/"./src/js/index.js":
    /*!*************************!*\
      !*** ./src/js/index.js ***!
      \*************************/
    /***/
    function srcJsIndexJs(__unused_webpack_module, __webpack_exports__, __webpack_require__) {
      "use strict";

      eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _lib_navigation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./lib/navigation */ \"./src/js/lib/navigation.js\");\n/* harmony import */ var _lib_navigation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_lib_navigation__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _lib_smooth_scroll__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./lib/smooth-scroll */ \"./src/js/lib/smooth-scroll.js\");\n/* harmony import */ var _lib_smooth_scroll__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_lib_smooth_scroll__WEBPACK_IMPORTED_MODULE_1__);\n\n// import './lib/testimonials-carousel';\n\n\n\n//# sourceURL=webpack://frontend-dev-test/./src/js/index.js?");

      /***/
    },

    /***/"./src/js/lib/navigation.js":
    /*!**********************************!*\
      !*** ./src/js/lib/navigation.js ***!
      \**********************************/
    /***/
    function srcJsLibNavigationJs() {
      eval("(function () {\n    const siteNavigation = document.getElementById('navigation');\n\t\tconst mobileNavTrigger = document.getElementById('navigation-header-mobile-toggle');\n\t\tconst mobileNavTriggerTitle = document.getElementById('navigation-header-mobile-toggle-title');\n\t\tconst submenuToggleButtons = document.querySelectorAll('.navigation-menu__submenu-toggle');\n    let mobileMenuOpen = false;\n\n    // Mobile Menu Toggle Active\n    function toggleMobileActive () {\n\t\t\tmobileMenuOpen = !mobileMenuOpen;\n\t\t\tsiteNavigation.classList.toggle('navigation--mobile-active');\n\t\t\tmobileNavTriggerTitle.innerHTML = mobileMenuOpen ? 'Close' : 'Menu';\n\t\t}\n\n    // Toggle Submenu Elements\n    function toggleSubmenuActive (submenuParent) {\n\t\t\tsubmenuParent.classList.toggle('navigation-menu__item--submenu-active');\n\t\t}\n\n    // Adding Event Listeners to Touch and Click Events\n\t\tfunction customEventListener (element, functionCall) {\n\t\t\tif (typeof window.ontouchstart === 'undefined') {\n\t\t\t\telement.addEventListener('click', functionCall)\n\t\t\t} else {\n\t\t\t\telement.addEventListener('touchstart', functionCall)\n\t\t\t}\n\t\t}\n\n    // Set Sticky Navigation on Scroll\n\t\tfunction setStickyNav (currentScroll) {\n\t\t\tif (currentScroll > 0) {\n\t\t\t\tsiteNavigation.classList.add('navigation--sticky')\n\t\t\t} else {\n\t\t\t\tsiteNavigation.classList.remove('navigation--sticky')\n\t\t\t}\n\t\t}\n\n    // Add Event Listener to Window to Check if Navigation Has Scrolled\n\t\tfunction handleScroll () {\n\t\t\tconst currentScroll = document.scrollingElement ? document.scrollingElement.scrollTop : document.documentElement.scrollTop\n\n\t\t\tsetStickyNav(currentScroll)\n\t\t}\n\n    // Initialize Mobile Menu Toggle Event\n\t\tcustomEventListener(mobileNavTrigger, toggleMobileActive)\n\n    // Initialize Submenu Toggle Event\n    for(let i = 0; i < submenuToggleButtons.length;  i++) {\n\t\t\tcustomEventListener(submenuToggleButtons[i], () => {\n\t\t\t\tconst submenuParent = submenuToggleButtons[i].closest('.navigation-menu__item--has-submenu')\n\t\t\t\ttoggleSubmenuActive(submenuParent)\n\t\t\t})\n    }\n\n    // Add Event Listener to Window to Check if Navigation Has Scrolled\n    window.addEventListener('scroll', handleScroll)\n})();\n\n\n//# sourceURL=webpack://frontend-dev-test/./src/js/lib/navigation.js?");

      /***/
    },

    /***/"./src/js/lib/smooth-scroll.js":
    /*!*************************************!*\
      !*** ./src/js/lib/smooth-scroll.js ***!
      \*************************************/
    /***/
    function srcJsLibSmoothScrollJs() {
      eval("(function () {\n  \n  const anchorLinks = document.querySelectorAll('a[href*=\"#\"]:not([href=\"#\"]):not([href=\"#0\"])');\n  \n  anchorLinks.forEach((link) => {\n    link.addEventListener('click', (e) => {\n      e.preventDefault();\n  \n      const targetId = link.getAttribute('href').substring(1);\n  \n      const targetSection = document.getElementById(targetId);\n  \n      if (targetSection) {\n        const offsetTop = targetSection.getBoundingClientRect().top + window.scrollY;\n  \n        window.scrollTo({\n          top: offsetTop,\n          behavior: 'smooth',\n        });\n      }\n    });\n  });\n  \n  \n})();\n\n//# sourceURL=webpack://frontend-dev-test/./src/js/lib/smooth-scroll.js?");

      /***/
    }

    /******/
  };
  /************************************************************************/
  /******/ // The module cache
  /******/
  var __webpack_module_cache__ = {};
  /******/
  /******/ // The require function
  /******/
  function __webpack_require__(moduleId) {
    /******/ // Check if module is in cache
    /******/var cachedModule = __webpack_module_cache__[moduleId];
    /******/
    if (cachedModule !== undefined) {
      /******/return cachedModule.exports;
      /******/
    }
    /******/ // Create a new module (and put it into the cache)
    /******/
    var module = __webpack_module_cache__[moduleId] = {
      /******/ // no module.id needed
      /******/ // no module.loaded needed
      /******/exports: {}
      /******/
    };
    /******/
    /******/ // Execute the module function
    /******/
    __webpack_modules__[moduleId](module, module.exports, __webpack_require__);
    /******/
    /******/ // Return the exports of the module
    /******/
    return module.exports;
    /******/
  }
  /******/
  /************************************************************************/
  /******/ /* webpack/runtime/compat get default export */
  /******/
  (function () {
    /******/ // getDefaultExport function for compatibility with non-harmony modules
    /******/__webpack_require__.n = function (module) {
      /******/var getter = module && module.__esModule ? /******/function () {
        return module['default'];
      } : /******/function () {
        return module;
      };
      /******/
      __webpack_require__.d(getter, {
        a: getter
      });
      /******/
      return getter;
      /******/
    };
    /******/
  })();
  /******/
  /******/ /* webpack/runtime/define property getters */
  /******/
  (function () {
    /******/ // define getter functions for harmony exports
    /******/__webpack_require__.d = function (exports, definition) {
      /******/for (var key in definition) {
        /******/if (__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
          /******/Object.defineProperty(exports, key, {
            enumerable: true,
            get: definition[key]
          });
          /******/
        }
        /******/
      }
      /******/
    };
    /******/
  })();
  /******/
  /******/ /* webpack/runtime/hasOwnProperty shorthand */
  /******/
  (function () {
    /******/__webpack_require__.o = function (obj, prop) {
      return Object.prototype.hasOwnProperty.call(obj, prop);
    };
    /******/
  })();
  /******/
  /******/ /* webpack/runtime/make namespace object */
  /******/
  (function () {
    /******/ // define __esModule on exports
    /******/__webpack_require__.r = function (exports) {
      /******/if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
        /******/Object.defineProperty(exports, Symbol.toStringTag, {
          value: 'Module'
        });
        /******/
      }
      /******/
      Object.defineProperty(exports, '__esModule', {
        value: true
      });
      /******/
    };
    /******/
  })();
  /******/
  /************************************************************************/
  /******/
  /******/ // startup
  /******/ // Load entry module and return exports
  /******/ // This entry module can't be inlined because the eval devtool is used.
  /******/
  var __webpack_exports__ = __webpack_require__("./src/js/index.js");
  /******/
  /******/
})();