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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./ekko-lightbox */ "./resources/js/ekko-lightbox.js");

__webpack_require__(/*! ./script */ "./resources/js/script.js");

/***/ }),

/***/ "./resources/js/ekko-lightbox.js":
/*!***************************************!*\
  !*** ./resources/js/ekko-lightbox.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

+function (a) {
  "use strict";

  function b(a, b) {
    if (!(a instanceof b)) throw new TypeError("Cannot call a class as a function");
  }

  var c = function () {
    function a(a, b) {
      for (var c = 0; c < b.length; c++) {
        var d = b[c];
        d.enumerable = d.enumerable || !1, d.configurable = !0, "value" in d && (d.writable = !0), Object.defineProperty(a, d.key, d);
      }
    }

    return function (b, c, d) {
      return c && a(b.prototype, c), d && a(b, d), b;
    };
  }();

  (function (a) {
    var d = "ekkoLightbox",
        e = a.fn[d],
        f = {
      title: "",
      footer: "",
      maxWidth: 9999,
      maxHeight: 9999,
      showArrows: !0,
      wrapping: !0,
      type: null,
      alwaysShowClose: !1,
      loadingMessage: '<div class="ekko-lightbox-loader"><div><div></div><div></div></div></div>',
      leftArrow: "<span>&#10094;</span>",
      rightArrow: "<span>&#10095;</span>",
      strings: {
        close: "Close",
        fail: "Failed to load image:",
        type: "Could not detect remote target type. Force the type using data-type"
      },
      doc: document,
      onShow: function onShow() {},
      onShown: function onShown() {},
      onHide: function onHide() {},
      onHidden: function onHidden() {},
      onNavigate: function onNavigate() {},
      onContentLoaded: function onContentLoaded() {}
    },
        g = function () {
      function d(c, e) {
        var g = this;
        b(this, d), this._config = a.extend({}, f, e), this._$modalArrows = null, this._galleryIndex = 0, this._galleryName = null, this._padding = null, this._border = null, this._titleIsShown = !1, this._footerIsShown = !1, this._wantedWidth = 0, this._wantedHeight = 0, this._touchstartX = 0, this._touchendX = 0, this._modalId = "ekkoLightbox-" + Math.floor(1e3 * Math.random() + 1), this._$element = c instanceof jQuery ? c : a(c), this._isBootstrap3 = 3 == a.fn.modal.Constructor.VERSION[0];
        var h = '<h4 class="modal-title">' + (this._config.title || "&nbsp;") + "</h4>",
            i = '<button type="button" class="close" data-dismiss="modal" aria-label="' + this._config.strings.close + '"><span aria-hidden="true">&times;</span></button>',
            j = '<div class="modal-header' + (this._config.title || this._config.alwaysShowClose ? "" : " hide") + '">' + (this._isBootstrap3 ? i + h : h + i) + "</div>",
            k = '<div class="modal-footer' + (this._config.footer ? "" : " hide") + '">' + (this._config.footer || "&nbsp;") + "</div>",
            l = '<div class="modal-body"><div class="ekko-lightbox-container"><div class="ekko-lightbox-item fade in show"></div><div class="ekko-lightbox-item fade"></div></div></div>',
            m = '<div class="modal-dialog" role="document"><div class="modal-content">' + j + l + k + "</div></div>";
        a(this._config.doc.body).append('<div id="' + this._modalId + '" class="ekko-lightbox modal fade" tabindex="-1" tabindex="-1" role="dialog" aria-hidden="true">' + m + "</div>"), this._$modal = a("#" + this._modalId, this._config.doc), this._$modalDialog = this._$modal.find(".modal-dialog").first(), this._$modalContent = this._$modal.find(".modal-content").first(), this._$modalBody = this._$modal.find(".modal-body").first(), this._$modalHeader = this._$modal.find(".modal-header").first(), this._$modalFooter = this._$modal.find(".modal-footer").first(), this._$lightboxContainer = this._$modalBody.find(".ekko-lightbox-container").first(), this._$lightboxBodyOne = this._$lightboxContainer.find("> div:first-child").first(), this._$lightboxBodyTwo = this._$lightboxContainer.find("> div:last-child").first(), this._border = this._calculateBorders(), this._padding = this._calculatePadding(), this._galleryName = this._$element.data("gallery"), this._galleryName && (this._$galleryItems = a(document.body).find('*[data-gallery="' + this._galleryName + '"]'), this._galleryIndex = this._$galleryItems.index(this._$element), a(document).on("keydown.ekkoLightbox", this._navigationalBinder.bind(this)), this._config.showArrows && this._$galleryItems.length > 1 && (this._$lightboxContainer.append('<div class="ekko-lightbox-nav-overlay"><a href="#">' + this._config.leftArrow + '</a><a href="#">' + this._config.rightArrow + "</a></div>"), this._$modalArrows = this._$lightboxContainer.find("div.ekko-lightbox-nav-overlay").first(), this._$lightboxContainer.on("click", "a:first-child", function (a) {
          return a.preventDefault(), g.navigateLeft();
        }), this._$lightboxContainer.on("click", "a:last-child", function (a) {
          return a.preventDefault(), g.navigateRight();
        }), this.updateNavigation())), this._$modal.on("show.bs.modal", this._config.onShow.bind(this)).on("shown.bs.modal", function () {
          return g._toggleLoading(!0), g._handle(), g._config.onShown.call(g);
        }).on("hide.bs.modal", this._config.onHide.bind(this)).on("hidden.bs.modal", function () {
          return g._galleryName && (a(document).off("keydown.ekkoLightbox"), a(window).off("resize.ekkoLightbox")), g._$modal.remove(), g._config.onHidden.call(g);
        }).modal(this._config), a(window).on("resize.ekkoLightbox", function () {
          g._resize(g._wantedWidth, g._wantedHeight);
        }), this._$lightboxContainer.on("touchstart", function () {
          g._touchstartX = event.changedTouches[0].screenX;
        }).on("touchend", function () {
          g._touchendX = event.changedTouches[0].screenX, g._swipeGesure();
        });
      }

      return c(d, null, [{
        key: "Default",
        get: function get() {
          return f;
        }
      }]), c(d, [{
        key: "element",
        value: function value() {
          return this._$element;
        }
      }, {
        key: "modal",
        value: function value() {
          return this._$modal;
        }
      }, {
        key: "navigateTo",
        value: function value(b) {
          return b < 0 || b > this._$galleryItems.length - 1 ? this : (this._galleryIndex = b, this.updateNavigation(), this._$element = a(this._$galleryItems.get(this._galleryIndex)), void this._handle());
        }
      }, {
        key: "navigateLeft",
        value: function value() {
          if (this._$galleryItems && 1 !== this._$galleryItems.length) {
            if (0 === this._galleryIndex) {
              if (!this._config.wrapping) return;
              this._galleryIndex = this._$galleryItems.length - 1;
            } else this._galleryIndex--;

            return this._config.onNavigate.call(this, "left", this._galleryIndex), this.navigateTo(this._galleryIndex);
          }
        }
      }, {
        key: "navigateRight",
        value: function value() {
          if (this._$galleryItems && 1 !== this._$galleryItems.length) {
            if (this._galleryIndex === this._$galleryItems.length - 1) {
              if (!this._config.wrapping) return;
              this._galleryIndex = 0;
            } else this._galleryIndex++;

            return this._config.onNavigate.call(this, "right", this._galleryIndex), this.navigateTo(this._galleryIndex);
          }
        }
      }, {
        key: "updateNavigation",
        value: function value() {
          if (!this._config.wrapping) {
            var a = this._$lightboxContainer.find("div.ekko-lightbox-nav-overlay");

            0 === this._galleryIndex ? a.find("a:first-child").addClass("disabled") : a.find("a:first-child").removeClass("disabled"), this._galleryIndex === this._$galleryItems.length - 1 ? a.find("a:last-child").addClass("disabled") : a.find("a:last-child").removeClass("disabled");
          }
        }
      }, {
        key: "close",
        value: function value() {
          return this._$modal.modal("hide");
        }
      }, {
        key: "_navigationalBinder",
        value: function value(a) {
          return a = a || window.event, 39 === a.keyCode ? this.navigateRight() : 37 === a.keyCode ? this.navigateLeft() : void 0;
        }
      }, {
        key: "_detectRemoteType",
        value: function value(a, b) {
          return b = b || !1, !b && this._isImage(a) && (b = "image"), !b && this._getYoutubeId(a) && (b = "youtube"), !b && this._getVimeoId(a) && (b = "vimeo"), !b && this._getInstagramId(a) && (b = "instagram"), (!b || ["image", "youtube", "vimeo", "instagram", "video", "url"].indexOf(b) < 0) && (b = "url"), b;
        }
      }, {
        key: "_isImage",
        value: function value(a) {
          return a && a.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i);
        }
      }, {
        key: "_containerToUse",
        value: function value() {
          var a = this,
              b = this._$lightboxBodyTwo,
              c = this._$lightboxBodyOne;
          return this._$lightboxBodyTwo.hasClass("in") && (b = this._$lightboxBodyOne, c = this._$lightboxBodyTwo), c.removeClass("in show"), setTimeout(function () {
            a._$lightboxBodyTwo.hasClass("in") || a._$lightboxBodyTwo.empty(), a._$lightboxBodyOne.hasClass("in") || a._$lightboxBodyOne.empty();
          }, 500), b.addClass("in show"), b;
        }
      }, {
        key: "_handle",
        value: function value() {
          var a = this._containerToUse();

          this._updateTitleAndFooter();

          var b = this._$element.attr("data-remote") || this._$element.attr("href"),
              c = this._detectRemoteType(b, this._$element.attr("data-type") || !1);

          if (["image", "youtube", "vimeo", "instagram", "video", "url"].indexOf(c) < 0) return this._error(this._config.strings.type);

          switch (c) {
            case "image":
              this._preloadImage(b, a), this._preloadImageByIndex(this._galleryIndex, 3);
              break;

            case "youtube":
              this._showYoutubeVideo(b, a);

              break;

            case "vimeo":
              this._showVimeoVideo(this._getVimeoId(b), a);

              break;

            case "instagram":
              this._showInstagramVideo(this._getInstagramId(b), a);

              break;

            case "video":
              this._showHtml5Video(b, a);

              break;

            default:
              this._loadRemoteContent(b, a);

          }

          return this;
        }
      }, {
        key: "_getYoutubeId",
        value: function value(a) {
          if (!a) return !1;
          var b = a.match(/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/);
          return !(!b || 11 !== b[2].length) && b[2];
        }
      }, {
        key: "_getVimeoId",
        value: function value(a) {
          return !!(a && a.indexOf("vimeo") > 0) && a;
        }
      }, {
        key: "_getInstagramId",
        value: function value(a) {
          return !!(a && a.indexOf("instagram") > 0) && a;
        }
      }, {
        key: "_toggleLoading",
        value: function value(b) {
          return b = b || !1, b ? (this._$modalDialog.css("display", "none"), this._$modal.removeClass("in show"), a(".modal-backdrop").append(this._config.loadingMessage)) : (this._$modalDialog.css("display", "block"), this._$modal.addClass("in show"), a(".modal-backdrop").find(".ekko-lightbox-loader").remove()), this;
        }
      }, {
        key: "_calculateBorders",
        value: function value() {
          return {
            top: this._totalCssByAttribute("border-top-width"),
            right: this._totalCssByAttribute("border-right-width"),
            bottom: this._totalCssByAttribute("border-bottom-width"),
            left: this._totalCssByAttribute("border-left-width")
          };
        }
      }, {
        key: "_calculatePadding",
        value: function value() {
          return {
            top: this._totalCssByAttribute("padding-top"),
            right: this._totalCssByAttribute("padding-right"),
            bottom: this._totalCssByAttribute("padding-bottom"),
            left: this._totalCssByAttribute("padding-left")
          };
        }
      }, {
        key: "_totalCssByAttribute",
        value: function value(a) {
          return parseInt(this._$modalDialog.css(a), 10) + parseInt(this._$modalContent.css(a), 10) + parseInt(this._$modalBody.css(a), 10);
        }
      }, {
        key: "_updateTitleAndFooter",
        value: function value() {
          var a = this._$element.data("title") || "",
              b = this._$element.data("footer") || "";
          return this._titleIsShown = !1, a || this._config.alwaysShowClose ? (this._titleIsShown = !0, this._$modalHeader.css("display", "").find(".modal-title").html(a || "&nbsp;")) : this._$modalHeader.css("display", "none"), this._footerIsShown = !1, b ? (this._footerIsShown = !0, this._$modalFooter.css("display", "").html(b)) : this._$modalFooter.css("display", "none"), this;
        }
      }, {
        key: "_showYoutubeVideo",
        value: function value(a, b) {
          var c = this._getYoutubeId(a),
              d = a.indexOf("&") > 0 ? a.substr(a.indexOf("&")) : "",
              e = this._$element.data("width") || 560,
              f = this._$element.data("height") || e / (560 / 315);

          return this._showVideoIframe("//www.youtube.com/embed/" + c + "?badge=0&autoplay=1&html5=1" + d, e, f, b);
        }
      }, {
        key: "_showVimeoVideo",
        value: function value(a, b) {
          var c = this._$element.data("width") || 500,
              d = this._$element.data("height") || c / (560 / 315);
          return this._showVideoIframe(a + "?autoplay=1", c, d, b);
        }
      }, {
        key: "_showInstagramVideo",
        value: function value(a, b) {
          var c = this._$element.data("width") || 612,
              d = c + 80;
          return a = "/" !== a.substr(-1) ? a + "/" : a, b.html('<iframe width="' + c + '" height="' + d + '" src="' + a + 'embed/" frameborder="0" allowfullscreen></iframe>'), this._resize(c, d), this._config.onContentLoaded.call(this), this._$modalArrows && this._$modalArrows.css("display", "none"), this._toggleLoading(!1), this;
        }
      }, {
        key: "_showVideoIframe",
        value: function value(a, b, c, d) {
          return c = c || b, d.html('<div class="embed-responsive embed-responsive-16by9"><iframe width="' + b + '" height="' + c + '" src="' + a + '" frameborder="0" allowfullscreen class="embed-responsive-item"></iframe></div>'), this._resize(b, c), this._config.onContentLoaded.call(this), this._$modalArrows && this._$modalArrows.css("display", "none"), this._toggleLoading(!1), this;
        }
      }, {
        key: "_showHtml5Video",
        value: function value(a, b) {
          var c = this._$element.data("width") || 560,
              d = this._$element.data("height") || c / (560 / 315);
          return b.html('<div class="embed-responsive embed-responsive-16by9"><video width="' + c + '" height="' + d + '" src="' + a + '" preload="auto" autoplay controls class="embed-responsive-item"></video></div>'), this._resize(c, d), this._config.onContentLoaded.call(this), this._$modalArrows && this._$modalArrows.css("display", "none"), this._toggleLoading(!1), this;
        }
      }, {
        key: "_loadRemoteContent",
        value: function value(b, c) {
          var d = this,
              e = this._$element.data("width") || 560,
              f = this._$element.data("height") || 560,
              g = this._$element.data("disableExternalCheck") || !1;
          return this._toggleLoading(!1), g || this._isExternal(b) ? (c.html('<iframe src="' + b + '" frameborder="0" allowfullscreen></iframe>'), this._config.onContentLoaded.call(this)) : c.load(b, a.proxy(function () {
            return d._$element.trigger("loaded.bs.modal");
          })), this._$modalArrows && this._$modalArrows.css("display", "none"), this._resize(e, f), this;
        }
      }, {
        key: "_isExternal",
        value: function value(a) {
          var b = a.match(/^([^:\/?#]+:)?(?:\/\/([^\/?#]*))?([^?#]+)?(\?[^#]*)?(#.*)?/);
          return "string" == typeof b[1] && b[1].length > 0 && b[1].toLowerCase() !== location.protocol || "string" == typeof b[2] && b[2].length > 0 && b[2].replace(new RegExp(":(" + {
            "http:": 80,
            "https:": 443
          }[location.protocol] + ")?$"), "") !== location.host;
        }
      }, {
        key: "_error",
        value: function value(a) {
          return console.error(a), this._containerToUse().html(a), this._resize(300, 300), this;
        }
      }, {
        key: "_preloadImageByIndex",
        value: function value(b, c) {
          if (this._$galleryItems) {
            var d = a(this._$galleryItems.get(b), !1);

            if ("undefined" != typeof d) {
              var e = d.attr("data-remote") || d.attr("href");
              return ("image" === d.attr("data-type") || this._isImage(e)) && this._preloadImage(e, !1), c > 0 ? this._preloadImageByIndex(b + 1, c - 1) : void 0;
            }
          }
        }
      }, {
        key: "_preloadImage",
        value: function value(b, c) {
          var d = this;
          c = c || !1;
          var e = new Image();
          return c && !function () {
            var f = setTimeout(function () {
              c.append(d._config.loadingMessage);
            }, 200);
            e.onload = function () {
              f && clearTimeout(f), f = null;
              var b = a("<img />");
              return b.attr("src", e.src), b.addClass("img-fluid"), b.css("width", "100%"), c.html(b), d._$modalArrows && d._$modalArrows.css("display", ""), d._resize(e.width, e.height), d._toggleLoading(!1), d._config.onContentLoaded.call(d);
            }, e.onerror = function () {
              return d._toggleLoading(!1), d._error(d._config.strings.fail + ("  " + b));
            };
          }(), e.src = b, e;
        }
      }, {
        key: "_swipeGesure",
        value: function value() {
          return this._touchendX < this._touchstartX ? this.navigateRight() : this._touchendX > this._touchstartX ? this.navigateLeft() : void 0;
        }
      }, {
        key: "_resize",
        value: function value(b, c) {
          c = c || b, this._wantedWidth = b, this._wantedHeight = c;
          var d = b / c,
              e = this._padding.left + this._padding.right + this._border.left + this._border.right,
              f = this._config.doc.body.clientWidth > 575 ? 20 : 0,
              g = this._config.doc.body.clientWidth > 575 ? 0 : 20,
              h = Math.min(b + e, this._config.doc.body.clientWidth - f, this._config.maxWidth);
          b + e > h ? (c = (h - e - g) / d, b = h) : b += e;
          var i = 0,
              j = 0;
          this._footerIsShown && (j = this._$modalFooter.outerHeight(!0) || 55), this._titleIsShown && (i = this._$modalHeader.outerHeight(!0) || 67);
          var k = this._padding.top + this._padding.bottom + this._border.bottom + this._border.top,
              l = parseFloat(this._$modalDialog.css("margin-top")) + parseFloat(this._$modalDialog.css("margin-bottom")),
              m = Math.min(c, a(window).height() - k - l - i - j, this._config.maxHeight - k - i - j);
          c > m && (b = Math.ceil(m * d) + e), this._$lightboxContainer.css("height", m), this._$modalDialog.css("flex", 1).css("maxWidth", b);

          var n = this._$modal.data("bs.modal");

          if (n) try {
            n._handleUpdate();
          } catch (o) {
            n.handleUpdate();
          }
          return this;
        }
      }], [{
        key: "_jQueryInterface",
        value: function value(b) {
          var c = this;
          return b = b || {}, this.each(function () {
            var e = a(c),
                f = a.extend({}, d.Default, e.data(), "object" == _typeof(b) && b);
            new d(c, f);
          });
        }
      }]), d;
    }();

    return a.fn[d] = g._jQueryInterface, a.fn[d].Constructor = g, a.fn[d].noConflict = function () {
      return a.fn[d] = e, g._jQueryInterface;
    }, g;
  })(jQuery);
}(jQuery);

/***/ }),

