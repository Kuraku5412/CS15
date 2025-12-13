<?php
session_start();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');
    
    // Basic validation
    if (empty($fullname) || empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
        $error = 'Please fill in all fields';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address';
    } else {
        // Registration successful
        $success = 'Registered Successfully';
        $_SESSION['username'] = $username;
        // Optional: Redirect after successful registration
        // header('Location: login.php');
        // exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - UM Intramurals</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            gap: 2rem;
            align-items: center;
        }
        
        .branding {
            flex: 1;
            display: none;
        }
        
        @media (min-width: 1024px) {
            .branding {
                display: block;
            }
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo {
            width: 200px;
            height: 200px;
            object-fit: contain;
        }
        
        .brand-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }
        
        .trophy-icon {
            background: #991b1b;
            padding: 12px;
            border-radius: 8px;
            color: #fcd34d;
        }
        
        .brand-title h1 {
            color: #7f1d1d;
            font-size: 2rem;
            font-weight: 700;
        }
        
        .feature-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: flex;
            gap: 0.75rem;
        }
        
        .feature-card h3 {
            color: #7f1d1d;
            font-size: 1.125rem;
            margin-bottom: 0.25rem;
        }
        
        .feature-card p {
            color: #991b1b;
            font-size: 0.875rem;
        }
        
        .card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 450px;
        }
        
        .card-header {
            margin-bottom: 2rem;
        }
        
        .card-header h2 {
            color: #7f1d1d;
            font-size: 1.875rem;
            margin-bottom: 0.5rem;
        }
        
        .card-header p {
            color: #991b1b;
            font-size: 0.875rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        label {
            display: block;
            color: #1f2937;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.625rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 0.875rem;
            transition: all 0.2s;
        }
        
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #991b1b;
            box-shadow: 0 0 0 3px rgba(153, 27, 27, 0.1);
        }
        
        .btn {
            width: 100%;
            background: #991b1b;
            color: white;
            padding: 0.625rem 1rem;
            border: none;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 1rem;
        }
        
        .btn:hover {
            background: #7f1d1d;
        }
        
        .link-text {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        .link-text a {
            color: #991b1b;
            text-decoration: none;
            font-weight: 500;
        }
        
        .link-text a:hover {
            text-decoration: underline;
        }
        
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }
        
        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Branding Section (Hidden on mobile) -->
        <div class="branding">
            <div class="brand-title">
                <div class="trophy-icon">🏆</div>
                <h1>UM Intramurals</h1>
            </div>
            
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
            
            <div class="feature-card">
                <div>👥</div>
                <div>
                    <h3>Join Your Department</h3>
                    <p>Connect with your fellow students and compete in various events</p>
                </div>
            </div>
            
            <div class="feature-card">
                <div>📅</div>
                <div>
                    <h3>Schedule Matches</h3>
                    <p>View schedules, track scores, and manage your attendance</p>
                </div>
            </div>
            
            <div class="feature-card">
                <div>🏆</div>
                <div>
                    <h3>Win Championships</h3>
                    <p>Compete for glory and earn bragging rights on campus</p>
                </div>
            </div>
        </div>
        
        <!-- Registration Form -->
        <div class="card">
            <div class="card-header">
                <h2>Join the Fun!</h2>
                <p>Create your UM Intramurals account</p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input 
                        type="text" 
                        id="fullname" 
                        name="fullname" 
                        placeholder="John Doe"
                        value="<?php echo htmlspecialchars($_POST['fullname'] ?? ''); ?>"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="email">University Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="student@umindanao.edu.ph"
                        value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Choose a username"
                        value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="••••••••"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input 
                        type="password" 
                        id="confirm_password" 
                        name="confirm_password" 
                        placeholder="••••••••"
                        required
                    >
                </div>
                
                <button type="submit" class="btn">Create Account</button>
            </form>
            
            <div class="link-text">
                Already have an account? <a href="login.php">Sign in here</a>
            </div>
        </div>
    </div>
</body>
</html>
