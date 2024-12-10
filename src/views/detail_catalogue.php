<?php
include 'bdd.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Produit invalide !");
}

$id = (int) $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        die("Produit non trouvé !");
    }
} catch (PDOException $e) {
    die("Erreur lors de la récupération du produit : " . $e->getMessage());
}
?>

<div class="container">
        <div class="product">
            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
            <h1><?= htmlspecialchars($product['name']) ?></h1>
            <p class="price"><?= htmlspecialchars($product['price']) ?> €</p>
            <a href="all_products.php">Retour à la liste</a>
        </div>
</div>