<?php
  class Commande extends Controller{
    public function setCommande(){
      session_start();
      $this->loadModel("Basket");
      $recap = $this->Basket->getTotal($_SESSION['idUser']);
      if(empty($recap)){
        echo '<script language="javascript">';
        echo 'window.location.href="/MVC/accueil";';
        echo '</script>';
      }else{
        $this->newRender('commande', $recap);
      }
    }

    public function valider(){
      session_start();
      $this->loadModel("Command");
      if(isset($_POST['saving'])){
        echo "Check";
        $this->Command->save($_SESSION['idUser'], $_POST['cbCode'], $_POST['crypto']);
      }
      $update = $this->Command->update($_SESSION['idUser']);
    }

    public function setFacture(){
      require(ROOT.'Controllers/PDF.php');
      $num = $this->getNumPanier();
      $facture = new PDF();
      $facture->AliasNbPages();
      $facture->AddPage();
      $facture->Chapitre($num);
      $facture->Output();
      $this->terminePanier();
    }

    public function getDatas(){
      $this->loadModel("Command");
      $datas = $this->Command->getDatas();
      return $datas;
    }

    public function getNumPanier(){
      $this->loadModel("Command");
      $datas = $this->Command->getNumPanier();
      return $datas;
    }

    public function terminePanier(){
      session_start();
      $this->loadModel("Command");
      $panier = $this->Command->getCurrentPanier($_SESSION['idUser']);
      $this->Command->terminePanier($panier);
    }

    public function newRender(string $fichier, string $price){
      require_once(ROOT.'Views/'.$fichier.'.php');
    }
  }
 ?>
