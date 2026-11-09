<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TV Store</title>
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
            color: #ffffff; /* Білий колір тексту */
            text-decoration: none;
            font-weight: 700;
            margin: 0 15px;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        nav a:hover {
            color: #e64a19; /* Темніший оранжевий при наведенні */
            transform: translateY(-2px);
        }

        .register-container {
            background: #ffffff; /* Білий фон для контейнера */
            border-radius: 16px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
            padding: 40px;
            text-align: left;
            max-width: 400px;
            width: 90%;
            margin-top: 120px;
        }

        .register-container h1 {
            color: #d84315; /* Темно-помаранчевий колір заголовка */
            font-size: 2em;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .register-container ul {
            color: #d32f2f; /* Червоний колір для списку помилок */
            margin-bottom: 20px;
            padding-left: 20px;
            list-style-type: disc;
        }

        .register-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #333; /* Темний колір тексту */
        }

        .register-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ffccbc; /* Світло-помаранчевий бордер */
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .register-container input:focus {
            border-color: #ff5722; /* Помаранчевий колір бордеру при фокусі */
            outline: none;
        }

        .register-container button {
            width: 100%;
            padding: 15px;
            background: #ff5722; /* Помаранчевий фон кнопки */
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1.2em;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .register-container button:hover {
            background: #e64a19; /* Темніший помаранчевий при наведенні */
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
<main>
    <div style="padding: 15px 60px">
    <div class="register-container">
        <h1>Registration</h1>
        <?php if (isset($errors) && !empty($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form method="post" action="/user/register">
            <label for="login">Login</label>
            <input type="text" id="login" name="login" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname" required>

            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname" required>

            <button type="submit">Register</button>
        </form>
    </div>
    </div>
</main>
</body>
</html>
