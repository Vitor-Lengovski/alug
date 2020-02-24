<?php
class Conta {

    private $idConta;
    private $valor;
    private $idCasa;
    private $stats;
    private $vencimento;
    private $pago;


    private $conn;
    private $stmt;

    /////////////////SETS/////////////////
    public function setIdCasa($valor) {
        $this->idCasa = $valor;
    }
    public function setStats($valor) {
        $this->stats = $valor;
    }

    public function setAll($valor, $idCasa, $stats, $vencimento) {
        $this->valor = $valor;
        $this->idCasa = $idCasa;
        $this->stats = $stats;
        $this->vencimento = $vencimento;
        $this->pago = $pago;

    }

    /////////////////GETS/////////////////
    public function getIdConta() {
        return $this->idConta;
    }
    public function getvalor() {
        return $this->valor;
    }
    public function getIdCasa() {
        return $this->idCasa;
    }
    public function getstats() {
        return $this->stats;
    }
    public function getvencimento() {
        return $this->vencimento;
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


    public function adicionarConta(){
        $retorno = false;
        try{
            $sql = " INSERT INTO conta (valor, idCasa, stats, vencimento) " .
                    "VALUES (:valor, :idCasa, :stats, :vencimento )";
            
            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':valor', $this->valor, PDO::PARAM_STR);
            $this->stmt->bindValue(':idCasa', $this->idCasa, PDO::PARAM_INT);
            $this->stmt->bindValue(':stats', $this->stats, PDO::PARAM_STR);
            $this->stmt->bindValue(':vencimento', $this->vencimento, PDO::PARAM_STR);

            if($this->stmt->execute()){
                $retorno = true;
            }        
        }catch(PDOException $e) {
            echo $e->getMessage();  
        }
            return $retorno;
    }
          
    public function listar(){
        $casas = array();
        try{
            $this->stmt= $this->conn->prepare("SELECT * FROM casa");
        
            if($this->stmt->execute()){
                $casas = $this->stmt->fetchAll(PDO::FETCH_CLASS,"Casa");  
            }            
        }catch(PDOException $e) {
            echo $e->getMessage();  
        }
        return $casas;
    } 

    public function buscarDados(){
        $dados = null;
        try{
            $sql = " SELECT * FROM casa  WHERE idCasa = :idCasa";

            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':idCasa', $this->idCasa, PDO::PARAM_INT);
            
            if($this->stmt->execute()){
                $insetos = $this->stmt->fetchAll();  
                $dados = $insetos[0];
            }        
        }catch(PDOException $e) {
            echo $e->getMessage();  
        }
            return $dados;
                
    }
    public function pagar(){
        $retorno = false;
        try{
            $sql = "UPDATE conta
                    SET stats = :stats 
                    WHERE idCasa = :idCasa";

            $this->stmt= $this->conn->prepare($sql);

            $this->stmt->bindValue(':stats', $this->stats, PDO::PARAM_STR);
            $this->stmt->bindValue(':idCasa', $this->idCasa, PDO::PARAM_INT);
            
            if($this->stmt->execute()){
                $retorno = true;
            }        
        }catch(PDOException $e) {
            echo $e->getMessage();  
        }
            return $retorno;
                
    }


}
?>