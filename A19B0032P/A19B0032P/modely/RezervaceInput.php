<?php
class RezervaceInput
{
    /**
     * RezervaceInput constructor.
     * Funkce vloží data z databáze do inputu
     */
    public function rezervaceInput()
    {
        $id_hotelu = $_GET['id_hotelu'];
        $db = new Databaze();
        $databaze = $db->connect('hotel');
        $sql = "SELECT * FROM hoteltable where id = '$id_hotelu'";
        $result = mysqli_query($databaze,$sql) or die("Nepovedlo se");
        $resultCheck = mysqli_num_rows($result);
       return $row = mysqli_fetch_assoc($result);
        $db->disconnect($databaze);
    }

}