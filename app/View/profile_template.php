<div class="profile">
    <div class="profile_photo">
        <div class="photo">
            <img src="<?=$_SESSION['image']?>" alt="not found">
            <a class="delete_image_link" href="<?="user/deleteImage"?>">x</a>
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
        <span id="name"><?="NAME: " . $_SESSION['name'] ?></span>
        <span id="email"><?="EMAIL: " . $_SESSION['email'] ?></span>
    </div>
</div>