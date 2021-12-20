<table>
    <thead>
        <th>
            ID
        </th>
        <th>
            Nombre
        </th>
        <th>
            Usuario
        </th>
        <th>
            Registro
        </th>
        <th colspan="2"></th>
    </thead>
    <tbody id="myTable">
        <?php
        while($user=mysqli_fetch_object($userAllResult)){
            ?>
            <tr id="<?=$user->id?>TrTable">
                <td><?=$user->id?></td>
                <td><?=$user->name?></td>
                <td><?=$user->username?></td>
                <td><?=$user->register_date?></td>
                <td style="width: 10%; text-align: center;">
                    <input type="button" onclick="editUserModal(<?=$user->id?>)" value="Editar">
                </td>
                <td style="width: 10%;; text-align: center;">
                <?php
                if($user->id!=$_SESSION['id']){
                    ?>
                    <input type="button" onclick="deleteUser(<?=$user->id?>)" value="Eliminar">
                    <?php
                }    
                ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
