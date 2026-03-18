<?php
// index.php - AI Software Engineering Module - Home
session_start();
$user = $_SESSION['user'] ?? null;
$page_title = "AI Software Engineering Module | Master AI, GitHub & n8n";
$page = 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page_title ?></title>
  <meta name="description" content="Professional onboarding training platform for Software Engineering, AI Prompting, GitHub, and n8n automation. Built for modern engineering teams.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    /* Hero visual decoration */
    .orbit-ring {
      position: absolute; border-radius: 50%; border: 1px solid rgba(99,102,241,0.12); pointer-events: none;
    }
    .orbit-ring.r1 { width: 300px; height: 300px; top: 50%; left: 50%; transform: translate(-50%,-50%); }
    .orbit-ring.r2 { width: 460px; height: 460px; top: 50%; left: 50%; transform: translate(-50%,-50%); }
    .orbit-dot {
      position: absolute; width: 10px; height: 10px; border-radius: 50%; background: var(--primary);
      box-shadow: 0 0 10px var(--primary);
    }
    .orbit-dot.d1 { top: 0; left: 50%; transform: translate(-50%, -50%); }
    .orbit-dot.d2 { bottom: 20%; right: 0; transform: translate(50%, 50%); background: var(--secondary); box-shadow: 0 0 10px var(--secondary); }
  </style>
</head>
<body>

<!-- Loader -->
<div id="loader">
  <div class="loader-logo">⚡ AISEM</div>
  <div class="loader-bar"><div class="loader-bar-inner"></div></div>
</div>

<!-- Toast -->
<div class="toast" id="toast">
  <span class="toast-icon"><i class="fas fa-check-circle"></i></span>
  <span class="toast-text" id="toast-text">Enrolled successfully!</span>
</div>

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
  <a href="index.php" class="nav-logo">
    <div class="nav-logo-icon">⚡</div>
    <div class="nav-logo-text">
      <span>AI Software Engineering</span>
      <span>Module</span>
    </div>
  </a>

  <div class="nav-links">
    <a href="index.php" class="active">Home</a>
    <a href="courses.php">Courses</a>
    <a href="courses.php?track=se">Software Eng.</a>
    <a href="courses.php?track=ai">AI Prompting</a>
    <a href="courses.php?track=gh">GitHub</a>
    <a href="courses.php?track=n8n">n8n</a>
  </div>

  <div class="nav-actions">
    <?php if ($user): ?>
      <a href="dashboard.php" style="color:var(--primary-light);font-weight:600;text-decoration:none;margin-right:12px;"><i class="fas fa-th-large"></i> Dashboard</a>
      <span style="font-size: 0.9rem; font-weight: 600; color: var(--text-primary); margin-right: 8px;">Hi, <?= htmlspecialchars($user['name']) ?> 👋</span>
      <a href="logout.php"><button class="btn-outline" style="padding: 6px 14px;">Sign Out</button></a>
    <?php else: ?>
      <a href="login.php"><button class="btn-outline">Sign In</button></a>
      <a href="courses.php"><button class="btn-primary">Start Learning</button></a>
    <?php endif; ?>
  </div>

  <div class="nav-toggle" id="navToggle">
    <span></span><span></span><span></span>
  </div>
</nav>

