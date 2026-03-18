// === AI Software Engineering Module - Main JS ===

document.addEventListener('DOMContentLoaded', () => {

  // --- Loader ---
  const loader = document.getElementById('loader');
  if (loader) {
    setTimeout(() => loader.classList.add('hidden'), 1400);
  }

  // --- Navbar scroll ---
  const navbar = document.querySelector('.navbar');
  if (navbar) {
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('scrolled', window.scrollY > 20);
    });
  }

  // --- Mobile nav toggle ---
  const toggle = document.querySelector('.nav-toggle');
  const navLinks = document.querySelector('.nav-links');
  const navActions = document.querySelector('.nav-actions');
  if (toggle) {
    toggle.addEventListener('click', () => {
      if (navLinks) navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
      if (navActions) navActions.style.display = navActions.style.display === 'flex' ? 'none' : 'flex';
    });
  }

  // --- Scroll animations ---
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

  // --- Filter buttons ---
  const filterBtns = document.querySelectorAll('.filter-btn');
  const courseCards = document.querySelectorAll('.course-card[data-category]');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const cat = btn.getAttribute('data-filter');
      courseCards.forEach(card => {
        if (cat === 'all' || card.getAttribute('data-category') === cat) {
          card.style.display = '';
          card.style.animation = 'fadeInCard 0.4s ease forwards';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // --- Module tabs ---
  const moduleTabs = document.querySelectorAll('.module-tab');
  const tabContents = document.querySelectorAll('.tab-content');
  moduleTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      moduleTabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
      const target = tab.getAttribute('data-tab');
      tabContents.forEach(content => {
        content.style.display = content.getAttribute('data-content') === target ? '' : 'none';
      });
    });
  });

  // --- Enroll Logic & Loading Bar ---
  const enrollBtns = document.querySelectorAll('.course-enroll, .sidebar-enroll, [data-enroll]');
  const toast = document.getElementById('toast');
  const toastText = document.getElementById('toast-text');

  enrollBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const courseId = btn.getAttribute('data-course-id') || 'se-1';
      const courseName = btn.getAttribute('data-course') || 'this course';
      
      // Call API IMMEDIATELY to store enrollment
      fetch(`api/index.php?path=enroll`, {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({ course_id: courseId })
      }).then(response => {
          if (response.ok) {
              // Only show loader if API call was successful
              showEnrollmentLoader(courseName, () => {
                  if (toast) {
                      if (toastText) toastText.textContent = `Enrolled in "${courseName}"! Analysis Complete.`;
                      toast.classList.add('show');
                      setTimeout(() => {
                          toast.classList.remove('show');
                          window.location.href = 'dashboard.php';
                      }, 1500); // Faster redirect for better UX
                  } else {
                      window.location.href = 'dashboard.php';
                  }
              });
          } else {
              alert("Wait! You must be signed in to enroll in this course.");
              window.location.href = 'login.php';
          }
      }).catch(err => {
          console.error("Enrollment failed:", err);
          alert("Something went wrong. Please try again.");
      });
    });
  });

  function showEnrollmentLoader(courseName, callback) {
      // Create overlay
      const overlay = document.createElement('div');
      overlay.className = 'enroll-overlay';
      overlay.innerHTML = `
        <div class="enroll-modal">
            <div class="loader-logo">⚡ AISEM ANALYZING</div>
            <p style="color:var(--text-secondary);margin-bottom:20px;">Applying AI to optimize your learning path for <br><strong>${courseName}</strong>...</p>
            <div class="enroll-progress-bg">
                <div class="enroll-progress-fill"></div>
            </div>
            <div class="enroll-status">Initializing AI weights...</div>
        </div>
      `;
      document.body.appendChild(overlay);

      const fill = overlay.querySelector('.enroll-progress-fill');
      const status = overlay.querySelector('.enroll-status');
      const steps = [
          "Connecting to AI Engine...",
          "Analyzing skills gap...",
          "Generating custom curriculum...",
          "Optimizing module sequence...",
          "Ready to start!"
      ];

      let progress = 0;
      let stepI = 0;
      const interval = setInterval(() => {
          progress += 2;
          fill.style.width = progress + '%';
          
          if (progress % 20 === 0 && stepI < steps.length) {
              status.innerText = steps[stepI];
              stepI++;
          }

          if (progress >= 100) {
              clearInterval(interval);
              setTimeout(() => {
                  overlay.style.opacity = '0';
                  setTimeout(() => {
                      overlay.remove();
                      callback();
                  }, 400);
              }, 500);
          }
      }, 40);
  }

  // --- Lesson click ---
  const lessons = document.querySelectorAll('.module-lesson');
  lessons.forEach(lesson => {
    lesson.addEventListener('click', () => {
      lessons.forEach(l => l.classList.remove('active'));
      lesson.classList.add('active');
    });
  });

  // --- Counter animation ---
  const counters = document.querySelectorAll('.counter');
  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
        entry.target.classList.add('counted');
        const target = parseInt(entry.target.getAttribute('data-target'));
        const suffix = entry.target.getAttribute('data-suffix') || '';
        let current = 0;
        const step = target / 60;
        const timer = setInterval(() => {
          current += step;
          if (current >= target) {
            current = target;
            clearInterval(timer);
          }
          entry.target.textContent = Math.floor(current).toLocaleString() + suffix;
        }, 16);
      }
    });
  }, { threshold: 0.5 });
  counters.forEach(c => counterObserver.observe(c));

  // --- Path step highlight ---
  const pathSteps = document.querySelectorAll('.path-step');
  pathSteps.forEach(step => {
    step.addEventListener('click', () => {
      pathSteps.forEach(s => s.classList.remove('completed'));
      step.classList.add('completed');
    });
  });

});
