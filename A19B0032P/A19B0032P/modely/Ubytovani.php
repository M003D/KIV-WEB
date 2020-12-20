<?php
class Ubytovani
{
    /**
     * Ubytovani constructor.
     * Funkce zobrazí tabulku s hotely
     */
    public function ubytovani()
    {
        $name = $_SESSION['username'];
        $db = new Databaze();
        $databaze = $db->connect('userregistration');
        $user_check_query = "SELECT * FROM userreservation where user = '$name'";
        $result = mysqli_query($databaze, $user_check_query);
        $string = "table";
        if($result -> num_rows > 0){

            while($row = $result-> fetch_assoc()){
                echo "<table class='table' border='3'>";
                echo  "<table class=".$string.">";
                echo "<th> Název hotelu </th>";
                echo "<th> Město hotelu </th>";
                echo "<th> Adresa hotelu </th>";
                echo "<th> Směrovací číslo hotelu </th>";
                echo "<th> Telefonní číslo hotelu </th>";

                echo "<tr><td>".$row["h_name"] . "
</td> <td>".$row["h_town"] . " </td> <td>".$row["h_adress"] . " </td> <td>".$row["h_post_code"] . " </td> <td>".$row["h_tel_phone"] . "
</td></tr>";
                echo "</table> <br>";
            }
        }
        else{
            echo "<h3 class='text-center'> Zatím jste neudělali žádnou rezervaci </h3><br>";

        }
        $db->disconnect($databaze);
    }

}