<!-- HERO -->
<section class="hero" id="hero">
  <div class="hero-bg-glow glow-1"></div>
  <div class="hero-bg-glow glow-2"></div>
  <div class="hero-bg-glow glow-3"></div>
  <div class="hero-grid"></div>

  <div class="hero-content">
    <!-- Left -->
    <div class="hero-text">
      <div class="hero-badge">
        <span></span>
        Team Onboarding Platform &bull; 2025 Edition
      </div>
      <h1 class="hero-title">
        Master <span class="highlight">AI, Software Engineering</span> & Modern Dev Tools
      </h1>
      <p class="hero-subtitle">
        A professional training platform built for engineering teams. Learn Software Engineering, AI Prompt Engineering, GitHub workflows, and n8n automation — all in one place.  
      </p>
      <div class="hero-cta">
        <a href="courses.php">
          <button class="btn-hero-primary">
            <i class="fas fa-rocket"></i> Explore Modules
          </button>
        </a>
        <a href="courses.php?track=ai">
          <button class="btn-hero-secondary">
            <i class="fas fa-play"></i> Watch Demo
          </button>
        </a>
      </div>
      <div class="hero-stats">
        <div class="hero-stat">
          <div class="hero-stat-number counter" data-target="24" data-suffix="+">24+</div>
          <div class="hero-stat-label">Modules</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-number counter" data-target="4" data-suffix="">4</div>
          <div class="hero-stat-label">Learning Tracks</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-number counter" data-target="120" data-suffix="h+">120h+</div>
          <div class="hero-stat-label">Content Hours</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-number counter" data-target="100" data-suffix="%">100%</div>
          <div class="hero-stat-label">Practical</div>
        </div>
      </div>
    </div>

    <!-- Right Visual -->
    <div class="hero-visual">
      <div class="hero-card-stack">
        <!-- Orbits -->
        <div class="orbit-ring r1"><div class="orbit-dot d1"></div></div>
        <div class="orbit-ring r2"><div class="orbit-dot d2"></div></div>

        <!-- Main Preview Card -->
        <div class="course-preview-card">
          <div class="course-preview-card-icon" style="background: rgba(99,102,241,0.15);">🤖</div>
          <h3>AI Prompt Engineering</h3>
          <p>Master ChatGPT, Claude & Gemini for software development teams</p>
          <div class="progress-label">
            <span>Module 3 of 8</span>
            <span>65%</span>
          </div>
          <div class="progress-bar">
            <div class="progress-fill" style="width:65%"></div>
          </div>
          <div style="margin-top:20px;display:flex;gap:8px;flex-wrap:wrap;">
            <span style="padding:4px 10px;background:rgba(99,102,241,0.15);border-radius:6px;font-size:0.75rem;color:var(--primary-light);">ChatGPT</span>
            <span style="padding:4px 10px;background:rgba(245,158,11,0.15);border-radius:6px;font-size:0.75rem;color:#fbbf24;">Claude</span>
            <span style="padding:4px 10px;background:rgba(16,185,129,0.15);border-radius:6px;font-size:0.75rem;color:#34d399;">Gemini</span>
          </div>
        </div>

        <!-- Floating badges -->
        <div class="floating-badge badge-1">
          <div class="floating-badge-icon" style="background:rgba(16,185,129,0.15);">✅</div>
          <div class="floating-badge-text">
            <strong>Module Complete</strong>
            <span>Git Branching Strategy</span>
          </div>
        </div>
        <div class="floating-badge badge-2">
          <div class="floating-badge-icon" style="background:rgba(6,182,212,0.15);">⚡</div>
          <div class="floating-badge-text">
            <strong>Live Workflow</strong>
            <span>n8n Automation Live</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- LEARNING TRACKS -->
