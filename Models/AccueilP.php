<?php
  class AccueilP extends Model{
    public function __construct(){
      $this->table = "";
      $this->getConnection();
    }
    public function getPromo(){
      $stmt = $this->_connexion->prepare("SELECT `produit`.idProduit, ProdName, Price, imgProduit, Description, Reduction FROM `produit` JOIN `promotions` ON `produit`.idProduit = `promotions`.idProduit");
      $stmt->execute();
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function getRandom(){
      $stmt = $this->_connexion->prepare("SELECT idProduit, ProdName, Price, imgProduit, Description FROM `produit` ORDER BY RAND() LIMIT 5");
      $stmt->execute();
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;

    }
  }
 ?>
