<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); 
    exit;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['id'])) {
    $productId = (int) $_GET['id'];
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
}


if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['id'])) {
    $productId = (int) $_GET['id'];
    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = 1; 
    } else {
        $_SESSION['cart'][$productId]++; 
    }
}

include 'bdd.php';

$cartProducts = [];
if (!empty($_SESSION['cart'])) {
    $ids = implode(',', array_keys($_SESSION['cart']));
    $stmt = $pdo->query("SELECT * FROM products WHERE id IN ($ids)");
    $cartProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="container">
        <?php if (!empty($cartProducts)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartProducts as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= number_format($product['price'], 2) ?> €</td>
                            <td><?= $_SESSION['cart'][$product['id']] ?></td>
                            <td><?= number_format($product['price'] * $_SESSION['cart'][$product['id']], 2) ?> €</td>
                            <td class="actions">
                                <a href="cart.php?action=remove&id=<?= $product['id'] ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p><strong>Total général : 
                <?= number_format(array_sum(array_map(fn($product) => $product['price'] * $_SESSION['cart'][$product['id']], $cartProducts)), 2) ?> €
            </strong></p>
        <?php else: ?>
            <p>Votre panier est vide.</p>
        <?php endif; ?>
        <a href="all_products.php">Retour à la boutique</a>
    </div>