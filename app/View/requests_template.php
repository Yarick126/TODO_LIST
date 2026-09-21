<div class="requests">
    <?php 
    if(count($data['users']) != 0){
        foreach($data['users'] as $user){?>
        <article class="user_data">
            <img class="user_image" src="<?=$user['image']?>" alt="404">
            <span class="user_name"><?=$user['name']?></span>
            <a href="<?="user?action=acceptRequest&userId=" . $data['user']['userId'] . "&friendId=" . $user['id']?>">Добавить</a>
            <a href="<?="user?action=rejectRequest&userId=" . $data['user']['userId'] . "&friendId=" . $user['id']?>">Отклонить</a> 
        </article>
    <?php }} else {?>
        <div class="error_msg">
            Нет запросов
        </div>
    <?php }?>
</div>