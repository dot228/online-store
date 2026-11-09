<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TV Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #fff3e0; /* Яскравий фон */
            color: #1e1e1e; /* Темний текст */
            margin: 0;
            padding-top: 70px;
            overflow-x: hidden;
        }
        header {
            background: #ff5722; /* Яскравий фон хедера */
            color: white;
            padding: 15px;
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            max-width: 1200px;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
        }
        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        nav a {
            color: #ffcc80; /* Яскравий колір для посилань */
            text-decoration: none;
            font-weight: 700;
            margin: 0 15px;
            transition: color 0.3s, transform 0.2s; /* Додано трансформацію */
        }
        nav a:hover {
            color: #ff9800; /* Колір при наведенні */
            transform: scale(1.05); /* Ефект збільшення */
        }
        main {
            padding: 20px;
            max-width: 1200px;
            margin: 20px auto;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            overflow-x: hidden;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        .product {
            background: #ffe0b2; /* Яскравий фон для продуктів */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.2s; /* Анімація при наведенні */
        }
        .product:hover {
            transform: translateY(-5px); /* Ефект підняття */
        }
        .product h2 {
            margin: 0 0 10px;
            color: #ff5722; /* Яскравий колір заголовка продукту */
        }
        .product p {
            margin: 5px 0;
        }
        .product img {
            width: 100%;
            height: 200px;
            object-fit: cover;
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
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination a {
            display: inline-block;
            padding: 10px 20px;
            background: #ff5722; /* Яскравий колір для пагінації */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 5px;
            transition: background 0.3s;
        }
        .pagination a:hover {
            background: #e64a19; /* Темніший колір при наведенні */
        }
        .pagination .active {
            background: #ff9800; /* Колір для активного елемента */
        }
        .search-form {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 20px;
            background: #ffe0b2; /* Яскравий фон для форми пошуку */
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .search-form label {
            font-weight: 700;
            margin-right: 10px;
            color: #ff5722; /* Яскравий колір для тексту мітки */
        }
        .search-form input,
        .search-form select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            margin-right: 10px;
        }
        .search-form button {
            background: #ff5722; /* Яскравий колір кнопки в формі */
            color: white;
            border: none;
            margin-left: 20px;
            padding: 10px 40px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .search-form button:hover {
            background: #e64a19; /* Темніший колір при наведенні */
        }
    </style>

</head>
<body>
<header>
    <div class="container">
        <nav>
            <a href="/main/index">Home</a>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="/user/profile">Profile</a>
                <?php if ($_SESSION['user']['role'] == '1'): ?>
                    <a href="/admin/dashboard">Admin Page</a>
                <?php endif; ?>
                <a href="/user/logout">Logout</a>
            <?php else: ?>
                <a href="/user/login">Login</a>
                <a href="/user/register">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
<main>
    <div class="container">
        <div class="products-grid" id="products-grid"></div>
        <div class="pagination" id="pagination"></div>
    </div>
</main>
<script>
    const products = <?php echo json_encode($products); ?>;

    const itemsPerPage = 8;
    let currentPage = 1;

    function renderProducts(page) {
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const visibleProducts = products.slice(start, end);

        const productsGrid = document.getElementById('products-grid');
        productsGrid.innerHTML = '';

        visibleProducts.forEach(product => {
            const productDiv = document.createElement('div');
            productDiv.classList.add('product');
            productDiv.innerHTML = `
            <h2>${product.name}</h2>
            <p>Brand: ${product.brand}</p>
            <p>Price: ${product.price}</p>
            <img src="${product.image}" alt="${product.name}">
            <a href="/product/details?id=${product.id}" class="btn">View Details</a>
        `;
            productsGrid.appendChild(productDiv);
        });
    }

    function renderPagination() {
        const totalPages = Math.ceil(products.length / itemsPerPage);
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const pageLink = document.createElement('a');
            pageLink.href = '#';
            pageLink.innerText = i;
            if (i === currentPage) {
                pageLink.classList.add('active');
            }
            pageLink.addEventListener('click', function(event) {
                event.preventDefault();
                currentPage = i;
                renderProducts(currentPage);
                renderPagination();
            });
            pagination.appendChild(pageLink);
        }
    }

    renderProducts(currentPage);
    renderPagination();
</script>
</body>
</html>
