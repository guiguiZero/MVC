<?php
class Command extends Model{
  public function __construct(){
    $this->table = "";
    $this->getConnection();
  }

  public function update($idUser){
    $idPanier = $this->getCurrentPanier($idUser);
    $contenuBase = $this->getContenuBase($idPanier);
    foreach ($contenuBase as $key) {
      $rest = ($key['pQuantite'] - $key['cQuantite']);
      $this->updateQuantite($key['idProduit'], $rest);
    }
    echo '<script language="javascript">';
    echo 'alert("Génération de la facture.");';
    echo 'window.location.href="/MVC/commande/setFacture";';
    echo '</script>';
  }

  public function getCurrentPanier($idUser){
    $sql = $this->_connexion->prepare("SELECT idPanier FROM `panier` WHERE idUser =? AND Valider = 0" );
    $sql->execute([$idUser]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    return $row['idPanier'];
  }

  public function getContenuBase($idPanier){
    $sql = $this->_connexion->prepare("SELECT idPanier, idProduit, ProdName, produit.Quantite AS pQuantite, contenu.Quantite AS cQuantite FROM `panier` JOIN `contenu` USING(`idPanier`) JOIN `produit` USING(`idproduit`)
    WHERE panier.idPanier =".$idPanier." AND valider = 0");
    $sql->execute();
    $row = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $row;
  }

  public function terminePanier($idPanier){
      $stmt = $this->_connexion->prepare("UPDATE `panier` SET Valider = 1 WHERE idPanier =$idPanier ");
      $stmt->execute();
  }

  public function updateQuantite($idProduit, $rest){
    $stmt = $this->_connexion->prepare("UPDATE `produit` SET `Quantite`=$rest WHERE idProduit =$idProduit ");
    $stmt->execute();
  }

  public function getDatas(){
    if(session_status() != PHP_SESSION_ACTIVE){
      session_start();
    }
    $sql = $this->_connexion->prepare("SELECT ProdName, `contenu`.Quantite, Price, Prix FROM panier JOIN contenu ON `panier`.idPanier = `contenu`.idPanier JOIN produit ON `contenu`.idProduit = `produit`.idProduit WHERE idUser =".$_SESSION['idUser']." AND Valider = 0");
    $sql->execute();
    $res = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }

  public function getNumPanier(){
    if(session_status() != PHP_SESSION_ACTIVE){
      session_start();
    }
    $sql = $this->_connexion->prepare("SELECT idPanier FROM panier WHERE idUser =".$_SESSION['idUser']." AND Valider = 0");
    $sql->execute();
    $res = $sql->fetch(PDO::FETCH_ASSOC);
    return $res['idPanier'];
  }

  public function save($idUser, $cb, $crypt){
    $chiffreCB = hash("sha256", $cb);
    $chiffreCry = hash("sha256", $crypt);
    echo "<br>".$chiffreCB;
    echo "<br>".$chiffreCry;
    try{
      $stmt = $this->_connexion->prepare("INSERT INTO carte_bancaire (idCard, numCarte, crypto, idUser) VALUES (DEFAULT, :nC, :CR, :idU)");
      $stmt->execute($arrayName=array(
        'nC'=>$chiffreCB,
        'CR'=>$chiffreCry,
        'idU'=>$idUser
      ));
    }catch(Exception $e){
      echo "Erreur lors de l'inscription";
      die('Erreur : ' .$e->getMessage());echo '<script language="javascript">';
    }
  }

}
 ?>
