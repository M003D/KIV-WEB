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
           echo" <form action='Ubytovani.php' method='post'>";
            echo "<div class='table-responsive'>";
            echo "<table class='table' border='3'>";
            //echo  "<table class=".$string.">";
            /* echo "<th> Název hotelu </th>";
             echo "<th> Město hotelu </th>";
             echo "<th> Adresa hotelu </th>";
             echo "<th> Směrovací číslo hotelu </th>";
             echo "<th> Telefonní číslo hotelu </th>";*/
            echo " <th> Jméno </th> ";
            echo " <th> Příjmení </th>";
            echo "<th> Ulice </th>";
            echo "<th> Mesto </th>";
            echo "<th> Poštovní číslo </th>";
            echo "<th> Telefonní číslo </th>";
            echo "<th> Email </th>";
            echo "<th> Jméno hotelu </th>";
            echo "<th> Mesto </th>";
            echo "<th> Ulice </th>";
            echo "<th> Postovni cislo </th>";
            echo "<th> Telefonni cislo </th>";

            while($row = $result-> fetch_assoc()){

               /* echo "<tr><td>".$row["h_name"] . "
</td> <td>".$row["h_town"] . " </td> <td>".$row["h_adress"] . " </td> <td>".$row["h_post_code"] . " </td> <td>".$row["h_tel_phone"] . "
</td></tr>";
                echo "</table> <br>";*/
                echo "<tr><td>". $row["u_name"]."</td> <td>".$row["u_surrname"] . "</td><td>".$row["u_adress"] . "
</td> <td>".$row["u_town"]. " </td> <td>".$row["u_post_code"] . "</td> <td>".$row["u_tel_phone"] . "</td> <td>".$row["u_email"] ."</td><td>".$row["h_name"] . "
</td><td>".$row["h_town"] . " </td> <td>".$row["h_adress"] . " </td> <td>".$row["h_post_code"] . " </td><td>".$row["h_tel_phone"] . "</td></tr>";
            }
            echo "</table>";
            echo "</div>";
            echo "</form>";
            echo "<p> V případě chyby v rezervaci kontaktujte podporu na email 'podpora@web.com'. </p>";
            echo "<p> Můžete vytvořit novou rezervaci. Vaše chybná rezervace bude přemazána po domluvě s administrátorem. </p>";
        }

        else{
            echo "<h3 class='text-center'> Zatím jste neudělali žádnou rezervaci </h3><br>";

        }

        $db->disconnect($databaze);
    }

}