<?php
  class Tutoriels extends Controller{
    public function setList(){
      $this->loadModel("TutoList");
      $setTuto = $this->TutoList->getTuto();
      $this->setPage('tutorial', $setTuto);
    }

    public function setPage(string $fichier, array $datas = []){
      require_once(ROOT.'Views/'.$fichier.'.php');
    }
  }
 ?>
