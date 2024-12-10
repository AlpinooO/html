<?php
include 'bdd.php';

try {
    $stmt = $pdo->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des produits : " . $e->getMessage());
}
?>

<div class="container">
        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                    <h2><?= htmlspecialchars($product['name']) ?></h2>
                    <p class="price"><?= htmlspecialchars($product['price']) ?> €</p>
                    <a href="product_details.php?id=<?= $product['id'] ?>">Voir les détails</a>
                    <a href="<?= isset($_SESSION['user_id']) 
    ? "cart.php?action=add&id={$product['id']}" 
    : "login.php?redirect=all_products.php" ?>">
    Ajouter au panier
</a>

                </div>
            <?php endforeach; ?>
        </div>
    </div>