<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UM Intramurals - University of Mindanao</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(to bottom right, #fef2f2, #fef3c7, #fef9c3);
            min-height: 100vh;
        }
        
        /* Hero Section */
        .hero {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 4rem 1rem;
            min-height: 70vh;
        }
        
        .hero-content {
            max-width: 1000px;
            width: 100%;
            text-align: center;
        }
        
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }
        
        .logo {
            width: 200px;
            height: 200px;
            background: #991b1b;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fcd34d;
            font-size: 5rem;
            font-weight: 700;
        }
        
        .title-section {
            margin-bottom: 2rem;
        }
        
        .title-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        
        .trophy-icon {
            font-size: 3rem;
            color: #f59e0b;
        }
        
        h1 {
            color: #7f1d1d;
            font-size: 3.5rem;
            font-weight: 700;
        }
        
        .subtitle {
            font-size: 1.25rem;
            color: #991b1b;
            margin-bottom: 1rem;
        }
        
        .description {
            font-size: 1rem;
            color: #b91c1c;
            max-width: 42rem;
            margin: 0 auto 2rem;
            line-height: 1.6;
        }
        
        /* Buttons */
        .cta-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: center;
            padding-top: 1rem;
        }
        
        @media (min-width: 640px) {
            .cta-buttons {
                flex-direction: row;
                justify-content: center;
            }
        }
        
        .btn {
            padding: 0.75rem 2rem;
            font-size: 1.125rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            cursor: pointer;
            border: none;
            display: inline-block;
        }
        
        .btn-primary {
            background: #991b1b;
            color: white;
        }
        
        .btn-primary:hover {
            background: #7f1d1d;
        }
        
        .btn-outline {
            background: transparent;
            color: #991b1b;
            border: 2px solid #991b1b;
        }
        
        .btn-outline:hover {
            background: #fef2f2;
        }
        
        /* Features Section */
        .features {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            padding: 4rem 1rem;
        }
        
        .features-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .features h2 {
            text-align: center;
            color: #7f1d1d;
            font-size: 2.5rem;
            margin-bottom: 3rem;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        
        @media (min-width: 768px) {
            .features-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        
        .feature-card {
            text-align: center;
        }
        
        .feature-icon-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 1rem;
        }
        
        .feature-icon {
            background: #991b1b;
            padding: 1rem;
            border-radius: 50%;
            font-size: 2rem;
        }
        
        .feature-card h3 {
            color: #7f1d1d;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .feature-card p {
            color: #b91c1c;
            line-height: 1.6;
        }
        
        /* Stats Section */
        .stats {
            padding: 3rem 1rem;
        }
        
        .stats-container {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            text-align: center;
        }
        
        .stat-icon {
            display: flex;
            justify-content: center;
            margin-bottom: 0.5rem;
            font-size: 2rem;
        }
        
        .stat-number {
            font-size: 2rem;
            color: #7f1d1d;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }
        
        .stat-label {
            font-size: 0.875rem;
            color: #b91c1c;
        }
        
        @media (max-width: 640px) {
            h1 {
                font-size: 2.5rem;
            }
            
            .trophy-icon {
                font-size: 2rem;
            }
            
            .subtitle {
                font-size: 1.125rem;
            }
            
            .features h2 {
                font-size: 2rem;
            }
            
            .stat-number {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <!-- Logo -->
            <div class="logo-container">
                 <img 
                    src="src\assets\b3b68e19c39c9c734085aeecfd81ac684dcd3ebf.png" 
                    alt="UM Logo" 
                    style="
                        width: 200px;
                        height: 200px;
                        object-fit: contain;
                        display: block;
                        margin: 0 auto;
                    "
                >
            </div>
            
            <!-- Main Heading -->
            <div class="title-section">
                <div class="title-row">
                    <span class="trophy-icon">🏆</span>
                    <h1>UM Intramurals</h1>
                </div>
                <p class="subtitle">
                    Join the Ultimate University Experience
                </p>
                <p class="description">
                    Connect with fellow UMians, compete in exciting events, and bring glory to your department. 
                    Your journey to campus sports excellence starts here!
                </p>
            </div>
            
            <!-- CTA Buttons -->
            <div class="cta-buttons">
                <a href="register.php" class="btn btn-primary">Get Started</a>
                <a href="login.php" class="btn btn-outline">Sign In</a>
            </div>
        </div>
    </div>
    
    <!-- Features Section -->
    <div class="features">
        <div class="features-container">
            <h2>Why Join UM Intramurals?</h2>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <div class="feature-icon">👥</div>
                    </div>
                    <h3>Cheer for your Department</h3>
                    <p>
                        Connect with your friends & classmates to cheer and enjoy the event
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <div class="feature-icon">📅</div>
                    </div>
                    <h3>Compete & Schedule</h3>
                    <p>
                        Easy attendance, real-time scores, and comprehensive tournament brackets
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <div class="feature-icon">🏆</div>
                    </div>
                    <h3>Win Glory</h3>
                    <p>
                        Compete for championships and earn bragging rights across campus
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Stats Section -->
    <div class="stats">
        <div class="stats-container">
            <div>
                <div class="stat-icon">🎯</div>
                <div class="stat-number">15+</div>
                <div class="stat-label">Events</div>
            </div>
            <div>
                <div class="stat-icon">🔥</div>
                <div class="stat-number">200+</div>
                <div class="stat-label">Active Players</div>
            </div>
            <div>
                <div class="stat-icon">🏅</div>
                <div class="stat-number">10+</div>
                <div class="stat-label">Departments</div>
            </div>
        </div>
    </div>
</body>
</html>
