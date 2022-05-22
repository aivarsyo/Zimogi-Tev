import "../scss/style.scss";
import { gsap } from "gsap";
import { Power0 } from "gsap";
import { Power3 } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
gsap.registerPlugin(ScrollToPlugin);
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);
import Glide from "@glidejs/glide";
import SmoothScroll from "smooth-scroll";

window.addEventListener("DOMContentLoaded", start);

function start() {
  scrollToTop();
  uploadButton();
  onlyBody();
  menu();
  reviews();
  productImage();
  filter();
  scrollBeh();
  fadeInOnScroll();
  currentCategory();
}

function scrollToTop() {
  const mapTop = document.querySelector(".map__top");
  if (mapTop) {
    mapTop.addEventListener("click", function () {
      console.log("clicked");
      gsap.to(window, {
        ease: Power0.easeNone,
        scrollTo: { y: 0 },
      });
    });
  }
}

function uploadButton() {
  /* var label = document.createElement("label");
    label.setAttribute("for", "file"); */

  //const parent = document.querySelector(".wc-pao-addon-wrap");
  const small = document.querySelector("small");
  //parent.insertBefore(label, small);

  var inputs = document.querySelectorAll(".wc-pao-addon-file-upload");

  Array.prototype.forEach.call(inputs, function (input) {
    input.setAttribute("data-multiple-caption", "{count} files selected");
    input.setAttribute("multiple", "");
    var label = input.nextElementSibling,
      labelVal = label.innerHTML;

    input.addEventListener("change", function (e) {
      var fileName = "";

      if (this.files && this.files.length > 1) {
        fileName = (this.getAttribute("data-multiple-caption") || "").replace(
          "{count}",
          this.files.length
        );
      } else {
        fileName = e.target.value.split("\\").pop();
      }

      if (fileName) {
        small.innerHTML = fileName;
      } else {
        small.innerHTML = labelVal;
      }
    });
  });
}

function onlyBody() {
  /* vi-wpvs-option-wrap vi-wpvs-option-wrap-selected
  vi-wpvs-variation-wrap-option vi-wpvs-variation-wrap-select-bottom */
  const justBodySelect = document.querySelector(
    ".vi-wpvs-variation-wrap-select-wrap .vi-wpvs-variation-wrap-option div:nth-child(3)"
  );
  const bodyPlusStampSelect = document.querySelector(
    ".vi-wpvs-variation-wrap-select-wrap .vi-wpvs-variation-wrap-option div:nth-child(2)"
  );
  const emptyColor = document.querySelector(
    ".vi-wpvs-variation-wrap-color div:nth-child(1)"
  );
  const allColors = document.querySelectorAll(
    ".vi-wpvs-variation-wrap-color *:not(div:nth-child(1))"
  );
  const firstColor = document.querySelector(
    ".vi-wpvs-variation-wrap-color div:nth-of-type(2)"
  );

  console.log(firstColor);
  //console.log(justBodySelect);
  //console.log(emptyColor);

  if (justBodySelect) {
    justBodySelect.addEventListener("click", function () {
      /* emptyColor.classList.add("vi-wpvs-option-wrap-selected");
    emptyColor.classList.add("vi-wpvs-option-wrap-disable");
    emptyColor.classList.remove("vi-wpvs-option-wrap-default"); */

      setTimeout(function () {
        emptyColor.click();
        allColors.forEach((color) => {
          color.classList.remove("vi-wpvs-option-wrap-default");
          color.classList.remove("vi-wpvs-option-wrap-selected");
          color.classList.add("vi-wpvs-option-wrap-disable");
        });
      }, 50);
    });
  }

  if (bodyPlusStampSelect) {
    bodyPlusStampSelect.addEventListener("click", function () {
      setTimeout(function () {
        emptyColor.classList.remove("vi-wpvs-option-wrap-default");
        emptyColor.classList.remove("vi-wpvs-option-wrap-selected");
        emptyColor.classList.add("vi-wpvs-option-wrap-disable");
        firstColor.click();
      }, 50);
    });
  }
}

