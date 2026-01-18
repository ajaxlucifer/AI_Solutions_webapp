// AI-Solutions Website JavaScript
// Main JavaScript file for interactivity and functionality

// DOM Content Loaded Event
document.addEventListener("DOMContentLoaded", function () {
  // Initialize all components
  initNavigation();
  initScrollEffects();
  initFormValidation();
  initTestimonialSlider();
  initTabs();
  initGallery();
  initAnimations();
  initContactForms();
  initArticleFilters();
  initEventTabs();
  initLightbox();
  initNewsletterForm();
});

// Navigation Functionality
function initNavigation() {
  const navToggle = document.querySelector(".nav-toggle");
  const hamburger = document.querySelector(".hamburger");
  const navMenu = document.querySelector(".nav-menu");
  const navLinks = document.querySelectorAll(".nav-link");
  const navbar = document.querySelector(".navbar");

  // Mobile menu toggle
  if (navToggle && hamburger && navMenu) {
    navToggle.addEventListener("click", function () {
      hamburger.classList.toggle("active");
      navMenu.classList.toggle("active");

      // Prevent body scroll when menu is open
      if (navMenu.classList.contains("active")) {
        document.body.style.overflow = "hidden";
      } else {
        document.body.style.overflow = "";
      }
    });

    // Close mobile menu when clicking nav links
    navLinks.forEach((link) => {
      link.addEventListener("click", function () {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
        document.body.style.overflow = "";
      });
    });

    // Close menu when clicking outside
    document.addEventListener("click", function (e) {
      if (!navToggle.contains(e.target) && !navMenu.contains(e.target)) {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
        document.body.style.overflow = "";
      }
    });
  }

  // Active link highlighting
  function updateActiveLink() {
    const currentPage =
      window.location.pathname.split("/").pop() || "index.php";

    navLinks.forEach((link) => {
      link.classList.remove("active");
      const href = link.getAttribute("href");

      if (
        href === "#home" &&
        (currentPage === "index.php" || currentPage === "")
      ) {
        link.classList.add("active");
      } else if (href.includes(currentPage)) {
        link.classList.add("active");
      }
    });
  }

  updateActiveLink();

  // Navbar scroll effect
  if (navbar) {
    window.addEventListener("scroll", function () {
      if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
      } else {
        navbar.classList.remove("scrolled");
      }
    });
  }

  // Smooth scroll for anchor links
  navLinks.forEach((link) => {
    const href = link.getAttribute("href");
    if (href.startsWith("#")) {
      link.addEventListener("click", function (e) {
        e.preventDefault();
        const targetId = href.substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
          const offsetTop = targetElement.offsetTop - navbar.offsetHeight;
          window.scrollTo({
            top: offsetTop,
            behavior: "smooth",
          });
        }
      });
    }
  });

  // Add scroll spy functionality
  function scrollSpy() {
    const sections = document.querySelectorAll("section[id]");
    const scrollPos = window.scrollY + navbar.offsetHeight + 50;

    sections.forEach((section) => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.offsetHeight;
      const sectionId = section.getAttribute("id");

      if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
        navLinks.forEach((link) => {
          link.classList.remove("active");
          if (link.getAttribute("href") === `#${sectionId}`) {
            link.classList.add("active");
          }
        });
      }
    });
  }

  window.addEventListener("scroll", scrollSpy);
}

// Scroll Effects and Animations
function initScrollEffects() {
  // Parallax effect for hero section
  const hero = document.querySelector(".hero");
  if (hero) {
    window.addEventListener("scroll", function () {
      const scrolled = window.pageYOffset;
      const rate = scrolled * -0.5;
      hero.style.transform = `translateY(${rate}px)`;
    });
  }

  // Fade in animation on scroll
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  };

  const observer = new IntersectionObserver(function (entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("animate-fadeInUp");
      }
    });
  }, observerOptions);

  // Observe elements for animation
  const animateElements = document.querySelectorAll(
    ".feature, .service-card, .case-study-card, .testimonial-card, .article-card, .event-card"
  );
  animateElements.forEach((el) => observer.observe(el));
}

