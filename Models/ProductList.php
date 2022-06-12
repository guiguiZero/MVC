<?php
  class ProductList extends Model{
    public function __construct(){
      $this->table = "";
      $this->getConnection();
    }
      public function getProduit(){
        $stmt = $this->_connexion->prepare("SELECT idProduit, ProdName, Price, imgProduit, Description FROM `produit` WHERE `Quantite` > 0 ");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
      }
  }
 ?>