function menu() {
  const header = document.querySelector("header");

  if(header){

  document
    .querySelector(".mobile-menu-icon")
    .addEventListener("click", function () {
      if (this.classList.contains("opened")) {
        gsap.to(".mobile-menu", 0.3, {
          x: "-100%",
          ease: Power3.easeOut,
        });
        gsap.to(".topLine", 0.3, {
          attr: { y2: 0.4, x2: 22.4 },
        });
        gsap.to(".bottomLine", 0.3, {
          attr: { y2: 12.4, x2: 22.4 },
        });
        gsap.to(".middleLine", 0.3, {
          opacity: 1,
        });
        gsap.set(".transparent-overlay", {
          zIndex: -1,
          opacity: 0,
        });
        this.classList.remove("opened");
      } else {
        gsap.to(".mobile-menu", 0.3, {
          x: 0,
          ease: Power3.easeIn,
        });
        gsap.to(".topLine", 0.3, {
          attr: { y2: 12.4, x2: 13.4 },
        });
        gsap.to(".bottomLine", 0.3, {
          attr: { y2: 0.4, x2: 13.4 },
        });
        gsap.to(".middleLine", 0.3, {
          opacity: 0,
        });
        gsap.set(".transparent-overlay", {
          zIndex: 4,
        });
        gsap.to(".transparent-overlay", 0.3, {
          opacity: 1,
        });
        this.classList.add("opened");
      }
    });
  }
}

function reviews() {
  const footer = document.querySelector("footer");

  if (footer) {
    const config = {
      perView: 3,
      breakpoints: {
        768: {
          /* perView: 1,
          autoplay: 3000, */
          perView: 2,
          autoplay: true,
          animationTimingFunc: 'linear',
          animationDuration: 10000,
          type: 'carousel'
        },
      },
    };

    const glide = new Glide(".glide-footer", config);

    glide.mount();
  }
}

function productImage() {
  const imageContainer = document.querySelector(".glide-image");

  if (imageContainer) {
    const config = {
      perView: 1,
      type: "carousel",
    };

    const glide = new Glide(".glide-image", config);

    glide.mount();
  }
}

function filter() {
  const filterIcon = document.querySelector("#filter-icon");

  if (filterIcon && window.innerWidth < 866) {
    filterIcon.addEventListener("click", function () {
      if (this.classList.contains("opened")) {
        gsap.to(".circleUp", {
          x: 0,
        });
        gsap.to(".circleMiddle", {
          x: 0,
        });
        gsap.to(".circleDown", {
          x: 0,
        });

        gsap.to(".categories", 0.3, {
          y: "-110%",
        });

        this.classList.remove("opened");
      } else {
        gsap.to(".circleUp", {
          x: 85,
        });
        gsap.to(".circleMiddle", {
          x: -85,
        });
        gsap.to(".circleDown", {
          x: 30,
        });

        gsap.to(".categories", 0.3, {
          y: "-10%",
        });

        this.classList.add("opened");
      }
    });

    document.querySelectorAll(".categories li a").forEach((link) => {
      link.addEventListener("click", function () {
        gsap.to(".categories", 0.3, {
          y: "-110%",
        });

        gsap.to(".circleUp", {
          x: 0,
        });
        gsap.to(".circleMiddle", {
          x: 0,
        });
        gsap.to(".circleDown", {
          x: 0,
        });

        filterIcon.classList.remove("opened");
      });
    });
  }
}

function scrollBeh() {
  var scroll = new SmoothScroll('a[href*="#"]', {
    header: "[data-scroll-header]",
  });
}

function fadeInOnScroll(){

const productPage = document.querySelector(".productPage");

if(productPage){

  gsap.utils.toArray(".oneProduct").forEach(section => {
    gsap.from(section.querySelectorAll("a, div"), {
      scrollTrigger: section,
      opacity: 0,
      y: 25,
      duration: 0.75,
      stagger: 0.05
    });
  });

}
}

function currentCategory(){

  const productPage = document.querySelector(".productPage");

  if(productPage){

  const sections = document.querySelectorAll(".categorySection");

  sections.forEach(section=>{
    ScrollTrigger.matchMedia({
      "(min-width: 866px)": function() {
        ScrollTrigger.create({
          trigger: section,
          start: "top center",
          end: "bottom center",
          toggleClass: {targets: `a[data-category="${section.dataset.category}"]`, className: "boldText"}
        })
      }
    })
    
  })
}
}
