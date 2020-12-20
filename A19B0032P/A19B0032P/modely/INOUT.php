<?php
class INOUT
{
    /**
     * INOUT constructor.
     * Funkce zobrazí buď login, pokud uživatel není přihlášen.
     * nebo logout, pokud je přihlášen.
     */
    public function inOut()
    {
        if (isset($_SESSION['user_logged_in'])) {
            echo '<form action="logout" method="post"> 
                      <button type="submit" name="submit" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true"> Logout </button>
                      </form>';
        } else {
            echo ' <a class="nav-link" href="login">LOGIN</a>';
        }
    }

}