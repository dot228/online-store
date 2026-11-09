    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Product</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/public/css/style.css">
    </head>
    <body>
    <header>
        <nav>
            <a href="/main/index">Home</a>
            <a href="/admin/dashboard">Admin Dashboard</a>
            <a href="/user/logout">Logout</a>
        </nav>
    </header>
    <main>
        <h1>Edit Product</h1>
        <form method="post" action=""  enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= $product['name'] ?>" required>

            <label for="brand">Brand:</label>
            <input type="text" id="brand" name="brand" value="<?= $product['brand'] ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?= $product['description'] ?></textarea>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?= $product['price'] ?>" required>

            <label for="features">Features:</label>
            <textarea id="features" name="features" required><?= $product['features'] ?></textarea>

            <label for="image">Image</label>
            <input type="file" id="image" name="image" required>

            <button type="submit">Save</button>
        </form>
    </main>
    </body>
    </html>