<section id="tracks">
  <div class="container">
    <div class="section-header">
      <div class="section-label">Learning Tracks</div>
      <h2 class="section-title">4 <span class="highlight">Expert Tracks</span><br>Everything Your Team Needs</h2>
      <p class="section-subtitle">Structured learning paths designed for modern engineering teams, from fundamentals to advanced implementation.</p>
    </div>

    <div class="tracks-grid">
      <a href="courses.php?track=se" style="text-decoration:none;color:inherit;">
        <div class="track-card fade-up stagger-1">
          <div class="track-icon">⚙️</div>
          <div>
            <div class="track-title">Software Engineering</div>
            <div class="track-desc">SDLC, Clean Code principles, architecture patterns, testing, CI/CD pipelines, and DevOps fundamentals.</div>
          </div>
          <div class="track-meta">
            <span><i class="fas fa-book-open"></i> 8 modules</span>
            <span><i class="fas fa-clock"></i> 40h</span>
          </div>
          <div class="track-arrow"><i class="fas fa-arrow-right"></i></div>
        </div>
      </a>
      <a href="courses.php?track=ai" style="text-decoration:none;color:inherit;">
        <div class="track-card fade-up stagger-2">
          <div class="track-icon">🤖</div>
          <div>
            <div class="track-title">AI Prompt Engineering</div>
            <div class="track-desc">Master prompt design, chain-of-thought, few-shot learning, and production-ready AI integrations with ChatGPT, Claude & Gemini.</div>
          </div>
          <div class="track-meta">
            <span><i class="fas fa-book-open"></i> 7 modules</span>
            <span><i class="fas fa-clock"></i> 35h</span>
          </div>
          <div class="track-arrow"><i class="fas fa-arrow-right"></i></div>
        </div>
      </a>
      <a href="courses.php?track=gh" style="text-decoration:none;color:inherit;">
        <div class="track-card fade-up stagger-3">
          <div class="track-icon">🐙</div>
          <div>
            <div class="track-title">GitHub & Git Mastery</div>
            <div class="track-desc">From Git basics to advanced branching strategies, Pull Requests, GitHub Actions, CI/CD automation, and team collaboration.</div>
          </div>
          <div class="track-meta">
            <span><i class="fas fa-book-open"></i> 5 modules</span>
            <span><i class="fas fa-clock"></i> 25h</span>
          </div>
          <div class="track-arrow"><i class="fas fa-arrow-right"></i></div>
        </div>
      </a>
      <a href="courses.php?track=n8n" style="text-decoration:none;color:inherit;">
        <div class="track-card fade-up stagger-4">
          <div class="track-icon">⚡</div>
          <div>
            <div class="track-title">n8n Workflow Automation</div>
            <div class="track-desc">Build powerful automated workflows, API integrations, webhook triggers, and business logic with n8n — no code required to get started.</div>
          </div>
          <div class="track-meta">
            <span><i class="fas fa-book-open"></i> 4 modules</span>
            <span><i class="fas fa-clock"></i> 20h</span>
          </div>
          <div class="track-arrow"><i class="fas fa-arrow-right"></i></div>
        </div>
      </a>
    </div>
  </div>
</section>

