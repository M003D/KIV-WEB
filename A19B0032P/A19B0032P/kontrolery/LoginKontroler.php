<?php

/**
 * Class LoginKontroler
 * Kontroler zkontroluje,jestli je uživatel přihlášen.
 * Ořízne parametry o speciální znaky. Zamezí se tak základním SQL útokům
 * Zavolá model Login, která přihlásí uživatele a načte jeho údaje z databáze.
 * Nastaví klíčové parametry.
 */
class LoginKontroler extends Kontroler{
    public function zpracuj($parametry)
    {
         if(isset($_SESSION['user_logged_in'])){
             header('Location: ubytovani');
             die();
         }

        if(isset($_POST['submit'])){
            $name = filter_var(strip_tags($_POST['user']), FILTER_SANITIZE_SPECIAL_CHARS);
            $pass = filter_var(strip_tags($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);

            $login = new Login();
            $login->login($name,$pass);
        }

        $this->hlavicka = array(
            'titulek' => 'Login',
            'klicova_slova' => 'Login',
            'popis' => 'Login stranka pro Vas.'
        );

        $this->pohled = 'login';
    }
}