<?php

class Databaze
{
    /**
     * Function connect()
     * Navazuje spojení s databází
     */
    public function connect($database)
    {
        $host = 'localhost';
        $user = 'root';
        $password = '123456';
        $db = mysqli_connect("$host", "$user", "$password", "$database");
        if ($db == false) {
            $_SESSION['msg']="Nepovedlo se připojit k databázi. Zkuste to prosím později.";
            header('Location:ubytovani');
            $this->disconnect($db);
        }
        return $db;

    }

    /**
     * Function dissconect() - odpojení od databáze
     * @param $db od jaké databáze
     */
    public function disconnect($db){
        mysqli_close($db);
    }

    /**
     * Function delete_reservation() - odstraní rezervaci z databáze
     * @param $delete - co chceme porovnávat se sloupcem
     * @param $table název tablu
     * @param $column název sloupce
     * @return $sql
     */
    public function delete_reservation($delete,$table,$column){
        return $sql = "DELETE FROM $table WHERE $column='$delete'";
    }

    /**
     * Function delete_user() - odstraní uživatele z databáze
     * @param $delete - co chceme porovnávat se slooupcem
     * @param $db - databáze
     * @param $table - table
     * @param $column - sloupce
     * @return $sql
     */
    public function delete_user($delete,$db,$table,$column){
        if($delete == "admin") {
            $_SESSION['msg']="Nelze smazat administrátora!";
            header('Location:admin-panel');
            $this->disconnect($db);
            die();
        }
        return $sql = "DELETE FROM $table WHERE $column ='$delete'";
    }

    /**
     * Function register_user() - Zaregistruje uživatele do databáze
     * @param $username - jméno
     * @param $password - heslo
     * @param $table - table
     * @param $column_name - název sloupce
     * @param $column_password - název sloupce
     * @return string
     */
    public function register_user($username,$password,$table,$column_name,$column_password){
        $pass = hash("sha256",$password);
        return $sql= "INSERT INTO $table ($column_name,$column_password)VALUES('$username', '$pass')";
    }

    /**
     * Function login() - přihlásí uživatele
     * @param $name - jméno
     * @param $table - table
     * @param $column - sloupec
     * @return $sql
     */
    public function login($name,$table,$column){
        return $sql = "select * from $table where $column = '$name'";
    }
    /**
     * Function register_show() - ukáže údaje z databáze registrovaných
     * @param $username - jméno
     * @param $table - table
     * @param $column - sloupec
     * @return $sql
     */
    public function register_show($username,$table,$column){
        return $sql = "SELECT * FROM $table WHERE $column='$username'";
    }



    /**
     * Function make_reservation() - odešle rezervaci do databáze
     */
    public function make_reservation($name,$U_name,$U_surrname,$U_adress,$U_city,$U_zip,$U_phone,$U_mail,$H_name,
                                     $H_city,$H_adress,$H_zip,$H_phone,$table,
                                     $column_user,$column_u_name,$column_u_surrname,$column_u_adress,$column_u_town,$column_u_post_code
        ,$column_u_tel_phone,$column_u_email,$column_h_name,$column_h_town,$column_h_adress,$column_h_post_code,$column_h_tel_phone){

        return $sql = "INSERT INTO $table($column_user,$column_u_name,$column_u_surrname,$column_u_adress,$column_u_town,$column_u_post_code,$column_u_tel_phone,$column_u_email,
                                    $column_h_name,$column_h_town,$column_h_adress,$column_h_post_code,$column_h_tel_phone)            
  			  VALUES('$name','$U_name', '$U_surrname','$U_adress','$U_city','$U_zip','$U_phone','$U_mail',
  			  '$H_name','$H_city','$H_adress','$H_zip','$H_phone')";
    }


}