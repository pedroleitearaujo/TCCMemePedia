<?php 
//BUSCANDO AS CLASSES
include_once'Conexao.php';
include_once'Funcoes.php';
//CRIANDO A CLASSE
Class Usuario {
    //ATRIBUTOS
	private $conexao;
	private $funcao;
	private $idUsu;
	private $nome;
	private $email;
	private $senha;
	private $usuario;
	private $data;
    private $palavra_Secreta;
    private $pergunta_Secreta;
    private $comentario;
    private $idMeme;
    private $titulo;
    private $artigo;
    //CONSTRUTOR
	public function __construct(){
		$this->conexao = new Conexao('localhost','root ','','test');
		$this->funcao = new Funcoes();
	}
    //METODOS MAGICO
	public function __set($atributo, $valor){
		$this ->$atributo = $valor;
	}
	public function __get($atributo){
		return $this->$atributo;
	}
    //METODOS
    public function loginUsuario($dado){     
            $this->email = $dado['email'];
            $this->senha = sha1($dado['senha']);
            try{
            $consulta = $this->conexao->conectar()->prepare("SELECT idUsu, email, senha FROM usuario where email = :email and senha = :senha;");
            $consulta->bindParam(":email", $this->email, PDO::PARAM_STR);
            $consulta->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $consulta->execute();
            if($consulta->rowCount()==0){
                header('location: acessar.php?login=error' );
            }else{
                session_start();
                $resultado= $consulta->fetch();
                $_SESSION['logado']="sim";
                $_SESSION['usu']=$resultado['idUsu'];
                header('location: /tccmemepedia');
            }
            
        }catch(PDOException $ex){
            return 'Erro '.$ex->getMessage();
        }
    }

    public function usuarioLogado($dado){
        $consulta = $this->conexao->conectar()->prepare("SELECT idUsu, nome, email, usuario, senha FROM usuario WHERE idUsu = :idUsu;");
        $consulta->bindParam(':idUsu', $dado, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch();
        $_SESSION['nome']    = $resultado['nome'];
        $_SESSION['email']   = $resultado['email'];
        $_SESSION['usuario'] = $resultado['usuario'];
        $_SESSION['senha']   = $resultado['senha'];
    }

	public function querySeleciona($dado){
		try{
			$this->idUsu = $dado;
			$consulta = $this->conexao->conectar()->prepare("SELECT idUsu, nome, email, usuario, data_cadastro FROM  usuario where idUsu = :idU;");
			$consulta->bindParam(":idU", $this->idUsu, PDO::PARAM_INT);
			$consulta->execute();
			return $consulta->fetch();
		}catch(PDOException $ex){
			return 'Erro '.$ex->getMessage();
		}
	}
    public function queryInsert($dado){
        try{
            $this->nome = $this->funcao->tratarCharacter($dado['nome'], 1);
            $this->email = $dado['email'];
            $this->senha = sha1($dado['senha']);
            $this->usuario =$dado['usuario'];
            $this->palavra_Secreta = $dado['palavra_Secreta'];
            $this->pergunta_Secreta = $dado['pergunta_Secreta'];
            $this->data = $this->funcao->dataAtual(2);
            $consulta = $this->conexao->conectar()->prepare("INSERT INTO usuario (nome, email, senha, usuario,palavra_Secreta, pergunta_Secreta, data_cadastro) VALUES (:nome, :email, :senha, :usuario,:palavra_Secreta, :pergunta_Secreta, :dataC);");
            $consulta->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindParam(":email", $this->email, PDO::PARAM_STR);
            $consulta->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $consulta->bindParam(":usuario", $this->usuario, PDO::PARAM_STR);
             $consulta->bindParam(":palavra_Secreta", $this->palavra_Secreta, PDO::PARAM_STR);
             $consulta->bindParam(":pergunta_Secreta", $this->pergunta_Secreta, PDO::PARAM_STR);
            $consulta->bindParam(":dataC", $this->data, PDO::PARAM_STR);
            if($consulta->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Erro '.$ex->getMessage();
        }
    }
    public function queryUpdate($dado){
        try{
            $this->idUsu = $this->funcao->base64($dado['usu'], 2);
            $this->nome = $this->funcao->tratarCharacter($dado['nome'], 1);
            $this->email = $dado['email'];
            $this->usuario =$dado['usuario'];
            $consulta = $this->conexao->conectar()->prepare("UPDATE usuario SET nome = :nome, email = :email, usuario = :usuario WHERE idUsu = :idU;");
            $consulta->bindParam(":idU", $this->idUsu, PDO::PARAM_INT);
            $consulta->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindParam(":email", $this->email, PDO::PARAM_STR);
            $consulta->bindParam(":usuario", $this->usuario, PDO::PARAM_STR);
            if($consulta->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    public function queryUpdateSenha($dado){
        try{
            $this->idUsu = $this->funcao->base64($dado['usu'], 2);
            $this->senha = sha1($dado['senhaNova']);
            $consulta = $this->conexao->conectar()->prepare("UPDATE usuario SET senha = :senha WHERE idUsu = :idU;");
            $consulta->bindParam(":idU", $this->idUsu, PDO::PARAM_INT);
            $consulta->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            if($consulta->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    public function queryDelete($dado){
        try{
           $this->idUsu = $this->funcao->base64($dado['usu'], 2);
            $consulta = $this->conexao->conectar()->prepare("DELETE FROM comentario WHERE idUsu = :idU;");
            $consulta->bindParam(":idU", $this->idUsu, PDO::PARAM_INT);
                if($consulta->execute()){
                $consulta = $this->conexao->conectar()->prepare("DELETE FROM usuario WHERE idUsu = :idU;");
                $consulta->bindParam(":idU", $this->idUsu, PDO::PARAM_INT);
                if($consulta->execute()){
                    $this->sairUsu();
                    return 'ok';
                }else{
                    return 'erro';
                }
            }
        } catch (PDOException $ex) {
            return 'error'.$ex->getMessage();
        }
    }

    public function sairUsu(){
        session_destroy();
        header ('location: /tccmemepedia');
    }
    public function buscaPalavra ($dado){
         try{
           $this->email = $dado;
            $consulta = $this->conexao->conectar()->prepare("SELECT email FROM usuario WHERE email = :email" );
            $consulta -> bindParam(":email", $this->email, PDO::PARAM_STR);
            $consulta->execute();
            if($consulta->rowCount()>0){
                $consulta = $this->conexao->conectar()->prepare("SELECT palavra_Secreta, pergunta_Secreta FROM usuario WHERE email = :email" );
                $consulta -> bindParam(":email", $this->email, PDO::PARAM_STR);
                $consulta->execute();
                return $consulta->fetch();
            }else{
                return 'error';
            }
         }catch(PDOException $ex){
            return 'Erro '.$ex->getMessage();
         }
    }
    public function buscaEmail ($dado){
         try{
           $this->email = $dado;
            $consulta = $this->conexao->conectar()->prepare("SELECT email FROM usuario WHERE email = :email" );
            $consulta -> bindParam(":email", $this->email, PDO::PARAM_STR);
            $consulta->execute();
            if($consulta->rowCount()>0){
                return 'ok';
            }else{
                return 'erro';
            }
        }catch(PDOException $ex){
            return 'Erro '.$ex->getMessage();
        }
    }
    public function UpdateSenha($dado){
        try{
            $this->email=$dado['email'];
            $this->senha=sha1($dado['senha']);   
            $consulta = $this->conexao->conectar()->prepare("UPDATE usuario SET senha = :senha WHERE email = :email;");
            $consulta->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $consulta->bindParam(":email", $this->email, PDO::PARAM_STR);
               if($consulta->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
       public function buscaSenha ($dado){
         try{
           $this->senha=sha1($dado['senha1']); 
            $consulta = $this->conexao->conectar()->prepare("SELECT senha FROM usuario WHERE senha = :senha" );
            $consulta -> bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $consulta->execute();
            if($consulta->rowCount()>0){
                return 'ok';
            }else{
                return 'erro';
            }
        }catch(PDOException $ex){
            return 'Erro '.$ex->getMessage();
        }
    }
         public function inserirArtigo($dado){
        try{
            $this->titulo =$dado['titulo'];
            $this->artigo = $dado['artigo'];
            $consulta = $this->conexao->conectar()->prepare("INSERT INTO artigos (titulo, artigo) VALUES (:titulo, :artigo);");
            $consulta->bindParam(":titulo", $this->titulo, PDO::PARAM_STR);
            $consulta->bindParam(":artigo", $this->artigo, PDO::PARAM_STR);
            if($consulta->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Erro '.$ex->getMessage();
        }
}
public function UpdateLogin($dado){
        try{
           $this->idUsu = $this->funcao->base64($dado['usu'], 2);
            $this->nome = $this->funcao->tratarCharacter($dado['nome'], 1);
            $this->email = $dado['email'];
            $this->usuario =$dado['usuario'];
            $consulta = $this->conexao->conectar()->prepare("UPDATE usuario SET nome = :nome, email = :email, usuario = :usuario WHERE idUsu = :idUsu;");
            $consulta->bindParam(":idUsu", $this->idUsu, PDO::PARAM_INT);
            $consulta->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindParam(":email", $this->email, PDO::PARAM_STR);
            $consulta->bindParam(":usuario", $this->usuario, PDO::PARAM_STR);
            if($consulta->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
}
}
?>