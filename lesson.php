<?php
session_start();
$user = $_SESSION['user'] ?? null;
$course_id = (int)($_GET['cid'] ?? 1);
$lesson_id = (int)($_GET['lid'] ?? 1);

// All lesson content organized by course_id => lessons array
$lessons_db = [
  // SE-1: Clean Code
  1 => [
    1 => ['title'=>'What is Clean Code?','duration'=>'12 min','type'=>'video','content'=>'<h2>What is Clean Code?</h2><p>Clean code is code that is <strong>easy to understand</strong>, <strong>easy to change</strong>, and <strong>easy to maintain</strong>. It was popularized by Robert C. Martin (Uncle Bob) in his book "Clean Code: A Handbook of Agile Software Craftsmanship."</p><h3>Key Characteristics of Clean Code</h3><ul><li><strong>Readable:</strong> Other developers can understand your code without extra explanation.</li><li><strong>Simple:</strong> Each function does one thing and does it well.</li><li><strong>Testable:</strong> Code is structured so it can be easily tested.</li><li><strong>DRY (Don\'t Repeat Yourself):</strong> No duplicate logic.</li><li><strong>Meaningful Names:</strong> Variables, functions, and classes have descriptive names.</li></ul><h3>Why Does It Matter?</h3><p>Studies show that developers spend <strong>10x more time reading code than writing it</strong>. Clean code reduces bugs, speeds up onboarding, and makes your team more productive.</p>'],
    2 => ['title'=>'Why Code Quality Matters','duration'=>'8 min','type'=>'video','content'=>'<h2>Why Code Quality Matters</h2><p>Code quality directly impacts your team\' velocity, bug rate, and developer happiness.</p><h3>The Cost of Bad Code</h3><ul><li><strong>Technical Debt:</strong> Every shortcut today becomes a tax on future development.</li><li><strong>Bug Multiplication:</strong> Messy code hides bugs that compound over time.</li><li><strong>Slow Onboarding:</strong> New team members take 3-5x longer to become productive in a messy codebase.</li><li><strong>Developer Burnout:</strong> Working in bad code is frustrating and demotivating.</li></ul>'],
    3 => ['title'=>'Reading: Clean Code Chapter 1','duration'=>'15 min','type'=>'reading','content'=>'<h2>📖 Reading: Clean Code Chapter 1 Summary</h2><p>Chapter 1 sets the foundation for why clean code matters and what it looks like in practice.</p><h3>Key Takeaways</h3><ul><li><strong>There Will Be Code:</strong> Despite advances in AI, code will always exist.</li><li><strong>The Boy Scout Rule:</strong> "Leave the campground cleaner than you found it." Always improve code when you touch it.</li><li><strong>Code is Communication:</strong> Code is read far more than it is written.</li></ul>'],
    4 => ['title'=>'Single Responsibility Principle','duration'=>'18 min','type'=>'video','content'=>'<h2>Single Responsibility Principle (SRP)</h2><p>The SRP states: <strong>"A class should have only one reason to change."</strong></p><h3>Example: Violating SRP</h3><pre><code>class UserManager {
    function createUser($data) { /* creates user */ }
    function sendEmail($user) { /* sends welcome email */ }
    function generateReport($users) { /* creates PDF report */ }
}</code></pre><p>This class has THREE reasons to change: user logic, email logic, and reporting logic.</p><h3>Example: Following SRP</h3><pre><code>class UserService { function createUser($data) { } }
class EmailService { function sendWelcomeEmail($user) { } }
class ReportGenerator { function generateUserReport($users) { } }</code></pre>'],
  ],
  // SE-2: Architecture
  2 => [
    1 => ['title'=>'Introduction to Patterns','duration'=>'15 min','type'=>'video','content'=>'<h2>Introduction to Architecture Patterns</h2><p>Architecture patterns provide high-level strategies for structuring software systems.</p><h3>Common Patterns</h3><ul><li><strong>Monolithic:</strong> Entire application in a single codebase.</li><li><strong>Layered (N-Tier):</strong> Separating UI, Logic, and Data.</li><li><strong>Microservices:</strong> Independent services communicating over a network.</li><li><strong>Event-Driven:</strong> Decoupled systems reacting to changes.</li></ul>'],
    2 => ['title'=>'The Monolith vs Microservices','duration'=>'25 min','type'=>'video','content'=>'<h2>The Monolith vs Microservices</h2><p>Choosing between a monolith and microservices is one of the most critical architecture decisions.</p><h3>Monolith Pros/Cons</h3><p>+ Simple to deploy, fast development early on. - Hard to scale, one error can bring down everything.</p><h3>Microservices Pros/Cons</h3><p>+ Scale independent parts, use different technologies. - High complexity, distributed system overhead.</p>'],
  ],
  // SE-3: Testing
  3 => [
    1 => ['title'=>'Why We Test','duration'=>'10 min','type'=>'video','content'=>'<h2>Why We Test Software</h2><p>Testing is the only way to ensure your code works as expected and stays working after changes.</p><h3>Benefits of Testing</h3><ul><li><strong>Confidence:</strong> You know your refactoring didn\'t break anything.</li><li><strong>Documentation:</strong> Tests show how the code is expected to behave.</li><li><strong>Design:</strong> Writing tests forces you to write decoupled, clean code.</li></ul>'],
    2 => ['title'=>'The Testing Pyramid','duration'=>'12 min','type'=>'video','content'=>'<h2>The Testing Pyramid</h2><p>A healthy test suite follows the pyramid structure:</p><ul><li><strong>Unit Tests (Base):</strong> Thousands of small, fast tests for individual functions.</li><li><strong>Integration Tests (Middle):</strong> Hundreds of tests for how components work together.</li><li><strong>E2E Tests (Top):</strong> Dozens of slow, real-browser tests for critical paths.</li></ul>'],
  ],
  // AI-5: Prompt Engineering
  5 => [
    1 => ['title'=>'What is Prompt Engineering?','duration'=>'10 min','type'=>'video','content'=>'<h2>What is Prompt Engineering?</h2><p>Prompt engineering is the process of structuring text so that it can be interpreted and understood by a generative AI model.</p><h3>Key Elements of a Good Prompt</h3><ul><li><strong>Persona:</strong> Act as a Senior PHP Developer.</li><li><strong>Task:</strong> Write a login script.</li><li><strong>Context:</strong> Using PDO and MySQL.</li><li><strong>Constraint:</strong> Focus on security (no SQL injection).</li></ul>'],
    2 => ['title'=>'Understanding LLMs','duration'=>'12 min','type'=>'video','content'=>'<h2>How LLMs Work</h2><p>Large Language Models (LLMs) are statistical engines that predict the next most likely word in a sequence.</p><h3>Why This Matters for Prompts</h3><p>Because LLMs are statistical, clear context and specific instructions reduce "hallucinations" and improve the relevance of the output.</p>'],
  ],
  // GH-9: Git
  9 => [
    1 => ['title'=>'What is Version Control?','duration'=>'8 min','type'=>'video','content'=>'<h2>What is Version Control?</h2><p>Version control tracks every change made to your codebase, letting you revert, compare, and collaborate safely.</p><h3>Why Git?</h3><ul><li><strong>Distributed:</strong> Every developer has a full copy.</li><li><strong>Branching:</strong> Create parallel versions effortlessly.</li><li><strong>Industry standard:</strong> Master it to master team development.</li></ul>'],
    2 => ['title'=>'Installing Git & Setup','duration'=>'10 min','type'=>'video','content'=>'<h2>Git Installation & Setup</h2><h3>Quick Config</h3><pre><code>git config --global user.name "Ken"
git config --global user.email "ken@example.com"</code></pre><p>This ensures your identity is attached to every commit you make.</p>'],
  ],
  // N8N-12: n8n
  12 => [
    1 => ['title'=>'What is n8n?','duration'=>'8 min','type'=>'video','content'=>'<h2>What is n8n?</h2><p>n8n is an open-source workflow automation tool. It lets you connect apps visually, like building with LEGO blocks.</p><h3>Why Engineer Use n8n?</h3><ul><li><strong>Speed:</strong> Build internal tools 10x faster.</li><li><strong>Visual:</strong> See the logic flow at a glance.</li><li><strong>Expandable:</strong> Write custom JS nodes when needed.</li></ul>'],
    2 => ['title'=>'Setting Up n8n Locally','duration'=>'12 min','type'=>'video','content'=>'<h2>Install n8n Locally</h2><pre><code>npx n8n</code></pre><p>That is it! n8n will start and you can access it at http://localhost:5678.</p>'],
  ],
];

// Get the lesson data
$course_lessons = $lessons_db[$course_id] ?? $lessons_db[1];
$lesson = $course_lessons[$lesson_id] ?? reset($course_lessons);
$total_lessons = count($course_lessons);

// Course names for title
$course_names = [1=>'Clean Code', 2=>'Architecture', 3=>'Testing', 4=>'DevOps', 5=>'AI Prompts', 9=>'Git', 12=>'n8n'];
$course_name = $course_names[$course_id] ?? 'Module';

$page_title = $lesson['title'] . ' | ' . $course_name;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title) ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body { background: var(--bg-dark); color: var(--text-primary); }
    .lesson-page { display: flex; height: 100vh; padding-top: 72px; overflow: hidden; }
    
    /* Sidebar */
    .lesson-sidebar { width: 340px; border-right: 1px solid var(--border-light); background: var(--bg-card); display: flex; flex-direction: column; }
    .sidebar-header { padding: 24px; border-bottom: 1px solid var(--border-light); }
    .sidebar-header h2 { font-size: 1rem; margin-bottom: 8px; }
    .course-progress-mini { height: 6px; background: rgba(255,255,255,0.05); border-radius: 10px; overflow: hidden; }
    .progress-fill-mini { height: 100%; background: var(--primary); transition: width 0.4s ease; }
    .lesson-list { flex: 1; overflow-y: auto; padding: 12px; }
    .lesson-item { 
      padding: 14px 16px; border-radius: 12px; margin-bottom: 8px; cursor: pointer; 
      display: flex; align-items: center; gap: 12px; transition: var(--transition);
      text-decoration: none; color: var(--text-muted); font-size: 0.9rem;
    }
    .lesson-item:hover { background: rgba(255,255,255,0.03); color: var(--text-primary); }
    .lesson-item.active { background: rgba(99,102,241,0.1); color: var(--primary-light); font-weight: 600; border: 1px solid rgba(99,102,241,0.2); }
    .lesson-item.completed .lesson-check { color: var(--accent-green); }
    .lesson-check { font-size: 0.8rem; }
    
    /* Content */
    .lesson-main { flex: 1; background: var(--bg-dark); overflow-y: auto; position: relative; }
    .lesson-container { max-width: 900px; margin: 0 auto; padding: 48px; }
    .lesson-meta { display: flex; align-items: center; gap: 12px; margin-bottom: 24px; font-size: 0.85rem; color: var(--text-muted); }
    .lesson-title-h1 { font-family: 'Space Grotesk', sans-serif; font-size: 2.2rem; margin-bottom: 32px; line-height: 1.2; }
    .lesson-body { line-height: 1.7; font-size: 1.05rem; color: var(--text-secondary); }
    .lesson-body h2 { color: var(--text-primary); margin: 40px 0 16px; font-size: 1.5rem; }
    .lesson-body h3 { color: var(--text-primary); margin: 24px 0 12px; font-size: 1.15rem; }
    .lesson-body ul, .lesson-body ol { margin-bottom: 24px; padding-left: 20px; }
    .lesson-body li { margin-bottom: 10px; }
    .lesson-body pre { background: #0f0f24; padding: 24px; border-radius: 16px; border: 1px solid var(--border-light); overflow-x: auto; margin: 24px 0; }
    .lesson-body code { font-family: 'Fira Code', monospace; font-size: 0.9rem; color: #a5b4fc; }
    
    /* Footer Nav */
    .lesson-footer { position: sticky; bottom: 0; background: rgba(13,13,31,0.8); backdrop-filter: blur(12px); border-top: 1px solid var(--border-light); padding: 16px 48px; display: flex; justify-content: space-between; align-items: center; z-index: 10; }
    .btn-done { background: var(--accent-green); color: #fff; padding: 10px 24px; border-radius: 10px; border: none; font-weight: 700; cursor: pointer; transition: var(--transition); }
    .btn-done:hover { transform: scale(1.05); box-shadow: 0 0 20px rgba(16,185,129,0.3); }
    .btn-done.completed { background: rgba(255,255,255,0.05); border: 1px solid var(--border-light); color: var(--text-muted); }
    .nav-btns { display: flex; gap: 12px; }
    .btn-nav { padding: 10px 18px; border-radius: 10px; border: 1px solid var(--border-light); background: rgba(255,255,255,0.02); color: var(--text-primary); cursor: pointer; transition: var(--transition); font-weight: 600; display: flex; align-items: center; gap: 8px; text-decoration: none; font-size: 0.9rem; }
    .btn-nav:hover { background: rgba(255,255,255,0.05); border-color: var(--primary); }
    .btn-nav.disabled { opacity: 0.3; pointer-events: none; }
  </style>
</head>
<body>
  <nav class="navbar scrolled">
    <a href="index.php" class="nav-logo">
      <div class="nav-logo-icon">⚡</div>
      <div class="nav-logo-text"><span>AI Software Engineering</span><span>Module</span></div>
    </a>
    <div class="nav-actions">
      <a href="dashboard.php" class="btn-outline" style="padding:6px 14px; text-decoration:none;"><i class="fas fa-th-large"></i> Dashboard</a>
    </div>
  </nav>

  <div class="lesson-page">
    <!-- Sidebar -->
    <div class="lesson-sidebar">
      <div class="sidebar-header">
        <div class="section-label" style="font-size:0.7rem;"><?= htmlspecialchars($course_name) ?></div>
        <h2>Course Curriculum</h2>
        <div style="display:flex; justify-content:space-between; font-size:0.75rem; margin-bottom:8px; color:var(--text-muted);">
            <span>Progress</span>
            <span id="progress-text">0%</span>
        </div>
        <div class="course-progress-mini">
          <div class="progress-fill-mini" id="progress-fill" style="width:0%"></div>
        </div>
      </div>
      <div class="lesson-list">
        <?php foreach ($course_lessons as $id => $item): ?>
          <a href="lesson.php?cid=<?= $course_id ?>&lid=<?= $id ?>" class="lesson-item <?= $id === $lesson_id ? 'active' : '' ?>" id="sidebar-lesson-<?= $id ?>">
            <span class="lesson-check"><i class="<?= $id < $lesson_id ? 'fas fa-check-circle' : 'far fa-circle' ?>"></i></span>
            <span style="flex:1;"><?= sprintf("%02d", $id) ?>. <?= htmlspecialchars($item['title']) ?></span>
            <span style="font-size:0.7rem;opacity:0.6;"><?= $item['duration'] ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Main Content -->
    <div class="lesson-main">
      <div class="lesson-container">
        <div class="lesson-meta">
          <span style="background:rgba(99,102,241,0.1);color:var(--primary-light);padding:4px 10px;border-radius:6px;font-weight:700;">LESSON <?= $lesson_id ?></span>
          <span>•</span>
          <span><i class="fas fa-play-circle"></i> <?= $lesson['type'] ?></span>
          <span>•</span>
          <span><i class="fas fa-clock"></i> <?= $lesson['duration'] ?></span>
        </div>
        <h1 class="lesson-title-h1"><?= htmlspecialchars($lesson['title']) ?></h1>
        <div class="lesson-body">
          <?= $lesson['content'] ?>
        </div>
      </div>

      <!-- Footer Navigation -->
      <div class="lesson-footer">
        <div class="nav-btns">
          <a href="lesson.php?cid=<?= $course_id ?>&lid=<?= $lesson_id-1 ?>" class="btn-nav <?= $lesson_id === 1 ? 'disabled' : '' ?>">
            <i class="fas fa-chevron-left"></i> Previous
          </a>
        </div>
        
        <button class="btn-done" id="markDoneBtn" onclick="markDone()">
          <i class="fas fa-check"></i> Mark as Done
        </button>

        <div class="nav-btns">
          <?php if ($lesson_id < $total_lessons): ?>
            <button class="btn-nav" onclick="goNext()">
              Next Lesson <i class="fas fa-chevron-right"></i>
            </button>
          <?php else: ?>
            <a href="dashboard.php" class="btn-nav" style="background:var(--primary);border:none;">
              Finish Module <i class="fas fa-trophy"></i>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
  <script>
    const courseId = '<?= $course_id ?>';
    const lessonId = '<?= $lesson_id ?>';
    const totalLessons = <?= $total_lessons ?>;
    let isCompleted = false;

    // Load progress from localStorage
    document.addEventListener('DOMContentLoaded', () => {
        const completed = JSON.parse(localStorage.getItem('completed_lessons_' + courseId) || '[]');
        if (completed.includes(lessonId)) {
            setMarkAsDone(true);
        }
        updateSidebarProgress(completed);
    });

    function setMarkAsDone(status) {
        const btn = document.getElementById('markDoneBtn');
        isCompleted = status;
        if (status) {
            btn.innerHTML = '<i class="fas fa-check-double"></i> Completed';
            btn.classList.add('completed');
        } else {
            btn.innerHTML = '<i class="fas fa-check"></i> Mark as Done';
            btn.classList.remove('completed');
        }
    }

    function markDone() {
        if (isCompleted) return;
        
        let completed = JSON.parse(localStorage.getItem('completed_lessons_' + courseId) || '[]');
        if (!completed.includes(lessonId)) {
            completed.push(lessonId);
            localStorage.setItem('completed_lessons_' + courseId, JSON.stringify(completed));
            
            // Effect
            confetti({ particleCount: 100, spread: 70, origin: { y: 0.9 }, colors: ['#6366f1', '#10b981'] });
            setMarkAsDone(true);
            updateSidebarProgress(completed);
        }
    }

    function updateSidebarProgress(completed) {
        const percent = Math.round((completed.length / totalLessons) * 100);
        document.getElementById('progress-text').innerText = percent + '%';
        document.getElementById('progress-fill').style.width = percent + '%';
        
        // Update sidebar checks
        completed.forEach(id => {
            const item = document.getElementById('sidebar-lesson-' + id);
            if (item) {
                item.classList.add('completed');
                item.querySelector('.lesson-check i').className = 'fas fa-check-circle';
            }
        });
    }

    function goNext() {
        if (!isCompleted) {
            if (!confirm('Wait! You haven\'t marked this lesson as done. Are you sure you want to move to the next one?')) {
                return;
            }
        }
        window.location.href = 'lesson.php?cid=' + courseId + '&lid=' + (parseInt(lessonId) + 1);
    }
  </script>
</body>
</html>
