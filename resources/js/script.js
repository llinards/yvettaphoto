// change background for navbar when scrolling down
$(function () {

  var btn = $("#button-up");
  $(window).scroll(function () {
    if ($(window).scrollTop() > 100) {
      btn.addClass("show");
    } else {
      btn.removeClass("show");
    }
  });

  btn.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate(
      {
        scrollTop: 0
      },
      "300"
    );
  });
  //

  const menu = document.querySelector(".navbar-toggler") || null;
  if (menu != null) {
    menu.addEventListener("click", () => {
      for (let child of menu.children) {
        child.classList.toggle("change");
      }
    });
  }

  const bioReadMore = document.getElementById("read-more-bio-btn") || null;
  if (bioReadMore != null) {
    bioReadMore.addEventListener("click", () => {
      let isExpanded = bioReadMore.getAttribute("aria-expanded");
      if (isExpanded == "false") {
        bioReadMore.textContent = "Close";
      } else {
        bioReadMore.textContent = "Read More";
      }
    });
  }

  const documentHeight = () => {
    const doc = document.documentElement
    doc.style.setProperty('--doc-height', `${window.innerHeight}px`)
  }
  window.addEventListener('resize', documentHeight)
  documentHeight()

});


