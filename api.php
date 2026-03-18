<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];

// Handle PREFLIGHT OPTIONS request
if ($method === "OPTIONS") {
    http_response_code(200);
    exit;
}

if (!isset($_SESSION['enrollments'])) {
    $_SESSION['enrollments'] = [];
}

// Helper to get raw JSON input (Postman often sends this)
function get_input() {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    return is_array($data) ? array_merge($_POST, $data) : $_POST;
}

// Simple courses data provider
function get_courses() {
    return [
        ["id" => "se-1", "category" => "se", "level" => "beginner", "title" => "Clean Code & SOLID Principles", "description" => "Write maintainable, scalable, and readable code using industry-proven principles and design patterns.", "duration" => "6h 30m", "lessons" => 12],
        ["id" => "ai-1", "category" => "ai", "level" => "beginner", "title" => "AI Prompt Engineering Fundamentals", "description" => "Learn the core techniques of prompting AI models effectively for software development tasks.", "duration" => "4h 15m", "lessons" => 10],
        ["id" => "gh-1", "category" => "gh", "level" => "beginner", "title" => "Git & GitHub for Teams", "description" => "Master Git version control, branching strategies, pull requests, and collaborative workflows for engineering teams.", "duration" => "5h 00m", "lessons" => 14],
        ["id" => "n8n-1", "category" => "n8n", "level" => "beginner", "title" => "n8n Automation Bootcamp", "description" => "Build your first automated workflows, connect APIs, and eliminate repetitive tasks using n8n visual automation.", "duration" => "4h 30m", "lessons" => 11],
        ["id" => "ai-2", "category" => "ai", "level" => "intermediate", "title" => "Advanced AI Integration for Developers", "description" => "Integrate OpenAI, Anthropic, and Google Gemini APIs into real-world applications with advanced patterns.", "duration" => "8h 00m", "lessons" => 18],
        ["id" => "se-2", "category" => "se", "level" => "advanced", "title" => "CI/CD Pipelines & DevOps", "description" => "Build robust CI/CD pipelines using GitHub Actions, Docker, and modern DevOps practices for production systems.", "duration" => "10h 00m", "lessons" => 22]
    ];
}

// Simple tracks data provider
function get_tracks() {
    return [
        ["id" => "se", "title" => "Software Engineering", "description" => "SDLC, Clean Code principles, architecture patterns, testing, CI/CD pipelines, and DevOps fundamentals.", "modules" => 8, "duration" => "40h"],
        ["id" => "ai", "title" => "AI Prompt Engineering", "description" => "Master prompt design, chain-of-thought, few-shot learning, and production-ready AI integrations with ChatGPT, Claude & Gemini.", "modules" => 7, "duration" => "35h"],
        ["id" => "gh", "title" => "GitHub & Git Mastery", "description" => "From Git basics to advanced branching strategies, Pull Requests, GitHub Actions, CI/CD automation, and team collaboration.", "modules" => 5, "duration" => "25h"],
        ["id" => "n8n", "title" => "n8n Workflow Automation", "description" => "Build powerful automated workflows, API integrations, webhook triggers, and business logic with n8n — no code required to get started.", "modules" => 4, "duration" => "20h"]
    ];
}

$path = isset($_GET['path']) ? $_GET['path'] : 'home';

