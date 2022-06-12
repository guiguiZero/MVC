<?php
  //On génère une constante qui contindra le chemin vers index.php
  define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

  require_once(ROOT.'app/Model.php');
  require_once(ROOT.'app/Controller.php');
  //On sépare les paramètres
  $params = explode('/', $_GET['p']);
  //Est-ce qu'un paramètre existe
  if($params[0] != ""){
    $controller = ucfirst($params[0]);
    echo $controller;
    $action = isset($params[1]) ? $params[1] : 'index';
    require_once(ROOT.'Controllers/'.$controller.'.php');
    $controller = new $controller();
    if(method_exists($controller, $action)){
      $controller->$action();
    }else{
      http_response_code(404);
      echo 'La page n\'existe pas';
    }
  }else{
    header('location: /MVC/accueil');
  }
 ?>
