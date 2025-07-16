// Modal functionality
function openModal(modalName) {
  const modal = document.getElementById(modalName + 'Modal');
  if (modal) {
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden'; // Prevent background scrolling
    
    // Add fade-in animation
    modal.style.opacity = '0';
    setTimeout(() => {
      modal.style.opacity = '1';
    }, 10);
  }
}

function closeModal(modalName) {
  const modal = document.getElementById(modalName + 'Modal');
  if (modal) {
    // Add fade-out animation
    modal.style.opacity = '0';
    setTimeout(() => {
      modal.style.display = 'none';
      document.body.style.overflow = 'auto'; // Restore scrolling
    }, 300);
  }
}

// Close modal when clicking outside of it
window.onclick = function(event) {
  const modals = document.querySelectorAll('.modal');
  modals.forEach(modal => {
    if (event.target === modal) {
      const modalId = modal.id.replace('Modal', '');
      closeModal(modalId);
    }
  });
}

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape') {
    const openModal = document.querySelector('.modal[style*="block"]');
    if (openModal) {
      const modalId = openModal.id.replace('Modal', '');
      closeModal(modalId);
    }
  }
});

// Handle locked cards
function initializeLockedCards() {
  document.querySelectorAll('.praktikum-card.locked').forEach(card => {
    card.addEventListener('click', function(e) {
      e.preventDefault();
      showLockedMessage(this);
    });
  });
}

// Show custom message for locked cards
function showLockedMessage(card) {
  const title = card.querySelector('.card-title').textContent;
  const unlockDate = card.querySelector('.status-locked').textContent.replace('Buka: ', '');
  
  // Create custom alert
  const alertDiv = document.createElement('div');
  alertDiv.className = 'custom-alert';
  alertDiv.innerHTML = `
    <div class="alert-content">
      <h3>Praktikum Belum Tersedia</h3>
      <p><strong>${title}</strong> akan tersedia pada:</p>
      <p class="unlock-date">${unlockDate}</p>
      <button onclick="closeAlert()" class="alert-button">OK</button>
    </div>
  `;
  
  // Add styles for custom alert
  if (!document.querySelector('#alert-styles')) {
    const style = document.createElement('style');
    style.id = 'alert-styles';
    style.textContent = `
      .custom-alert {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10000;
        animation: fadeIn 0.3s ease-out;
      }
      
      .alert-content {
        background: white;
        padding: 2rem;
        border-radius: 20px;
        text-align: center;
        max-width: 400px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        animation: slideIn 0.3s ease-out;
      }
      
      .alert-content h3 {
        color: #f44336;
        margin-bottom: 1rem;
        font-size: 1.5rem;
      }
      
      .alert-content p {
        margin-bottom: 1rem;
        color: #333;
      }
      
      .unlock-date {
        font-weight: bold;
        color: #667eea;
        font-size: 1.1rem;
      }
      
      .alert-button {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 0.8rem 2rem;
        border-radius: 25px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s;
        font-size: 1rem;
      }
      
      .alert-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
      }
      
      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }
      
      @keyframes slideIn {
        from { 
          opacity: 0;
          transform: translateY(-30px);
        }
        to { 
          opacity: 1;
          transform: translateY(0);
        }
      }
    `;
    document.head.appendChild(style);
  }
  
  document.body.appendChild(alertDiv);
  document.body.style.overflow = 'hidden';
}

// Close custom alert
function closeAlert() {
  const alert = document.querySelector('.custom-alert');
  if (alert) {
    alert.style.opacity = '0';
    setTimeout(() => {
      alert.remove();
      document.body.style.overflow = 'auto';
    }, 300);
  }
}

// Add smooth scrolling for better UX
function initializeSmoothScrolling() {
  document.documentElement.style.scrollBehavior = 'smooth';
}

// Initialize loading animation for PDFs
function initializePDFLoading() {
  document.querySelectorAll('.pdf-container iframe').forEach(iframe => {
    const container = iframe.parentElement;
    const loader = document.createElement('div');
    loader.className = 'pdf-loader';
    loader.innerHTML = `
      <div class="loader-spinner"></div>
      <p>Memuat PDF...</p>
    `;
    
    // Add loader styles
    if (!document.querySelector('#pdf-loader-styles')) {
      const style = document.createElement('style');
      style.id = 'pdf-loader-styles';
      style.textContent = `
        .pdf-loader {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          text-align: center;
          color: #667eea;
        }
        
        .loader-spinner {
          width: 40px;
          height: 40px;
          border: 4px solid #f3f3f3;
          border-top: 4px solid #667eea;
          border-radius: 50%;
          animation: spin 1s linear infinite;
          margin: 0 auto 1rem;
        }
        
        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
      `;
      document.head.appendChild(style);
    }
    
    container.style.position = 'relative';
    container.appendChild(loader);
    
    iframe.addEventListener('load', () => {
      setTimeout(() => {
        loader.remove();
      }, 1000);
    });
  });
}

// Add typing effect to section title
function addTypingEffect() {
  const title = document.querySelector('.section-title');
  if (title) {
    const text = title.textContent;
    title.textContent = '';
    let i = 0;
    
    function typeWriter() {
      if (i < text.length) {
        title.textContent += text.charAt(i);
        i++;
        setTimeout(typeWriter, 100);
      }
    }
    
    // Start typing effect after a short delay
    setTimeout(typeWriter, 500);
  }
}

// Add card hover sound effect (optional)
function addHoverEffects() {
  document.querySelectorAll('.praktikum-card.available').forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-10px) scale(1.02)';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0) scale(1)';
    });
  });
}

// Initialize all functions when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
  initializeLockedCards();
  initializeSmoothScrolling();
  addTypingEffect();
  addHoverEffects();
  
  // Initialize PDF loading animation when modal is opened
  document.addEventListener('click', function(e) {
    if (e.target.closest('.praktikum-card.available')) {
      setTimeout(initializePDFLoading, 100);
    }
  });
});

// Add scroll reveal animation
function addScrollRevealAnimation() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  });
  
  document.querySelectorAll('.praktikum-card').forEach(card => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(30px)';
    card.style.transition = 'all 0.6s ease-out';
    observer.observe(card);
  });
}

// Initialize scroll reveal when page loads
window.addEventListener('load', addScrollRevealAnimation);

// Add keyboard navigation for cards
document.addEventListener('keydown', function(event) {
  const cards = document.querySelectorAll('.praktikum-card');
  const currentFocus = document.activeElement;
  const currentIndex = Array.from(cards).indexOf(currentFocus);
  
  if (event.key === 'ArrowRight' && currentIndex < cards.length - 1) {
    cards[currentIndex + 1].focus();
  } else if (event.key === 'ArrowLeft' && currentIndex > 0) {
    cards[currentIndex - 1].focus();
  } else if (event.key === 'Enter' && currentFocus.classList.contains('praktikum-card')) {
    currentFocus.click();
  }
});

// Make cards focusable for keyboard navigation
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.praktikum-card').forEach(card => {
    card.setAttribute('tabindex', '0');
  });
});