<?php
  class SetPromotion extends Controller{
    public function index(){
      $this->loadModel("Promotion");
      $promo = $this->Promotion->getProduit();
      $getP = $this->Promotion->getPromo();
      $this->setP("promotion", $promo, $getP);
    }

    public function delete(){
      $this->loadModel("Promotion");
      $del = $this->Promotion->deletePromo();
    }

    public function ajouter(){
      $this->loadModel("Promotion");
      $add = $this->Promotion->addPromo();
    }

    public function setP(string $fichier, array $datas = [], array $p = []){
      require_once(ROOT.'Views/'.$fichier.'.php');
    }
  }
 ?>
