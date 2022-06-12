<?php
  class Promotion extends Model{
    public function __construct(){
      $this->table = "";
      $this->getConnection();
    }

    public function getProduit(){
      $stmt = $this->_connexion->prepare("SELECT idProduit, ProdName, Price, imgProduit, Description FROM `produit` WHERE idProduit NOT IN (SELECT `promotions`.idProduit FROM promotions)");
      $stmt->execute();
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function getPromo(){
      $stmt = $this->_connexion->prepare("SELECT `produit`.idProduit, ProdName, Price, imgProduit, Description, Reduction FROM `produit` JOIN `promotions` ON `produit`.idProduit = `promotions`.idProduit");
      $stmt->execute();
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function deletePromo(){
      $_idProduit = $_POST['idProduit'];
      $sql = $this->_connexion->prepare("DELETE FROM `Promotions` WHERE idProduit =".$_idProduit);
      $this->setOldPrice($_idProduit);
      $sql->execute();
      header('location: /MVC/SetPromotion/index');
      exit;
    }

    public function addPromo(){
      $_idProduit = $_POST['idProduit'];
      $Promo = $_POST['ProdProm'];
      $oldPrice = $this->getPrice($_idProduit);
      try{
        $ssql = $this->_connexion->prepare("INSERT INTO Promotions (idProduit, Reduction, OldPrice) VALUES (:idProd, :Prom, :OPrice)");
        $ssql->execute($arrayName=array(
          'idProd'=>$_idProduit,
          'Prom'=>$Promo,
          'OPrice'=>$oldPrice
        ));
        $this->updateProduct($_idProduit, $Promo);
        echo '<script language="javascript">';
        echo 'alert("La Promotion à été ajoutée.");';
        echo 'window.location.href="/MVC/SetPromotion/index";';
        echo '</script>';
      }catch(Exception $e){
        echo "Erreur lors de l'inscription";
        die('Erreur : ' .$e->getMessage());echo '<script language="javascript">';
      }
    }

    function getPrice($idProd){
      $sql = $this->_connexion->prepare("SELECT Price FROM `produit` WHERE idProduit =? " );
      $sql->execute([$idProd]);
      $row = $sql->fetch(PDO::FETCH_ASSOC);
      return $row['Price'];
    }

    function updateProduct($idProd, $Promo){
      $sql = $this->_connexion->prepare("SELECT Price FROM produit WHERE idProduit =".$idProd);
      $sql->execute();
      $old = $sql->fetch(PDO::FETCH_ASSOC);
      $newPrice= $old['Price']-($old['Price']*($Promo/100));
      try{
        $command = $this->_connexion->prepare("UPDATE produit SET Price = :np WHERE idProduit = :idP");
        $command->execute($arrayName=array(
          'np'=>$newPrice,
          'idP'=>$idProd
        ));
      }catch(Exception $e){
        echo "Erreur d'ajout !";
        die('Erreur : ' .$e->getMessage());
      }
    }

    function setOldPrice($idPro){
      $sql = $this->_connexion->prepare("SELECT OldPrice FROM promotions WHERE idProduit =".$idPro);
      $sql->execute();
      $old = $sql->fetch(PDO::FETCH_ASSOC);
      try{
        $command = $this->_connexion->prepare("UPDATE produit SET Price = :np WHERE idProduit = :idP");
        $command->execute($arrayName=array(
          'np'=>$old['OldPrice'],
          'idP'=>$idPro
        ));
      }catch(Exception $e){
        echo "Erreur d'ajout !";
        die('Erreur : ' .$e->getMessage());
      }
    }
  }
 ?>
