<?php
  class Basket extends Model{
    public function __construct(){
      $this->table = "";
      $this->getConnection();
    }

    public function checkStock(){
      $idProd = $_POST['Prodid'];
      $sql = $this->_connexion->prepare("SELECT Quantite FROM `produit` WHERE idProduit =? " );
      $sql->execute([$idProd]);
      $row = $sql->fetch(PDO::FETCH_ASSOC);
      if($row['Quantite'] < $_POST['ProdQuantity']){
        echo '<script language="javascript">';
        echo 'alert("Nous ne possèdons pas le stock suffisant pour cet article");';
        echo 'window.location.href="/MVC/";';
        echo '</script>';
      }else{
        return $row['Quantite'];
      }
    }
    public function setPage(){
      if($_POST['Userid'] == ""){
        echo '<script language="javascript">';
        echo 'alert("Veuillez vous connecter, ou si vous ne possedez pas de compte veuillez en créez un.");';
        echo 'window.location.href="/MVC/";';
        echo '</script>';
      }else{
        $sql = $this->_connexion->prepare("SELECT * FROM panier WHERE idUser =? AND Valider = 0 ");
        $sql->execute([$_POST['Userid']]);
        $count = $sql->rowCount();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        if($this->checkStock() != 0){
          if($count == 0){
            $this->createPanier();
          }else{
            $this->addProducttoPanier();
          }
        }
      }
    }
    //Partie ajout d'un produit dans un panier déjà existant
    function addProducttoPanier(){
      $idUSER = $_POST['Userid'];
      $idPROD = $_POST['Prodid'];
      $Quantity = $_POST['ProdQuantity'];
      $id = $this->getIDPanier($idUSER);
      try{
        $sql = $this->_connexion->prepare('INSERT INTO contenu (idPanier, idProduit, Quantite, Prix) VALUES (:idPanier, :idProduit, :Quantite, :Prix)');
        $sql->execute($arrayName=array(
          'idPanier'=>$id,
          'idProduit'=>$idPROD,
          'Quantite'=>$Quantity,
          'Prix'=>$this->prixT($Quantity, $idPROD)
        ));
        $this->setPriceTotal($id);
        //header('location: /MVC/');
      }catch(Exception $e){
        echo "Erreur d'ajout !";
        die('Erreur : ' .$e->getMessage());
      }
    }
    //Partie de création de panier si aucun n'est détecter
    function createPanier(){
      $idUSER = $_POST['Userid'];
      try{
        $command = $this->_connexion->prepare('INSERT INTO panier (idPanier, PrixTotal, Valider, idUser) VALUES (DEFAULT, DEFAULT, DEFAULT, :idUtils)');
        $command->execute($arrayName=array(
          'idUtils'=>$idUSER
        ));
        $lastID = $this->_connexion->lastInsertId();
        $this->addProduct($lastID);
      }catch(Exception $e){
        echo "Erreur d'ajout !";
        die('Erreur : ' .$e->getMessage());
      }
    }
    //Ajout d'un article dans un panier
    function addProduct($id){
      $idPROD = $_POST['Prodid'];
      $Quantity = $_POST['ProdQuantity'];
      try{
        $sql = $this->_connexion->prepare('INSERT INTO contenu (idPanier, idProduit, Quantite, Prix) VALUES (:idPanier, :idProduit, :Quantite, :Prix)');
        $sql->execute($arrayName=array(
          'idPanier'=>$id,
          'idProduit'=>$idPROD,
          'Quantite'=>$Quantity,
          'Prix'=>$this->prixT($Quantity, $idPROD)
        ));
        $this->setPriceTotal($id);
        header('location: /MVC/');
      }catch(Exception $e){
        echo "Erreur d'ajout !";
        die('Erreur : ' .$e->getMessage());
      }
    }
    //On met à jour le total du panier
    function setPriceTotal($id){
      try{
        $command = $this->_connexion->prepare('UPDATE `panier` SET `PrixTotal`= (SELECT sum(Prix) as pTot FROM contenu WHERE idPanier = :id) WHERE idPanier = :id ');
        $command->execute($arrayName=array(
          'id'=>$id
        ));
      }catch(Exception $e){
        echo "Erreur d'ajout !";
        die('Erreur : ' .$e->getMessage());
      }
    }
    //On calcul le prix total de notre Panier
    function prixT($Quantity, $idProd){
      $price = $this->getPrice($idProd);
      $T=($Quantity*$price);
      return $T;
    }
    //On récupre le prix unitaire d'un produit
    function getPrice($idProd){
      $sql = $this->_connexion->prepare("SELECT Price FROM `produit` WHERE idProduit =? " );
      $sql->execute([$idProd]);
      $row = $sql->fetch(PDO::FETCH_ASSOC);
      return $row['Price'];
    }
    //On récupère l'id du panier de l'utilisateur
    function getIDPanier($idUSER){
      $sql = $this->_connexion->prepare("SELECT idPanier FROM `panier` WHERE idUser =?" );
      $sql->execute([$idUSER]);
      $row = $sql->fetch(PDO::FETCH_ASSOC);
      return $row['idPanier'];
    }
    public function getPanier($idUser){
      $sql = $this->_connexion->prepare("SELECT * FROM `panier` JOIN `contenu` USING(`idPanier`) JOIN `produit` USING(`idproduit`) WHERE panier.idUser =".$idUser." AND valider = 0");
      $sql->execute();
      $row = $sql->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }
    public function setRecap($idUser){
      $sql = $this->_connexion->prepare('SELECT contenu.Quantite, Prix, ProdName FROM panier JOIN contenu USING(idPanier) JOIN produit USING(idProduit) WHERE idUser ='.$idUser.' AND valider = 0');
      $sql->execute();
      $row = $sql->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }
    public function getTotal($idUser){
      $sql = $this->_connexion->prepare('SELECT PrixTotal FROM panier WHERE idUser ='.$idUser.' AND valider = 0 ');
      $sql->execute();
      $res = $sql->fetch(PDO::FETCH_ASSOC);
      return $res['PrixTotal'];
    }

    public function delete(){
      $idPanier = $_POST['idPanier'];
      $idUser = $_POST['idUSER'];
      $idProduit = $_POST['idProduit'];
      $sql = $this->_connexion->prepare("DELETE FROM `contenu` WHERE idPanier =".$idPanier." AND idProduit =".$idProduit);
      $sql->execute();
      $this->setPriceTotal($idPanier);
      header('location: /MVC/panier/index');
      exit;
    }
  }
 ?>
