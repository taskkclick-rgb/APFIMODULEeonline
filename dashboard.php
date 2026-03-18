<?php
// dashboard.php - User Learning Dashboard
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['user'];
$enrollments = $_SESSION['enrollments'] ?? [];
$page_title = "My Dashboard | AISEM";

// ALL courses for mapping to their metadata
$course_data = [
    // Software Engineering
    'se-1' => ['title' => 'Clean Code & SOLID Principles', 'emoji' => '⚙️', 'category' => 'Software Engineering', 'lessons' => 12],
    'se-2' => ['title' => 'Software Architecture Patterns', 'emoji' => '🏗️', 'category' => 'Software Engineering', 'lessons' => 16],
    'se-3' => ['title' => 'Testing & TDD Mastery', 'emoji' => '🧪', 'category' => 'Software Engineering', 'lessons' => 14],
    'se-4' => ['title' => 'CI/CD Pipelines & DevOps', 'emoji' => '🚀', 'category' => 'Software Engineering', 'lessons' => 22],
    
    // AI Prompting
    'ai-5' => ['title' => 'AI Prompt Engineering Fundamentals', 'emoji' => '🤖', 'category' => 'AI Prompting', 'lessons' => 10],
    'ai-6' => ['title' => 'ChatGPT for Software Developers', 'emoji' => '🧠', 'category' => 'AI Prompting', 'lessons' => 13],
    'ai-7' => ['title' => 'Claude & Gemini for Engineering', 'emoji' => '💎', 'category' => 'AI Prompting', 'lessons' => 9],
    'ai-8' => ['title' => 'Advanced AI Integration for Developers', 'emoji' => '🔗', 'category' => 'AI Prompting', 'lessons' => 18],
    
    // GitHub
    'gh-9' => ['title' => 'Git & GitHub for Teams', 'emoji' => '🐙', 'category' => 'GitHub', 'lessons' => 14],
    'gh-10' => ['title' => 'Git Branching Strategies & PRs', 'emoji' => '🌿', 'category' => 'GitHub', 'lessons' => 8],
    'gh-11' => ['title' => 'GitHub Actions & Automation', 'emoji' => '⚙️', 'category' => 'GitHub', 'lessons' => 15],
    
    // n8n
    'n8n-12' => ['title' => 'n8n Automation Bootcamp', 'emoji' => '⚡', 'category' => 'n8n Automation', 'lessons' => 11],
    'n8n-13' => ['title' => 'n8n API Integrations', 'emoji' => '🔌', 'category' => 'n8n Automation', 'lessons' => 12],
    'n8n-14' => ['title' => 'n8n + AI Workflow Automation', 'emoji' => '🤖', 'category' => 'n8n Automation', 'lessons' => 14],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page_title ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Space+Grotesk:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body { background: var(--bg-dark); }
    .dashboard-wrap { padding: 120px 48px 80px; max-width: 1200px; margin: 0 auto; }
    .dash-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 40px; }
    .dash-welcome h1 { font-family: 'Space Grotesk', sans-serif; font-size: 2.2rem; margin-bottom: 8px; }
    .dash-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 24px; }
    .dash-card { background: var(--bg-card); border: 1px solid var(--border-light); border-radius: 20px; padding: 24px; transition: var(--transition); }
    .dash-card:hover { border-color: var(--primary); transform: translateY(-4px); }
    .dash-card-top { display: flex; gap: 16px; margin-bottom: 20px; }
    .dash-card-icon { width: 50px; height: 50px; border-radius: 12px; background: rgba(99,102,241,0.1); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; }
    .dash-card-info h3 { font-size: 1.1rem; margin-bottom: 4px; line-height: 1.3; }
    .dash-card-info p { font-size: 0.8rem; color: var(--text-muted); }
    .dash-progress-wrap { margin-bottom: 20px; }
    .dash-progress-text { display: flex; justify-content: space-between; font-size: 0.8rem; margin-bottom: 8px; font-weight: 600; }
    .dash-btn-group { display: flex; gap: 10px; }
    .btn-dash { flex: 1; padding: 10px; border-radius: 10px; font-size: 0.85rem; font-weight: 700; cursor: pointer; border: none; transition: var(--transition); }
    .btn-continue { background: var(--gradient-1); color: #fff; }
    .btn-pause { background: rgba(255,255,255,0.05); color: var(--text-primary); border: 1px solid var(--border-light); }
    .empty-dash { text-align: center; padding: 60px; border: 2px dashed var(--border-light); border-radius: 20px; color: var(--text-muted); }
  </style>
</head>
<body>
  <nav class="navbar scrolled">
    <a href="index.php" class="nav-logo">
      <div class="nav-logo-icon">⚡</div>
      <div class="nav-logo-text"><span>AI Software Engineering</span><span>Module</span></div>
    </a>
    <div class="nav-actions">
      <span style="font-size:0.9rem;font-weight:600;">Hi, <?= htmlspecialchars($user['name']) ?> 👋</span>
      <a href="logout.php"><button class="btn-outline">Sign Out</button></a>
    </div>
  </nav>

  <div class="dashboard-wrap">
    <div class="dash-header">
      <div class="dash-welcome">
        <div class="section-label">Student Dashboard</div>
        <h1>My <span class="highlight">Learning modules</span></h1>
        <p class="section-subtitle">Track your progress and continue your engineering journey.</p>
      </div>
      <a href="courses.php"><button class="btn-primary">Browse More Courses</button></a>
    </div>

    <?php if (empty($enrollments)): ?>
      <div class="empty-dash">
        <div style="font-size:3rem;margin-bottom:16px;">📚</div>
        <h3>No courses enrolled yet</h3>
        <p style="margin-bottom:20px;">Explore our catalog and start your first AI module!</p>
        <a href="courses.php"><button class="btn-primary">View Courses</button></a>
      </div>
    <?php else: ?>
      <div class="dash-grid">
        <?php foreach ($enrollments as $item): 
            $id_parts = explode('-', $item['course_id']);
            $raw_id = (int)end($id_parts);
            $details = $course_data[$item['course_id']] ?? ['title' => 'Module '.$raw_id, 'emoji' => '🚀', 'category' => 'Course', 'lessons' => 10];
        ?>
            <div class="dash-card" data-raw-id="<?= $raw_id ?>" data-total-lessons="<?= $details['lessons'] ?>">
              <div class="dash-card-top">
                <div class="dash-card-icon"><?= $details['emoji'] ?></div>
                <div class="dash-card-info">
                  <h3><?= htmlspecialchars($details['title']) ?></h3>
                  <p><?= $details['category'] ?></p>
                </div>
              </div>
              
              <div class="dash-progress-wrap">
                <div class="dash-progress-text">
                  <span>Progress</span>
                  <span class="progress-percent">0%</span>
                </div>
                <div class="progress-bar">
                  <div class="progress-fill" style="width:0%"></div>
                </div>
              </div>

              <div class="dash-btn-group">
                <button class="btn-dash btn-continue" onclick="window.location='module.php?id=<?= $raw_id ?>'">
                  <i class="fas fa-play"></i> Continue
                </button>
                <button class="btn-dash btn-pause" onclick="togglePause(this, '<?= $item['course_id'] ?>')">
                  <i class="fas fa-pause"></i> Pause
                </button>
              </div>
            </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.dash-card');
        cards.forEach(card => {
            const courseId = card.getAttribute('data-raw-id');
            const total = parseInt(card.getAttribute('data-total-lessons'));
            const completed = JSON.parse(localStorage.getItem('completed_lessons_' + courseId) || '[]');
            const percent = total > 0 ? Math.round((completed.length / total) * 100) : 0;
            card.querySelector('.progress-percent').innerText = percent + '%';
            card.querySelector('.progress-fill').style.width = percent + '%';
        });
    });

    async function togglePause(btn, courseId) {
        const isPause = btn.innerText.includes('Pause');
        const newStatus = isPause ? 'paused' : 'active';
        const res = await fetch(`api.php?path=update_progress`, {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ course_id: courseId, status: newStatus })
        });
        if(res.ok) {
            btn.innerHTML = isPause ? '<i class="fas fa-play"></i> Resume' : '<i class="fas fa-pause"></i> Pause';
        }
    }
  </script>
</body>
</html>
