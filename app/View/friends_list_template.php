<div class="friend_list">
    <button class="add_friend" onclick="openAddFriendsForm()"><img src="images/add.png" alt="404"> Добавить друга</button>
    <dialog id="modal_form" onclick="closeAddFriendsForm(event)">
        <form action="friend?action=addFriend" class="add_friend_form" onclick="event.stopPropagation()">
            <div class="close">
                <button type="button" onclick="closeAddFriendsForm(event)"><img src="images/close.png" alt="404" ></button>
            </div>
            <div class="field">
                <label for="friend_name">Введите никнейм пользователя: </label>
                <input type="text">
            </div>
            <div class="friends_items">
                <div class="friends">
                    <?php foreach($data['users'] as $key => $friend):?>
                        <a name="<?=$key?>" href=<?="user?action=addFriend&userId=" . $data['user']['userId']?>>
                            <img class="friend_image" src="<?=$friend['image']?>" alt="404">
                            <?=$friend['name']?>
                        </a>
                    <?php endforeach?>
                </div>
            </div>

            <input type="submit" value="Найти">
        </form>
    </dialog>
</div>