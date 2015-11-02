<?php
class ConnectionFactory {
  private static $host = "localhost";
  private static $user = "root";
  private static $pssw = "";
  private static $dbnm = "enem";

  public static function getConnection() {
    $con = mysqli_connect(ConnectionFactory::$host, ConnectionFactory::$user, ConnectionFactory::$pssw, ConnectionFactory::$dbnm);

    return $con;
  }
}
?>
