<?php
session_start();
include_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();

$error = '';

if ($_POST) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = 'Please enter both username and password.';
    } else {
        $query = "SELECT id, username, password, first_name FROM users WHERE username = :username OR email = :username";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $row['id'];
            $username = $row['username'];
            $hashed_password = $row['password'];
            $first_name = $row['first_name'];

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                $_SESSION['first_name'] = $first_name;
                
                // Redirect to products page
                header("Location: products.php");
                exit();
            } else {
                $error = 'Invalid password.';
            }
        } else {
            $error = 'No account found with that username/email.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Abyssinia Electronics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
        }

        :root {
            --deep-blue: #1a1f36;
            --bright-blue: #3a86ff;
            --violet: #8338ec;
            --coral: #ff6b6b;
            --mint: #06d6a0;
            --cream: #f8f9fa;
            --light-gray: #e9ecef;
            --medium-gray: #adb5bd;
            --dark-gray: #495057;
            --shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        body {
            background: linear-gradient(135deg, #f0f4f8 0%, #d9e2ec 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        .auth-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            min-height: 600px;
        }

        .auth-left {
            background: linear-gradient(135deg, var(--bright-blue), var(--violet));
            color: white;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-right {
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
            text-decoration: none;
            color: white;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .logo-text {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .auth-title {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .auth-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .auth-features {
            list-style: none;
            margin-top: 30px;
        }

        .auth-features li {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            font-size: 1rem;
        }

        .auth-features i {
            color: var(--mint);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--deep-blue);
        }

        .form-control {
            width: 100%;
            padding: 15px;
            border: 1px solid var(--light-gray);
            border-radius: 10px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--bright-blue);
            box-shadow: 0 0 0 3px rgba(58, 134, 255, 0.1);
        }

        .btn {
            background: var(--bright-blue);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn:hover {
            background: var(--violet);
            transform: translateY(-2px);
        }

        .auth-link {
            text-align: center;
            margin-top: 20px;
            color: var(--medium-gray);
        }

        .auth-link a {
            color: var(--bright-blue);
            text-decoration: none;
            font-weight: 600;
        }

        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @media (max-width: 768px) {
            .auth-container {
                grid-template-columns: 1fr;
            }
            
            .auth-left {
                display: none;
            }
            
            .auth-right {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="auth-container">
            <div class="auth-left">
                <a href="index.php" class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div class="logo-text">Abyssinia Electronics</div>
                </a>
                <h1 class="auth-title">Welcome Back</h1>
                <p class="auth-subtitle">Sign in to access your account and continue shopping</p>
                <ul class="auth-features">
                    <li><i class="fas fa-check-circle"></i> Track your orders</li>
                    <li><i class="fas fa-check-circle"></i> Manage your wishlist</li>
                    <li><i class="fas fa-check-circle"></i> Fast checkout</li>
                    <li><i class="fas fa-check-circle"></i> Personalized recommendations</li>
                </ul>
            </div>
            
            <div class="auth-right">
                <h2 style="margin-bottom: 30px; color: var(--deep-blue);">Sign In</h2>
                
                <?php if ($error): ?>
                    <div class="alert alert-error">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label class="form-label">Username or Email *</label>
                        <input type="text" class="form-control" name="username" required value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Password *</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    
                    <button type="submit" class="btn">
                        <i class="fas fa-sign-in-alt"></i> Sign In
                    </button>
                </form>
                
                <div class="auth-link">
                    Don't have an account? <a href="register.php">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>