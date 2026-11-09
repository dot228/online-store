<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #fff3e0; /* Яскравий фон */
            color: #1e1e1e; /* Темний текст */
            margin: 0;
            padding-top: 70px; /* Висота хедера + відступ */
            overflow-x: hidden; /* Запобігає горизонтальному прокручуванню */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Більш виражена тінь */
            border-radius: 20px;
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
            flex: 1;
            padding: 20px;
            max-width: 1200px;
            margin: 20px auto;
            background: #ffe0b2; /* Яскравий фон для основного контенту */
            border-radius: 15px; /* Закруглені кути */
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            overflow-x: hidden;
        }
        footer {
            text-align: center;
            padding: 15px; /* Збільшено відступ */
            background: #333; /* Темний фон */
            color: #ffcc80; /* Яскравий текст */
            width: 100%;
            border-top: 4px solid #ff5722; /* Яскрава лінія зверху */
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
        <?= $Content ?>
    </div>
</main>
<footer>
    &copy; <?= date('Y') ?> Sport Store.
</footer>
</body>
</html>
