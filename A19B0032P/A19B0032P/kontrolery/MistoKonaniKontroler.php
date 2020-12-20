<?php

/**
 * Class MistoKonaniKontroler
 *  Kontroler zkontroluje,jestli je uživatel přihlášen.
 *  Nastaví klíčové parametry.
 */
class MistoKonaniKontroler extends Kontroler{
    public function zpracuj($parametry)
    {
        $this->hlavicka = array(
            'titulek' => 'Misto',
            'klicova_slova' => 'Misto',
            'popis' => 'Misto stranka pro Vas.'
        );

        $this->pohled = 'misto_konani';
    }
}