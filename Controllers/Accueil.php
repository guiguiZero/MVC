<?php
  class Accueil extends Controller{
    public function index(){
      $this->loadModel("AccueilP");
      $Promo = $this->AccueilP->getPromo();
      $rand = $this->AccueilP->getRandom();
      $this->setPage('accueil',$Promo, $rand);
    }

    public function setPage(string $fichier, array $data = [], array $rand = []){
      require_once(ROOT.'Views/'.$fichier.'.php');
    }
  }
 ?>
