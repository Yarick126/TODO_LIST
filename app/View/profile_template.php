<div class="profile">
    <div class="profile_photo">
        <div class="photo">
            <img src="<?="http://localhost:8080/todo-list/" . $_SESSION['image']?>" alt="not found">
            <a class="delete_image_link" href="<?="http://localhost:8080/todo-list/user/deleteImage"?>">
                <img src="http://localhost:8080/todo-list/images/bin.png" alt="404">
            </a>
        </div>

        <form class="file_upload_form" action="<?="user/upload"?>" method="POST" enctype="multipart/form-data">
            <label for="profile_image">
                <span>Выберите изображение для своего профиля: </span>
                <input class="file_upload_input" name="profile_image" type="file" accept="image/*">
            </label>
            <input class="file_upload_submit" type="submit" value="Выбрать изображение">
        </form>
    </div>

    <div class="description">
        <span id="name"><?="NAME: " . $data["user"]['name'] ?></span>
        <span id="email"><?="EMAIL: " . $data["user"]['email'] ?></span>
    </div>
</div>