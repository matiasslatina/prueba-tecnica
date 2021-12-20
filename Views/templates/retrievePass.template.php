<form action="/pass/retrieveSubmit" method="POST" >
    <div style="display: grid; height: 90vh;">
        <div class="grid-form">
            <div>
                <h3>
                    Reestablecer clave
                </h3>
            </div>
            <div>
                <input type="email" name="username" id="username" placeholder="Casilla de correo" required>
                <?=(isset($message))?"<br><div class='message-text'>$message</div>":""?>
            </div>
            <div style="text-align: right;">
                <a href="/" style="text-decoration: none; font-size: 0.8em;">Ir al login</a>
            </div>
            <div>
                <input type="submit" name="submit" value="Continuar">
            </div>
        </div>
    </div>
</form>