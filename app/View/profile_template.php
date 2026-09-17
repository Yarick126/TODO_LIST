<div class="profile">
    <div class="profile_photo">
        <?php if(isset($data['user']['image'])):?>
            <img src="<?=$data['user']['image']?>" alt="not found">
        <?php else:?>
            <img src="images/account.png" alt="not found">
        <?php endif?>
        <form class="file_upload_form" action="<?="user?action=upload&userId=" . $data['user']['userId']?>" method="POST" enctype="multipart/form-data">
            <label for="profile_image">
                <span>Выберите изображение для своего профиля: </span>
                <input class="file_upload_input" name="profile_image" type="file" accept="image/*">
            </label>
            <input class="file_upload_submit" type="submit" value="Выбрать изображение">
        </form>
    </div>

    <div class="description">
        <span id="name"><?="NAME: " . $data['user']['name'] ?></span>
        <span id="email"><?="EMAIL: " . $data['user']['email'] ?></span>
    </div>
</div>