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
    <link rel="stylesheet" href="http://localhost:8080/todo-list/style/template_styles.css">
    <?php AssetsManager::renderStyle()?>
    <title>TODO</title>
</head>
<body >
    <header>
        <div class="todo_logo">
            <h1>TODO LIST</h1>
            <img src="http://localhost:8080/todo-list/images/to-do-list.png" alt="404">
        </div>
    </header>
    <main>
        <div class="sidebar" onclick="wideSidebar(event)">
            <div class="profile_logo">
                <?php if(empty($_SESSION)){?>
                    <a href="http://localhost:8080/todo-list/auth" title="Войти">
                        <img src="http://localhost:8080/todo-list/images/account.png" alt="404">
                        <span>Войти</span>
                    </a>
                <?php } else {?>
                    <a href="http://localhost:8080/todo-list/user" class="profile_link" title="Профиль">
                        <img src=<?="http://localhost:8080/todo-list/" . $_SESSION['image']?> alt="404">
                        <span><?=$_SESSION['name']?></span>
                    </a>
                <?php }?>
            </div>
            <?php if(!empty($_SESSION)){?>
                <div class="link_to_tasks">
                    <a href="http://localhost:8080/todo-list/user/tasks" title="Задачи">
                        <img src="http://localhost:8080/todo-list/images/task.png" alt="404">
                        <span>Задачи</span>
                    </a>
                </div>
                <div class="link_to_friends">
                    <a href=<?= "http://localhost:8080/todo-list/user/friends"?> title="Друзья">
                        <img src="http://localhost:8080/todo-list/images/friends.png" alt="404">
                        <span>Друзья</span>
                    </a>
                </div>
                <div class="link_to_request">
                    <a href=<?= "http://localhost:8080/todo-list/user/requests"?> title="Заявки в друзья">
                        <img src="http://localhost:8080/todo-list/images/bell.png" alt="404">
                        <span>Уведомления</span>
                    </a>
                </div>
                <div class="link_to_logout">
                    <a href=<?= "http://localhost:8080/todo-list/user/logout"?> title="Выйти">
                        <img src="http://localhost:8080/todo-list/images/logout.png" alt="404">
                        <span>Выйти</span>
                    </a>
                </div>
            <?php }?>
            <hr>
            <div class="link_to_settings">
                <a href="<?="http://localhost:8080/todo-list/user/settings/settings"?>" class="settings_logo" title="Настройки">
                    <img src="http://localhost:8080/todo-list/images/settings.png" alt="404">
                    <span>Настройки</span>
                </a>
            </div>
            <div class="link_to_about_app">
                <a href="<?="http://localhost:8080/todo-list/user/about_app"?>" class="about_app_logo" title="Про приложение">
                    <img src="http://localhost:8080/todo-list/images/info.png" alt="404">
                    <span>О приложении</span>
                </a>
            </div>
        </div>
        <?php include 'app/view/' . $content?>
    </main>
    <script src="http://localhost:8080/todo-list/scripts/scripts.js"></script>
    <?php AssetsManager::renderScripts()?>
</body>
</html>