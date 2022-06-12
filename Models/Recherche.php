<?php
  class Recherche extends Model{
    public function __construct(){
      $this->table = "";
      $this->getConnection();
    }

    public function getProduit(){
      $r = $_POST['research'];
      $stmt = $this->_connexion->prepare("SELECT idProduit, ProdName, Price, imgProduit, Description FROM `produit`JOIN `categorie` USING (idCategorie)
        WHERE `categorie`.`nomCategorie` LIKE '%$r%' AND `Quantite` > 0 ");
      $stmt->execute();
      if($stmt->rowCount() == 0){
        echo '<script language="javascript">';
        echo 'alert("Nous somme désolés, nous ne trouvons pas de resultats pour votre recherche.");';
        echo 'window.location.href="/MVC/";';
        echo '</script>';
      }
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }
  }
 ?>