switch ($path) {
    case 'courses':
        if ($method === 'GET') {
            $category = $_GET['category'] ?? 'all';
            $all_courses = get_courses();
            
            if ($category === 'all') {
                echo json_encode(["status" => "success", "data" => $all_courses]);
            } else {
                $filtered = array_values(array_filter($all_courses, function($c) use ($category) {
                    return $c['category'] === $category;
                }));
                echo json_encode(["status" => "success", "data" => $filtered]);
            }
        }
        break;

    case 'tracks':
        if ($method === 'GET') {
            echo json_encode(["status" => "success", "data" => get_tracks()]);
        }
        break;

    case 'register':
        if ($method === 'POST') {
            $input = get_input();
            if (empty($input['email']) || empty($input['password']) || empty($input['name'])) {
                http_response_code(400);
                echo json_encode(["status" => "error", "message" => "Name, Email and Password are required"]);
            } else {
                // In a real app, save to DB. For now, we simulate success.
                $_SESSION['user'] = [
                    "name" => $input['name'],
                    "email" => $input['email'],
                    "role" => "student",
                    "created_at" => date('Y-m-d H:i:s')
                ];
                echo json_encode(["status" => "success", "message" => "Account created successfully", "user" => $_SESSION['user']]);
            }
        }
        break;

    case 'login':
        if ($method === 'POST') {
            $input = get_input();
            // Simple validation simulation
            if (($input['email'] ?? '') === 'admin@aisem.com' && ($input['password'] ?? '') === 'password123') {
                $_SESSION['user'] = [
                    "name" => "Admin User",
                    "email" => "admin@aisem.com",
                    "role" => "admin",
                    "login_time" => date('Y-m-d H:i:s')
                ];
                echo json_encode(["status" => "success", "message" => "Login successful", "user" => $_SESSION['user']]);
            } else if (!empty($input['email']) && !empty($input['password'])) {
                $_SESSION['user'] = [
                    "name" => explode('@', $input['email'])[0],
                    "email" => $input['email'],
                    "role" => "student",
                    "login_time" => date('Y-m-d H:i:s')
                ];
                echo json_encode(["status" => "success", "message" => "Login successful", "user" => $_SESSION['user']]);
            } else {
                http_response_code(401);
                echo json_encode(["status" => "error", "message" => "Invalid credentials"]);
            }
        }
        break;

    case 'profile':
        if ($method === 'GET') {
            if (isset($_SESSION['user'])) {
                echo json_encode(["status" => "success", "user" => $_SESSION['user']]);
            } else {
                http_response_code(401);
                echo json_encode(["status" => "error", "message" => "Not logged in"]);
            }
        }
        break;

    case 'enroll':
        if ($method === 'POST') {
            $input = get_input();
            $course_id = $input['course_id'] ?? null;
            if ($course_id) {
                // Check if already enrolled
                $exists = false;
                foreach ($_SESSION['enrollments'] as &$enrollment) {
                    if ($enrollment['course_id'] === $course_id) {
                        $exists = true;
                        break;
                    }
                }
                
                if (!$exists) {
                    $_SESSION['enrollments'][] = [
                        "course_id" => $course_id,
                        "status" => "active", // active, paused, completed
                        "progress" => 0,
                        "enrolled_at" => date('Y-m-d H:i:s')
                    ];
                }

                echo json_encode([
                    "status" => "success",
                    "message" => "Enrolled successfully",
                    "data" => $_SESSION['enrollments']
                ]);
            } else {
                http_response_code(400);
                echo json_encode(["status" => "error", "message" => "Course ID is required"]);
            }
        }
        break;

    case 'update_progress':
        if ($method === 'POST') {
            $input = get_input();
            $course_id = $input['course_id'] ?? null;
            $new_status = $input['status'] ?? null;
            $new_progress = $input['progress'] ?? null;

            foreach ($_SESSION['enrollments'] as &$enrollment) {
                if ($enrollment['course_id'] === $course_id) {
                    if ($new_status) $enrollment['status'] = $new_status;
                    if ($new_progress !== null) $enrollment['progress'] = (int)$new_progress;
                    
                    echo json_encode(["status" => "success", "data" => $enrollment]);
                    exit;
                }
            }
            http_response_code(404);
            echo json_encode(["status" => "error", "message" => "Enrollment not found"]);
        }
        break;

    case 'my_enrollments':
        if ($method === 'GET') {
            echo json_encode(["status" => "success", "data" => $_SESSION['enrollments']]);
        }
        break;

    case 'home':
    default:
        echo json_encode([
            "status" => "success",
            "platform" => "AI Software Engineering Module API",
            "endpoints" => [
                "GET /api.php?path=courses" => "Get courses",
                "GET /api.php?path=tracks" => "Get tracks",
                "POST /api.php?path=register" => "Create account",
                "POST /api.php?path=login" => "Login",
                "GET /api.php?path=profile" => "Get current user info",
                "POST /api.php?path=enroll" => "Enroll in course",
                "GET /api.php?path=my_enrollments" => "Get your enrolled courses",
                "POST /api.php?path=update_progress" => "Pause/Resume/Update progress (JSON: course_id, status, progress)"
            ]
        ]);
        break;
}
?>
