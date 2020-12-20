<?php

/**
 * Class UbytovaniKontroler
 * Kontroler zkontroluje,jestli je uživatel přihlášen.
 * Ořízne parametry o speciální znaky. Zamezí se tak základním SQL útokům
 * Přesměruje na header formulařé a zde předvyplní data do inputu.
 * Nastaví klíčové parametry.
 */
class UbytovaniKontroler extends Kontroler{
    public function zpracuj($parametry)
    {
        if(!$_SESSION['user_logged_in']){
            header('Location: login');
            die();
        }

        if(isset($_POST['submit'])){
            $hotel =  filter_var(strip_tags($_POST['submit']), FILTER_SANITIZE_SPECIAL_CHARS);
            header('Location:formular-rezervace?id_hotelu=' . $hotel);
            die();
        }

        $this->hlavicka = array(
            'titulek' => 'Ubytovani',
            'klicova_slova' => 'Ubytovani',
            'popis' => 'Ubytovaci stranka pro Vas.'
        );

        $this->pohled = 'ubytovani';
    }
}