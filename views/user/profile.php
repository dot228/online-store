<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: #ffe0b2; /* Яскравий фон для сторінки */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Займає всю висоту вікна */
        }

        .profile-container {
            background: #ffffff; /* Білий фон для контейнера профілю */
            border-radius: 16px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2); /* Збільшена тінь для контейнера */
            padding: 40px;
            text-align: center;
            width: 90%; /* Ширина контейнера */
            max-width: 400px; /* Максимальна ширина контейнера */
        }

        .profile-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px; /* Додано відступ знизу */
        }

        .profile-header h1 {
            color: #333; /* Темний колір заголовка */
            font-size: 2.5em;
            font-weight: 700;
        }

        .profile-info {
            text-align: left;
        }

        .profile-info p {
            color: #555; /* Світліший колір тексту */
            margin: 15px 0;
            font-size: 1.2em;
        }

        .logout-btn {
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

        .logout-btn:hover {
            background: #e64a19; /* Темніший колір кнопки при наведенні */
            transform: translateY(-3px);
        }

        .role-admin {
            color: #d9534f; /* Яскравий колір для ролі адміністратора */
            font-weight: bold;
        }

        .role-user {
            color: #5bc0de; /* Яскравий колір для ролі користувача */
            font-weight: bold;
        }
    </style>

</head>
<body>
<div style="padding: 15px 10px">
<div class="profile-container">
    <div class="profile-header">
        <h1>User Profile</h1>
    </div>
    <div class="profile-info">
        <p>Login: <?= $user['login'] ?></p>
        <p>First Name: <?= $user['firstname'] ?></p>
        <p>Last Name: <?= $user['lastname'] ?></p>
        <p>Role: <span class="<?= $user['role'] == 1 ? 'role-admin' : 'role-user' ?>"><?= $user['role'] == 1 ? 'Admin' : 'User' ?></span></p>
    </div>
    <a class="logout-btn" href="/user/logout">Logout</a>
</div><div>
</body>
</html>
