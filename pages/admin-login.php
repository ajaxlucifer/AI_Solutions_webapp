<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - AI-Solutions</title>
    <meta name="description" content="Secure admin portal for AI-Solutions management system.">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="admin-body">
    <!-- Navigation -->
    <nav class="navbar admin-nav">
        <div class="nav-container">
            <div class="nav-logo">
                <div class="logo-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h2>AI-Solutions Admin</h2>
            </div>
            <div class="nav-actions">
                <a href="../index.php" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Back to Website
                </a>
            </div>
        </div>
    </nav>

    <!-- Admin Login Section -->
    <section class="admin-login-section">
        <div class="admin-container">
            <div class="login-form-container">
                <div class="login-header">
                    <div class="admin-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <h1>Admin Portal</h1>
                    <p>Secure access to AI-Solutions management system</p>
                </div>

                <form class="admin-login-form" id="adminLoginForm">
                    <div class="form-group">
                        <label for="username">
                            <i class="fas fa-user"></i>
                            Username
                        </label>
                        <input type="text" id="username" name="username" required 
                               placeholder="Enter your username" autocomplete="username">
                    </div>

                    <div class="form-group">
                        <label for="password">
                            <i class="fas fa-lock"></i>
                            Password
                        </label>
                        <div class="password-input">
                            <input type="password" id="password" name="password" required 
                                   placeholder="Enter your password" autocomplete="current-password">
                            <button type="button" class="toggle-password" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="remember-me">
                            <input type="checkbox" id="rememberMe" name="rememberMe">
                            <span class="checkmark"></span>
                            Remember me
                        </label>
                        <a href="#" class="forgot-password">Forgot Password?</a>
                    </div>

                    <button type="submit" class="login-btn" id="loginBtn">
                        <span class="btn-text">Sign In</span>
                        <i class="fas fa-arrow-right btn-icon"></i>
                        <div class="btn-loader" style="display: none;">
                            <i class="fas fa-spinner fa-spin"></i>
                        </div>
                    </button>

                    <div class="demo-credentials">
                        <h4><i class="fas fa-info-circle"></i> Demo Credentials</h4>
                        <div class="demo-options">
                            <div class="demo-card" onclick="fillDemoCredentials('admin', 'admin123')">
                                <i class="fas fa-crown"></i>
                                <strong>Super Admin</strong>
                                <span>Username: admin</span>
                                <span>Password: admin123</span>
                            </div>
                            <div class="demo-card" onclick="fillDemoCredentials('manager', 'manager123')">
                                <i class="fas fa-users-cog"></i>
                                <strong>Manager</strong>
                                <span>Username: manager</span>
                                <span>Password: manager123</span>
                            </div>
                            <div class="demo-card" onclick="fillDemoCredentials('analyst', 'analyst123')">
                                <i class="fas fa-chart-line"></i>
                                <strong>Analyst</strong>
                                <span>Username: analyst</span>
                                <span>Password: analyst123</span>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="login-footer">
                    <p><i class="fas fa-shield-check"></i> Secured by 256-bit SSL encryption</p>
                </div>
            </div>

            <div class="login-background">
                <div class="bg-shape shape-1"></div>
                <div class="bg-shape shape-2"></div>
                <div class="bg-shape shape-3"></div>
                <div class="floating-elements">
                    <div class="element element-1"><i class="fas fa-cog"></i></div>
                    <div class="element element-2"><i class="fas fa-chart-bar"></i></div>
                    <div class="element element-3"><i class="fas fa-users"></i></div>
                    <div class="element element-4"><i class="fas fa-robot"></i></div>
                    <div class="element element-5"><i class="fas fa-database"></i></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alert/Notification -->
    <div class="alert-container" id="alertContainer"></div>

    <script src="../js/main.js"></script>
    <script src="../js/admin-login.js"></script>
</body>
</html>