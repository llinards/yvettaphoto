// change background for navbar when scrolling down
$(function () {
  // handle links with @href started with '#' only
  $(document).on("click", 'a[href^="#"]', function (e) {
    // target element id
    var id = $(this).attr("href");

    // target element
    var $id = $(id);
    if ($id.length === 0) {
      return;
    }

    // prevent standard hash navigation (avoid blinking in IE)
    e.preventDefault();

    // top position relative to the document
    var pos = $id.offset().top;

    // animated top scrolling
    $("body, html")
      .animate({
        scrollTop: pos
      })
      .offset();
  });

  //
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
  $(document).on("click", ".navbar-collapse", function (e) {
    if ($(e.target).is("a")) {
      $(this).collapse("hide");
    }
  });

  $(document).on("click", ".deleteImage", function () {
    var imageId = $(this).attr("data-imageid");
    $("#modelToDeleteId").val(imageId);
    $("#deleteModal").modal("show");
  });

  $(document).on("click", '[data-toggle="lightbox"]', function (event) {
    event.preventDefault();
    $(this).ekkoLightbox({
      alwaysShowClose: false
    });
  });

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


