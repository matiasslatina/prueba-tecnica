<?php
;
use Models\Pass;
use Views\View;

$view=new View();
$pass=new Pass();


switch ($uriParts[1]) {
    case 'retrieve':
        $view->printRetrievePassForm();
        break; 
    case 'retrieveSubmit': 
        if($pass->isUsernameExist())
        {
            $pass->sendEmailRestoreLink();
            $view->printRetrievePassForm(RETRIEVE_OK);
        }else{
            $view->printRetrievePassForm(RETRIEVE_FAIL);
        }
        break;
    case 'key': 
        $key=$uriParts[2];
        if($key!==''){
            $result=$pass->isKeyExist($key);
            if(mysqli_num_rows($result)>0)
            {
                $view->printResetPassForm($result);
            }else{
                $view->printLoginForm();
            }
        }else{
            $view->printLoginForm();
        }
        break;
    case 'newPass':
        $messaje="";
        if(isset($_POST['submit'])){
            if($pass->updateUserPass()){
                $messaje=RESET_OK;
            }else{
                $messaje=RESET_FAIL;
            }
        }
        $view->printLoginForm($messaje);
        break;
    default:
        $view->printLoginForm();
    break;
}