// Form Validation
function initFormValidation() {
  const forms = document.querySelectorAll(".contact-form");

  forms.forEach((form) => {
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      let isValid = true;
      const formData = new FormData(form);

      // Remove previous error states
      form
        .querySelectorAll(".error")
        .forEach((el) => el.classList.remove("error"));
      form.querySelectorAll(".error-message").forEach((el) => el.remove());

      // Validate required fields
      const requiredFields = form.querySelectorAll("[required]");
      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          showFieldError(field, "This field is required");
          isValid = false;
        }
      });

      // Validate email fields
      const emailFields = form.querySelectorAll('input[type="email"]');
      emailFields.forEach((field) => {
        if (field.value && !isValidEmail(field.value)) {
          showFieldError(field, "Please enter a valid email address");
          isValid = false;
        }
      });

      // Validate checkboxes for solutions
      const checkboxGroups = form.querySelectorAll(".checkbox-group");
      checkboxGroups.forEach((group) => {
        const checkboxes = group.querySelectorAll('input[type="checkbox"]');
        const checked = Array.from(checkboxes).some((cb) => cb.checked);
        if (checkboxes.length > 0 && !checked) {
          showFieldError(group, "Please select at least one option");
          isValid = false;
        }
      });

      if (isValid) {
        submitForm(form, formData);
      }
    });
  });
}

function showFieldError(field, message) {
  field.classList.add("error");
  const errorDiv = document.createElement("div");
  errorDiv.className = "error-message";
  errorDiv.textContent = message;
  errorDiv.style.color = "#ef4444";
  errorDiv.style.fontSize = "0.875rem";
  errorDiv.style.marginTop = "0.25rem";

  const parent = field.closest(".form-group") || field.parentNode;
  parent.appendChild(errorDiv);
}

function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function submitForm(form, formData) {
  const submitBtn = form.querySelector(".submit-btn");
  const originalText = submitBtn.innerHTML;

  // Show loading state
  submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
  submitBtn.disabled = true;

  // Simulate form submission (replace with actual API call)
  setTimeout(() => {
    showSuccessMessage(form);
    form.reset();

    // Reset button
    submitBtn.innerHTML = originalText;
    submitBtn.disabled = false;
  }, 2000);
}

function showSuccessMessage(form) {
  const successDiv = document.createElement("div");
  successDiv.className = "success-message";
  successDiv.innerHTML = `
        <div style="background: #10b981; color: white; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem; text-align: center;">
            <i class="fas fa-check-circle"></i> Thank you! Your message has been sent successfully. We'll get back to you soon.
        </div>
    `;

  form.insertBefore(successDiv, form.firstChild);

  // Remove success message after 5 seconds
  setTimeout(() => {
    successDiv.remove();
  }, 5000);

  // Scroll to success message
  successDiv.scrollIntoView({ behavior: "smooth", block: "center" });
}

// Testimonial Slider
function initTestimonialSlider() {
  const slides = document.querySelectorAll(".testimonial-slide");
  const dots = document.querySelectorAll(".dot");
  let currentSlide = 0;

  if (slides.length === 0) return;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.toggle("active", i === index);
    });

    dots.forEach((dot, i) => {
      dot.classList.toggle("active", i === index);
    });

    currentSlide = index;
  }

  // Auto-advance slides
  setInterval(() => {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
  }, 6000);

  // Manual navigation
  window.changeSlide = function (direction) {
    currentSlide = (currentSlide + direction + slides.length) % slides.length;
    showSlide(currentSlide);
  };

  window.currentSlide = function (index) {
    showSlide(index - 1);
  };
}

// Tab Functionality
function initTabs() {
  const tabButtons = document.querySelectorAll(".tab-btn");
  const tabContents = document.querySelectorAll(".tab-content");

  tabButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const targetTab = this.getAttribute("data-tab");

      // Remove active class from all buttons and contents
      tabButtons.forEach((btn) => btn.classList.remove("active"));
      tabContents.forEach((content) => content.classList.remove("active"));

      // Add active class to clicked button and corresponding content
      this.classList.add("active");
      document.getElementById(targetTab)?.classList.add("active");
    });
  });
}

// Gallery Functionality
function initGallery() {
  const filterButtons = document.querySelectorAll(".filter-btn");
  const galleryItems = document.querySelectorAll(".gallery-item");

  filterButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const filter = this.getAttribute("data-filter");

      // Remove active class from all buttons
      filterButtons.forEach((btn) => btn.classList.remove("active"));
      this.classList.add("active");

      // Filter gallery items
      galleryItems.forEach((item) => {
        const category = item.getAttribute("data-category");
        if (filter === "all" || category === filter) {
          item.style.display = "block";
          setTimeout(() => {
            item.style.opacity = "1";
            item.style.transform = "scale(1)";
          }, 100);
        } else {
          item.style.opacity = "0";
          item.style.transform = "scale(0.8)";
          setTimeout(() => {
            item.style.display = "none";
          }, 300);
        }
      });
    });
  });
}