/***/ "./resources/js/script.js":
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// change background for navbar when scrolling down
$(function () {
  $(document).scroll(function () {
    var $nav = $(".fixed-top");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  }); // handle links with @href started with '#' only

  $(document).on('click', 'a[href^="#"]', function (e) {
    // target element id
    var id = $(this).attr('href'); // target element

    var $id = $(id);

    if ($id.length === 0) {
      return;
    } // prevent standard hash navigation (avoid blinking in IE)


    e.preventDefault(); // top position relative to the document

    var pos = $id.offset().top - 50; // animated top scrolling

    $('body, html').animate({
      scrollTop: pos
    }).offset();
  }); //

  var btn = $('#button');
  $(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });
  btn.on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, '300');
  }); //

  $(document).on('click', '.navbar-collapse', function (e) {
    if ($(e.target).is('a')) {
      $(this).collapse('hide');
    }
  });
  $(document).on('click', '.deleteCategory', function () {
    var categoryId = $(this).attr('data-categoryid');
    $('#modelToDeleteId').val(categoryId);
    $('#deleteModal').modal('show');
  });
  $(document).on('click', '.deleteImage', function () {
    var imageId = $(this).attr('data-imageid');
    $('#modelToDeleteId').val(imageId);
    $('#deleteModal').modal('show');
  });
  $(document).on('click', '[data-toggle="lightbox"]', function (event) {
    event.preventDefault();
    $(this).ekkoLightbox({
      alwaysShowClose: false
    });
  });
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/linardslazdins/Development/sites/yvettaphoto/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /Users/linardslazdins/Development/sites/yvettaphoto/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });