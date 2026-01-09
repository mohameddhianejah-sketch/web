<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monsof-Bay - Everything You Need</title>
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
        }
        .text-coral { color: var(--color-primary); }
        .bg-coral { background-color: var(--color-primary); }
        .hover\:bg-coral-dark:hover { background-color: #E65A4F; }
        .bg-blue-light { background-color: var(--color-secondary); }
        .text-accent { color: var(--color-accent); }
        .bg-header { background: linear-gradient(135deg, #1f2937, #374151); }
        .shop-name {
            background-image: linear-gradient(45deg, var(--color-primary), #FCD34D);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 900;
        }
        .nav-link {
            padding: 0.5rem 0; 
            color: white;
            font-weight: 500;
            transition: color 0.15s, border-bottom 0.15s;
            display: inline-block;
            border-bottom: 2px solid transparent; 
        }
        .nav-link:hover {
            color: var(--color-primary);
            border-bottom-color: var(--color-primary); 
        }
        .nav-active {
            color: var(--color-primary) !important; 
            border-bottom-color: var(--color-primary) !important; 
            font-weight: 700;
        }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header class="bg-header shadow-lg">
        <!-- Top Header Bar: Logo, Search, Auth Links, Cart -->
        <div class="px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between border-b border-gray-700">
            <!-- Shop Name / Logo -->
            <h1 class="text-3xl sm:text-4xl tracking-tight">
                <span class="shop-name">Monsof-Bay</span>
            </h1>

            <!-- Search Bar (Centered on Desktop) -->
            <div class="hidden md:flex flex-grow max-w-xl mx-8">
                <input type="text" placeholder="Search Electronics, Home Goods, and more..."
                       class="w-full px-4 py-2 border border-gray-600 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-coral-dark bg-gray-700 text-white placeholder-gray-400 shadow-inner">
                <button class="bg-coral hover:bg-coral-dark text-white p-2 rounded-r-lg shadow-md transition duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>

            <!-- Auth Links & Cart Icons -->
            <div class="flex items-center space-x-3 sm:space-x-4">
                <a href="index.php?action=login" class="text-white hover:text-coral transition duration-150 font-medium hidden sm:inline">Login</a>
                <a href="index.php?action=signup" class="bg-blue-light hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded-full shadow-lg transition duration-300 transform hover:scale-105 text-sm sm:text-base">
                    Sign Up
                </a>
                <button class="relative text-white p-2 rounded-full hover:bg-gray-600 transition duration-150">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-coral rounded-full">3</span>
                </button>
            </div>
        </div>

        <!-- Main Navigation Bar -->
        <nav class="bg-gray-800 shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-auto py-2 overflow-x-auto scrollbar-hide">
                    <div class="flex space-x-8 whitespace-nowrap">
                        <a href="#" class="nav-link nav-active">All Products</a>
                        <a href="#" class="nav-link">Electronics</a>
                        <a href="#" class="nav-link">Home & Kitchen</a>
                        <a href="#" class="nav-link">Beauty & Wellness</a>
                        <a href="#" class="nav-link">Apparel</a>
                        <a href="#" class="nav-link">Clearance</a>
                        <a href="#" class="nav-link">Sports & Outdoors</a>
                        <a href="#" class="nav-link">Books & Media</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content Area -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Hero Banner for colorful design -->
        <div class="bg-blue-light text-white p-6 md:p-10 rounded-xl shadow-xl mb-12 text-center transform hover:scale-[1.01] transition duration-300"
             style="background: linear-gradient(45deg, var(--color-secondary), var(--color-accent));">
            <h2 class="text-3xl sm:text-5xl font-extrabold mb-2 tracking-tight">Discover the Monsof-Bay Difference</h2>
            <p class="text-lg opacity-90">From Smart Tech to Stylish Decor, find everything in one colorful place.</p>
            <a href="#product-grid" class="mt-4 inline-block bg-white text-gray-800 font-bold py-3 px-6 rounded-full shadow-lg hover:shadow-xl transition duration-300 transform hover:translate-y-[-2px]">
                Shop Latest Deals
            </a>
        </div>

        <!-- Section Title -->
        <h3 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 border-coral pb-2">Featured Products</h3>

        <!-- Product Grid -->
        <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <!-- Products will be injected here by JS -->
        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-12 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
            <div class="text-sm">
                &copy; <span id="current-year"></span> Monsof-Bay. All rights reserved.
            </div>
            <div class="flex space-x-6 text-sm">
                <a href="#" class="hover:text-coral transition duration-150">Contact Us</a>
                <a href="#" class="hover:text-coral transition duration-150">Privacy Policy</a>
                <a href="#" class="hover:text-coral transition duration-150">Shipping & Returns</a>
            </div>
        </div>
    </footer>
    
    <script>
        // Set the current year in the footer
        document.getElementById('current-year').textContent = new Date().getFullYear();

        // Data for different types of products
        const products = [
            { id: 1, name: "Noise-Cancelling Wireless Headphones", category: "Electronics", price: 199.99, image: "https://placehold.co/400x400/FF6F61/ffffff?text=Tech+Gear", rating: 4.5 },
            { id: 2, name: "Premium Hand Mixer (5 Speeds)", category: "Home & Kitchen", price: 45.00, image: "https://placehold.co/400x400/4A90E2/ffffff?text=Kitchen+Tool", rating: 4.8 },
            { id: 3, name: "Botanical Face Serum (30ml)", category: "Beauty & Wellness", price: 65.50, image: "https://placehold.co/400x400/50E3C2/ffffff?text=Beauty+Care", rating: 4.2 },
            { id: 4, name: "Ergonomic Office Chair (Mesh Back)", category: "Home Decor", price: 249.99, image: "https://placehold.co/400x400/FCD34D/ffffff?text=Furniture", rating: 4.6 },
            { id: 5, name: "Organic Cotton T-Shirt (Azure Blue)", category: "Apparel", price: 29.99, image: "https://placehold.co/400x400/9333ea/ffffff?text=Apparel", rating: 4.1 },
            { id: 6, name: "4K Smart LED Projector", category: "Electronics", price: 799.00, image: "https://placehold.co/400x400/374151/ffffff?text=Smart+Projector", rating: 4.9 },
            { id: 7, name: "Scented Soy Candle (Lavender & Vanilla)", category: "Home Decor", price: 18.00, image: "https://placehold.co/400x400/10b981/ffffff?text=Home+Fragrance", rating: 5.0 },
            { id: 8, name: "Quick-Dry Travel Towel", category: "Wellness", price: 15.99, image: "https://placehold.co/400x400/ef4444/ffffff?text=Travel+Gear", rating: 4.3 }
        ];

        const productGrid = document.getElementById('product-grid');

        function createProductCard(product) {
            return `
                <div class="product-card bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 transform hover:scale-[1.03] hover:shadow-2xl border border-gray-100">
                    <div class="h-48 overflow-hidden">
                        <img src="${product.image}" onerror="this.onerror=null; this.src='https://placehold.co/400x400/FF6F61/ffffff?text=Monsof-Bay';" alt="${product.name}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-5">
                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-accent bg-opacity-20 text-accent mb-2">${product.category}</span>
                        <h4 class="text-xl font-semibold text-gray-800 mb-3">${product.name}</h4>
                        <div class="mb-3 border-b border-dashed pb-4"></div>
                        <p class="text-3xl font-bold text-coral mb-4 mt-4">${product.price.toFixed(2)} dt</p>
                        <button class="w-full bg-blue-light hover:bg-coral-dark text-white font-bold py-3 rounded-lg transition duration-200 shadow-md">
                            Add to Cart
                        </button>
                    </div>
                </div>
            `;
        }

        products.forEach(product => {
            productGrid.innerHTML += createProductCard(product);
        });
    </script>

</body>
</html>