// Animations
function initAnimations() {
  // Counter animation for stats
  const counters = document.querySelectorAll(".stat-number");

  const countObserver = new IntersectionObserver(function (entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        countObserver.unobserve(entry.target);
      }
    });
  });

  counters.forEach((counter) => countObserver.observe(counter));

  function animateCounter(element) {
    const target = parseInt(element.textContent.replace(/[^0-9]/g, ""));
    const duration = 2000;
    const step = target / (duration / 50);
    let current = 0;

    const timer = setInterval(() => {
      current += step;
      if (current >= target) {
        current = target;
        clearInterval(timer);
      }

      const suffix = element.textContent.replace(/[0-9]/g, "");
      element.textContent = Math.floor(current) + suffix;
    }, 50);
  }

  // Typing effect for hero title
  const heroTitle = document.querySelector(".hero-title");
  if (heroTitle) {
    const text = heroTitle.textContent;
    heroTitle.textContent = "";

    let i = 0;
    const typeTimer = setInterval(() => {
      heroTitle.textContent += text[i];
      i++;
      if (i >= text.length) {
        clearInterval(typeTimer);
      }
    }, 50);
  }
}

// Contact Forms Specific Functionality
function initContactForms() {
  // Industry-specific form customization
  const industrySelects = document.querySelectorAll('select[name="industry"]');
  industrySelects.forEach((select) => {
    select.addEventListener("change", function () {
      const industry = this.value;
      customizeFormForIndustry(this.closest("form"), industry);
    });
  });

  // File upload handling
  const fileInputs = document.querySelectorAll('input[type="file"]');
  fileInputs.forEach((input) => {
    input.addEventListener("change", function () {
      validateFileUpload(this);
    });
  });
}

function customizeFormForIndustry(form, industry) {
  // Add industry-specific suggestions or validation
  const challengesField = form.querySelector('textarea[name="challenges"]');
  if (challengesField) {
    const placeholders = {
      healthcare:
        "e.g., Ensuring system uptime for patient care, HIPAA compliance...",
      education:
        "e.g., Supporting remote learning, managing student IT requests...",
      manufacturing:
        "e.g., Minimizing production downtime, supporting factory floor systems...",
      financial:
        "e.g., Maintaining security compliance, ensuring transaction processing...",
      retail:
        "e.g., Point-of-sale reliability, inventory management integration...",
    };

    challengesField.placeholder =
      placeholders[industry] || challengesField.placeholder;
  }
}

function validateFileUpload(input) {
  const files = input.files;
  const maxSize = 10 * 1024 * 1024; // 10MB
  const allowedTypes = [
    "image/jpeg",
    "image/png",
    "application/pdf",
    "application/msword",
    "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
    "text/plain",
  ];

  Array.from(files).forEach((file) => {
    if (file.size > maxSize) {
      showFieldError(
        input,
        `File "${file.name}" is too large. Maximum size is 10MB.`
      );
      input.value = "";
      return;
    }

    if (!allowedTypes.includes(file.type)) {
      showFieldError(input, `File "${file.name}" is not a supported format.`);
      input.value = "";
      return;
    }
  });
}

// Article Filters
function initArticleFilters() {
  const categoryFilters = document.querySelectorAll(
    ".category-filter .filter-btn"
  );
  const articles = document.querySelectorAll(".article-card");
  const loadMoreBtn = document.querySelector(".load-more-btn");

  let visibleArticles = 6;

  // Category filtering
  categoryFilters.forEach((filter) => {
    filter.addEventListener("click", function () {
      const category = this.getAttribute("data-category");

      categoryFilters.forEach((btn) => btn.classList.remove("active"));
      this.classList.add("active");

      filterArticles(category);
    });
  });

  // Load more functionality
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener("click", function () {
      visibleArticles += 6;
      showArticles();

      if (visibleArticles >= articles.length) {
        this.style.display = "none";
      }
    });
  }

  function filterArticles(category) {
    articles.forEach((article) => {
      const articleCategory = article.getAttribute("data-category");
      if (category === "all" || articleCategory === category) {
        article.style.display = "block";
      } else {
        article.style.display = "none";
      }
    });

    visibleArticles = 6;
    showArticles();
  }

  function showArticles() {
    const visibleItems = Array.from(articles).filter(
      (article) => article.style.display !== "none"
    );

    visibleItems.forEach((article, index) => {
      if (index < visibleArticles) {
        article.style.display = "block";
        article.style.opacity = "1";
      } else {
        article.style.display = "none";
      }
    });
  }

  // Initial load
  showArticles();
}

