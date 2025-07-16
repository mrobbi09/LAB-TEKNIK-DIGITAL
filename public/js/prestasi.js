// Fixed scroll functions - menggunakan nama yang berbeda untuk menghindari konflik
function slideLeft() {
  const wrapper = document.getElementById('prestasiWrapper');
  const cardWidth = 350 + 32; // card width + gap
  
  wrapper.scrollBy({ 
    left: -cardWidth, 
    behavior: 'smooth' 
  });
  
  // Add visual feedback
  const leftBtn = document.querySelector('.nav-btn.left');
  leftBtn.style.transform = 'translateY(-50%) scale(0.9)';
  setTimeout(() => {
    leftBtn.style.transform = 'translateY(-50%) scale(1)';
  }, 150);
  
  // Mark user interaction
  userInteracting = true;
  setTimeout(() => userInteracting = false, 3000);
}

function slideRight() {
  const wrapper = document.getElementById('prestasiWrapper');
  const cardWidth = 350 + 32; // card width + gap
  
  wrapper.scrollBy({ 
    left: cardWidth, 
    behavior: 'smooth' 
  });
  
  // Add visual feedback
  const rightBtn = document.querySelector('.nav-btn.right');
  rightBtn.style.transform = 'translateY(-50%) scale(0.9)';
  setTimeout(() => {
    rightBtn.style.transform = 'translateY(-50%) scale(1)';
  }, 150);
  
  // Mark user interaction
  userInteracting = true;
  setTimeout(() => userInteracting = false, 3000);
}

// Auto-scroll functionality
let autoScrollInterval;
let userInteracting = false;

function startAutoScroll() {
  autoScrollInterval = setInterval(() => {
    if (!userInteracting) {
      const wrapper = document.getElementById('prestasiWrapper');
      const maxScroll = wrapper.scrollWidth - wrapper.clientWidth;
      
      if (wrapper.scrollLeft >= maxScroll) {
        // Reset to beginning
        wrapper.scrollTo({ left: 0, behavior: 'smooth' });
      } else {
        slideRight();
      }
    }
  }, 4000);
}

function stopAutoScroll() {
  clearInterval(autoScrollInterval);
}

// Keyboard navigation
document.addEventListener('keydown', (e) => {
  if (e.key === 'ArrowLeft') {
    e.preventDefault();
    slideLeft();
  } else if (e.key === 'ArrowRight') {
    e.preventDefault();
    slideRight();
  }
});

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
  const wrapper = document.getElementById('prestasiWrapper');
  
  if (wrapper) {
    // Touch/mouse interaction detection
    wrapper.addEventListener('mousedown', () => {
      userInteracting = true;
      setTimeout(() => userInteracting = false, 3000);
    });

    wrapper.addEventListener('touchstart', () => {
      userInteracting = true;
      setTimeout(() => userInteracting = false, 3000);
    });

    // Scroll event listener for indicator updates
    wrapper.addEventListener('scroll', updateScrollIndicator);
  }

  // Button event listeners
  const leftBtn = document.querySelector('.nav-btn.left');
  const rightBtn = document.querySelector('.nav-btn.right');

  if (leftBtn) {
    leftBtn.addEventListener('click', () => {
      userInteracting = true;
      setTimeout(() => userInteracting = false, 3000);
    });
  }

  if (rightBtn) {
    rightBtn.addEventListener('click', () => {
      userInteracting = true;
      setTimeout(() => userInteracting = false, 3000);
    });
  }

  // Initialize auto-scroll after page loads
  setTimeout(() => {
    startAutoScroll();
  }, 2000);

  // Initialize scroll indicator
  updateScrollIndicator();

  // Pause auto-scroll when hovering over cards
  document.querySelectorAll('.prestasi-card').forEach(card => {
    card.addEventListener('mouseenter', () => {
      userInteracting = true;
    });
    
    card.addEventListener('mouseleave', () => {
      setTimeout(() => userInteracting = false, 1000);
    });
  });

  // Intersection Observer for entrance animations
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.animationPlayState = 'running';
      }
    });
  }, observerOptions);

  // Observe all prestasi cards
  document.querySelectorAll('.prestasi-card').forEach(card => {
    observer.observe(card);
  });
});

// Smooth scroll indicator
function updateScrollIndicator() {
  const wrapper = document.getElementById('prestasiWrapper');
  if (!wrapper) return;
  
  const leftBtn = document.querySelector('.nav-btn.left');
  const rightBtn = document.querySelector('.nav-btn.right');
  
  if (leftBtn && rightBtn) {
    // Fade buttons based on scroll position
    leftBtn.style.opacity = wrapper.scrollLeft > 0 ? '1' : '0.5';
    rightBtn.style.opacity = wrapper.scrollLeft < (wrapper.scrollWidth - wrapper.clientWidth) ? '1' : '0.5';
  }
}

// Add parallax effect to header
window.addEventListener('scroll', () => {
  const scrolled = window.pageYOffset;
  const header = document.querySelector('.header');
  if (header) {
    header.style.transform = `translateY(${scrolled * 0.5}px)`;
  }
});

// Handle page visibility change (pause auto-scroll when tab is not active)
document.addEventListener('visibilitychange', () => {
  if (document.hidden) {
    stopAutoScroll();
  } else {
    setTimeout(() => {
      if (!userInteracting) {
        startAutoScroll();
      }
    }, 1000);
  }
});

// Handle window resize
window.addEventListener('resize', () => {
  updateScrollIndicator();
});

// Smooth scrolling for better mobile experience
let isScrolling = false;
document.addEventListener('scroll', () => {
  if (!isScrolling) {
    window.requestAnimationFrame(() => {
      updateScrollIndicator();
      isScrolling = false;
    });
    isScrolling = true;
  }
});