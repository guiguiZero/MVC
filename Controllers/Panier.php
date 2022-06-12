<?php
  class Panier extends Controller{
    public function index(){
      session_start();
      if(isset($_SESSION['idUser'])){
        $this->loadModel("Basket");
        $panierC = $this->Basket->getPanier($_SESSION['idUser']);
        $recap = $this->Basket->setRecap($_SESSION['idUser']);
        $Total = $this->Basket->getTotal($_SESSION['idUser']);
        if(!$recap && !$panierC){
          $this->render('panier');
        }else{
          $this->newRender('panier', ['produits'=>$panierC], ['recapitu'=>$recap], $Total);
        }
      }else{
        echo '<script language="javascript">';
        echo 'alert("Veuillez vous connecter, ou si vous ne possedez pas de compte veuillez en créez un.");';
        echo 'window.location.href="/MVC/";';
        echo '</script>';
      }
    }

    public function setPanier(){
      $this->loadModel("Basket");
      $panier = $this->Basket->setPage();
      $this->index();
    }

    public function delete(){
      $this->loadModel("Basket");
      $panier = $this->Basket->delete();
    }

    public function newRender(string $fichier, array $data = [], array $infos = [], string $price){
      extract($data);
      extract($infos);
      require_once(ROOT.'Views/'.$fichier.'.php');
    }
  }
 ?>
