<?php
  abstract class Model{
    //Informations de notre BDD
    private $host = "localhost";
    private $db_name = "projetmeccano";
    private $username = "root";
    private $password = "1808";
    //Propriété contenant la connexion
    protected $_connexion;

    public $table;
    public $id;

    public function getConnection(){
      $this->_connexion = null;
      try{
        $this->_connexion = new PDO('mysql:host='.$this->host.'; dbname='.$this->db_name,
        $this->username, $this->password);
        $this->_connexion->exec('set names utf8');
      }catch(PDOException $exception){
        echo 'Erreur : '.$exception->getMessage();
      }
    }

    public function getAll(){
      $sql = "SELECT * FROM ".$this->table;
      $query = $this->_connexion->prepare($sql);
      $query->execute();
      return $query->fetchAll();
    }

    public function getData(){
      $sql = "SELECT * FROM ".$this->table." WHERE id=".$this->id;
      $query = $this->_connexion->prepare($sql);
      $query->execute();
      return $query->fetch();
    }

    public function getNothing(){
      return 0;
    }
  }
 ?>
