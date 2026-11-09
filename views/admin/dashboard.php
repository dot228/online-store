<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/style.css">
    <style>
        .add-button {
            display: block;
            width: 220px;
            margin: 10px auto 25px;
            padding: 12px 25px;
            text-align: center;
            background-color: #ff5722;
            color: #ffffff;
            text-decoration: none;
            border-radius: 10px;
            transition: background-color 0.2s, transform 0.2s, box-shadow 0.2s;
        }
        h1, h2 {
            text-align: center;
            color: #ff9800;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .add-button:hover {
            background-color: #e64a19;
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .table-container {
            max-height: 480px;
            overflow-y: auto;
            margin-bottom: 30px;
            border-radius: 12px;
            border: 2px solid #ffcc80;
            padding: 12px;
            background-color: #fff3e0;
        }
        .admin-table {
            border: 2px solid #ff9800;
            border-radius: 10px;
            width: 100%;
            border-collapse: collapse;
        }
        .admin-table th, .admin-table td {
            border: 1px solid #fb8c00;
            padding: 16px;
            text-align: center;
            color: #212121;
            background-color: #ffe0b2;
        }
        .admin-table th {
            background-color: #ffb74d;
            font-weight: 700;
            color: #ffffff;
        }
        .admin-table td {
            background-color: #fff8e1;
        }
        .admin-table img {
            max-width: 90px;
            max-height: 90px;
            border-radius: 10px;
            border: 2px solid #ffcc80;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
        }
    </style>


</head>
<body>
<main>
    <h1>Admin Dashboard</h1>

    <section>
        <h2>Products</h2>
        <a href="/product/add" class="add-button">Add Product</a>
        <div class="table-container">
            <table class="admin-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['brand'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>"></td>
                        <td class="actions">
                            <a href="/admin/editProduct?id=<?= $product['id'] ?>" class="edit">Edit</a>
                            <a href="/admin/deleteProduct?id=<?= $product['id'] ?>" class="delete" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section>
        <h2>Orders</h2>
        <div class="table-container">
            <table class="admin-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Product ID</th>
                    <th>User ID</th>
                    <th>Order Date</th>
                    <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $order['id'] ?></td>
                        <td><?= $order['product_id'] ?></td>
                        <td><?= $order['user_id'] ?></td>
                        <td><?= $order['order_date'] ?></td>
                        <td><?= $order['quantity'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
</body>
</html>
