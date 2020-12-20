<?php
class JmenoMenu
{
    /**
     * JmenoMenu constructor.
     * Funkce zobrazí v menu jméno, podle toho, jestli je přihlášen nebo ne.
     */
    public function jmenoMenu()
    {
        $link = 'uvod';
        $nav = 'navbar-brand';
        if(!isset($_SESSION['username']) || empty($_SESSION['username'])){

            echo "<a class ='".$nav. "' href='".$link."'>Návštěvník</a>";
        }
        else{
            $usr = $_SESSION['username'];
            echo "<a class ='".$nav. "' href='".$link."'>".strtoupper($usr)."</a>";
        }
    }

}