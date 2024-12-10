
<body>
<main>
    <div class="container">
        <h2>Nos T-Shirts</h2>
        <div class="product-grid">
            <?php
            // Exemple de produits
            $products = [
                ["name" => "T-Shirt Classique", "price" => 19.99, "image" => "https://via.placeholder.com/250"],
                ["name" => "T-Shirt Sport", "price" => 24.99, "image" => "https://via.placeholder.com/250"],
                ["name" => "T-Shirt Décontracté", "price" => 14.99, "image" => "https://via.placeholder.com/250"],
                ["name" => "T-Shirt Graphique", "price" => 29.99, "image" => "https://via.placeholder.com/250"]
            ];

            // Boucle pour afficher les produits
            foreach ($products as $product) {
                echo "<div class='product'>
                        <img src='{$product['image']}' alt='{$product['name']}'>
                        <h2>{$product['name']}</h2>
                        <p class='price'>{$product['price']} €</p>
                        <button>Ajouter au panier</button>
                    </div>";
            }
            ?>
        </div>
    </div>
</main>
