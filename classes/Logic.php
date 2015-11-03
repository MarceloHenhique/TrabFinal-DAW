<?php

Class Logic {

    public function ifLogado() {
      if(isset($_SESSION["logado"])) {
        return true ;
      } else return false ;
    }

}

?>