<!-- FEATURED COURSES -->
<section id="courses" style="background: var(--bg-surface);">
  <div class="container">
    <div class="section-header" style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:24px;">
      <div>
        <div class="section-label">Featured Courses</div>
        <h2 class="section-title">Start Your <span class="highlight">Learning Journey</span></h2>
        <p class="section-subtitle">Curated modules for engineering teams to rapidly upskill in modern technologies.</p>
      </div>
      <a href="courses.php"><button class="btn-primary" style="flex-shrink:0;">View All Courses <i class="fas fa-arrow-right" style="margin-left:8px;"></i></button></a>
    </div>

    <div class="courses-filter">
      <button class="filter-btn active" data-filter="all">All</button>
      <button class="filter-btn" data-filter="se">Software Engineering</button>
      <button class="filter-btn" data-filter="ai">AI Prompting</button>
      <button class="filter-btn" data-filter="gh">GitHub</button>
      <button class="filter-btn" data-filter="n8n">n8n</button>
    </div>

    <div class="courses-grid">
      <!-- Course 1 -->
      <div class="course-card fade-up" data-category="se">
        <div class="course-card-thumb bg-1">
          <span style="position:relative;z-index:1;">⚙️</span>
          <div class="course-tag tag-se">Software Engineering</div>
        </div>
        <div class="course-card-body">
          <div class="course-card-level level-beginner"><span class="level-dot"></span>Beginner</div>
          <div class="course-card-title">Clean Code & SOLID Principles</div>
          <div class="course-card-desc">Write maintainable, scalable, and readable code using industry-proven principles and design patterns.</div>
          <div class="course-card-footer">
            <div class="course-meta">
              <div class="course-meta-item"><i class="fas fa-clock"></i> 6h 30m</div>
              <div class="course-meta-item"><i class="fas fa-layer-group"></i> 12 lessons</div>
            </div>
            <button class="course-enroll" data-course="Clean Code & SOLID Principles" data-enroll>Enroll</button>
          </div>
        </div>
      </div>

      <!-- Course 2 -->
      <div class="course-card fade-up stagger-1" data-category="ai">
        <div class="course-card-thumb bg-2">
          <span style="position:relative;z-index:1;">🤖</span>
          <div class="course-tag tag-ai">AI Prompting</div>
        </div>
        <div class="course-card-body">
          <div class="course-card-level level-beginner"><span class="level-dot"></span>Beginner</div>
          <div class="course-card-title">AI Prompt Engineering Fundamentals</div>
          <div class="course-card-desc">Learn the core techniques of prompting AI models effectively for software development tasks.</div>
          <div class="course-card-footer">
            <div class="course-meta">
              <div class="course-meta-item"><i class="fas fa-clock"></i> 4h 15m</div>
              <div class="course-meta-item"><i class="fas fa-layer-group"></i> 10 lessons</div>
            </div>
            <button class="course-enroll" data-course="AI Prompt Engineering Fundamentals" data-enroll>Enroll</button>
          </div>
        </div>
      </div>

      <!-- Course 3 -->
      <div class="course-card fade-up stagger-2" data-category="gh">
        <div class="course-card-thumb bg-3">
          <span style="position:relative;z-index:1;">🐙</span>
          <div class="course-tag tag-gh">GitHub</div>
        </div>
        <div class="course-card-body">
          <div class="course-card-level level-beginner"><span class="level-dot"></span>Beginner</div>
          <div class="course-card-title">Git & GitHub for Teams</div>
          <div class="course-card-desc">Master Git version control, branching strategies, pull requests, and collaborative workflows for engineering teams.</div>
          <div class="course-card-footer">
            <div class="course-meta">
              <div class="course-meta-item"><i class="fas fa-clock"></i> 5h 00m</div>
              <div class="course-meta-item"><i class="fas fa-layer-group"></i> 14 lessons</div>
            </div>
            <button class="course-enroll" data-course="Git & GitHub for Teams" data-enroll>Enroll</button>
          </div>
        </div>
      </div>

      <!-- Course 4 -->
      <div class="course-card fade-up stagger-3" data-category="n8n">
        <div class="course-card-thumb bg-4">
          <span style="position:relative;z-index:1;">⚡</span>
          <div class="course-tag tag-n8n">n8n</div>
        </div>
        <div class="course-card-body">
          <div class="course-card-level level-beginner"><span class="level-dot"></span>Beginner</div>
          <div class="course-card-title">n8n Automation Bootcamp</div>
          <div class="course-card-desc">Build your first automated workflows, connect APIs, and eliminate repetitive tasks using n8n visual automation.</div>
          <div class="course-card-footer">
            <div class="course-meta">
              <div class="course-meta-item"><i class="fas fa-clock"></i> 4h 30m</div>
              <div class="course-meta-item"><i class="fas fa-layer-group"></i> 11 lessons</div>
            </div>
            <button class="course-enroll" data-course="n8n Automation Bootcamp" data-enroll>Enroll</button>
          </div>
        </div>
      </div>

      <!-- Course 5 -->
      <div class="course-card fade-up stagger-1" data-category="ai">
        <div class="course-card-thumb bg-5">
          <span style="position:relative;z-index:1;">🧠</span>
          <div class="course-tag tag-ai">AI Prompting</div>
        </div>
        <div class="course-card-body">
          <div class="course-card-level level-intermediate"><span class="level-dot"></span>Intermediate</div>
          <div class="course-card-title">Advanced AI Integration for Developers</div>
          <div class="course-card-desc">Integrate OpenAI, Anthropic, and Google Gemini APIs into real-world applications with advanced patterns.</div>
          <div class="course-card-footer">
            <div class="course-meta">
              <div class="course-meta-item"><i class="fas fa-clock"></i> 8h 00m</div>
              <div class="course-meta-item"><i class="fas fa-layer-group"></i> 18 lessons</div>
            </div>
            <button class="course-enroll" data-course="Advanced AI Integration for Developers" data-enroll>Enroll</button>
          </div>
        </div>
      </div>

      <!-- Course 6 -->
      <div class="course-card fade-up stagger-2" data-category="se">
        <div class="course-card-thumb bg-6">
          <span style="position:relative;z-index:1;">🚀</span>
          <div class="course-tag tag-se">Software Engineering</div>
        </div>
        <div class="course-card-body">
          <div class="course-card-level level-advanced"><span class="level-dot"></span>Advanced</div>
          <div class="course-card-title">CI/CD Pipelines & DevOps</div>
          <div class="course-card-desc">Build robust CI/CD pipelines using GitHub Actions, Docker, and modern DevOps practices for production systems.</div>
          <div class="course-card-footer">
            <div class="course-meta">
              <div class="course-meta-item"><i class="fas fa-clock"></i> 10h 00m</div>
              <div class="course-meta-item"><i class="fas fa-layer-group"></i> 22 lessons</div>
            </div>
            <button class="course-enroll" data-course="CI/CD Pipelines & DevOps" data-enroll>Enroll</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- LEARNING PATH -->
