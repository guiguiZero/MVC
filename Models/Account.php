<?php
  class Account extends Model{
    public function __construct(){
      $this->table = "";
      $this->getConnection();
    }

    public function getData(){
      session_start();
      $stmt = $this->_connexion->prepare("SELECT * FROM utilisateur WHERE idUser =".$_SESSION['idUser']);
      $stmt->execute();
      $res = $stmt->fetch(PDO::FETCH_ASSOC);
      return $res;
    }
  }
 ?>
