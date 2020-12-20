<?php

/**
 * Class LogoutKontroler
 *  Kontroler zkontroluje,jestli je uživatel přihlášen.
 * Odstraní session.
 * Nastaví klíčové parametry.
 */
class LogoutKontroler extends Kontroler{
    public function zpracuj($parametry)
    {
        if (!isset($_SESSION['user_logged_in'])) {
            header('Location: ubytovani');
            die();
        }
        session_unset();
        session_destroy();
        header("Location:login");
        die();

        $this->hlavicka = array(
            'titulek' => 'Logout',
            'klicova_slova' => 'Logout',
            'popis' => 'Logout stranka pro Vas.'
        );

        $this->pohled = 'logout';
    }
}