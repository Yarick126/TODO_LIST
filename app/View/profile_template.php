<article id="profile-card">
    <?php if(isset($data['image'])):?>
        <img src="<?=$data['image']?>" alt="not found">
    <?php else:?>
        <img src="images/user.png" alt="not found">
    <?php endif?>
    <div class="description">
        <span id="name"><?="NAME: " . $data['name'] ?></span>
        <span id="email"><?="EMAIL: " . $data['email'] ?></span>
    </div>
</article>