// Owl generates its controls dynamically; label them after every rebuild.
jQuery(document).on('initialized.owl.carousel refreshed.owl.carousel translated.owl.carousel', '.owl-carousel', function () {
  const carousel = this;
  carousel.querySelectorAll('.owl-dot').forEach(function (button, index) {
    button.setAttribute('aria-label', 'Go to slide ' + (index + 1));
    button.setAttribute('aria-current', button.classList.contains('active') ? 'true' : 'false');
  });
  [['.owl-prev', 'Previous slides'], ['.owl-next', 'Next slides']].forEach(function (entry) {
    carousel.querySelectorAll(entry[0]).forEach(function (button) {
      button.removeAttribute('role');
      button.setAttribute('aria-label', entry[1]);
    });
  });
});
jQuery(function ($) {
  if (!$.fn.owlCarousel) {
    return;
  }

  const socialSlider = $('.social-slider');
  const adSlider = $('.ad-slider1');

  if (socialSlider.length) {
    socialSlider.owlCarousel({
      loop: true,
      nav: false,
      prev: true,
      next: true,
      dot: false,
      animateOut: 'fadeOut',
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      smartSpeed: 900,

      responsive: {
        0: {
          items: 4,
          margin: 10
        },
        600: {
          items: 6,
          margin: 10
        },
        1000: {
          items: 1
        },
        1024: {
          items: 6,
        }

      }
    });
  }

  if (adSlider.length) {
    adSlider.owlCarousel({
      loop: true,
      nav: false,
      prev: true,
      next: true,
      dot: false,
      animateOut: 'fadeOut',
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      smartSpeed: 900,

      responsive: {
        0: {
          items: 2,
          margin: 10
        },
        600: {
          items: 2,
          margin: 10
        },
        1000: {
          items: 2
        },
        1024: {
          items: 2,
          margin: 10
        }

      }
    });
  }
});

if (window.AOS) {
  AOS.init({
    once: true,
    mirror: false,
    duration: 700,
    delay: 0,
    disable: function () {
      return window.innerWidth < 768;
    }
  });
}


// menu js 

const menu = document.querySelector(".menu");
const menuMain = menu ? menu.querySelector(".menu-main") : null;
const goBack = menu ? menu.querySelector(".go-back") : null;
const menuTrigger = document.querySelector(".mobile-menu-trigger");
const closeMenu = menu ? menu.querySelector(".mobile-menu-close") : null;
const menuOverlay = document.querySelector(".menu-overlay");
let subMenu;

if (menu && menuMain && goBack && menuTrigger && closeMenu && menuOverlay) {
  menuMain.addEventListener("click", (e) => {
    if (!menu.classList.contains("active")) {
      return;
    }
    if (e.target.closest(".menu-item-has-children")) {
      const hasChildren = e.target.closest(".menu-item-has-children");
      showSubMenu(hasChildren);
    }
  });
  goBack.addEventListener("click", () => {
    hideSubMenu();
  })
  menuTrigger.addEventListener("click", () => {
    toggleMenu();
  })
  closeMenu.addEventListener("click", () => {
    toggleMenu();
  })
  menuOverlay.addEventListener("click", () => {
    toggleMenu();
  })

  window.addEventListener("resize", function () {
    if (window.innerWidth > 991 && menu.classList.contains("active")) {
      toggleMenu();
    }
  });
}

function toggleMenu() {
  menu.classList.toggle("active");
  menuOverlay.classList.toggle("active");
}
function showSubMenu(hasChildren) {
  subMenu = hasChildren.querySelector(".sub-menu");
  if (!subMenu) {
    return;
  }

  subMenu.classList.add("active");
  subMenu.style.animation = "slideLeft 0.5s ease forwards";
  const menuTitle = hasChildren.querySelector("i").parentNode.childNodes[0].textContent;
  menu.querySelector(".current-menu-title").innerHTML = menuTitle;
  menu.querySelector(".mobile-menu-head").classList.add("active");
}

function hideSubMenu() {
  if (!subMenu) {
    return;
  }

  subMenu.style.animation = "slideRight 0.5s ease forwards";
  setTimeout(() => {
    subMenu.classList.remove("active");
  }, 300);
  menu.querySelector(".current-menu-title").innerHTML = "";
  menu.querySelector(".mobile-menu-head").classList.remove("active");
}

//  cursor js 

const cursor = document.querySelector("#cursor");
const cursorBorder = document.querySelector("#cursor-border");
const cursorAllowed = window.matchMedia("(hover: hover) and (pointer: fine)").matches;

