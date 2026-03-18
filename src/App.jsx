import React from 'react';
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import { motion, AnimatePresence } from 'framer-motion';
import { 
  Home, 
  BookOpen, 
  LayoutDashboard, 
  Settings, 
  LogOut, 
  Zap, 
  Github, 
  Bot, 
  Cpu,
  ChevronRight,
  Play,
  CheckCircle,
  Clock,
  LayerGroup
} from 'lucide-react';

// Mock Data
const COURSES = [
  { id: 'se-1', title: 'Clean Code & SOLID Principles', category: 'Software Engineering', emoji: '⚙️', lessons: 12, level: 'Beginner', duration: '6h 30m', track: 'se' },
  { id: 'se-2', title: 'Software Architecture Patterns', category: 'Software Engineering', emoji: '🏗️', lessons: 16, level: 'Intermediate', duration: '8h 00m', track: 'se' },
  { id: 'ai-5', title: 'AI Prompt Engineering Fundamentals', category: 'AI Prompting', emoji: '🤖', lessons: 10, level: 'Beginner', duration: '4h 15m', track: 'ai' },
  { id: 'gh-9', title: 'Git & GitHub for Teams', category: 'GitHub', emoji: '🐙', lessons: 14, level: 'Beginner', duration: '5h 00m', track: 'gh' },
  { id: 'n8n-12', title: 'n8n Automation Bootcamp', category: 'n8n Automation', emoji: '⚡', lessons: 11, level: 'Beginner', duration: '4h 30m', track: 'n8n' },
];

/**
 * Navbar Component
 */
const Navbar = () => (
  <nav style={{ 
    height: '72px', 
    background: 'rgba(13,13,31,0.85)', 
    backdropFilter: 'blur(12px)',
    borderBottom: '1px solid rgba(255,255,255,0.08)',
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'space-between',
    padding: '0 48px',
    position: 'fixed',
    top: 0,
    width: '100%',
    zIndex: 1000
  }}>
    <Link to="/" style={{ display: 'flex', alignItems: 'center', gap: '12px' }}>
      <div style={{ background: 'var(--primary)', padding: '8px', borderRadius: '10px' }}><Zap size={20} /></div>
      <div style={{ fontWeight: 800, fontSize: '1.2rem', letterSpacing: '-0.5px' }}>AISEM <span style={{ color: 'rgba(255,255,255,0.4)', fontWeight: 400 }}>| Pro</span></div>
    </Link>
    <div style={{ display: 'flex', gap: '32px' }}>
      <Link to="/" className="nav-link">Home</Link>
      <Link to="/courses" className="nav-link">Courses</Link>
      <Link to="/dashboard" className="nav-link">Dashboard</Link>
    </div>
    <div style={{ display: 'flex', gap: '12px' }}>
      <button className="btn-outline" style={{ padding: '8px 16px', fontSize: '0.9rem' }}>Sign In</button>
      <button className="btn-primary" style={{ padding: '8px 20px', fontSize: '0.9rem' }}>Get Started</button>
    </div>
  </nav>
);

/**
 * Home Component
 */
const HomePage = () => (
  <div style={{ paddingTop: '120px', minHeight: '100vh', textAlign: 'center' }}>
    <motion.div 
      initial={{ opacity: 0, y: 20 }}
      animate={{ opacity: 1, y: 0 }}
      transition={{ duration: 0.6 }}
      style={{ maxWidth: '800px', margin: '0 auto', padding: '0 24px' }}
    >
      <div className="section-label" style={{ background: 'rgba(99,102,241,0.1)', color: 'var(--primary-light)', padding: '6px 16px', borderRadius: '100px', display: 'inline-block', marginBottom: '24px', fontWeight: 700, fontSize: '0.8rem' }}>
        BUILDING THE FUTURE OF ENGINEERING
      </div>
      <h1 className="gradient-text" style={{ fontSize: '4.5rem', fontWeight: 800, marginBottom: '24px', letterSpacing: '-2px' }}>
        Master AI & Software Engineering.
      </h1>
      <p style={{ color: 'var(--text-secondary)', fontSize: '1.25rem', marginBottom: '40px', lineHeight: 1.6 }}>
        Professional onboarding and training for modern engineering teams. 
        Learn to leverage AI, automate workflows, and build scalable systems.
      </p>
      <div style={{ display: 'flex', gap: '16px', justifyContent: 'center' }}>
        <button className="btn-primary" style={{ padding: '16px 32px', fontSize: '1rem', borderRadius: '14px' }}>Explore Tracks</button>
        <button className="btn-outline" style={{ padding: '16px 32px', fontSize: '1rem', borderRadius: '14px' }}>Watch Demo</button>
      </div>
    </motion.div>
  </div>
);

/**
 * Dashboard Component
 */
const DashboardPage = () => {
  const enrollments = COURSES.slice(0, 3); // Mock enrollments
  
  return (
    <div style={{ paddingTop: '120px', padding: '120px 48px 80px', maxWidth: '1200px', margin: '0 auto' }}>
      <div style={{ marginBottom: '48px' }}>
        <h1 style={{ fontSize: '2.5rem', marginBottom: '12px' }}>Welcome back, <span style={{ color: 'var(--primary-light)' }}>Engr. Ken</span> 👋</h1>
        <p style={{ color: 'var(--text-secondary)' }}>You have completed 12% of your current track.</p>
      </div>

      <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fill, minmax(360px, 1fr))', gap: '24px' }}>
        {enrollments.map((course) => (
          <motion.div 
            whileHover={{ y: -5 }}
            key={course.id} className="card" 
            style={{ border: '1px solid rgba(255,255,255,0.08)', background: 'rgba(255,255,255,0.02)' }}
          >
            <div style={{ display: 'flex', gap: '20px', marginBottom: '24px' }}>
              <div style={{ width: '56px', height: '56px', background: 'rgba(99,102,241,0.1)', borderRadius: '16px', display: 'flex', alignItems: 'center', justifyContent: 'center', fontSize: '1.8rem' }}>
                {course.emoji}
              </div>
              <div>
                <h3 style={{ fontSize: '1.1rem', marginBottom: '4px' }}>{course.title}</h3>
                <p style={{ color: 'rgba(255,255,255,0.4)', fontSize: '0.8rem' }}>{course.category}</p>
              </div>
            </div>

            <div style={{ marginBottom: '24px' }}>
              <div style={{ display: 'flex', justifyContent: 'space-between', fontSize: '0.8rem', fontWeight: 600, marginBottom: '8px' }}>
                <span>Progress</span>
                <span style={{ color: 'var(--primary-light)' }}>25%</span>
              </div>
              <div style={{ height: '8px', background: 'rgba(255,255,255,0.05)', borderRadius: '10px', overflow: 'hidden' }}>
                <div style={{ width: '25%', height: '100%', background: 'var(--primary)' }} />
              </div>
            </div>

            <button className="btn-primary" style={{ width: '100%', display: 'flex', alignItems: 'center', justifyContent: 'center', gap: '8px' }}>
              <Play size={16} fill="white" /> Continue Learning
            </button>
          </motion.div>
        ))}
      </div>
    </div>
  );
};

/**
 * Main App Component
 */
export default function App() {
  return (
    <Router>
      <Navbar />
      <AnimatePresence mode="wait">
        <Routes>
          <Route path="/" element={<HomePage />} />
          <Route path="/dashboard" element={<DashboardPage />} />
        </Routes>
      </AnimatePresence>
    </Router>
  );
}
