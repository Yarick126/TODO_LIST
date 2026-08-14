<div class="auth">
    <div class="choose_auth">
        <button class="active" onclick="openLogin(event)">ВОЙТИ</button>
        <button  onclick="openRegistration(event)">ЗАРЕГЕСТРИРОВАТЬСЯ</button>
    </div>
    <form action="auth?action=login" method="POST" class="login">
        <div class="field">
            <label for="">Почта</label>
            <input name='email' required type="email">
        </div>
        <div class="field">
            <label for="">Пароль</label>
            <input name="password" required type="password">
        </div>
        <?php if(isset($data['errorMessage'])):?>
            <div class="errorMsg">
                <?=$data['errorMessage']?>
            </div>
        <?php endif?>
        <input type="submit" value="Войти">
    </form>
    <form onsubmit="validateForm()" action="auth?action=register" method="POST" class="register">
        <div class="field">
            <label for="1">Имя</label>
            <input required type="name" name="name" id="1">
        </div>
        <div class="field">
            <label for="2">Почта</label>
            <input required type="email" name="email" id="2">
        </div>
        <div class="field">
            <label for="3">Поароль</label>
            <input required type="password" name="password" id="3">
        </div>
        <div class="field">
            <label for="4">Повторите пароль</label>
            <span class="errorMsg" name="repeatPasswordError">Пароли не совпадают!</span>
            <input required type="password" name="repeatPassword" id="4">
        </div>
        <?php if(isset($data['errorMessage'])):?>
            <div class="errorMsg">
                <?=$data['errorMessage']?>
            </div>
        <?php endif?>
        <input type="submit" value="Зарегестрироваться">
    </form>
</div>
        
