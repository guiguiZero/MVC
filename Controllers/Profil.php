<?php
  class Profil extends Controller{
    public function index(){
      $this->loadModel("Account");
      $data = $this->Account->getData();
      $this->setPage('profil', $data);
    }

    public function setPage(string $fichier, array $datas = []){
      require_once(ROOT.'Views/'.$fichier.'.php');
    }
  }


 ?>
