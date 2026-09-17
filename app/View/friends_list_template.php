<div class="friend_list">
    <?php AssetsManager::addScripts('scripts/friends_scripts.js')?>
    <button class="add_friend" onclick="openAddFriendsForm()"><img src="images/add.png" alt="404"> Добавить друга</button>
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