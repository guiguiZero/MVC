<?php
  class TutoList extends Model{
    public function __construct(){
      $this->table = "";
      $this->getConnection();
    }
      public function getTuto(){
        $stmt = $this->_connexion->prepare("SELECT imgTutorial FROM `tutorial`");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
      }
  }
 ?>