if (cursor && cursorBorder && cursorAllowed) {
  const cursorPos = { x: 0, y: 0 };
  const cursorBorderPos = { x: 0, y: 0 };
  let cursorFrame = null;

  document.addEventListener("mousemove", (e) => {
    cursorPos.x = e.clientX;
    cursorPos.y = e.clientY;

    cursor.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`;

    if (cursorFrame === null) {
      cursorFrame = requestAnimationFrame(updateCursorBorder);
    }
  }, { passive: true });

  function updateCursorBorder() {
    const easting = 8;
    cursorBorderPos.x += (cursorPos.x - cursorBorderPos.x) / easting;
    cursorBorderPos.y += (cursorPos.y - cursorBorderPos.y) / easting;

    cursorBorder.style.transform = `translate(${cursorBorderPos.x}px, ${cursorBorderPos.y}px)`;

    if (Math.abs(cursorPos.x - cursorBorderPos.x) > 0.2 || Math.abs(cursorPos.y - cursorBorderPos.y) > 0.2) {
      cursorFrame = requestAnimationFrame(updateCursorBorder);
    } else {
      cursorFrame = null;
    }
  }

  document.querySelectorAll("[data-cursor]").forEach((item) => {
    item.addEventListener("mouseover", () => {
      if (item.dataset.cursor === "pointer") {
        cursorBorder.style.backgroundColor = "rgba(255, 255, 255, .6)";
        cursorBorder.style.setProperty("--size", "30px");
      }
      if (item.dataset.cursor === "pointer2") {
        cursorBorder.style.backgroundColor = "white";
        cursorBorder.style.mixBlendMode = "difference";
        cursorBorder.style.setProperty("--size", "80px");
      }
    });
    item.addEventListener("mouseout", () => {
      cursorBorder.style.backgroundColor = "unset";
      cursorBorder.style.mixBlendMode = "unset";
      cursorBorder.style.setProperty("--size", "50px");
    });
  });
} else {
  if (cursor) {
    cursor.style.display = "none";
  }

  if (cursorBorder) {
    cursorBorder.style.display = "none";
  }
}


jQuery(document).ready(function ($) {
  let slider = $('.our_work_slider');
  if (!slider.length || !$.fn.owlCarousel) {
    return;
  }

  slider.each(function () {
    $(this).owlCarousel({
      nav: true,
      loop: false,
      dots: false,
      pagination: false,
      margin: 20,
      autoHeight: false,
      smartSpeed: 650,
      stagePadding: 118,
      navText: ['<span><img src="https://diinfotech.com/wp-content/themes/di-infotech/assets/img/left_arrow.png" alt=""></span>', '<span> <img src="https://diinfotech.com/wp-content/themes/di-infotech/assets/img/right_arrow.png" alt=""> </span>'],
      responsive: {
        0: {
          items: 2,
          stagePadding: 0,
          margin: 10,
          stagePadding: 40,
        },
        767: {
          items: 3,
          margin: 10,
        },

        1000: {
          items: 3,
        }

      }
    });
  });
});

// client slider js 

jQuery(document).ready(function ($) {
  let slider = $('.client_slider');
  if (!slider.length || !$.fn.owlCarousel) {
    return;
  }

  slider.each(function () {
    $(this).owlCarousel({
      nav: false,
      loop: false,
      dots: false,
      pagination: false,
      margin: 20,
      autoHeight: false,
      smartSpeed: 650,
      stagePadding: 118,
      responsive: {
        0: {
          items: 1,
          stagePadding: 20,
          margin: 10,
        },
        767: {
          items: 2,
        },
        1000: {
          items: 2,
        }
      }
    });
  });
});




// accordion and tabination js 

const accordions = document.querySelectorAll(".accordion_new");
const accordionImages = document.querySelector(".accordion_images"); // Get the accordion_images container

const openAccordion = (accordion) => {
  const content = accordion.querySelector(".accordion_content");
  accordion.classList.add("accordion_active");
  content.style.maxHeight = content.scrollHeight + "px";
};

const closeAccordion = (accordion) => {
  const content = accordion.querySelector(".accordion_content");
  accordion.classList.remove("accordion_active");
  content.style.maxHeight = null;
};

const activateImages = (index) => {
  if (!accordionImages) {
    return;
  }

  const images = accordionImages.querySelectorAll("img");
  images.forEach((img, i) => {
    if (i === index) {
      img.classList.add("active");
    } else {
      img.classList.remove("active");
    }
  });
};

accordions.forEach((accordion, index) => {
  const intro = accordion.querySelector(".accordion_intro");
  const content = accordion.querySelector(".accordion_content");

  if (!intro || !content) {
    return;
  }

  intro.onclick = () => {
    if (content.style.maxHeight) {
      closeAccordion(accordion);
      activateImages(-1);
    } else {
      accordions.forEach((accordion) => closeAccordion(accordion));
      openAccordion(accordion);
      activateImages(index);
    }
  };
});

//default click first accordion
const firstAccordion = document.querySelectorAll(".accordion_intro")[0];
if (firstAccordion) {
  firstAccordion.click();
}