<section class="learning-path">
  <div class="container">
    <div class="path-container">
      <div>
        <div class="section-label">Your Learning Path</div>
        <h2 class="section-title">A <span class="highlight">Structured Journey</span><br>From Zero to Expert</h2>
        <p class="section-subtitle" style="margin-bottom:40px;">Follow our proven onboarding path to quickly bring any team member up to speed with modern engineering tools and practices.</p>
        <div class="path-steps">
          <div class="path-step completed">
            <div class="path-step-num">✓</div>
            <div class="path-step-content">
              <div class="path-step-title">Foundations</div>
              <div class="path-step-desc">Git, terminal basics, VS Code setup, and team conventions</div>
            </div>
          </div>
          <div class="path-step">
            <div class="path-step-num">02</div>
            <div class="path-step-content">
              <div class="path-step-title">Software Engineering Core</div>
              <div class="path-step-desc">Clean Code, SOLID principles, architecture patterns, and testing</div>
            </div>
          </div>
          <div class="path-step">
            <div class="path-step-num">03</div>
            <div class="path-step-content">
              <div class="path-step-title">GitHub & Collaboration</div>
              <div class="path-step-desc">Branching, PRs, code reviews, and GitHub Actions CI/CD</div>
            </div>
          </div>
          <div class="path-step">
            <div class="path-step-num">04</div>
            <div class="path-step-content">
              <div class="path-step-title">AI Prompt Engineering</div>
              <div class="path-step-desc">Prompt design, AI-assisted coding, and integrating LLMs</div>
            </div>
          </div>
          <div class="path-step">
            <div class="path-step-num">05</div>
            <div class="path-step-content">
              <div class="path-step-title">n8n Automation</div>
              <div class="path-step-desc">Build live workflows, webhooks, and automated pipelines</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Path Visual -->
      <div class="path-visual fade-up">
        <div class="path-visual-header">
          <div class="path-visual-icon">🚀</div>
          <div>
            <div class="path-visual-title">Team Onboarding Track</div>
            <div class="path-visual-sub">Recommended for new team members</div>
          </div>
        </div>
        <div class="path-modules">
          <div class="path-module">
            <div class="path-module-icon">🐙</div>
            <div class="path-module-info">
              <div class="path-module-name">Git & GitHub Fundamentals</div>
              <div class="path-module-duration">5 hours • 14 lessons</div>
            </div>
            <div class="path-module-status status-done"><i class="fas fa-check"></i></div>
          </div>
          <div class="path-module">
            <div class="path-module-icon">⚙️</div>
            <div class="path-module-info">
              <div class="path-module-name">Clean Code & Best Practices</div>
              <div class="path-module-duration">6h 30m • 12 lessons</div>
            </div>
            <div class="path-module-status status-active"><i class="fas fa-play"></i></div>
          </div>
          <div class="path-module">
            <div class="path-module-icon">🤖</div>
            <div class="path-module-info">
              <div class="path-module-name">AI Prompting for Developers</div>
              <div class="path-module-duration">4h 15m • 10 lessons</div>
            </div>
            <div class="path-module-status status-locked"><i class="fas fa-lock"></i></div>
          </div>
          <div class="path-module">
            <div class="path-module-icon">⚡</div>
            <div class="path-module-info">
              <div class="path-module-name">n8n Workflow Automation</div>
              <div class="path-module-duration">4h 30m • 11 lessons</div>
            </div>
            <div class="path-module-status status-locked"><i class="fas fa-lock"></i></div>
          </div>
          <div class="path-module">
            <div class="path-module-icon">🚀</div>
            <div class="path-module-info">
              <div class="path-module-name">CI/CD & DevOps Pipelines</div>
              <div class="path-module-duration">10h • 22 lessons</div>
            </div>
            <div class="path-module-status status-locked"><i class="fas fa-lock"></i></div>
          </div>
        </div>
        <a href="courses.php">
          <button class="btn-primary" style="margin-top:24px;width:100%;padding:14px;border-radius:10px;">
            <i class="fas fa-rocket"></i> Start This Path
          </button>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- FEATURES -->