// Event Tabs
function initEventTabs() {
  const eventTabs = document.querySelectorAll(".event-tabs .tab-btn");
  const eventContents = document.querySelectorAll(".tab-content");

  eventTabs.forEach((tab) => {
    tab.addEventListener("click", function () {
      const targetContent = this.getAttribute("data-tab");

      eventTabs.forEach((t) => t.classList.remove("active"));
      eventContents.forEach((c) => c.classList.remove("active"));

      this.classList.add("active");
      document.getElementById(targetContent)?.classList.add("active");
    });
  });
}

// Lightbox for Gallery
function initLightbox() {
  const lightbox = document.getElementById("lightbox");
  if (!lightbox) return;

  window.openLightbox = function (imageId) {
    const lightboxTitle = document.getElementById("lightbox-title");
    const lightboxDescription = document.getElementById("lightbox-description");

    // You would normally load the actual image here
    // For demo purposes, we'll just show placeholder content
    const imageData = {
      img1: {
        title: "Keynote Presentation",
        description: "CEO presenting at TechWeek London 2025",
      },
      img2: {
        title: "Product Demonstration",
        description: "Live demo of AI virtual assistant",
      },
      img3: {
        title: "Hands-on Workshop",
        description: "Digital transformation workshop in Manchester",
      },
      img4: { title: "Team Building", description: "Annual team retreat 2024" },
      img5: {
        title: "Innovation Award",
        description: "Receiving the Innovation Excellence Award",
      },
      img6: {
        title: "Partnership Signing",
        description: "New strategic partnership announcement",
      },
      img7: {
        title: "Training Session",
        description: "Customer training workshop",
      },
      img8: {
        title: "Company Milestone",
        description: "Celebrating 5 years of innovation",
      },
      img9: {
        title: "Panel Discussion",
        description: "AI ethics panel at Healthcare Summit",
      },
    };

    const data = imageData[imageId] || {
      title: "Image",
      description: "Description",
    };
    lightboxTitle.textContent = data.title;
    lightboxDescription.textContent = data.description;

    lightbox.style.display = "block";
    document.body.style.overflow = "hidden";
  };

  window.closeLightbox = function () {
    lightbox.style.display = "none";
    document.body.style.overflow = "auto";
  };

  // Close lightbox when clicking outside
  lightbox.addEventListener("click", function (e) {
    if (e.target === lightbox) {
      closeLightbox();
    }
  });

  // Close lightbox with escape key
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && lightbox.style.display === "block") {
      closeLightbox();
    }
  });
}

// Newsletter Form
function initNewsletterForm() {
  const newsletterForms = document.querySelectorAll(".subscription-form");

  newsletterForms.forEach((form) => {
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      const emailInput = form.querySelector('input[type="email"]');
      const submitBtn = form.querySelector('button[type="submit"]');

      if (!emailInput.value || !isValidEmail(emailInput.value)) {
        showNewsletterError(form, "Please enter a valid email address");
        return;
      }

      // Show loading state
      const originalBtnText = submitBtn.textContent;
      submitBtn.textContent = "Subscribing...";
      submitBtn.disabled = true;

      // Simulate subscription
      setTimeout(() => {
        showNewsletterSuccess(form);
        form.reset();

        submitBtn.textContent = originalBtnText;
        submitBtn.disabled = false;
      }, 1500);
    });
  });
}

function showNewsletterError(form, message) {
  const existingError = form.querySelector(".newsletter-error");
  if (existingError) existingError.remove();

  const errorDiv = document.createElement("div");
  errorDiv.className = "newsletter-error";
  errorDiv.style.color = "#ef4444";
  errorDiv.style.marginTop = "0.5rem";
  errorDiv.style.fontSize = "0.875rem";
  errorDiv.textContent = message;

  form.appendChild(errorDiv);

  setTimeout(() => errorDiv.remove(), 3000);
}

