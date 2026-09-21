<div class="friend_list">
    <?php AssetsManager::addScripts('scripts/friends_scripts.js')?>
    <button class="add_friend" onclick="openAddFriendsForm()">
        <img src="images/add.png" alt="404"> 
        Добавить друга
    </button>
    <?php if(count($data['friends']) != 0){
        foreach($data['friends'] as $friend){?>
        <article class="friend_card">
            <img src="<?=$friend['image']?>" alt="404" class="friend_image">
            <span class="friend_name"><?=$friend['name']?></span>
            <a class="unfriend_button" href=<?="user?action=unfriend&userId=" . $data['user']['userId'] . "&friendId=" . $friend['id']?>>
                <img class="unfriend_img" src="images/x.png" alt="404">
            </a>
        </article>
    <?php }}
        if(isset($data['error'])){?>
        <div class="error_msg">
            <?=$data['error']?>
        </div>
    <?php }?>  
    <dialog id="modal_form" onclick="closeAddFriendsForm(event)">
        <form class="add_friend_form" action="<?="user?action=findFriend&userId=" . $data['user']['userId']?>" onclick="event.stopPropagation()" method="POST">
            <div class="close">
                <button type="button" onclick="closeAddFriendsForm(event)"><img src="images/close.png" alt="404" ></button>
            </div>
            <div class="field">
                <label for="friend_name">Введите никнейм пользователя: </label>
                <input type="text" class="searchFriendInput" name="friend_name">
            </div>
            <div class="friends_items">
                <div class="friends_items_list">
                    <?php 
                    if(!empty($data['users'])){
                        foreach($data['users'] as $key => $friend){?>
                            <?php 
                            $status = '';
                            $urlFriend = "user?action=addFriend&userId=" . $data['user']['userId'] . "&friendId=" . $friend['userId'];
                                if(isset($friend['status'])){
                                    $status = $friend['status'];
                                    $urlFriend =  '';
                                    $className = 'disableLink';
                                }
                            ?>
                            <a class="<?=$className?>" name="<?="friend_" . $key?>" href=<?=$urlFriend?>>
                                <img class="friend_image" src="<?=$friend['image']?>" alt="404">
                                <?=$friend['name'] . " " . $status?>
                            </a>
                    <?php }}?>
                </div>
            </div>
            <input type="submit" value="Найти" >
        </form>
    </dialog>

    <?php AssetsManager::renderScripts()?>
</div>