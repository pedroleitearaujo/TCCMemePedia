<?php 
//CRIANDO A CLASSE DE CONEXAO
Class Conexao{
	//ATRIBUTO PRIVADOS
	private $servidor;
	private $login;
	private $senha;
	private $banco;
	private static $pdo;
	//CONSTRUTOR
	public function __construct($servidor, $login, $senha, $banco){
		$this->servidor=$servidor;
		$this->login=$login;
		$this->senha=$senha;
		$this->banco=$banco;
	}
	//METODO PARA CONECTAR
	public function conectar(){
		try{
			if(is_null(self::$pdo)){
				self::$pdo=new PDO("mysql:host=".$this->servidor
								  .";dbname=".$this->banco
								  ,$this->login
								  ,$this->senha);
			}
			return self::$pdo;
		}
		catch(PDOException $ex){

		}
	}

}
?>