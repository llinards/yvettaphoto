<template>
  <div>
    <section class="py-5" id="photos">
      <div class="container-fluid">
        <div class="row mt-5 justify-content-center">
          <div class="heading">
            <h1 class="display-4 text-uppercase text-center main__headings">
              {{ categoryName }}
            </h1>
            <div class="underline"></div>
          </div>
        </div>
        <div class="container" v-if="categoryDescription">
          <div class="row pt-3 justify-content-center">
            <div class="lead text-justify description__p">
              <span v-html="categoryDescription"></span>
            </div>
          </div>
        </div>
        <div v-if="images" class="row pt-3 grid">
          <div v-for="image in images" class="grid-item" v-bind:key="image.id">
            <a v-bind:href="'/storage/' + image.image_name">
              <img
                class="img-fluid"
                v-bind:src="'/storage/' + image.image_name"
              />
            </a>
          </div>
        </div>
        <div v-else>
          <p>No pictures found!</p>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
import Masonry from "masonry-layout";
import imagesLoaded from "imagesloaded";
export default {
  props: ["category"],
  data() {
    return {
      categoryName: "",
      categoryDescription: "",
      images: {},
    };
  },
  created() {
    axios.get(`/api/${this.category}`).then((response) => {
      this.categoryName = response.data[1].name;
      this.categoryDescription = response.data[1].description;
      this.images = response.data[0];
    });
  },
  mounted() {
    setTimeout(function () {
      const grid = document.querySelector(".grid");
      const masonry = new Masonry(grid, {
        itemSelector: ".grid-item",
        gutter: 35,
        fitWidth: true,
        originLeft: false,
      });
    }, 3000);
  },
};
</script>