<section>
  <div class="container">
    <div class="section-header centered">
      <div class="section-label">Why AISEM</div>
      <h2 class="section-title">Built for <span class="highlight">Engineering Teams</span></h2>
      <p class="section-subtitle">Everything your team needs to train, track progress, and grow together as engineers.</p>
    </div>

    <div class="features-grid">
      <div class="feature-card fade-up stagger-1">
        <div class="feature-icon"><i class="fas fa-graduation-cap"></i></div>
        <div class="feature-title">Structured Curriculum</div>
        <div class="feature-desc">Industry-aligned modules built by engineering leads. No fluff — just practical, hands-on learning that applies immediately on the job.</div>
      </div>
      <div class="feature-card fade-up stagger-2">
        <div class="feature-icon" style="background:rgba(245,158,11,0.1);border-color:rgba(245,158,11,0.2);"><i class="fas fa-robot"></i></div>
        <div class="feature-title">AI-First Approach</div>
        <div class="feature-desc">Learn how to leverage AI tools like ChatGPT, Claude, and Gemini to supercharge your development workflow and productivity.</div>
      </div>
      <div class="feature-card fade-up stagger-3">
        <div class="feature-icon" style="background:rgba(16,185,129,0.1);border-color:rgba(16,185,129,0.2);"><i class="fas fa-chart-line"></i></div>
        <div class="feature-title">Track Team Progress</div>
        <div class="feature-desc">Monitor your team's learning progress in real-time, identify skill gaps, and celebrate completions with achievement badges.</div>
      </div>
      <div class="feature-card fade-up stagger-1">
        <div class="feature-icon" style="background:rgba(6,182,212,0.1);border-color:rgba(6,182,212,0.2);"><i class="fas fa-bolt"></i></div>
        <div class="feature-title">Learn by Doing</div>
        <div class="feature-desc">Every module includes hands-on exercises, real-world projects, and coding challenges that reinforce practical skills.</div>
      </div>
      <div class="feature-card fade-up stagger-2">
        <div class="feature-icon" style="background:rgba(139,92,246,0.1);border-color:rgba(139,92,246,0.2);"><i class="fas fa-code-branch"></i></div>
        <div class="feature-title">GitHub Integration</div>
        <div class="feature-desc">Submit assignments directly via GitHub PRs. Learn the exact workflow your team uses every day, in a real project setting.</div>
      </div>
      <div class="feature-card fade-up stagger-3">
        <div class="feature-icon" style="background:rgba(244,63,94,0.1);border-color:rgba(244,63,94,0.2);"><i class="fas fa-certificate"></i></div>
        <div class="feature-title">Earn Certificates</div>
        <div class="feature-desc">Complete tracks to earn team certifications. Add them to your profile and share your achievements with your organization.</div>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials-bg">
  <div class="container">
    <div class="section-header centered">
      <div class="section-label">Team Feedback</div>
      <h2 class="section-title">What <span class="highlight">Our Team</span> Says</h2>
      <p class="section-subtitle">Real feedback from engineers who completed the onboarding program.</p>
    </div>
    <div class="testimonials-grid">
      <div class="testimonial-card fade-up">
        <div class="stars">★★★★★</div>
        <div class="testimonial-quote">"</div>
        <div class="testimonial-text">The AI Prompt Engineering module completely changed how I work. I now use AI to write tests, document code, and debug 3x faster. This should be mandatory for all developers.</div>
        <div class="testimonial-author">
          <div class="testimonial-avatar">JA</div>
          <div>
            <div class="testimonial-name">John Andres</div>
            <div class="testimonial-role">Full Stack Developer</div>
          </div>
        </div>
      </div>
      <div class="testimonial-card fade-up stagger-1">
        <div class="stars">★★★★★</div>
        <div class="testimonial-quote">"</div>
        <div class="testimonial-text">The n8n automation track saved our team 20+ hours per week by automating repetitive workflows. The step-by-step approach made it easy to follow even for non-technical teammates.</div>
        <div class="testimonial-author">
          <div class="testimonial-avatar">SM</div>
          <div>
            <div class="testimonial-name">Sarah Mendez</div>
            <div class="testimonial-role">Operations Lead</div>
          </div>
        </div>
      </div>
      <div class="testimonial-card fade-up stagger-2">
        <div class="stars">★★★★★</div>
        <div class="testimonial-quote">"</div>
        <div class="testimonial-text">GitHub Actions and CI/CD module was eye-opening. Our team went from manual deployments to fully automated pipelines in 2 weeks. The quality of content is outstanding.</div>
        <div class="testimonial-author">
          <div class="testimonial-avatar">RK</div>
          <div>
            <div class="testimonial-name">Raven Kim</div>
            <div class="testimonial-role">DevOps Engineer</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA BANNER -->
