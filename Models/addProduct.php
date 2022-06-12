<?php
  class addProduct extends Model{
    public function __construct(){
      $this->table = "";
      $this->getConnection();
    }
    public function getCategorie(){
      $stmt = $this->_connexion->prepare("SELECT * FROM categorie");
      $stmt->execute();
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function addProduit($img){
      $ProdName=$_POST['productName'];
      $ProdPrice=$_POST['productPrice'];
      $ProdDesc=$_POST['productDesc'];
      $ProdQuantite=$_POST['productQuantiter'];
      $ProdCat=$_POST['prodCat'];
      try{
        $command = $this->_connexion->prepare('INSERT INTO produit (idProduit, ProdName, Price, imgProduit, Description, Quantite, idCategorie) VALUES (DEFAULT, :nameProd, :priceProd, :imgProd, :descProd, :ProdQ, :CatID)');
        $command->execute($arrayName=array(
          'nameProd'=>htmlspecialchars($ProdName),
          'priceProd'=>htmlspecialchars($ProdPrice),
          'imgProd' => $img,
          'descProd'=>htmlspecialchars($ProdDesc),
          'ProdQ'=>$ProdQuantite,
          'CatID'=>$ProdCat
        ));
        //On redirige vers la page d'Accueil
        echo '<script language="javascript">';
        echo 'alert("Le produit à bien été ajouté.");';
        echo 'window.location.href="/MVC";';
        echo '</script>';
      }catch(Exception $e){
        echo "Erreur d'ajout !";
        die('Erreur : ' .$e->getMessage());
      }
    }

    public function getOut(){
      $stmt = $this->_connexion->prepare("SELECT * FROM produit WHERE Quantite = 0");
      $stmt->execute();
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function setStock(){
      $Q = $_POST['ProdQuantity'];
      $id = $_POST['Prodid'];
      $stmt = $this->_connexion->prepare("UPDATE `produit` SET `Quantite`=$Q WHERE idProduit =$id ");
      $stmt->execute();
    }
  }

 ?>
