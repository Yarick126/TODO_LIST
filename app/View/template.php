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
    <?php AssetsManager::renderStyle()?>
    <title>TODO</title>
</head>
<body >
    <header>
        <div class="todo_logo">
            <h1>TODO LIST</h1>
            <img src="images/to-do-list.png" alt="404">
        </div>
    </header>
    <main>
        <div class="sidebar" onclick="wideSidebar(event)">
            <div class="profile_logo">
                <?php if(!isset($_SESSION)){?>
                    <a href="auth">
                        <img src="images/account.png" alt="404">
                        <span>Войти</span>
                    </a>
                <?php } else {?>
                    <a href=<?="user"?> class="profile_link">
                        <img src=<?=$_SESSION['image']?> alt="404">
                        <span><?=$_SESSION['name']?></span>
                    </a>
                <?php }?>
            </div>
            <?php if(!empty($_SESSION)){?>
                <div class="link_to_tasks">
                    <a href=<?="user/tasks"?>>
                        <img src="images/task.png" alt="404">
                        <span>Задачи</span>
                    </a>
                </div>
                <div class="link_to_friends">
                    <a href=<?= "user/friends"?>>
                        <img src="images/friends.png" alt="404">
                        <span>Друзья</span>
                    </a>
                </div>
                <div class="link_to_request">
                    <a href=<?= "user/requests"?>>
                        <img src="images/bell.png" alt="404">
                        <span>Уведомления</span>
                    </a>
                </div>
                <div class="link_to_logout">
                    <a href=<?= "user/logout"?>>
                        <img src="images/logout.png" alt="404">
                        <span>Выйти</span>
                    </a>
                </div>
            <?php }?>
            <hr>
            <div class="link_to_settings">
                <a href="<?="settings/"?>" class="settings_logo">
                    <img src="images/settings.png" alt="404">
                    <span>Настройки</span>
                </a>
            </div>
            <div class="link_to_about_app">
                <a href="<?="about_app/"?>" class="about_app_logo">
                    <img src="images/info.png" alt="404">
                    <span>О приложении</span>
                </a>
            </div>
        </div>
        <?php include 'app/view/' . $content?>
    </main>
    <script src="scripts/scripts.js"></script>
    <?php AssetsManager::renderScripts()?>
</body>
</html>