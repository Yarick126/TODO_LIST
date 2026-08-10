<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/template_style.css">
    <link rel="stylesheet" href="style/style.css">
    <title>TODO</title>
</head>
<body>
    <header>
        <div class="todo_logo">
            <h1>TODO LIST</h1>
            <img src="images/to-do-list.png" alt="404">
        </div>
    </header>
    <main>
        <div class="sidebar" onclick="wideSidebar(event)">
            <div class="profile_logo">
                <a href="auth?login=yes">
                    <img src="images/account.png" alt="404">
                    <span>Войти</span>
                </a>
            </div>
            <div class="settings_about_app">
                <hr>
                <a href="settings"class="settings_logo">
                    <img src="images/settings.png" alt="404">
                    <span>Настройки</span>
                </a>
                <a href="about" class="about_app_logo">
                    <img src="images/info.png" alt="404">
                    <span>О приложении</span>
                </a>
            </div>
        </div>
        <?php include 'app/view/' . $content ?>
    </main>
    <script src="scripts/scripts.js"></script>
</body>
</html>