function showNewsletterSuccess(form) {
  const successDiv = document.createElement("div");
  successDiv.className = "newsletter-success";
  successDiv.style.color = "#10b981";
  successDiv.style.marginTop = "0.5rem";
  successDiv.style.fontSize = "0.875rem";
  successDiv.innerHTML =
    '<i class="fas fa-check"></i> Successfully subscribed to our newsletter!';

  form.appendChild(successDiv);

  setTimeout(() => successDiv.remove(), 5000);
}

// Utility Functions
function debounce(func, wait) {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
}

function throttle(func, limit) {
  let inThrottle;
  return function () {
    const args = arguments;
    const context = this;
    if (!inThrottle) {
      func.apply(context, args);
      inThrottle = true;
      setTimeout(() => (inThrottle = false), limit);
    }
  };
}

// Performance optimizations
const optimizedScrollHandler = throttle(function () {
  // Scroll-based functionality here
}, 16); // ~60fps

const optimizedResizeHandler = debounce(function () {
  // Resize-based functionality here
}, 250);

window.addEventListener("scroll", optimizedScrollHandler);
window.addEventListener("resize", optimizedResizeHandler);

// Analytics and tracking (placeholder)
function trackEvent(eventName, eventData) {
  // Placeholder for analytics tracking
  console.log("Event tracked:", eventName, eventData);

  // Here you would integrate with Google Analytics, Adobe Analytics, etc.
  // gtag('event', eventName, eventData);
}

// Track important user interactions
document.addEventListener("click", function (e) {
  const target = e.target;

  // Track button clicks
  if (target.classList.contains("btn")) {
    trackEvent("button_click", {
      button_text: target.textContent.trim(),
      page_url: window.location.href,
    });
  }

  // Track demo requests
  if (
    target.textContent.includes("Demo") ||
    target.textContent.includes("demo")
  ) {
    trackEvent("demo_request", {
      source: target.closest("section")?.className || "unknown",
      page_url: window.location.href,
    });
  }

  // Track contact form submissions
  if (target.type === "submit" && target.closest(".contact-form")) {
    trackEvent("form_submission", {
      form_type: target.closest("form").className,
      page_url: window.location.href,
    });
  }
});

// Error handling
window.addEventListener("error", function (e) {
  console.error("JavaScript error:", e.error);

  // You could send errors to a logging service here
  trackEvent("javascript_error", {
    error_message: e.error.message,
    error_stack: e.error.stack,
    page_url: window.location.href,
  });
});

// Page load performance tracking
window.addEventListener("load", function () {
  // Track page load time
  const loadTime =
    performance.timing.loadEventEnd - performance.timing.navigationStart;
  trackEvent("page_load", {
    load_time: loadTime,
    page_url: window.location.href,
  });
});

// Accessibility improvements
document.addEventListener("keydown", function (e) {
  // Close modals/dropdowns with Escape key
  if (e.key === "Escape") {
    const openModals = document.querySelectorAll(
      ".modal.active, .dropdown.active"
    );
    openModals.forEach((modal) => modal.classList.remove("active"));
  }

  // Navigate through focusable elements with Tab
  if (e.key === "Tab") {
    const focusableElements = document.querySelectorAll(
      'a[href], button, textarea, input[type="text"], input[type="radio"], input[type="checkbox"], select'
    );

    const firstElement = focusableElements[0];
    const lastElement = focusableElements[focusableElements.length - 1];

    if (e.shiftKey && document.activeElement === firstElement) {
      lastElement.focus();
      e.preventDefault();
    } else if (!e.shiftKey && document.activeElement === lastElement) {
      firstElement.focus();
      e.preventDefault();
    }
  }
});

// Add focus indicators for keyboard navigation
document.addEventListener("keydown", function (e) {
  if (e.key === "Tab") {
    document.body.classList.add("keyboard-navigation");
  }
});

document.addEventListener("mousedown", function () {
  document.body.classList.remove("keyboard-navigation");
});

// Service Worker registration for offline functionality (optional)
if ("serviceWorker" in navigator) {
  window.addEventListener("load", function () {
    navigator.serviceWorker
      .register("/sw.js")
      .then(function (registration) {
        console.log("SW registered: ", registration);
      })
      .catch(function (registrationError) {
        console.log("SW registration failed: ", registrationError);
      });
  });
}

// Export functions for testing (if needed)
if (typeof module !== "undefined" && module.exports) {
  module.exports = {
    isValidEmail,
    debounce,
    throttle,
    trackEvent,
  };
}
