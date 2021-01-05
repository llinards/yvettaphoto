<template>
  <div>
    <section class="py-5" id="photos">
      <div class="loading" v-if="loading"></div>
      <div class="container-fluid" v-bind:class="loading ? 'd-none' : ''">
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
        <div class="row pt-3 images-container grid">
          <div v-if="images">
            <div
              class="image grid-item"
              v-for="image in images"
              v-bind:key="image.id"
            >
              <a
                data-toggle="lightbox"
                data-gallery="photos"
                v-bind:href="'/storage/' + image.image_name"
              >
                <img v-bind:src="'/storage/' + image.image_name" />
              </a>
            </div>
          </div>
          <div v-else>
            <p>No pictures found!</p>
          </div>
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
      loading: true,
    };
  },
  created() {},
  mounted() {
    axios.get(`/api/${this.category}`).then((response) => {
      this.categoryName = response.data[1].name;
      this.categoryDescription = response.data[1].description;
      this.images = response.data[0];
      imagesLoaded(document.querySelector(".grid"), function (instance) {
        const grid = document.querySelector(".grid");
        const masonry = new Masonry(grid, {
          itemSelector: ".grid-item",
          gutter: 5,
          fitWidth: true,
        });
      });
      // this.loading = false;
    });
  },
};
</script>