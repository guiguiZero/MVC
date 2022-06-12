<?php
  class Research extends Controller{
    public function makeResearch(){
      $this->loadModel("Recherche");
      $setProduit = $this->Recherche->getProduit();
      $this->setPage('recherche', $setProduit);
    }
    public function setPage(string $fichier, array $datas = []){
      require_once(ROOT.'Views/'.$fichier.'.php');
    }
  }
 ?>
