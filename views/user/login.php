<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TV Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #ffecb3; /* Яскравий фон */
            color: #1e1e1e; /* Темний текст */
            margin: 0;
            padding-top: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
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

        .login-container {
            background: #ffffff; /* Білий фон для контейнера входу */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); /* Збільшена тінь */
            max-width: 400px;
            width: 100%;
        }

        .login-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #ff5722; /* Яскравий колір заголовка */
        }

        .login-container p {
            color: red; /* Червоний колір для помилок */
            margin-bottom: 10px;
        }

        .login-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: 700;
            color: #333; /* Темний колір тексту для міток */
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background: #ff5722; /* Яскравий колір кнопки */
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-container button:hover {
            background: #e64a19; /* Темніший колір кнопки при наведенні */
        }
    </style>

</head>
<body>
<main>
    <div style="padding: 15px 60px">
    <div class="login-container">
        <?php if (isset($error)): ?>
            <p><?= $error ?></p>
        <?php endif; ?>
        <form method="post" action="/user/login">
            <label for="login">Login</label>
            <input type="text" id="login" name="login" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>

        </form>
    </div>
    </div>
</main>
</body>
</html>
