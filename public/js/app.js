!function(t){var e={};function i(o){if(e[o])return e[o].exports;var n=e[o]={i:o,l:!1,exports:{}};return t[o].call(n.exports,n,n.exports,i),n.l=!0,n.exports}i.m=t,i.c=e,i.d=function(t,e,o){i.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:o})},i.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},i.t=function(t,e){if(1&e&&(t=i(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var o=Object.create(null);if(i.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var n in t)i.d(o,n,function(e){return t[e]}.bind(null,n));return o},i.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return i.d(e,"a",e),e},i.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},i.p="/",i(i.s=0)}([function(t,e,i){i(1),t.exports=i(4)},function(t,e,i){i(2),i(3)},function(t,e){function i(t){return(i="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}!function(t){"use strict";var e=function(){function t(t,e){for(var i=0;i<e.length;i++){var o=e[i];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}return function(e,i,o){return i&&t(e.prototype,i),o&&t(e,o),e}}();!function(t){var o="ekkoLightbox",n=t.fn[o],a={title:"",footer:"",maxWidth:9999,maxHeight:9999,showArrows:!0,wrapping:!0,type:null,alwaysShowClose:!1,loadingMessage:'<div class="ekko-lightbox-loader"><div><div></div><div></div></div></div>',leftArrow:"<span>&#10094;</span>",rightArrow:"<span>&#10095;</span>",strings:{close:"Close",fail:"Failed to load image:",type:"Could not detect remote target type. Force the type using data-type"},doc:document,onShow:function(){},onShown:function(){},onHide:function(){},onHidden:function(){},onNavigate:function(){},onContentLoaded:function(){}},s=function(){function o(e,i){var n=this;(function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")})(this,o),this._config=t.extend({},a,i),this._$modalArrows=null,this._galleryIndex=0,this._galleryName=null,this._padding=null,this._border=null,this._titleIsShown=!1,this._footerIsShown=!1,this._wantedWidth=0,this._wantedHeight=0,this._touchstartX=0,this._touchendX=0,this._modalId="ekkoLightbox-"+Math.floor(1e3*Math.random()+1),this._$element=e instanceof jQuery?e:t(e),this._isBootstrap3=3==t.fn.modal.Constructor.VERSION[0];var s='<h4 class="modal-title">'+(this._config.title||"&nbsp;")+"</h4>",l='<button type="button" class="close" data-dismiss="modal" aria-label="'+this._config.strings.close+'"><span aria-hidden="true">&times;</span></button>',r='<div class="modal-dialog" role="document"><div class="modal-content">'+('<div class="modal-header'+(this._config.title||this._config.alwaysShowClose?"":" hide")+'">'+(this._isBootstrap3?l+s:s+l)+"</div>")+'<div class="modal-body"><div class="ekko-lightbox-container"><div class="ekko-lightbox-item fade in show"></div><div class="ekko-lightbox-item fade"></div></div></div>'+('<div class="modal-footer'+(this._config.footer?"":" hide")+'">'+(this._config.footer||"&nbsp;")+"</div>")+"</div></div>";t(this._config.doc.body).append('<div id="'+this._modalId+'" class="ekko-lightbox modal fade" tabindex="-1" tabindex="-1" role="dialog" aria-hidden="true">'+r+"</div>"),this._$modal=t("#"+this._modalId,this._config.doc),this._$modalDialog=this._$modal.find(".modal-dialog").first(),this._$modalContent=this._$modal.find(".modal-content").first(),this._$modalBody=this._$modal.find(".modal-body").first(),this._$modalHeader=this._$modal.find(".modal-header").first(),this._$modalFooter=this._$modal.find(".modal-footer").first(),this._$lightboxContainer=this._$modalBody.find(".ekko-lightbox-container").first(),this._$lightboxBodyOne=this._$lightboxContainer.find("> div:first-child").first(),this._$lightboxBodyTwo=this._$lightboxContainer.find("> div:last-child").first(),this._border=this._calculateBorders(),this._padding=this._calculatePadding(),this._galleryName=this._$element.data("gallery"),this._galleryName&&(this._$galleryItems=t(document.body).find('*[data-gallery="'+this._galleryName+'"]'),this._galleryIndex=this._$galleryItems.index(this._$element),t(document).on("keydown.ekkoLightbox",this._navigationalBinder.bind(this)),this._config.showArrows&&this._$galleryItems.length>1&&(this._$lightboxContainer.append('<div class="ekko-lightbox-nav-overlay"><a href="#">'+this._config.leftArrow+'</a><a href="#">'+this._config.rightArrow+"</a></div>"),this._$modalArrows=this._$lightboxContainer.find("div.ekko-lightbox-nav-overlay").first(),this._$lightboxContainer.on("click","a:first-child",(function(t){return t.preventDefault(),n.navigateLeft()})),this._$lightboxContainer.on("click","a:last-child",(function(t){return t.preventDefault(),n.navigateRight()})),this.updateNavigation())),this._$modal.on("show.bs.modal",this._config.onShow.bind(this)).on("shown.bs.modal",(function(){return n._toggleLoading(!0),n._handle(),n._config.onShown.call(n)})).on("hide.bs.modal",this._config.onHide.bind(this)).on("hidden.bs.modal",(function(){return n._galleryName&&(t(document).off("keydown.ekkoLightbox"),t(window).off("resize.ekkoLightbox")),n._$modal.remove(),n._config.onHidden.call(n)})).modal(this._config),t(window).on("resize.ekkoLightbox",(function(){n._resize(n._wantedWidth,n._wantedHeight)})),this._$lightboxContainer.on("touchstart",(function(){n._touchstartX=event.changedTouches[0].screenX})).on("touchend",(function(){n._touchendX=event.changedTouches[0].screenX,n._swipeGesure()}))}return e(o,null,[{key:"Default",get:function(){return a}}]),e(o,[{key:"element",value:function(){return this._$element}},{key:"modal",value:function(){return this._$modal}},{key:"navigateTo",value:function(e){return e<0||e>this._$galleryItems.length-1?this:(this._galleryIndex=e,this.updateNavigation(),this._$element=t(this._$galleryItems.get(this._galleryIndex)),void this._handle())}},{key:"navigateLeft",value:function(){if(this._$galleryItems&&1!==this._$galleryItems.length){if(0===this._galleryIndex){if(!this._config.wrapping)return;this._galleryIndex=this._$galleryItems.length-1}else this._galleryIndex--;return this._config.onNavigate.call(this,"left",this._galleryIndex),this.navigateTo(this._galleryIndex)}}},{key:"navigateRight",value:function(){if(this._$galleryItems&&1!==this._$galleryItems.length){if(this._galleryIndex===this._$galleryItems.length-1){if(!this._config.wrapping)return;this._galleryIndex=0}else this._galleryIndex++;return this._config.onNavigate.call(this,"right",this._galleryIndex),this.navigateTo(this._galleryIndex)}}},{key:"updateNavigation",value:function(){if(!this._config.wrapping){var t=this._$lightboxContainer.find("div.ekko-lightbox-nav-overlay");0===this._galleryIndex?t.find("a:first-child").addClass("disabled"):t.find("a:first-child").removeClass("disabled"),this._galleryIndex===this._$galleryItems.length-1?t.find("a:last-child").addClass("disabled"):t.find("a:last-child").removeClass("disabled")}}},{key:"close",value:function(){return this._$modal.modal("hide")}},{key:"_navigationalBinder",value:function(t){return 39===(t=t||window.event).keyCode?this.navigateRight():37===t.keyCode?this.navigateLeft():void 0}},{key:"_detectRemoteType",value:function(t,e){return!(e=e||!1)&&this._isImage(t)&&(e="image"),!e&&this._getYoutubeId(t)&&(e="youtube"),!e&&this._getVimeoId(t)&&(e="vimeo"),!e&&this._getInstagramId(t)&&(e="instagram"),(!e||["image","youtube","vimeo","instagram","video","url"].indexOf(e)<0)&&(e="url"),e}},{key:"_isImage",value:function(t){return t&&t.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i)}},{key:"_containerToUse",value:function(){var t=this,e=this._$lightboxBodyTwo,i=this._$lightboxBodyOne;return this._$lightboxBodyTwo.hasClass("in")&&(e=this._$lightboxBodyOne,i=this._$lightboxBodyTwo),i.removeClass("in show"),setTimeout((function(){t._$lightboxBodyTwo.hasClass("in")||t._$lightboxBodyTwo.empty(),t._$lightboxBodyOne.hasClass("in")||t._$lightboxBodyOne.empty()}),500),e.addClass("in show"),e}},{key:"_handle",value:function(){var t=this._containerToUse();this._updateTitleAndFooter();var e=this._$element.attr("data-remote")||this._$element.attr("href"),i=this._detectRemoteType(e,this._$element.attr("data-type")||!1);if(["image","youtube","vimeo","instagram","video","url"].indexOf(i)<0)return this._error(this._config.strings.type);switch(i){case"image":this._preloadImage(e,t),this._preloadImageByIndex(this._galleryIndex,3);break;case"youtube":this._showYoutubeVideo(e,t);break;case"vimeo":this._showVimeoVideo(this._getVimeoId(e),t);break;case"instagram":this._showInstagramVideo(this._getInstagramId(e),t);break;case"video":this._showHtml5Video(e,t);break;default:this._loadRemoteContent(e,t)}return this}},{key:"_getYoutubeId",value:function(t){if(!t)return!1;var e=t.match(/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/);return!(!e||11!==e[2].length)&&e[2]}},{key:"_getVimeoId",value:function(t){return!!(t&&t.indexOf("vimeo")>0)&&t}},{key:"_getInstagramId",value:function(t){return!!(t&&t.indexOf("instagram")>0)&&t}},{key:"_toggleLoading",value:function(e){return(e=e||!1)?(this._$modalDialog.css("display","none"),this._$modal.removeClass("in show"),t(".modal-backdrop").append(this._config.loadingMessage)):(this._$modalDialog.css("display","block"),this._$modal.addClass("in show"),t(".modal-backdrop").find(".ekko-lightbox-loader").remove()),this}},{key:"_calculateBorders",value:function(){return{top:this._totalCssByAttribute("border-top-width"),right:this._totalCssByAttribute("border-right-width"),bottom:this._totalCssByAttribute("border-bottom-width"),left:this._totalCssByAttribute("border-left-width")}}},{key:"_calculatePadding",value:function(){return{top:this._totalCssByAttribute("padding-top"),right:this._totalCssByAttribute("padding-right"),bottom:this._totalCssByAttribute("padding-bottom"),left:this._totalCssByAttribute("padding-left")}}},{key:"_totalCssByAttribute",value:function(t){return parseInt(this._$modalDialog.css(t),10)+parseInt(this._$modalContent.css(t),10)+parseInt(this._$modalBody.css(t),10)}},{key:"_updateTitleAndFooter",value:function(){var t=this._$element.data("title")||"",e=this._$element.data("footer")||"";return this._titleIsShown=!1,t||this._config.alwaysShowClose?(this._titleIsShown=!0,this._$modalHeader.css("display","").find(".modal-title").html(t||"&nbsp;")):this._$modalHeader.css("display","none"),this._footerIsShown=!1,e?(this._footerIsShown=!0,this._$modalFooter.css("display","").html(e)):this._$modalFooter.css("display","none"),this}},{key:"_showYoutubeVideo",value:function(t,e){var i=this._getYoutubeId(t),o=t.indexOf("&")>0?t.substr(t.indexOf("&")):"",n=this._$element.data("width")||560,a=this._$element.data("height")||n/(560/315);return this._showVideoIframe("//www.youtube.com/embed/"+i+"?badge=0&autoplay=1&html5=1"+o,n,a,e)}},{key:"_showVimeoVideo",value:function(t,e){var i=this._$element.data("width")||500,o=this._$element.data("height")||i/(560/315);return this._showVideoIframe(t+"?autoplay=1",i,o,e)}},{key:"_showInstagramVideo",value:function(t,e){var i=this._$element.data("width")||612,o=i+80;return t="/"!==t.substr(-1)?t+"/":t,e.html('<iframe width="'+i+'" height="'+o+'" src="'+t+'embed/" frameborder="0" allowfullscreen></iframe>'),this._resize(i,o),this._config.onContentLoaded.call(this),this._$modalArrows&&this._$modalArrows.css("display","none"),this._toggleLoading(!1),this}},{key:"_showVideoIframe",value:function(t,e,i,o){return i=i||e,o.html('<div class="embed-responsive embed-responsive-16by9"><iframe width="'+e+'" height="'+i+'" src="'+t+'" frameborder="0" allowfullscreen class="embed-responsive-item"></iframe></div>'),this._resize(e,i),this._config.onContentLoaded.call(this),this._$modalArrows&&this._$modalArrows.css("display","none"),this._toggleLoading(!1),this}},{key:"_showHtml5Video",value:function(t,e){var i=this._$element.data("width")||560,o=this._$element.data("height")||i/(560/315);return e.html('<div class="embed-responsive embed-responsive-16by9"><video width="'+i+'" height="'+o+'" src="'+t+'" preload="auto" autoplay controls class="embed-responsive-item"></video></div>'),this._resize(i,o),this._config.onContentLoaded.call(this),this._$modalArrows&&this._$modalArrows.css("display","none"),this._toggleLoading(!1),this}},{key:"_loadRemoteContent",value:function(e,i){var o=this,n=this._$element.data("width")||560,a=this._$element.data("height")||560,s=this._$element.data("disableExternalCheck")||!1;return this._toggleLoading(!1),s||this._isExternal(e)?(i.html('<iframe src="'+e+'" frameborder="0" allowfullscreen></iframe>'),this._config.onContentLoaded.call(this)):i.load(e,t.proxy((function(){return o._$element.trigger("loaded.bs.modal")}))),this._$modalArrows&&this._$modalArrows.css("display","none"),this._resize(n,a),this}},{key:"_isExternal",value:function(t){var e=t.match(/^([^:\/?#]+:)?(?:\/\/([^\/?#]*))?([^?#]+)?(\?[^#]*)?(#.*)?/);return"string"==typeof e[1]&&e[1].length>0&&e[1].toLowerCase()!==location.protocol||"string"==typeof e[2]&&e[2].length>0&&e[2].replace(new RegExp(":("+{"http:":80,"https:":443}[location.protocol]+")?$"),"")!==location.host}},{key:"_error",value:function(t){return console.error(t),this._containerToUse().html(t),this._resize(300,300),this}},{key:"_preloadImageByIndex",value:function(e,i){if(this._$galleryItems){var o=t(this._$galleryItems.get(e),!1);if(void 0!==o){var n=o.attr("data-remote")||o.attr("href");return("image"===o.attr("data-type")||this._isImage(n))&&this._preloadImage(n,!1),i>0?this._preloadImageByIndex(e+1,i-1):void 0}}}},{key:"_preloadImage",value:function(e,i){var o=this;i=i||!1;var n=new Image;return i&&function(){var a=setTimeout((function(){i.append(o._config.loadingMessage)}),200);n.onload=function(){a&&clearTimeout(a),a=null;var e=t("<img />");return e.attr("src",n.src),e.addClass("img-fluid"),e.css("width","100%"),i.html(e),o._$modalArrows&&o._$modalArrows.css("display",""),o._resize(n.width,n.height),o._toggleLoading(!1),o._config.onContentLoaded.call(o)},n.onerror=function(){return o._toggleLoading(!1),o._error(o._config.strings.fail+"  "+e)}}(),n.src=e,n}},{key:"_swipeGesure",value:function(){return this._touchendX<this._touchstartX?this.navigateRight():this._touchendX>this._touchstartX?this.navigateLeft():void 0}},{key:"_resize",value:function(e,i){i=i||e,this._wantedWidth=e,this._wantedHeight=i;var o=e/i,n=this._padding.left+this._padding.right+this._border.left+this._border.right,a=this._config.doc.body.clientWidth>575?20:0,s=this._config.doc.body.clientWidth>575?0:20,l=Math.min(e+n,this._config.doc.body.clientWidth-a,this._config.maxWidth);e+n>l?(i=(l-n-s)/o,e=l):e+=n;var r=0,d=0;this._footerIsShown&&(d=this._$modalFooter.outerHeight(!0)||55),this._titleIsShown&&(r=this._$modalHeader.outerHeight(!0)||67);var h=this._padding.top+this._padding.bottom+this._border.bottom+this._border.top,c=parseFloat(this._$modalDialog.css("margin-top"))+parseFloat(this._$modalDialog.css("margin-bottom")),u=Math.min(i,t(window).height()-h-c-r-d,this._config.maxHeight-h-r-d);i>u&&(e=Math.ceil(u*o)+n),this._$lightboxContainer.css("height",u),this._$modalDialog.css("flex",1).css("maxWidth",e);var g=this._$modal.data("bs.modal");if(g)try{g._handleUpdate()}catch(t){g.handleUpdate()}return this}}],[{key:"_jQueryInterface",value:function(e){var n=this;return e=e||{},this.each((function(){var a=t(n),s=t.extend({},o.Default,a.data(),"object"==i(e)&&e);new o(n,s)}))}}]),o}();t.fn[o]=s._jQueryInterface,t.fn[o].Constructor=s,t.fn[o].noConflict=function(){return t.fn[o]=n,s._jQueryInterface}}(jQuery)}(jQuery)},function(t,e){$((function(){$(document).scroll((function(){var t=$(".fixed-top");t.toggleClass("scrolled",$(this).scrollTop()>t.height())})),$(document).on("click",'a[href^="#"]',(function(t){var e=$(this).attr("href"),i=$(e);if(0!==i.length){t.preventDefault();var o=i.offset().top-50;$("body, html").animate({scrollTop:o}).offset()}}));var t=$("#button");$(window).scroll((function(){$(window).scrollTop()>300?t.addClass("show"):t.removeClass("show")})),t.on("click",(function(t){t.preventDefault(),$("html, body").animate({scrollTop:0},"300")})),$(document).on("click",".navbar-collapse",(function(t){$(t.target).is("a")&&$(this).collapse("hide")})),$(document).on("click",".deleteCategory",(function(){var t=$(this).attr("data-categoryid");$("#modelToDeleteId").val(t),$("#deleteModal").modal("show")})),$(document).on("click",".deleteImage",(function(){var t=$(this).attr("data-imageid");$("#modelToDeleteId").val(t),$("#deleteModal").modal("show")})),$(document).on("click",'[data-toggle="lightbox"]',(function(t){t.preventDefault(),$(this).ekkoLightbox({alwaysShowClose:!0})}))}))},function(t,e){}]);