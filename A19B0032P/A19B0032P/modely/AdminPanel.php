<?php
class AdminPanel
{
    /**
     * AdminPanel constructor.
     * Funkce zobrazí panel admina, pokud je uživatel přihlášen pod adminským přihlaš. udaji.
     */
    public function adminPanel()
    {
        if(isset($_SESSION['user_logged_in'])){
            $name = $_SESSION['username'];
            if($name == "admin") {
                echo '<a class="nav-link" href="admin-panel">Přehled [ADMIN PANEL]</a>';
            }
        }

    }

    /**
     * Funkce zobrazí tabulku uživatelů
     */
    public function tableUser(){
        $db = new Databaze();
        $databaze = $db->connect('userregistration');
        $user_check_query = "SELECT * FROM usertable";
        $result = mysqli_query($databaze, $user_check_query);

        if($result -> num_rows > 0){
            while($row = $result-> fetch_assoc()){
                echo "<tr><td>". $row["name"]."</td> <td>".$row["password"] ."</td>
                    <td><a href = 'delete?rn=" .$row["name"]. "'>Smazat </td>
                    </tr>";
            }
        }
        else{
            echo "<tr><td> NULL </td><td> NULL </td><td>NULL</td></tr>";
        }
        $db->disconnect($databaze);
    }


    /**
     * Funkce zobrazí tabulku rezervací
     */
    public function tableReservation(){
        $db = new Databaze();
        $databaze = $db->connect('userregistration' );

        $user_check_query = "SELECT * FROM userreservation";
        $result = mysqli_query($databaze, $user_check_query);
        if($result -> num_rows > 0){
            while($row = $result-> fetch_assoc()){
                echo "<tr><td>". $row['user']. " </td><td>". $row["u_name"]."</td> <td>".$row["u_surrname"] . "</td><td>".$row["u_adress"] . "
</td> <td>".$row["u_town"]. " </td> <td>".$row["u_post_code"] . "</td> <td>".$row["u_tel_phone"] . "</td> <td>".$row["u_email"] ."</td><td>".$row["h_name"] . "
</td><td>".$row["h_town"] . " </td> <td>".$row["h_adress"] . " </td> <td>".$row["h_post_code"] . " </td><td>".$row["h_tel_phone"] . "
<td><a href= 'delete2?rn=" .$row["u_name"]. "'>Smazat </td></tr>";
            }
        }
        else{
            echo "<tr><td> NULL </td><td> NULL </td><td> NULL </td><td> NULL </td><td> NULL </td><td> NULL </td><td> NULL </td><td> NULL </td><td> NULL </td><td> NULL </td><td> NULL </td><td> NULL </td><td> NULL </td><td> NULL </td></tr>";
        }
        $db->disconnect($databaze);
    }
}