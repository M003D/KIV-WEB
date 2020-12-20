<?php

/**
 * Class RegistraceKontroler
 *  Kontroler zkontroluje,jestli je uživatel přihlášen.
 * Ořízne parametry o speciální znaky. Zamezí se tak základním SQL útokům
 * Zavolá model Registrace, která odešle údaje od uživatele do databáze.
 *  Nastaví klíčové parametry.
 */
class RegistraceKontroler extends Kontroler{
    public function zpracuj($parametry)
    {
        if(isset($_SESSION['user_logged_in'])){
            header('Location: ubytovani');
            die();
        }
        if (isset($_POST['reg_user'])) {
            $username = filter_var(strip_tags($_POST['user']), FILTER_SANITIZE_SPECIAL_CHARS);
            $password_1 = filter_var(strip_tags($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);
            $password_2 = filter_var(strip_tags($_POST['password2']), FILTER_SANITIZE_SPECIAL_CHARS);

            $registrace = new Registrace();
            $registrace->registrace($username,$password_1,$password_2);
        }
        $this->hlavicka = array(
            'titulek' => 'Registrace',
            'klicova_slova' => 'Registrace',
            'popis' => 'Registrace stranka pro Vas.'
        );

        $this->pohled = 'registrace';
    }
}