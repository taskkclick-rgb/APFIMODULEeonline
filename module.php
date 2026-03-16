<?php
// module.php - Individual Module/Course Detail Page
$course_id = (int)($_GET['id'] ?? 1);

$all_courses = [
  1 => ['track'=>'se', 'track_label'=>'Software Engineering', 'emoji'=>'⚙️', 'bg'=>'bg-1', 'tag_class'=>'tag-se', 'tag_label'=>'Software Engineering', 'level'=>'Beginner', 'level_class'=>'level-beginner',
    'title'=>'Clean Code & SOLID Principles',
    'desc'=>'Write maintainable, scalable, and readable code using industry-proven principles. This module covers SOLID principles, DRY, KISS, YAGNI, refactoring techniques, and real-world examples of clean code in action.',
    'duration'=>'6h 30m', 'lessons_count'=>12,
    'instructor'=>'Sr. Software Engineer', 'instructor_init'=>'SE',
    'skills'=>['SOLID Principles', 'Clean Code', 'Refactoring', 'Code Review', 'Design Patterns'],
    'curriculum'=>[
      ['section'=>'Introduction', 'lessons'=>[
        ['icon'=>'▶️', 'title'=>'What is Clean Code?', 'duration'=>'12 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Why Code Quality Matters', 'duration'=>'8 min', 'type'=>'video'],
        ['icon'=>'📖', 'title'=>'Reading: Clean Code Chapter 1', 'duration'=>'15 min', 'type'=>'reading'],
      ]],
      ['section'=>'SOLID Principles', 'lessons'=>[
        ['icon'=>'▶️', 'title'=>'Single Responsibility Principle', 'duration'=>'18 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Open/Closed Principle', 'duration'=>'16 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Liskov Substitution Principle', 'duration'=>'14 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Interface Segregation', 'duration'=>'12 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Dependency Inversion', 'duration'=>'15 min', 'type'=>'video'],
        ['icon'=>'💻', 'title'=>'Hands-on: Refactor a Class', 'duration'=>'30 min', 'type'=>'exercise'],
      ]],
      ['section'=>'Clean Code Practices', 'lessons'=>[
        ['icon'=>'▶️', 'title'=>'Naming Conventions', 'duration'=>'10 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Functions & Methods', 'duration'=>'14 min', 'type'=>'video'],
        ['icon'=>'💻', 'title'=>'Code Review Exercise', 'duration'=>'45 min', 'type'=>'exercise'],
        ['icon'=>'🎯', 'title'=>'Final Assessment', 'duration'=>'30 min', 'type'=>'quiz'],
      ]],
    ]
  ],
  5 => ['track'=>'ai', 'track_label'=>'AI Prompting', 'emoji'=>'🤖', 'bg'=>'bg-2', 'tag_class'=>'tag-ai', 'tag_label'=>'AI Prompting', 'level'=>'Beginner', 'level_class'=>'level-beginner',
    'title'=>'AI Prompt Engineering Fundamentals',
    'desc'=>'Master the art and science of crafting effective prompts for large language models. Learn zero-shot, few-shot, and chain-of-thought prompting from scratch, with hands-on exercises using ChatGPT, Claude, and Gemini.',
    'duration'=>'4h 15m', 'lessons_count'=>10,
    'instructor'=>'AI Lead Engineer', 'instructor_init'=>'AI',
    'skills'=>['Prompt Design', 'Zero-shot Prompting', 'Few-shot Learning', 'Chain-of-Thought', 'AI for Coding'],
    'curriculum'=>[
      ['section'=>'Getting Started', 'lessons'=>[
        ['icon'=>'▶️', 'title'=>'What is Prompt Engineering?', 'duration'=>'10 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Understanding LLMs', 'duration'=>'12 min', 'type'=>'video'],
      ]],
      ['section'=>'Core Techniques', 'lessons'=>[
        ['icon'=>'▶️', 'title'=>'Zero-shot vs Few-shot', 'duration'=>'15 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Chain-of-Thought Prompting', 'duration'=>'18 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Role & Persona Prompting', 'duration'=>'12 min', 'type'=>'video'],
        ['icon'=>'💻', 'title'=>'Exercise: Write 10 Prompts', 'duration'=>'30 min', 'type'=>'exercise'],
      ]],
      ['section'=>'AI for Software Dev', 'lessons'=>[
        ['icon'=>'▶️', 'title'=>'Code Generation with AI', 'duration'=>'20 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Debugging with AI', 'duration'=>'15 min', 'type'=>'video'],
        ['icon'=>'💻', 'title'=>'AI Pair Programming Lab', 'duration'=>'45 min', 'type'=>'exercise'],
        ['icon'=>'🎯', 'title'=>'Assessment', 'duration'=>'20 min', 'type'=>'quiz'],
      ]],
    ]
  ],
  9 => ['track'=>'gh', 'track_label'=>'GitHub', 'emoji'=>'🐙', 'bg'=>'bg-3', 'tag_class'=>'tag-gh', 'tag_label'=>'GitHub', 'level'=>'Beginner', 'level_class'=>'level-beginner',
    'title'=>'Git & GitHub for Teams',
    'desc'=>'Master Git version control from scratch — commits, branching, merging, resolving conflicts, and working collaboratively with pull requests and code reviews on GitHub.',
    'duration'=>'5h 00m', 'lessons_count'=>14,
    'instructor'=>'Senior DevOps Lead', 'instructor_init'=>'DV',
    'skills'=>['Git Fundamentals', 'Branching', 'Pull Requests', 'Code Review', 'Collaboration'],
    'curriculum'=>[
      ['section'=>'Git Basics', 'lessons'=>[
        ['icon'=>'▶️', 'title'=>'What is Version Control?', 'duration'=>'8 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Installing Git & Setup', 'duration'=>'10 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'First Commit', 'duration'=>'12 min', 'type'=>'video'],
        ['icon'=>'💻', 'title'=>'Exercise: Init & Commit', 'duration'=>'20 min', 'type'=>'exercise'],
      ]],
      ['section'=>'Branching & Merging', 'lessons'=>[
        ['icon'=>'▶️', 'title'=>'Branches Explained', 'duration'=>'15 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Merging & Rebasing', 'duration'=>'18 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Resolving Conflicts', 'duration'=>'14 min', 'type'=>'video'],
        ['icon'=>'💻', 'title'=>'Branch Workflow Exercise', 'duration'=>'30 min', 'type'=>'exercise'],
      ]],
      ['section'=>'GitHub Collaboration', 'lessons'=>[
        ['icon'=>'▶️', 'title'=>'Pull Requests Deep Dive', 'duration'=>'20 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Code Review Best Practices', 'duration'=>'16 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'GitHub Issues & Projects', 'duration'=>'12 min', 'type'=>'video'],
        ['icon'=>'💻', 'title'=>'Team Collaboration Lab', 'duration'=>'45 min', 'type'=>'exercise'],
        ['icon'=>'🎯', 'title'=>'Final Quiz', 'duration'=>'25 min', 'type'=>'quiz'],
      ]],
    ]
  ],
  12 => ['track'=>'n8n', 'track_label'=>'n8n Automation', 'emoji'=>'⚡', 'bg'=>'bg-4', 'tag_class'=>'tag-n8n', 'tag_label'=>'n8n Automation', 'level'=>'Beginner', 'level_class'=>'level-beginner',
    'title'=>'n8n Automation Bootcamp',
    'desc'=>'Build powerful automated workflows from scratch using n8n\'s visual workflow editor. Connect APIs, set up webhooks, schedule automations, and eliminate repetitive manual tasks across your engineering team.',
    'duration'=>'4h 30m', 'lessons_count'=>11,
    'instructor'=>'Automation Architect', 'instructor_init'=>'AA',
    'skills'=>['n8n Basics', 'Workflow Design', 'API Connections', 'Webhooks', 'Scheduling'],
    'curriculum'=>[
      ['section'=>'n8n Foundations', 'lessons'=>[
        ['icon'=>'▶️', 'title'=>'What is n8n?', 'duration'=>'8 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Setting Up n8n Locally', 'duration'=>'12 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Your First Workflow', 'duration'=>'15 min', 'type'=>'video'],
      ]],
      ['section'=>'Building Workflows', 'lessons'=>[
        ['icon'=>'▶️', 'title'=>'Nodes & Connections', 'duration'=>'18 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Triggers & Webhooks', 'duration'=>'16 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Conditions & Branching', 'duration'=>'14 min', 'type'=>'video'],
        ['icon'=>'💻', 'title'=>'Exercise: Slack Notifier', 'duration'=>'30 min', 'type'=>'exercise'],
      ]],
      ['section'=>'Real-world Workflows', 'lessons'=>[
        ['icon'=>'▶️', 'title'=>'Connect GitHub + Slack', 'duration'=>'20 min', 'type'=>'video'],
        ['icon'=>'▶️', 'title'=>'Google Sheets Automation', 'duration'=>'18 min', 'type'=>'video'],
        ['icon'=>'💻', 'title'=>'Capstone: Team Workflow', 'duration'=>'60 min', 'type'=>'exercise'],
        ['icon'=>'🎯', 'title'=>'Final Assessment', 'duration'=>'25 min', 'type'=>'quiz'],
      ]],
    ]
  ],
];

// Default fallback
if (!isset($all_courses[$course_id])) {
  $course_id = 1;
}
$course = $all_courses[$course_id];
$page_title = $course['title'] . ' | AI Software Engineering Module';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars(substr($course['desc'], 0, 150)) ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .lesson-type-video { color: var(--primary-light); }
    .lesson-type-exercise { color: var(--accent-green); }
    .lesson-type-reading { color: var(--accent); }
    .lesson-type-quiz { color: #f87171; }
    .section-divider {
      padding: 12px 0 8px;
      font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em;
      color: var(--text-muted); border-top: 1px solid var(--border-light); margin-top: 8px;
    }
    .section-divider:first-child { border-top: none; margin-top: 0; }
    .skill-tag {
      display: inline-flex; padding: 5px 12px; border-radius: 100px;
      background: rgba(99,102,241,0.1); border: 1px solid rgba(99,102,241,0.2);
      font-size: 0.8rem; font-weight: 600; color: var(--primary-light); margin: 4px;
    }
    .instructor-card {
      display: flex; align-items: center; gap: 16px;
      padding: 20px; background: var(--bg-card);
      border: 1px solid var(--border-light); border-radius: var(--radius);
      margin-top: 24px;
    }
    .instructor-avatar-lg {
      width: 60px; height: 60px; border-radius: 50%; min-width: 60px;
      background: var(--gradient-1); display: flex; align-items: center; justify-content: center;
      font-size: 1.2rem; font-weight: 800; color: #fff;
    }
    .next-prev {
      display: flex; justify-content: space-between; gap: 16px; margin-top: 32px;
    }
    .nav-course-btn {
      flex: 1; padding: 14px 20px; border-radius: 10px;
      background: var(--bg-card); border: 1px solid var(--border-light);
      cursor: pointer; transition: var(--transition); text-align: left;
      text-decoration: none; color: var(--text-primary); display: block;
    }
    .nav-course-btn:hover { border-color: var(--primary); background: rgba(99,102,241,0.06); }
    .nav-course-btn.next { text-align: right; }
    .nav-course-label { font-size: 0.75rem; color: var(--text-muted); margin-bottom: 4px; display: block; }
    .nav-course-title { font-size: 0.9rem; font-weight: 700; }
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
    <a href="courses.php"><button class="btn-primary">All Courses</button></a>
  </div>
  <div class="nav-toggle" id="navToggle"><span></span><span></span><span></span></div>
</nav>

<!-- MODULE LAYOUT -->
<div class="module-layout">

  <!-- LEFT: Course Content -->
  <div class="module-content">
    <!-- Breadcrumb -->
    <div class="module-breadcrumb">
      <a href="index.php">Home</a>
      <span>/</span>
      <a href="courses.php">Courses</a>
      <span>/</span>
      <a href="courses.php?track=<?= $course['track'] ?>"><?= $course['track_label'] ?></a>
      <span>/</span>
      <span style="color:var(--text-secondary);"><?= htmlspecialchars($course['title']) ?></span>
    </div>

    <!-- Header -->
    <div class="module-header">
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
        <div class="course-tag <?= $course['tag_class'] ?>" style="position:static;"><?= $course['tag_label'] ?></div>
        <div class="course-card-level <?= $course['level_class'] ?>" style="display:flex;align-items:center;gap:6px;">
          <span class="level-dot"></span><?= $course['level'] ?>
        </div>
      </div>
      <h1 class="module-title"><?= htmlspecialchars($course['title']) ?></h1>
      <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;margin-top:12px;">
        <div style="display:flex;align-items:center;gap:6px;font-size:0.85rem;color:var(--text-muted);">
          <i class="fas fa-clock"></i> <?= $course['duration'] ?> total
        </div>
        <div style="display:flex;align-items:center;gap:6px;font-size:0.85rem;color:var(--text-muted);">
          <i class="fas fa-layer-group"></i> <?= $course['lessons_count'] ?> lessons
        </div>
        <div style="display:flex;align-items:center;gap:6px;font-size:0.85rem;color:var(--accent-green);">
          <i class="fas fa-certificate"></i> Certificate included
        </div>
      </div>
    </div>

    <!-- Video Player -->
    <div class="module-video-wrap">
      <div class="module-video-placeholder">
        <div style="font-size:5rem;margin-bottom:8px;"><?= $course['emoji'] ?></div>
        <div class="play-btn" id="playBtn"><i class="fas fa-play"></i></div>
        <div style="margin-top:16px;font-size:0.9rem;">Click to start: <strong>Lesson 1 — Introduction</strong></div>
      </div>
    </div>

    <!-- Description -->
    <p class="module-description"><?= htmlspecialchars($course['desc']) ?></p>

    <!-- Skills -->
    <div style="margin-bottom:32px;">
      <div style="font-size:0.875rem;font-weight:700;margin-bottom:12px;">What you'll learn:</div>
      <div>
        <?php foreach ($course['skills'] as $skill): ?>
          <span class="skill-tag">✓ <?= htmlspecialchars($skill) ?></span>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Tabs -->
    <div class="module-tabs">
      <div class="module-tab active" data-tab="curriculum">Curriculum</div>
      <div class="module-tab" data-tab="overview">Overview</div>
      <div class="module-tab" data-tab="resources">Resources</div>
    </div>

    <!-- Curriculum Tab -->
    <div data-content="curriculum">
      <?php 
        $lesson_num = 0;
        foreach ($course['curriculum'] as $section): 
      ?>
        <div class="section-divider"><?= htmlspecialchars($section['section']) ?></div>
        <?php foreach ($section['lessons'] as $lesson): 
          $lesson_num++;
          $type_class = 'lesson-type-' . $lesson['type'];
        ?>
          <div class="module-lesson <?= $lesson_num === 1 ? 'active' : '' ?>" id="lesson-<?= $lesson_num ?>">
            <span class="lesson-icon <?= $type_class ?>"><?= $lesson['icon'] ?></span>
            <span class="lesson-title"><?= htmlspecialchars($lesson['title']) ?></span>
            <span class="lesson-duration"><i class="fas fa-clock" style="margin-right:4px;"></i><?= $lesson['duration'] ?></span>
          </div>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </div>

    <!-- Overview Tab (hidden by default) -->
    <div data-content="overview" style="display:none;">
      <div class="instructor-card">
        <div class="instructor-avatar-lg"><?= $course['instructor_init'] ?></div>
        <div>
          <div style="font-size:0.75rem;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:4px;">Instructor</div>
          <div style="font-weight:700;font-size:1rem;"><?= $course['instructor'] ?></div>
          <div style="font-size:0.85rem;color:var(--text-secondary);margin-top:4px;">Expert in <?= $course['track_label'] ?> with 8+ years of industry experience.</div>
        </div>
      </div>
      <div style="margin-top:24px;padding:24px;background:var(--bg-card);border:1px solid var(--border-light);border-radius:var(--radius);">
        <div style="font-weight:700;margin-bottom:12px;">About This Course</div>
        <p style="color:var(--text-secondary);font-size:0.9rem;line-height:1.8;"><?= htmlspecialchars($course['desc']) ?></p>
        <div style="margin-top:20px;padding-top:20px;border-top:1px solid var(--border-light);">
          <div style="font-weight:700;margin-bottom:12px;">Prerequisites</div>
          <ul style="color:var(--text-secondary);font-size:0.875rem;list-style:disc;padding-left:20px;line-height:2;">
            <li>Basic understanding of software development</li>
            <li>A computer with internet access</li>
            <li>Enthusiasm to learn! 🚀</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Resources Tab (hidden by default) -->
    <div data-content="resources" style="display:none;">
      <div style="padding:32px;background:var(--bg-card);border:1px solid var(--border-light);border-radius:var(--radius);text-align:center;">
        <div style="font-size:2.5rem;margin-bottom:12px;">📎</div>
        <div style="font-weight:700;margin-bottom:8px;">Course Resources</div>
        <div style="color:var(--text-secondary);font-size:0.875rem;margin-bottom:20px;">Enroll to access all downloadable resources, templates, and reference sheets for this module.</div>
        <button class="sidebar-enroll" data-course="<?= htmlspecialchars($course['title']) ?>" data-enroll style="max-width:200px;">
          🚀 Enroll Now
        </button>
      </div>
    </div>

    <!-- Navigation -->
    <div class="next-prev">
      <a href="courses.php" class="nav-course-btn">
        <span class="nav-course-label"><i class="fas fa-arrow-left"></i> Back to</span>
        <div class="nav-course-title">All Courses</div>
      </a>
      <a href="courses.php?track=<?= $course['track'] ?>" class="nav-course-btn next">
        <span class="nav-course-label">Explore Track <i class="fas fa-arrow-right"></i></span>
        <div class="nav-course-title"><?= $course['track_label'] ?> Courses</div>
      </a>
    </div>
  </div>

  <!-- RIGHT: Sidebar -->
  <div class="module-sidebar">
    <div class="sidebar-card">
      <div class="sidebar-thumb <?= $course['bg'] ?>"><?= $course['emoji'] ?></div>
      <div class="sidebar-body">
        <div class="sidebar-price">Free</div>
        <div class="sidebar-price-sub">✓ Full access for team members</div>
        <button class="sidebar-enroll" data-course="<?= htmlspecialchars($course['title']) ?>" data-enroll>
          🚀 Enroll in This Module
        </button>
        <button class="btn-outline" style="width:100%;padding:12px;text-align:center;margin-bottom:0;cursor:pointer;"
          onclick="navigator.clipboard.writeText(window.location.href);this.textContent='✓ Link Copied!';">
          Share with Team
        </button>
        <div class="sidebar-include">
          <div class="sidebar-include-title">This module includes:</div>
          <div class="sidebar-include-item"><span class="icon"><i class="fas fa-check"></i></span> <?= $course['duration'] ?> on-demand content</div>
          <div class="sidebar-include-item"><span class="icon"><i class="fas fa-check"></i></span> <?= $course['lessons_count'] ?> structured lessons</div>
          <div class="sidebar-include-item"><span class="icon"><i class="fas fa-check"></i></span> Hands-on exercises & labs</div>
          <div class="sidebar-include-item"><span class="icon"><i class="fas fa-check"></i></span> Downloadable resources</div>
          <div class="sidebar-include-item"><span class="icon"><i class="fas fa-check"></i></span> Completion certificate</div>
          <div class="sidebar-include-item"><span class="icon"><i class="fas fa-check"></i></span> Team progress tracking</div>
        </div>
      </div>
    </div>

    <!-- Related Courses -->
    <div style="margin-top:24px;">
      <div style="font-size:0.85rem;font-weight:700;margin-bottom:16px;color:var(--text-secondary);text-transform:uppercase;letter-spacing:0.08em;">More in <?= $course['track_label'] ?></div>
      <div style="display:flex;flex-direction:column;gap:10px;">
        <a href="courses.php?track=<?= $course['track'] ?>" style="display:block;padding:14px;background:var(--bg-card);border:1px solid var(--border-light);border-radius:10px;text-decoration:none;color:var(--text-primary);transition:var(--transition);"
          onmouseover="this.style.borderColor='var(--primary)'" onmouseout="this.style.borderColor='var(--border-light)'">
          <div style="font-size:0.875rem;font-weight:600;">Browse All <?= $course['track_label'] ?> Modules</div>
          <div style="font-size:0.78rem;color:var(--text-muted);margin-top:3px;">View the complete track →</div>
        </a>
        <a href="courses.php" style="display:block;padding:14px;background:var(--bg-card);border:1px solid var(--border-light);border-radius:10px;text-decoration:none;color:var(--text-primary);transition:var(--transition);"
          onmouseover="this.style.borderColor='var(--primary)'" onmouseout="this.style.borderColor='var(--border-light)'">
          <div style="font-size:0.875rem;font-weight:600;">All Learning Modules</div>
          <div style="font-size:0.78rem;color:var(--text-muted);margin-top:3px;">14 courses across 4 tracks →</div>
        </a>
      </div>
    </div>
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
      <p class="footer-brand-desc">Professional eLearning for engineering teams.</p>
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
        <a href="courses.php">Courses</a>
        <a href="#">Team Portal</a>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-bottom-text">© 2025 AI Software Engineering Module. 🚀</div>
  </div>
</footer>

<script src="assets/js/main.js"></script>
<script>
// Play button effect
document.getElementById('playBtn')?.addEventListener('click', function() {
  this.innerHTML = '<i class="fas fa-pause"></i>';
  const wrap = this.closest('.module-video-wrap');
  if (wrap) {
    wrap.style.background = 'linear-gradient(135deg, #0f0f24, #1a1a3a)';
    const placeholder = wrap.querySelector('.module-video-placeholder');
    if(placeholder) placeholder.querySelector('.play-btn').innerHTML = '<i class="fas fa-pause"></i>';
  }
});
</script>
</body>
</html>
