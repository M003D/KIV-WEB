<?php

class FormularRezervace
{
    /**
     * FormularRezervace constructor.
     * Funkce odešle data o rezervaci do databáze
     */
    public function formularrezervace($name,$U_name,$U_surrname,$U_adress,$U_city,$U_zip,$U_phone,$U_mail,$H_name,
                                      $H_city,$H_adress,$H_zip,$H_phone)
    {
        //připojení k databázi
        $db = new Databaze();
        $databaze = $db->connect('userregistration');
        $table = 'userreservation';

        $column_user = 'user';
        $column_u_name = 'u_name';
        $column_u_surrname = 'u_surrname';
        $column_u_adress = 'u_adress';
        $column_u_town = 'u_town';
        $column_u_post_code = 'u_post_code';
        $column_u_tel_phone = 'u_tel_phone';
        $column_u_email = 'u_email';

        $column_h_name = 'h_name';
        $column_h_town = 'h_town';
        $column_h_adress = 'h_adress';
        $column_h_post_code = 'h_post_code';
        $column_h_tel_phone = 'h_tel_phone';


        //odeslání rezervace do databáze
        $reservation = $db->make_reservation
        ($name,$U_name,$U_surrname,$U_adress,$U_city,$U_zip,$U_phone,$U_mail,$H_name,
            $H_city,$H_adress,$H_zip,$H_phone,$table,$column_user,$column_u_name,$column_u_surrname,$column_u_adress,$column_u_town,
            $column_u_post_code,$column_u_tel_phone,$column_u_email,$column_h_name,$column_h_town,$column_h_adress,$column_h_post_code,$column_h_tel_phone);

        mysqli_query($databaze, $reservation);
        $db->disconnect($databaze);

        $_SESSION['msg']="Vaše rezervace byla úspešně přijata do systému!";
        header('Location:ubytovani');
        die();
    }

}