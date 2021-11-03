<template>
  <div>
    <section class="py-5" id="photos">
      <div class="container-fluid">
        <div class="heading d-flex align-items-center justify-content-around">
          <div class="underline"></div>
          <h1 class="text-uppercase text-center main-header">
            {{ categoryName }}
          </h1>
          <div class="underline"></div>
        </div>
        <div class="container" v-if="categoryDescription">
          <div class="row mx-auto">
            <div class="lead main-text">
              <span v-html="categoryDescription"></span>
            </div>
          </div>
        </div>
        <div class="container">
          <div v-if="images" class="row pt-3 grid mx-auto">
            <div class="grid-sizer"></div>
            <div
              v-for="image in images"
              class="grid-item"
              v-bind:key="image.id"
            >
              <a
                data-toggle="lightbox"
                :data-gallery="categoryName"
                v-bind:href="'/storage/' + image.image_name"
              >
                <img
                  class="img-fluid"
                  v-bind:src="'/storage/' + image.image_name"
                  @load="reloadGrid"
                />
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
export default {
  props: ["category"],
  data() {
    return {
      categoryName: "",
      categoryDescription: "",
      images: []
    };
  },
  methods: {
    reloadGrid() {
      const grid = document.querySelector(".grid");
      const masonry = new Masonry(grid, {
        itemSelector: ".grid-item",
        columnWidth: ".grid-sizer",
        gutter: 35,
        percentPosition: true
      });
    }
  },
  created() {
    axios.get(`/api/${this.category}`).then(response => {
      this.categoryName = response.data[1].name;
      this.categoryDescription = response.data[1].description;
      this.images = response.data[0];
    });
  },
  mounted() {}
};
</script>