<div class="cta-banner">
  <div class="cta-banner-glow g1"></div>
  <div class="cta-banner-glow g2"></div>
  <div class="cta-banner-content">
    <h2>Ready to Upskill Your Engineering Team?</h2>
    <p>Join the onboarding program today and transform how your team works with AI, GitHub, and automation tools.</p>
  </div>
  <div class="cta-banner-actions">
    <a href="courses.php"><button class="btn-cta-white">🚀 Start Learning Free</button></a>
    <a href="courses.php#tracks"><button class="btn-cta-outline">📋 View All Tracks</button></a>
  </div>
</div>

<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div>
      <a href="index.php" class="nav-logo" style="display:inline-flex;">
        <div class="nav-logo-icon">⚡</div>
        <div class="nav-logo-text">
          <span>AI Software Engineering</span>
          <span>Module</span>
        </div>
      </a>
      <p class="footer-brand-desc">A professional eLearning platform built for engineering teams to master AI, GitHub, Software Engineering, and n8n automation.</p>
      <div class="footer-social">
        <div class="social-btn"><i class="fab fa-github"></i></div>
        <div class="social-btn"><i class="fab fa-linkedin"></i></div>
        <div class="social-btn"><i class="fab fa-twitter"></i></div>
        <div class="social-btn"><i class="fab fa-discord"></i></div>
      </div>
    </div>
    <div>
      <div class="footer-col-title">Platform</div>
      <div class="footer-links">
        <a href="courses.php">All Courses</a>
        <a href="courses.php?track=se">Software Engineering</a>
        <a href="courses.php?track=ai">AI Prompting</a>
        <a href="courses.php?track=gh">GitHub</a>
        <a href="courses.php?track=n8n">n8n Automation</a>
      </div>
    </div>
    <div>
      <div class="footer-col-title">Resources</div>
      <div class="footer-links">
        <a href="#">Documentation</a>
        <a href="#">Project Templates</a>
        <a href="#">AI Prompt Library</a>
        <a href="#">GitHub Cheatsheet</a>
        <a href="#">n8n Workflows</a>
      </div>
    </div>
    <div>
      <div class="footer-col-title">Team</div>
      <div class="footer-links">
        <a href="#">About</a>
        <a href="#">Our Mission</a>
        <a href="#">Team Portal</a>
        <a href="#">Progress Dashboard</a>
        <a href="#">Contact</a>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-bottom-text">© 2025 AI Software Engineering Module. Built for engineering teams. 🚀</div>
    <div class="footer-bottom-text">Made with ❤️ for modern dev teams</div>
  </div>
</footer>

<script src="assets/js/main.js"></script>
</body>
</html>
