<?php

class Login
{
    /**
     * Login constructor.
     * @param $name jmeno
     * @param $pass heslo
     * Funkce přihlásí uživatele
     */
    public function login($name,$pass)
    {
        //načtení databáze
        $db = new Databaze();
        $databaze = $db->connect('userregistration');
        //načtení dat z databáze
        $table = 'usertable';
        $column = 'name';
        $login = $db->login($name,$table,$column);

        $result = mysqli_query($databaze,$login);
        $num = mysqli_num_rows($result);
        if($num == 1){
            $user = mysqli_fetch_assoc($result);
            if(hash("sha256",$pass) == $user['password']){
                $_SESSION['username'] = $name;
                $_SESSION['user_logged_in']= true;
                $_SESSION['msg']="Úspešně jste se přihlásili!";
                $db->disconnect($databaze);
                header('location:ubytovani');
                die();
            }
        }

        $_SESSION['msg']="Zadané jméno nebo heslo je nesprávné! Zkuste to znovu. ";
        $db->disconnect($databaze);
        header('Location:login');
        die();

    }

}