<form action="/pass/newPass" method="POST" >
    <div style="display: grid; height: 90vh;">
        <div class="grid-form">
            <div>
                <h3>
                    Restablecer clave
                </h3>
            </div>
            <div>
                <div><input type="password" name="pass" id="pass" autocomplete="off" required placeholder="Nueva clave"></div>
            </div>
            <div>
                <input type="hidden" name="key" value="<?=$user->passKey?>">
                <input type="hidden" name="id" value="<?=$user->id?>">
                <input type="hidden" name="username" value="<?=$user->username?>">
                <input type="submit" name="submit" value="Continuar">
            </div>
        </div>
    </div>
</form>