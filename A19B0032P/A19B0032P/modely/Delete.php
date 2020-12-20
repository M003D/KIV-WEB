<?php
class Delete
{
    /**
     * Delete constructor.
     * @param $delete co cheme mazat
     * Funkce smaže uživatele
     */
    public function delete($delete)
    {
        //připojení k databázi
        $db = new Databaze();
        $databaze = $db->connect('userregistration');
        //smazání uživatele
        $table = 'usertable';
        $column = 'name';
        $delete = $db->delete_user($delete,$databaze,$table,$column);
        mysqli_query($databaze,$delete);
        $db->disconnect($databaze);

        $_SESSION['msg']="Uživatel byl úspešné smazán!";
        header('Location:admin-panel');
        die();
    }

}