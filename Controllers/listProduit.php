<?php
  class listProduit extends Controller{
    public function setList(){
      $this->loadModel("ProductList");
      $setProduit = $this->ProductList->getProduit();
      $this->setPage('liteproduits', $setProduit);
    }

    public function setPage(string $fichier, array $datas = []){
      require_once(ROOT.'Views/'.$fichier.'.php');
    }
  }
 ?>
