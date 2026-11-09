<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<style>
    h1, h2 {
        text-align: center;
        color: #ff9800;
        margin-bottom: 20px;
        font-weight: 700;
    }
    button {
        display: inline-block;
        margin-top: 20px;
        padding: 15px 30px;
        background: #ff5722; /* Яскравий колір кнопки виходу */
        color: #fff;
        text-decoration: none;
        border-radius: 8px;
        transition: background 0.3s ease, transform 0.3s ease;
        font-size: 1.2em;
    }
</style>
<body>
<main>
    <h1>Add Product</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <form method="post" action="/product/add" enctype="multipart/form-data">
        <label for="name">Title</label>
        <input type="text" id="name" name="name" required>

        <label for="brand">Brand</label>
        <input type="text" id="brand" name="brand" required>

        <label for="price">Price</label>
        <input type="number" id="price" name="price" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" required></textarea>

        <label for="features">Features</label>
        <textarea id="features" name="features" required></textarea>

        <label for="image">Image</label>
        <input type="file" id="image" name="image" required>

        <button type="submit">Add Product</button>
    </form>
</main>
</body>
</html>