 // Firebase Imports (Required for Canvas environment)
        import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
        import { getAuth, signInAnonymously, signInWithCustomToken } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js";

        // Firebase Setup
        const firebaseConfig = JSON.parse(typeof __firebase_config !== 'undefined' ? __firebase_config : '{}');
        let app, auth;

        // Initialize Firebase and Auth
        const initFirebase = async () => {
            if (Object.keys(firebaseConfig).length > 0) {
                app = initializeApp(firebaseConfig);
                auth = getAuth(app);
                
                try {
                    if (typeof __initial_auth_token !== 'undefined' && __initial_auth_token) {
                        await signInWithCustomToken(auth, __initial_auth_token);
                        console.log("Firebase: Signed in with custom token.");
                    } else {
                        await signInAnonymously(auth);
                        console.log("Firebase: Signed in anonymously.");
                    }
                } catch (error) {
                    console.error("Firebase authentication failed:", error);
                }
            }
        };

        initFirebase();

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

        // Function to generate the product card HTML
        function createProductCard(product) {
            // NOTE: Removed the generateStars helper function as it is no longer used.

            return `
                <div class="product-card bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 transform hover:scale-[1.03] hover:shadow-2xl border border-gray-100">
                    <!-- Product Image/Placeholder -->
                    <div class="h-48 overflow-hidden">
                        <img src="${product.image}" onerror="this.onerror=null; this.src='https://placehold.co/400x400/FF6F61/ffffff?text=Monsof-Bay';" alt="${product.name}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>

                    <div class="p-5">
                        <!-- Category Tag -->
                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-accent bg-opacity-20 text-accent mb-2">${product.category}</span>

                        <!-- Product Name (Plain Text) -->
                        <h4 class="text-xl font-semibold text-gray-800 mb-3">${product.name}</h4>
                        
                        <!-- NOTE: Removed the Rating display div here -->
                        <div class="mb-3 border-b border-dashed pb-4"></div>
                        
                        <!-- Price -->
                        <p class="text-3xl font-bold text-coral mb-4 mt-4"> dt  ${product.price.toFixed(2)}</p>

                        <!-- Call to Action (Now takes up full space) -->
                        <button class="w-full bg-blue-light hover:bg-coral-dark text-white font-bold py-3 rounded-lg transition duration-200 shadow-md">
                            Add to Cart
                        </button>
                    </div>
                </div>
            `;
        }

        // Render all products
        products.forEach(product => {
            productGrid.innerHTML += createProductCard(product);
        });
        