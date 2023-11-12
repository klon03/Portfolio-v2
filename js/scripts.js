// Year
document.getElementById('year').innerHTML = new Date().getFullYear();

// Contact section
const emailDiv = document.getElementById("contact-email")
const linkedinDiv = document.getElementById("contact-linkedin")
const githubDiv = document.getElementById("contact-github")
const noti = document.getElementById("copy-notification")

emailDiv.addEventListener("click", () =>{
  navigator.clipboard.writeText("wachowski.kajetan@gmail.com")
  noti.classList.remove('hide')
  noti.classList.add('show')
  setTimeout(function() {
    noti.classList.remove('show');
    noti.classList.add('hide')
  }, 3000);
})

linkedinDiv.addEventListener("click", () =>{
  window.open("https://www.linkedin.com/in/k-wachowski/", "_blank");
})

githubDiv.addEventListener("click", () =>{
  window.open("https://github.com/klon03", "_blank");
})

// Detecting which section is viewed
const navLinks = document.getElementById('navbar').querySelectorAll('.nav-link');
const sections = document.querySelectorAll('.section')

function getViewPercentage(element) {
  const viewport = {
    top: window.scrollY,
    bottom: window.scrollY + window.innerHeight
  };

  const elementBoundingRect = element.getBoundingClientRect();
  const elementPos = {
    top: elementBoundingRect.y + window.scrollY,
    bottom: elementBoundingRect.y + elementBoundingRect.height + window.scrollY
  };

  if (viewport.top > elementPos.bottom || viewport.bottom < elementPos.top) {
    return 0;
  }

  // Element is fully within viewport
  if (viewport.top < elementPos.top && viewport.bottom > elementPos.bottom) {
    return 100;
  }

  // Element is bigger than the viewport
  if (elementPos.top < viewport.top && elementPos.bottom > viewport.bottom) {
    return 100;
  }

  const elementHeight = elementBoundingRect.height;
  let elementHeightInView = elementHeight;

  if (elementPos.top < viewport.top) {
    elementHeightInView = elementHeight - (window.pageYOffset - elementPos.top);
  }

  if (elementPos.bottom > viewport.bottom) {
    elementHeightInView = elementHeightInView - (elementPos.bottom - viewport.bottom);
  }

  const percentageInView = (elementHeightInView / window.innerHeight) * 100;

  return Math.round(percentageInView);
}

function updateActiveLinks() {
  sections.forEach((section, index) => {
    
    const link = navLinks[index];
    
    if (getViewPercentage(section) >= 50) {
      link.classList.add('active');
      
    } else {
      link.classList.remove('active');
    }
  });
  
}
let scrolling = false
window.addEventListener('scroll', () => {
  scrolling = true
});

setInterval(() => {
  if (scrolling) {
      scrolling = false;
      updateActiveLinks();
  }
},300);

updateActiveLinks();

// Collapsing navbar on click
const menuToggle = document.getElementById('navbarID')
const bsCollapse = new bootstrap.Collapse(menuToggle, {toggle: false})
navLinks.forEach((l) => {
  l.addEventListener('click', () => {
    if (window.innerWidth < 576)
    bsCollapse.toggle() 
  })
})

document.addEventListener("DOMContentLoaded", function () {
  document.addEventListener("click", function (event) {
      var clickover = event.target;
      var navbar = document.querySelector(".navbar-collapse");
      var isOpened = navbar.classList.contains("show");
      var isNavbarToggler = clickover.classList.contains("navbar-toggler");

      if (isOpened && !isNavbarToggler) {
        bsCollapse.toggle() 
      }
  });
});

// Swiper
// var swiper = new Swiper(".swiper", {
//   effect: "coverflow",
//   grabCursor: true,
//   centeredSlides: true,
//   slidesPerView: "auto",
//   speed: 700,
//   //loop: true,
//   coverflowEffect: {
//     rotate: 50,
//     stretch: 0,
//     depth: 100,
//     modifier: 1,
//     slideShadows: true
//   },
//   pagination: {
//     el: ".swiper-pagination"
//   },
//   autoplay: {
//     delay: 5000,
//     pauseOnMouseEnter: true
//   }
// });