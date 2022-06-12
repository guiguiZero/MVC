<?php
  abstract class Controller{
     public function loadModel(string $model){
       require_once(ROOT.'Models/'.$model.'.php');
       $this->$model = new $model();
     }
     public function render(string $fichier, array $data = []){
       require_once(ROOT.'Views/'.$fichier.'.php');
     }
     function upload_image($file, $nom){
       $path = $_FILES['img']['name'];
       $ext = pathinfo($path, PATHINFO_EXTENSION);
       if(isset($_FILES['img'])){
         $tmpName = $_FILES['img']['tmp_name'];
         $name = $_FILES['img']['name'];
         $size = $_FILES['img']['size'];
         $error = $_FILES['img']['error'];
         $nom = str_replace(' ', '_', $nom);
         move_uploaded_file($tmpName, ROOT.'imagesProduit/'.$nom.'.'.$ext);
       }
       return '/MVC/imagesProduit/'.$nom.'.'.$ext;
     }
  }

 ?>
