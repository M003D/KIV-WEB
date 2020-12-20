<?php

/**
 * Class ProgramKontroler
 * Kontroler zkontroluje,jestli je uživatel přihlášen.
 * Nastaví klíčové parametry.
 */
class ProgramKontroler extends Kontroler{
    public function zpracuj($parametry)
    {
        $this->hlavicka = array(
            'titulek' => 'Program',
            'klicova_slova' => 'Program',
            'popis' => 'Program stranka pro Vas.'
        );
        $this->pohled = 'program';
    }
}