<?php

/**
 * Class Delete2Kontroler
 * Kontroler zkontroluje,jestli je uživatel přihlášen.
 * Zavolá model delete2, který provede smazání rezervace
 * Nastaví klíčové parametry.
 */
class Delete2Kontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        if (!isset($_SESSION['user_logged_in'])) {
            header('Location: ubytovani');
            die();
        }

        if (isset($_GET['rn'])) {
            $dl =  $_GET['rn'];

            $delete2 = new Delete2();
            $delete2->delete2($dl);

        }
        header('Location: admin-panel');
        die();

        $this->hlavicka = array(
            'titulek' => 'Delete',
            'klicova_slova' => 'Delete',
            'popis' => 'Delete stranka pro Vas.'
        );


        $this->pohled = 'delete';
    }
}

