<?php

/**
 * Class UvodKontroler
 *  Kontroler zkontroluje,jestli je uživatel přihlášen.
 *  Nastaví klíčové parametry.
 */
class UvodKontroler extends Kontroler{
    public function zpracuj($parametry)
    {
        $this->hlavicka = array(
            'titulek' => 'Uvod',
            'klicova_slova' => 'Uvod',
            'popis' => 'Uvod stranka pro Vas.'
        );

        $this->pohled = 'uvod';
    }
}