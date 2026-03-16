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

  // --- Enroll Toast ---
  const enrollBtns = document.querySelectorAll('.course-enroll, .sidebar-enroll, [data-enroll]');
  const toast = document.getElementById('toast');
  const toastText = document.getElementById('toast-text');

  enrollBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      if (toast) {
        const courseName = btn.getAttribute('data-course') || 'this course';
        if (toastText) toastText.textContent = `Enrolled in "${courseName}"! Check your email.`;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3500);
      }
    });
  });

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
