<?php
// app/Views/signup.php

// 1. Check for URL error messages and assign a display variable
$error_message = '';

if (isset($_GET['error'])) {
    if ($_GET['error'] === 'passwords_mismatch') {
        $error_message = 'The passwords you entered do not match.';
    } elseif ($_GET['error'] === 'registration_failed') {
        // This likely means a unique constraint violation (email already exists)
        $error_message = 'Registration failed. That email is already associated with an account.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Monsof-Bay Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
        /* (Your existing CSS styles are kept here for continuity) */
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
        .text-accent { color: var(--color-accent); }
        
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

        /* Modern button styling */
        .btn-accent {
            background: linear-gradient(135deg, var(--color-accent) 0%, #40c4a6 100%); /* Subtle gradient */
            color: #1f2937; /* Darker text for contrast */
            border: none;
            font-weight: 700; /* Bold */
            letter-spacing: 0.05em; /* Spacing */
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .btn-accent:hover {
            background: linear-gradient(135deg, #40c4a6 0%, var(--color-accent) 100%);
            box-shadow: 0 8px 15px rgba(80, 227, 194, 0.4); /* Floating shadow */
            transform: translateY(-2px) scale(1.005);
        }
        .btn-accent:active {
            transform: translateY(0px);
            box-shadow: 0 2px 5px rgba(80, 227, 194, 0.4);
        }
    </style>
</head>
<body>

    <div class="auth-container w-full max-w-md p-6 sm:p-10 m-4 bg-white rounded-3xl shadow-2xl border-t-4 border-accent">
        
        <h2 class="text-4xl font-extrabold text-gray-800 mb-2 text-center tracking-tight">Create Your Account</h2>
        <p class="text-center text-gray-500 mb-10 text-lg">Quick, easy, and secure registration</p>

        <?php if (!empty($error_message)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <p class="font-bold">Registration Error</p>
                <p class="text-sm"><?= $error_message ?></p>
            </div>
        <?php endif; ?>

        <form id="signup-form" class="space-y-6" action="index.php?action=register" method="POST">
            
            <div>
                <label for="signup-prenom" class="block text-sm font-medium text-gray-600 mb-2">First Name (Prénom)</label>
                <input type="text" name="prenom" id="signup-prenom" placeholder="John" required class="auth-input">
            </div>

            <div>
                <label for="signup-nom" class="block text-sm font-medium text-gray-600 mb-2">Last Name (Nom)</label>
                <input type="text" name="nom" id="signup-nom" placeholder="Doe" required class="auth-input">
            </div>

            <div>
                <label for="signup-email" class="block text-sm font-medium text-gray-600 mb-2">Email Address</label>
                <input type="email" name="email" id="signup-email" placeholder="you@example.com" required class="auth-input">
            </div>
            
            <div>
                <label for="signup-password" class="block text-sm font-medium text-gray-600 mb-2">Password</label>
                <input type="password" name="mot_de_passe" id="signup-password" placeholder="Minimum 6 characters" required minlength="6" class="auth-input">
            </div>

            <div>
                <label for="signup-confirm-password" class="block text-sm font-medium text-gray-600 mb-2">Confirm Password</label>
                <input type="password" name="confirm_password" id="signup-confirm-password" placeholder="Repeat Password" required minlength="6" class="auth-input">
            </div>
            
            <button type="submit" class="w-full btn-accent font-bold py-3 rounded-xl shadow-lg">
                Sign Up Now
            </button>
            
            <p class="text-center text-sm text-gray-500 pt-4">
                Already have an account? 
                <a href="index.php?action=login" class="text-coral hover:text-red-600 font-semibold transition duration-150">Log in</a>
            </p>
        </form>

        <p class="text-center text-xs text-gray-400 mt-8">
            <a href="index.php?action=index" class="hover:text-gray-600 transition duration-150">&larr; Back to Shop</a>
        </p>
    </div>

</body>
</html>