<form action="<?=$action?>" method="post" id="userForm" style="text-align: center;" onsubmit="updateUser();return false;">
    <div style="display: grid; margin-bottom: 2em;">
        <h3><?=$title?></h3>
        <div class="grid-form-modal">
            <div>
                <div>
                    <input type="text" name="name" id="name" value="<?=($user)?$user->name:NULL;?>" autocomplete="off" placeholder="Nombre" required>
                </div>
            </div>
            <div>
                
                <div>
                    <input type="email" name="username" id="username" value="<?=($user)?$user->username:NULL;?>" placeholder="Casilla de correo" autocomplete="off" required>
                </div>
            </div>
            <?php
            if(!$user){
            ?>
            <div>
                <div>
                    <input type="password" name="pass" id="pass" autocomplete="off" placeholder="Clave de acceso" required>
                </div>
            </div>
            <div>
                <div>
                    <input type="password" name="repeat_pass" id="repeat_pass" autocomplete="off" placeholder="Repetir clave" required>
                </div>
            </div>
            <?php
            }else{
            ?>
                <input type="hidden" name="id" value="<?=$user->id?>">
            <?php    
            }
            ?>
        </div>
    </div>
    <input type="submit" value="Continuar">
</form>