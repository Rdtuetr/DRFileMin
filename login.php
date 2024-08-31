<?php
session_start();
$password = "McDogHello00912";
$lockTime = 300; // 5分钟锁定时间

if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
}

if (!isset($_SESSION['lockTime'])) {
    $_SESSION['lockTime'] = 0;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (time() - $_SESSION['lockTime'] < $lockTime) {
        $error = "账户已锁定，请在" . ceil(($lockTime - (time() - $_SESSION['lockTime'])) / 60) . "分钟后重试。";
    } else {
        if ($_POST['password'] == $password) {
            $_SESSION['loggedin'] = true;
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['attempts']++;
            if ($_SESSION['attempts'] >= 3) {
                $_SESSION['lockTime'] = time();
                $_SESSION['attempts'] = 0;
                $error = "密码错误3次，账户已锁定5分钟。";
            } else {
                $error = "密码错误，还有" . (3 - $_SESSION['attempts']) . "次机会。";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录 - DRFileMin</title>
    <style>
        body {
            font-family: 'Noto Sans SC', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .login-form {
            background-color: white;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2>请输入密码</h2>
        <form method="post">
            <input type="password" name="password" required>
            <input type="submit" value="登录">
        </form>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>