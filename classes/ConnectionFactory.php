<?php
class ConnectionFactory {
  private static $host = "localhost";
  private static $user = "root";
  private static $pssw = "";
  private static $dbnm = "enem";

  public static function getConnection() {
    return mysqli_connect(ConnectionFactory::$host, ConnectionFactory::$user, ConnectionFactory::$pssw, ConnectionFactory::$dbnm);
  }
}
?>
