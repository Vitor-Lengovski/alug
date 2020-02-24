<?php
include_once '/var/www/html/site/class/conta.php';

class Casa {

    private $idCasa;
    private $morador;
    private $moradores;
    private $numero;
    private $localizacao;
    private $aluguel;

    private $conn;
    private $stmt;

    /////////////////GETS/////////////////
    public function setIdCasa($valor) {
        $this->idCasa = $valor;
    }
    public function setAll($morador, $moradores, $numero, $localizacao, $aluguel) {
        $this->morador = $morador;
        $this->moradores = $moradores;
        $this->numero = $numero;
        $this->localizacao = $localizacao;
        $this->aluguel = $aluguel;
    }

    /////////////////GETS/////////////////
    public function getIdCasa() {
        return $this->idCasa;
    }
    public function getMorador() {
        return $this->morador;
    }
    public function getMoradores() {
        return $this->moradores;
    }
    public function getNumero() {
        return $this->numero;
    }
    public function getLocalizacao() {
        return $this->localizacao;
    }
    public function getAluguel() {
        return $this->aluguel;
    }
   
    public function __construct() {
        try {
            
            $this->conn = new PDO("mysql:host=localhost; dbname=alugueis", "root", "admin123");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->conn->exec("set names utf8");

        }catch (PDOException $erro) {
            die ("Erro na conexão: " .$erro->getMessage());            
        }
    }


    public function adicionarCasa(){
        try{
            $sql = " INSERT INTO casa (morador, moradores, numero, localizacao, aluguel) " .
                    "VALUES (:morador, :moradores, :numero, :localizacao, :aluguel)";
            
            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':morador', $this->morador, PDO::PARAM_STR);
            $this->stmt->bindValue(':moradores', $this->moradores, PDO::PARAM_INT);
            $this->stmt->bindValue(':numero', $this->numero, PDO::PARAM_INT);
            $this->stmt->bindValue(':localizacao', $this->localizacao, PDO::PARAM_STR);
            $this->stmt->bindValue(':aluguel', $this->aluguel, PDO::PARAM_INT);

            if($this->stmt->execute())
                return true;

        }catch(PDOException $e) {
            echo $e->getMessage();  
        }
            return false;
    }
          
    public function listar(){
        try{
            $this->stmt= $this->conn->prepare("SELECT * FROM casa");
        
            if($this->stmt->execute()){
                $casas = $this->stmt->fetchAll();  
            }            
        }catch(PDOException $e) {
            echo $e->getMessage();  
        }
        return $casas;
    } 

    public function buscarDados(){
        $dados = null;
        try{
            $sql = "SELECT casa.idCasa,casa.morador,casa.numero,conta.valor,conta.stats,conta.vencimento, conta.idConta FROM casa inner join conta WHERE casa.idCasa = conta.idCasa
            ";

            $this->stmt= $this->conn->prepare($sql);            
            if($this->stmt->execute()){
                $dados = $this->stmt->fetchAll();  
            }        
        }catch(PDOException $e) {
            echo $e->getMessage();  
        }
            return $dados;
                
    }
    public function alterar(){
        try{
            $sql = "UPDATE casa
                    SET morador = :morador, moradores = :moradores, numero = :numero, localizacao = :localizacao, aluguel = :aluguel
                    WHERE idCasa = :idCasa";

            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':morador', $this->morador, PDO::PARAM_STR);
            $this->stmt->bindValue(':moradores', $this->moradores, PDO::PARAM_INT);
            $this->stmt->bindValue(':numero', $this->numero, PDO::PARAM_INT);
            $this->stmt->bindValue(':localizacao', $this->localizacao, PDO::PARAM_STR);
            $this->stmt->bindValue(':aluguel', $this->aluguel, PDO::PARAM_INT);
            $this->stmt->bindValue(':idCasa', $this->idCasa, PDO::PARAM_INT);

            
            if(!$this->stmt->execute()){
                return false;
            }        
        }catch(PDOException $e) {
            echo $e->getMessage();  
        }
            return true;
                
    }


}
?>