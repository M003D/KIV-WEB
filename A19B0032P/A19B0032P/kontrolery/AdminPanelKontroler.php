<?php

/**
 * Class AdminPanelKontroler
 * Kontroler zkontroluje,jestli je uživatel přihlášen.
 * Nastaví klíčové parametry.
 */
class AdminPanelKontroler extends Kontroler{
    public function zpracuj($parametry)
    {
        if (!isset($_SESSION['user_logged_in'])) {
            header('Location: ubytovani');
            die();
        }
        $this->hlavicka = array(
            'titulek' => 'Admin panel',
            'klicova_slova' => 'Admin panel',
            'popis' => 'Admin panel stranka pro Vas.'
        );

        $this->pohled = 'admin_panel';
    }
}