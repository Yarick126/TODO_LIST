<div class="auth">
    <div class="choose_auth">
        <button disabled class="disabled">LOGIN</button>
        <button>REGISTRATION</button>
    </div>
    <form action="auth?action=login" method="POST" class="login">
        <h2 class="title">Sign in</h2>
        <div class="field">
            <label for="">email</label>
            <input name='email' required type="email">
        </div>
        <div class="field">
            <label for="">password</label>
            <input name="password" required type="password">
        </div>
        <?php if(isset($data['errorMessage'])):?>
            <div class="errorMsg">
                <?=$data['errorMessage']?>
            </div>
        <?php endif?>
        <input type="submit" value="Sign In">
    </form>
    <form onsubmit="validateForm()" action="auth?action=register" method="POST" class="register">
        <h2 class="title">Sign up</h2>
        <div class="field">
            <label for="1">name</label>
            <input required type="name" name="name" id="1">
        </div>
        <div class="field">
            <label for="2">email</label>
            <input required type="email" name="email" id="2">
        </div>
        <div class="field">
            <label for="3">password</label>
            <input required type="password" name="password" id="3">
        </div>
        <div class="field">
            <label for="4">repeat password</label>
            <span class="errorMsg" name="repeatPasswordError">Passwords are not the same!</span>
            <input required type="password" name="repeatPassword" id="4">
        </div>
        <?php if(isset($data['errorMessage'])):?>
            <div class="errorMsg">
                <?=$data['errorMessage']?>
            </div>
        <?php endif?>
        <input type="submit" value="Sign Up">
    </form>
</div>
        
