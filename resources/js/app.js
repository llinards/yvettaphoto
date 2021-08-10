require("./bootstrap");
require("./ekko-lightbox");
require("./script");

import Vue from "vue";

Vue.component(
  "category-photos",
  require("./components/CategoryPhotos.vue").default
);

const app = new Vue({
  el: "#app"
});
