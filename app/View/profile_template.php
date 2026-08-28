<div class="profile">
    <?php if(isset($data['user']['image'])):?>
        <img src="<?=$data['user']['image']?>" alt="not found">
    <?php else:?>
        <img src="images/account.png" alt="not found">
    <?php endif?>
    <div class="description">
        <span id="name"><?="NAME: " . $data['user']['name'] ?></span>
        <span id="email"><?="EMAIL: " . $data['user']['email'] ?></span>
    </div>
</div>