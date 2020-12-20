<?php

/**
 * Class DeleteKontroler
 * Kontroler zkontroluje,jestli je uživatel přihlášen.
 * Zavolá model delete, který smaže uživatele
 * Nastaví klíčové parametry.
 */
class DeleteKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        if (!isset($_SESSION['user_logged_in'])) {
            header('Location: ubytovani');
            die();
        }
        if (isset($_GET['rn'])) {
            $dl =  $_GET['rn'];
            $delete = new Delete();
            $delete->delete($dl);

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

