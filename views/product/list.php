<h1>Product List</h1>
<?php foreach ($products as $product): ?>
    <div>
        <h2><?= $product['title'] ?></h2>
        <p><strong>Brand:</strong> <?= $product['brand'] ?></p>
        <p><strong>Price:</strong> $<?= $product['price'] ?></p>
        <p><?= $product['description'] ?></p>
        <p><strong>Features:</strong> <?= $product['features'] ?></p>
        <?php if ($product['image']): ?>
            <img src="/<?= $product['image'] ?>" alt="<?= $product['title'] ?>" style="width: 150px;">
        <?php endif; ?>
    </div>
<?php endforeach; ?>
