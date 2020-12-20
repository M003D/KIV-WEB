<?php
class Delete2
{
    /**
     * Delete2 constructor.
     * @param $delete co cheme mazat
     * Funkce smaže rezervaci
     */
    public function delete2($delete)
    {
        //připojení k databází
        $db = new Databaze();
        $databaze = $db->connect('userregistration');
        //smazání rezervace
        $table = 'userreservation';
        $column = 'u_name';
        $delete = $db->delete_reservation($delete,$table,$column);
        mysqli_query($databaze,$delete);
        $db->disconnect($databaze);

        $_SESSION['msg']="Rezervace byla úspešně smazána!";
        header('Location:admin-panel');
        die();
    }

}