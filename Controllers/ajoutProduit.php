<?php
  class ajoutProduit extends Controller{
    public function add(){
      $this->loadModel("addProduct");
      $setProduct = $this->addProduct->getCategorie();
      $this->setPage('ajoutproduit', $setProduct);
    }
    public function setPage(string $fichier, array $data = []){
      require_once(ROOT.'Views/'.$fichier.'.php');
    }
    public function addProduct(){
      $this->loadModel("addProduct");
      $ProdName=$_POST['productName'];
      if(isset($_FILES['img']) && !empty($_FILES['img']) && $_FILES['img']['error'] == 0){
        try {
          $img = $this->upload_image($_FILES['img'], $ProdName, "/MVC/imagesProduit/");
        } catch (Exception $e) {
          echo "erreur!";
        }
      }else{
        $img="null";
      }
      $add = $this->addProduct->addProduit($img);
    }

    public function readd(){
      $this->loadModel("addProduct");
      $out = $this->addProduct->getOut();
      $this->setPage('restock', $out);
    }

    public function restock(){
      $this->loadModel("addProduct");
      $setStock = $this->addProduct->setStock();
      $this->readd();
    }
  }
 ?>
