<?php
// courses.php - All Courses / Course Catalog
$page_title = "Courses | AI Software Engineering Module";
$active_track = $_GET['track'] ?? 'all';

$tracks = [
  'all' => ['label' => 'All Courses', 'icon' => '📚'],
  'se'  => ['label' => 'Software Engineering', 'icon' => '⚙️'],
  'ai'  => ['label' => 'AI Prompting', 'icon' => '🤖'],
  'gh'  => ['label' => 'GitHub', 'icon' => '🐙'],
  'n8n' => ['label' => 'n8n Automation', 'icon' => '⚡'],
];

$courses = [
  // Software Engineering
  ['id'=>1, 'track'=>'se', 'emoji'=>'⚙️', 'bg'=>'bg-1', 'tag_class'=>'tag-se', 'tag_label'=>'Software Engineering', 'level'=>'Beginner', 'level_class'=>'level-beginner',
   'title'=>'Clean Code & SOLID Principles', 'desc'=>'Write maintainable, scalable code using SOLID, DRY, KISS principles and practical design patterns.', 'duration'=>'6h 30m', 'lessons'=>12],
  ['id'=>2, 'track'=>'se', 'emoji'=>'🏗️', 'bg'=>'bg-6', 'tag_class'=>'tag-se', 'tag_label'=>'Software Engineering', 'level'=>'Intermediate', 'level_class'=>'level-intermediate',
   'title'=>'Software Architecture Patterns', 'desc'=>'MVC, microservices, event-driven architecture — design systems that scale gracefully under real-world pressure.', 'duration'=>'8h 00m', 'lessons'=>16],
  ['id'=>3, 'track'=>'se', 'emoji'=>'🧪', 'bg'=>'bg-1', 'tag_class'=>'tag-se', 'tag_label'=>'Software Engineering', 'level'=>'Intermediate', 'level_class'=>'level-intermediate',
   'title'=>'Testing & TDD Mastery', 'desc'=>'Unit testing, integration testing, and test-driven development with real-world examples and frameworks.', 'duration'=>'7h 00m', 'lessons'=>14],
  ['id'=>4, 'track'=>'se', 'emoji'=>'🚀', 'bg'=>'bg-6', 'tag_class'=>'tag-se', 'tag_label'=>'Software Engineering', 'level'=>'Advanced', 'level_class'=>'level-advanced',
   'title'=>'CI/CD Pipelines & DevOps', 'desc'=>'Build robust CI/CD pipelines using GitHub Actions, Docker, and modern DevOps practices for production.', 'duration'=>'10h 00m', 'lessons'=>22],
  // AI Prompting
  ['id'=>5, 'track'=>'ai', 'emoji'=>'🤖', 'bg'=>'bg-2', 'tag_class'=>'tag-ai', 'tag_label'=>'AI Prompting', 'level'=>'Beginner', 'level_class'=>'level-beginner',
   'title'=>'AI Prompt Engineering Fundamentals', 'desc'=>'Learn the science behind prompts — zero-shot, few-shot, and chain-of-thought prompting techniques.', 'duration'=>'4h 15m', 'lessons'=>10],
  ['id'=>6, 'track'=>'ai', 'emoji'=>'🧠', 'bg'=>'bg-5', 'tag_class'=>'tag-ai', 'tag_label'=>'AI Prompting', 'level'=>'Intermediate', 'level_class'=>'level-intermediate',
   'title'=>'ChatGPT for Software Developers', 'desc'=>'Use ChatGPT to write code, debug errors, write documentation, and accelerate your development workflow.', 'duration'=>'5h 30m', 'lessons'=>13],
  ['id'=>7, 'track'=>'ai', 'emoji'=>'💎', 'bg'=>'bg-2', 'tag_class'=>'tag-ai', 'tag_label'=>'AI Prompting', 'level'=>'Intermediate', 'level_class'=>'level-intermediate',
   'title'=>'Claude & Gemini for Engineering', 'desc'=>'Explore Anthropic\'s Claude and Google Gemini for long-context reasoning, code review, and architecture advice.', 'duration'=>'4h 00m', 'lessons'=>9],
  ['id'=>8, 'track'=>'ai', 'emoji'=>'🔗', 'bg'=>'bg-5', 'tag_class'=>'tag-ai', 'tag_label'=>'AI Prompting', 'level'=>'Advanced', 'level_class'=>'level-advanced',
   'title'=>'Advanced AI Integration for Developers', 'desc'=>'Integrate AI APIs into production apps with RAG, function calling, embeddings, and fine-tuning techniques.', 'duration'=>'8h 00m', 'lessons'=>18],
  // GitHub
  ['id'=>9, 'track'=>'gh', 'emoji'=>'🐙', 'bg'=>'bg-3', 'tag_class'=>'tag-gh', 'tag_label'=>'GitHub', 'level'=>'Beginner', 'level_class'=>'level-beginner',
   'title'=>'Git & GitHub for Teams', 'desc'=>'Master Git fundamentals, commit history, branching, merging, and setting up team repositories correctly.', 'duration'=>'5h 00m', 'lessons'=>14],
  ['id'=>10, 'track'=>'gh', 'emoji'=>'🌿', 'bg'=>'bg-3', 'tag_class'=>'tag-gh', 'tag_label'=>'GitHub', 'level'=>'Intermediate', 'level_class'=>'level-intermediate',
   'title'=>'Git Branching Strategies & PRs', 'desc'=>'GitFlow, GitHub Flow, feature branching — and how to write excellent pull requests that get merged fast.', 'duration'=>'3h 30m', 'lessons'=>8],
  ['id'=>11, 'track'=>'gh', 'emoji'=>'⚙️', 'bg'=>'bg-3', 'tag_class'=>'tag-gh', 'tag_label'=>'GitHub', 'level'=>'Advanced', 'level_class'=>'level-advanced',
   'title'=>'GitHub Actions & Automation', 'desc'=>'Build powerful automation workflows with GitHub Actions: linting, testing, deployment, and notification pipelines.', 'duration'=>'6h 30m', 'lessons'=>15],
  // n8n
  ['id'=>12, 'track'=>'n8n', 'emoji'=>'⚡', 'bg'=>'bg-4', 'tag_class'=>'tag-n8n', 'tag_label'=>'n8n Automation', 'level'=>'Beginner', 'level_class'=>'level-beginner',
   'title'=>'n8n Automation Bootcamp', 'desc'=>'Build your first workflows, connect APIs, and eliminate repetitive tasks using n8n\'s visual automation builder.', 'duration'=>'4h 30m', 'lessons'=>11],
  ['id'=>13, 'track'=>'n8n', 'emoji'=>'🔌', 'bg'=>'bg-4', 'tag_class'=>'tag-n8n', 'tag_label'=>'n8n Automation', 'level'=>'Intermediate', 'level_class'=>'level-intermediate',
   'title'=>'n8n API Integrations', 'desc'=>'Connect Slack, Notion, Google Sheets, GitHub, and hundreds of services into powerful automated pipelines.', 'duration'=>'5h 00m', 'lessons'=>12],
  ['id'=>14, 'track'=>'n8n', 'emoji'=>'🤖', 'bg'=>'bg-4', 'tag_class'=>'tag-n8n', 'tag_label'=>'n8n Automation', 'level'=>'Advanced', 'level_class'=>'level-advanced',
   'title'=>'n8n + AI Workflow Automation', 'desc'=>'Combine n8n with OpenAI and other AI tools to build intelligent, self-adapting automation workflows.', 'duration'=>'6h 00m', 'lessons'=>14],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page_title ?></title>
  <meta name="description" content="Browse all courses on Software Engineering, AI Prompting, GitHub, and n8n automation. Professional onboarding modules for engineering teams.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .courses-page { padding: 120px 48px 80px; }
    .courses-page-container { max-width: 1200px; margin: 0 auto; }
    .track-tabs-wrap {
      display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 40px;
      padding-bottom: 24px; border-bottom: 1px solid var(--border-light);
    }
    .track-tab-btn {
      display: flex; align-items: center; gap: 8px;
      padding: 10px 20px; border-radius: 10px; font-size: 0.875rem; font-weight: 600;
      background: rgba(255,255,255,0.04); border: 1px solid var(--border-light);
      color: var(--text-secondary); cursor: pointer; transition: var(--transition);
      text-decoration: none;
    }
    .track-tab-btn:hover { background: rgba(99,102,241,0.08); border-color: var(--primary); color: var(--primary-light); }
    .track-tab-btn.active { background: rgba(99,102,241,0.15); border-color: var(--primary); color: var(--primary-light); }
    .courses-header-row {
      display: flex; align-items: center; justify-content: space-between;
      margin-bottom: 32px; flex-wrap: wrap; gap: 16px;
    }
    .courses-count { font-size: 0.9rem; color: var(--text-muted); }
    .courses-count strong { color: var(--text-primary); }
    .courses-sort {
      padding: 8px 16px; border-radius: 8px;
      background: rgba(255,255,255,0.05); border: 1px solid var(--border-light);
      color: var(--text-secondary); font-size: 0.85rem; font-family: 'Inter', sans-serif; cursor: pointer;
      outline: none;
    }
    .no-courses {
      text-align: center; padding: 80px 40px;
      color: var(--text-muted); font-size: 1rem;
    }
    .no-courses-icon { font-size: 3rem; margin-bottom: 16px; display: block; }
    @media (max-width: 768px) {
      .courses-page { padding: 100px 24px 60px; }
    }
  </style>
</head>
<body>

<!-- Toast -->
<div class="toast" id="toast">
  <span class="toast-icon"><i class="fas fa-check-circle"></i></span>
  <span class="toast-text" id="toast-text">Enrolled successfully!</span>
</div>

<!-- NAVBAR -->
<nav class="navbar scrolled" id="navbar">
  <a href="index.php" class="nav-logo">
    <div class="nav-logo-icon">⚡</div>
    <div class="nav-logo-text">
      <span>AI Software Engineering</span>
      <span>Module</span>
    </div>
  </a>
  <div class="nav-links">
    <a href="index.php">Home</a>
    <a href="courses.php" class="active">Courses</a>
    <a href="courses.php?track=se">Software Eng.</a>
    <a href="courses.php?track=ai">AI Prompting</a>
    <a href="courses.php?track=gh">GitHub</a>
    <a href="courses.php?track=n8n">n8n</a>
  </div>
  <div class="nav-actions">
    <a href="login.php"><button class="btn-outline">Sign In</button></a>
    <a href="courses.php"><button class="btn-primary">Start Learning</button></a>
  </div>
  <div class="nav-toggle" id="navToggle"><span></span><span></span><span></span></div>
</nav>

<!-- PAGE HERO -->
<div class="page-hero">
  <div class="hero-bg-glow glow-1" style="opacity:0.5;"></div>
  <div class="hero-grid"></div>
  <div style="position:relative;z-index:1;">
    <div class="section-label" style="justify-content:center;"><?= $tracks[$active_track]['icon'] ?> <?= $tracks[$active_track]['label'] ?></div>
    <h1 class="page-hero-title">
      <?php if ($active_track === 'all'): ?>
        All <span style="background:var(--gradient-1);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Learning Modules</span>
      <?php else: ?>
        <span style="background:var(--gradient-1);-webkit-background-clip:text;-webkit-text-fill-color:transparent;"><?= $tracks[$active_track]['label'] ?></span> Courses
      <?php endif; ?>
    </h1>
    <p class="page-hero-sub">Professional training modules for modern engineering teams. Learn at your own pace.</p>
    <div class="search-bar-wrap">
      <input type="text" class="search-bar" id="courseSearch" placeholder="Search courses, topics, tools...">
      <span class="search-icon"><i class="fas fa-search"></i></span>
    </div>
  </div>
</div>

<!-- COURSES PAGE CONTENT -->
<div class="courses-page">
  <div class="courses-page-container">

    <!-- Track Tabs -->
    <div class="track-tabs-wrap">
      <a href="courses.php" class="track-tab-btn <?= $active_track === 'all' ? 'active' : '' ?>">
        📚 All Courses <span style="font-size:0.75rem;background:rgba(255,255,255,0.1);padding:2px 8px;border-radius:12px;"><?= count($courses) ?></span>
      </a>
      <?php foreach ($tracks as $key => $track): if ($key === 'all') continue; ?>
        <?php $count = count(array_filter($courses, fn($c) => $c['track'] === $key)); ?>
        <a href="courses.php?track=<?= $key ?>" class="track-tab-btn <?= $active_track === $key ? 'active' : '' ?>">
          <?= $track['icon'] ?> <?= $track['label'] ?>
          <span style="font-size:0.75rem;background:rgba(255,255,255,0.1);padding:2px 8px;border-radius:12px;"><?= $count ?></span>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- Header row -->
    <?php $filtered = $active_track === 'all' ? $courses : array_values(array_filter($courses, fn($c) => $c['track'] === $active_track)); ?>
    <div class="courses-header-row">
      <div class="courses-count">
        Showing <strong><?= count($filtered) ?></strong> <?= count($filtered) === 1 ? 'course' : 'courses' ?>
        <?= $active_track !== 'all' ? 'in ' . $tracks[$active_track]['label'] : '' ?>
      </div>
      <select class="courses-sort">
        <option>Sort: Recommended</option>
        <option>Sort: Newest</option>
        <option>Sort: Beginner First</option>
        <option>Sort: Duration</option>
      </select>
    </div>

    <!-- Courses Grid -->
    <?php if (empty($filtered)): ?>
      <div class="no-courses">
        <span class="no-courses-icon">🔍</span>
        No courses found. <a href="courses.php" style="color:var(--primary-light);">Browse all courses</a>
      </div>
    <?php else: ?>
      <div class="courses-grid" id="coursesGrid">
        <?php foreach ($filtered as $i => $course): ?>
        <div class="course-card fade-up <?= 'stagger-' . (($i % 3) + 1) ?>" data-category="<?= $course['track'] ?>" data-search="<?= strtolower($course['title'] . ' ' . $course['desc']) ?>">
          <div class="course-card-thumb <?= $course['bg'] ?>">
            <span style="position:relative;z-index:1;"><?= $course['emoji'] ?></span>
            <div class="course-tag <?= $course['tag_class'] ?>"><?= $course['tag_label'] ?></div>
          </div>
          <div class="course-card-body">
            <div class="course-card-level <?= $course['level_class'] ?>">
              <span class="level-dot"></span><?= $course['level'] ?>
            </div>
            <div class="course-card-title"><?= htmlspecialchars($course['title']) ?></div>
            <div class="course-card-desc"><?= htmlspecialchars($course['desc']) ?></div>
            <div class="course-card-footer">
              <div class="course-meta">
                <div class="course-meta-item"><i class="fas fa-clock"></i> <?= $course['duration'] ?></div>
                <div class="course-meta-item"><i class="fas fa-layer-group"></i> <?= $course['lessons'] ?> lessons</div>
              </div>
              <button class="course-enroll" data-course="<?= htmlspecialchars($course['title']) ?>" data-enroll
                onclick="window.location='module.php?id=<?= $course['id'] ?>'">
                View →
              </button>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</div>

<!-- CTA BANNER -->
<div class="cta-banner">
  <div class="cta-banner-glow g1"></div>
  <div class="cta-banner-glow g2"></div>
  <div class="cta-banner-content">
    <h2>Not sure where to start?</h2>
    <p>Follow our recommended Team Onboarding Path — structured modules in the right order.</p>
  </div>
  <div class="cta-banner-actions">
    <a href="index.php#tracks"><button class="btn-cta-white">🗺️ View Learning Paths</button></a>
    <a href="index.php"><button class="btn-cta-outline">🏠 Back to Home</button></a>
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
      <p class="footer-brand-desc">Professional eLearning platform for engineering teams.</p>
    </div>
    <div>
      <div class="footer-col-title">Tracks</div>
      <div class="footer-links">
        <a href="courses.php?track=se">Software Engineering</a>
        <a href="courses.php?track=ai">AI Prompting</a>
        <a href="courses.php?track=gh">GitHub</a>
        <a href="courses.php?track=n8n">n8n Automation</a>
      </div>
    </div>
    <div>
      <div class="footer-col-title">Resources</div>
      <div class="footer-links">
        <a href="#">Prompt Library</a>
        <a href="#">GitHub Cheatsheet</a>
        <a href="#">n8n Templates</a>
      </div>
    </div>
    <div>
      <div class="footer-col-title">Company</div>
      <div class="footer-links">
        <a href="index.php">Home</a>
        <a href="#">Team Portal</a>
        <a href="#">Contact</a>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-bottom-text">© 2025 AI Software Engineering Module. 🚀</div>
  </div>
</footer>

<script src="assets/js/main.js"></script>
<script>
// Live search
const searchInput = document.getElementById('courseSearch');
if (searchInput) {
  searchInput.addEventListener('input', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.course-card[data-search]').forEach(card => {
      const text = card.getAttribute('data-search');
      card.style.display = text.includes(q) ? '' : 'none';
    });
  });
}
</script>
</body>
</html>
