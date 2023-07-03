<script>
  const galleryImages = document.querySelectorAll('.gallery-image');
  galleryImages.forEach((image) => {
    image.addEventListener('load', () => {
      const grid = document.querySelector(".grid");
      const masonry = new Masonry(grid, {
        itemSelector: ".grid-item",
        columnWidth: ".grid-sizer",
        gutter: 35,
        percentPosition: true
      });
    })
  });
</script>
