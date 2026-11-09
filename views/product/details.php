<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name'] ?> - Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #ffecb3; /* Яскравий фон */
            color: #1e1e1e; /* Темний текст */
            margin: 0;
            padding-top: 20px;
            overflow-x: hidden;
        }
        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #ff5722; /* Яскравий фон навігації */
            padding: 10px 0;
            border-radius: 10px; /* Закруглені кути навігації */
        }
        nav a {
            color: white;
            text-decoration: none;
            font-weight: 700;
            margin: 0 15px;
            transition: color 0.3s, transform 0.2s; /* Додано трансформацію */
        }
        nav a:hover {
            color: #ffcc80; /* Світліший колір при наведенні */
            transform: scale(1.1); /* Ефект збільшення */
        }
        main {
            padding: 20px;
            max-width: 1200px;
            margin: 20px auto;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
            overflow-x: hidden;
        }
        .product {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); /* Підвищена тінь для яскравості */
            margin-bottom: 20px;
        }
        .product h2 {
            margin: 0;
            color: #ff5722; /* Яскравий колір заголовка продукту */
        }
        .product p {
            margin: 5px 0;
        }
        .product img {
            max-width: 100%;
            border-radius: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #ff5722; /* Яскравий колір кнопки */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #e64a19; /* Темніший колір при наведенні */
        }
    </style>

</head>
<body>
<main>
    <div class="container">
        <div class="product">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
            <h1><?= $product['name'] ?></h1>
            <p><strong>Brand:</strong> <?= $product['brand'] ?></p>
            <p><strong>Price:</strong>  <?= $product['price'] ?></p>
            <p><strong>Description:</strong> <?= $product['description'] ?></p>
            <p><strong>Features:</strong> <?= $product['features'] ?></p>
            <form class="order-form" method="post" action="/order/create">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1" required>
                <button type="submit" class="btn">Order Now</button>
            </form>
        </div>
    </div>
</main>
</body>
</html>
