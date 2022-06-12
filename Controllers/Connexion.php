<?php
  class Connexion extends Controller{
    public function index(){
      $this->loadModel("Connection");
      $connexion = $this->Connection->getNothing();
      $this->render('connexion');
    }

    public function setConnect(){
      $this->loadModel("Connection");
      $getUser = $this->Connection->getUser();
    }

    public function setCompte(){
      $this->loadModel("Connection");
      $setUser = $this->Connection->setUtilisateur();
    }
  }
 ?>
