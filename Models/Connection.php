<?php
  class Connection extends Model{
    public function __construct(){
      $this->table = "utilisateur";
      $this->getConnection();
    }

    public function getUser(){
      session_start();
        $ident = htmlspecialchars($_POST['identifiant']);
        $pswd = htmlspecialchars($_POST['pswd']);
        if($ident != "" && $pswd != ""){
          $hpswd = hash("sha256", $pswd);
          $stmt = $this->_connexion->prepare("SELECT * FROM utilisateur WHERE Mail= :email AND MotDePasse= :MDP LIMIT 1");
          $stmt->execute(array(
            'email'=>$ident,
            'MDP'=>$hpswd
          ));
          $count = $stmt->rowCount();
          echo $count;
          if($count == 1){
              $data = $stmt->fetch(PDO::FETCH_ASSOC);
              $_SESSION['idUser'] = $data['idUser'];
              $_SESSION['identitee'] = $data['UserName'];
              $_SESSION['mdp'] = $data['MotDePasse'];
              $_SESSION['Mail'] = $data['Mail'];
              $_SESSION['Admin'] = $data['isAdmin'];
              //On redirige vers la page d'accueil
              header('location: /MVC/accueil');
              }else{
                echo '<script language="javascript">';
                echo 'alert("Vos Identifiants sont incorrects.");';
                echo 'window.location.href="/MVC/connexion";';
                echo '</script>';
              }
        }
    }
    public function setUtilisateur(){
      $Nom = $_POST['Nom'];
      $Prenom = $_POST['Prenom'];
      $MDP = $_POST['MDP'];
      $HMDP = hash("sha256", $MDP);
      $Mail = $_POST['Mail'];
      try{
        $command = $this->_connexion->prepare('INSERT INTO utilisateur (idUser, UserName, MotDePasse, Mail, Image, isAdmin) VALUES (DEFAULT, :userName, :userPass, :email, NULL,  DEFAULT)');
        $command->execute($arrayName=array(
          'userName'=>htmlspecialchars($Nom ." ". $Prenom),
          'userPass'=>htmlspecialchars($HMDP),
          'email'=>htmlspecialchars($Mail)
        ));
        echo '<script language="javascript">';
        echo 'alert("Votre compte à bien été créé.");';
        echo 'window.location.href="/MVC/connexion";';
        echo '</script>';
      }catch(Exception $e){
        echo "Erreur lors de l'inscription";
        die('Erreur : ' .$e->getMessage());echo '<script language="javascript">';
      }
    }
  }
 ?>
