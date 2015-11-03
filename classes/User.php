<?php
class User {
  private $id;
  private $name;

  function __construct($id, $name) {
    $this->id   = $id;
    $this->name = $name;
    $_SESSION["logado"] = $name ;
    $_SESSION["id"] = $id ;
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }
}
?>
