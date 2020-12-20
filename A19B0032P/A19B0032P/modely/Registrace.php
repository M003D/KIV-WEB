<?php

class  Registrace
{
    /**
     * Registrace constructor.
     * @param $user jmeno
     * @param $password heslo1
     * @param $password2 heslo2
     * Funkce uloží data od uživatele do databáze
     */
    public function registrace($user,$password,$password2)
    {
        //Načtení databáze
        $db = new Databaze();
        $databaze = $db->connect('userregistration');

        //Načtení údajů
        $username = filter_var(strip_tags($user), FILTER_SANITIZE_SPECIAL_CHARS);
        $password_1 = filter_var(strip_tags($password), FILTER_SANITIZE_SPECIAL_CHARS);
        $password_2 = filter_var(strip_tags($password2), FILTER_SANITIZE_SPECIAL_CHARS);

        //Pokud hesla nejsou shodná
        if ($password_1 != $password_2) {
            $_SESSION['msg']="Zadaná hesla se neshodují. Zkuste to prosím znovu. ";
            $db->disconnect($databaze);
            header('Location: registrace');
            die();
        }
        //načtení údajů z registrace
        $column = 'name';
        $table = 'usertable';
        $register = $db->register_show($user,$table,$column);
        $result = mysqli_query($databaze , $register);

        //jméno již existuje
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['msg']="Tento nick je již obsazený!";
            $db->disconnect($databaze);
            header('Location: registrace');
            die();
        }
        //vložení dat do databáze
        $column_name = 'name';
        $column_password = 'password';
        $register_user = $db->register_user($username,$password_1,$table,$column_name,$column_password);
        mysqli_query($databaze, $register_user);
        $_SESSION['msg']="Úspěšně jste se zaregistrovali!";
        $db->disconnect($databaze);
        header('Location:login');
        die();
    }

}