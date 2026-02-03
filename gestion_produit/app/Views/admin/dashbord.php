<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="/gestion_produit/public/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo"><i class="fas fa-store"></i><h2>Admin Panel</h2></div>
            <nav class="nav-menu">
                <a href="#" class="nav-item active" data-section="overview"><i class="fas fa-chart-line"></i><span>Vue d'ensemble</span></a>
                <a href="#" class="nav-item" data-section="products"><i class="fas fa-box"></i><span>Produits</span></a>
                <a href="index.php?action=logout" class="nav-item"><i class="fas fa-sign-out-alt"></i><span>Déconnexion</span></a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="header">
                <div class="header-left"><h1>Tableau de Bord</h1></div>
                <div class="header-right"><p>Bienvenue, <?= $_SESSION['prenom'] ?? 'Admin' ?></p></div>
            </header>

            <section id="overview-section" class="content-section active">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon blue"><i class="fas fa-box"></i></div>
                        <div class="stat-details"><h3><?= count($products) ?></h3><p>Produits</p></div>
                    </div>
                </div>
                <div class="chart-card"><h3>Ventes</h3><canvas id="salesChart"></canvas></div>
            </section>

            <section id="products-section" class="content-section">
                <div class="section-header">
                    <h2>Gestion des Produits</h2>
                    <a href="index.php?action=create" class="btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th><th>Nom</th><th>Prix</th><th>Stock</th><th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $p): ?>
                            <tr>
                                <td><?= $p['id'] ?></td>
                                <td><strong><?= htmlspecialchars($p['name']) ?></strong></td>
                                <td><?= number_format($p['price'], 2) ?> €</td>
                                <td><?= $p['stock_quantity'] ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="index.php?action=edit&id=<?= $p['id'] ?>" class="btn-edit"><i class="fas fa-edit"></i></a>
                                        <a href="index.php?action=delete&id=<?= $p['id'] ?>" class="btn-danger" onclick="return confirm('Supprimer ?')"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/gestion_produit/public/js/dashboard.js"></script>
</body>
</html>