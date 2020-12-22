<?php

/**
 * Class FormularRezervaceKontroler
 * Kontroler zkontroluje,jestli je uživatel přihlášen.
 * Ořízne parametry o speciální znaky. Zamezí se tak základním SQL útokům
 * Volá model FormularRezervace, která provede zaslání rezervace do databáze
 * Nastaví klíčové parametry.
 */
class FormularRezervaceKontroler extends Kontroler{
    public function zpracuj($parametry)
    {
        if (isset($_POST['reg_hotel'])) {
            $name = $_SESSION['username'];
            //ochrana proti SQL/XSS útokům
            $U_name = filter_var(strip_tags($_POST['U_inputName']), FILTER_SANITIZE_SPECIAL_CHARS);
            $U_surrname =filter_var(strip_tags($_POST['U_inputSurrname']), FILTER_SANITIZE_SPECIAL_CHARS);
            $U_adress = filter_var(strip_tags($_POST['U_inputAddress']), FILTER_SANITIZE_SPECIAL_CHARS);
            $U_city = filter_var(strip_tags($_POST['U_inputCity']), FILTER_SANITIZE_SPECIAL_CHARS);
            $U_zip = filter_var(strip_tags($_POST['U_inputZip']), FILTER_SANITIZE_SPECIAL_CHARS);
            $U_phone = filter_var(strip_tags($_POST['U_inputPhone']), FILTER_SANITIZE_SPECIAL_CHARS);
            $U_mail = filter_var(strip_tags($_POST['U_inputEmail']), FILTER_SANITIZE_SPECIAL_CHARS);
            $H_name = filter_var(strip_tags($_POST['H_inputName']), FILTER_SANITIZE_SPECIAL_CHARS);
            $H_city = filter_var(strip_tags($_POST['H_inputCity']), FILTER_SANITIZE_SPECIAL_CHARS);
            $H_adress = filter_var(strip_tags($_POST['H_inputAdress']), FILTER_SANITIZE_SPECIAL_CHARS);
            $H_zip = filter_var(strip_tags($_POST['H_inputZip']), FILTER_SANITIZE_SPECIAL_CHARS);
            $H_phone = filter_var(strip_tags($_POST['H_inputPhone']), FILTER_SANITIZE_SPECIAL_CHARS);

            if($U_phone)
            //volání modelu rezervace
            $rezervace = new FormularRezervace();
            $rezervace->formularrezervace($name,$U_name,$U_surrname,$U_adress,$U_city,$U_zip,
                $U_phone,$U_mail,$H_name,$H_city,$H_adress,$H_zip,$H_phone);
        }

        $this->hlavicka = array(
            'titulek' => 'Formular',
            'klicova_slova' => 'Formular',
            'popis' => 'Formular stranka pro Vas.'
        );

        $this->pohled = 'formular_rezervace';
    }
}