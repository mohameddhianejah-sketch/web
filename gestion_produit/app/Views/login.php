<?php
// app/Views/login.php

// 1. Check for URL error messages and assign a display variable
$error_message = '';
$success_message = '';

if (isset($_GET['error'])) {
    if ($_GET['error'] === 'invalid') {
        $error_message = 'Invalid email or password. Please try again.';
    } elseif ($_GET['error'] === 'admin_denied') {
        $error_message = 'Access denied. Please sign in with an administrator account.';
    } elseif ($_GET['error'] === 'registration_failed') {
        $error_message = 'Registration failed. That email may already be in use.';
    }
}

if (isset($_GET['success']) && $_GET['success'] === 'registered') {
    $success_message = 'Registration successful! You can now sign in.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Monsof-Bay</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-primary: #FF6F61; /* Vibrant Coral */
            --color-secondary: #4A90E2; /* Bright Blue */
            --color-accent: #50E3C2; /* Teal/Mint */
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fb;
            /* Modern Background: Subtle geometric pattern */
            background-image: linear-gradient(135deg, #f0f4f9 25%, transparent 25%),
                              linear-gradient(225deg, #f0f4f9 25%, transparent 25%),
                              linear-gradient(45deg, #f0f4f9 25%, transparent 25%),
                              linear-gradient(315deg, #f0f4f9 25%, #f7f9fb 25%);
            background-size: 15px 15px;
            background-position: 0 0, 7.5px 0, 7.5px 7.5px, 0 7.5px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .bg-coral { background-color: var(--color-primary); }
        .hover\:bg-coral-dark:hover { background-color: #E65A4F; }
        .bg-blue-light { background-color: var(--color-secondary); }
        .text-coral { color: var(--color-primary); }
        
        /* New container styling for enhanced transition and depth */
        .auth-container {
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1); /* Smoother, more modern transition curve */
            backdrop-filter: blur(5px); /* Subtle glass effect */
            background-color: rgba(255, 255, 255, 0.95); /* Semi-transparent white */
            border-radius: 1.5rem; /* Larger border radius */
        }
        .auth-container:hover {
            box-shadow: 0 15px 40px -10px rgba(0, 0, 0, 0.25); /* Deeper shadow on hover */
            transform: translateY(-5px); /* Stronger lift */
        }

        .auth-input {
            width: 100%;
            padding: 0.85rem; /* Slightly taller */
            border: 1px solid #e5e7eb; /* Lighter border */
            border-radius: 0.75rem; /* More rounded */
            transition: border-color 0.2s, box-shadow 0.2s;
            background-color: #fafafa;
        }
        /* Refined hover effect */
        .auth-input:hover {
            border-color: #d1d5db; 
        }
        .auth-input:focus {
            outline: none;
            border-color: var(--color-accent); /* Use accent color for modern focus */
            box-shadow: 0 0 0 4px rgba(80, 227, 194, 0.3); /* Teal/Mint ring with opacity */
        }

        /* Premium button styling for Primary (Coral) */
        .btn-primary {
            background: linear-gradient(135deg, var(--color-primary) 0%, #E65A4F 100%); 
            color: white; 
            border: none;
            font-weight: 700; 
            letter-spacing: 0.05em; 
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #E65A4F 0%, var(--color-primary) 100%);
            box-shadow: 0 8px 15px rgba(255, 111, 97, 0.4); 
            transform: translateY(-2px) scale(1.005);
        }
        .btn-primary:active {
            transform: translateY(0px);
            box-shadow: 0 2px 5px rgba(255, 111, 97, 0.4);
        }
    </style>
</head>
<body>

    <div class="auth-container w-full max-w-md p-6 sm:p-10 m-4 bg-white rounded-3xl shadow-2xl border-t-4 border-coral">
        
        <h2 class="text-4xl font-extrabold text-gray-800 mb-2 text-center tracking-tight">Login</h2>
        <p class="text-center text-gray-500 mb-10 text-lg">Access your Monsof-Bay account</p>

        <?php if (!empty($success_message)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <p class="font-bold">Success!</p>
                <p class="text-sm"><?= $success_message ?></p>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($error_message)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <p class="font-bold">Login Failed</p>
                <p class="text-sm"><?= $error_message ?></p>
            </div>
        <?php endif; ?>

        <form id="login-form" class="space-y-6" action="index.php?action=signin" method="POST">
            <div>
                <label for="login-email" class="block text-sm font-medium text-gray-600 mb-2">Email Address</label>
                <input type="email" name="email" id="login-email" placeholder="you@example.com" required class="auth-input">
            </div>
            <div>
                <label for="login-password" class="block text-sm font-medium text-gray-600 mb-2">Password</label>
                <input type="password" name="mot_de_passe" id="login-password" placeholder="••••••••" required class="auth-input">
            </div>
            
            <button type="submit" class="w-full btn-primary font-bold py-3 rounded-xl shadow-lg">
                Sign In
            </button>

            <p class="text-center text-sm text-gray-500 pt-4">
                Don't have an account? 
                <a href="index.php?action=signup" class="text-blue-light hover:text-blue-700 font-semibold transition duration-150">Create an account</a>
            </p>
        </form>

        <p class="text-center text-xs text-gray-400 mt-8">
            <a href="index.php?action=index" class="hover:text-gray-600 transition duration-150">&larr; Back to Shop</a>
        </p>
    </div>

</body>
</html>