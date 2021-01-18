<?php  
//BUSCANDO AS CLASSES
include_once'Conexao.php';
include_once'Funcoes.php';
include_once'Usuario.php';
//CRIANDO A CLASSE
Class Comentario{
	//ATRIBUTOS
	private $conexao;
	private $funcao;
	private $usuario;
	private $idUsu;
	private $data;
    private $comentario;
    private $idMeme;
	//CONSTRUTOR
	public function __construct(){
		$this->conexao = new Conexao('localhost','root ','','test');
		$this->funcao = new Funcoes();
		$this->usuario = new Usuario();
	}
	//METODOS MAGICO
	public function __set($atributo, $valor){
		$this ->$atributo = $valor;
	}
	public function __get($atributo){
		return $this->$atributo;
	}
	//METODOS
	public function queryInsertComentario($dado){
            try{
            $this->comentario = $dado['comentario'];
            $this->idUsu=$dado['usu'];
            $this->idMeme = $dado['idMeme'];
            $this->data = $this->funcao->dataAtual(2);
            $consulta = $this->conexao->conectar()->prepare("INSERT INTO comentario (comentario, idUsu, idMeme, data) VALUES (:comentario, :idUsu, :idMeme, :data);");
            $consulta->bindParam(":comentario", $this->comentario, PDO::PARAM_STR);
            $consulta->bindParam(":idUsu", $this->idUsu, PDO::PARAM_INT);
            $consulta->bindParam(":idMeme", $this->idMeme, PDO::PARAM_INT);
            $consulta->bindParam(":data", $this->data, PDO::PARAM_STR);
            if($consulta->execute()){
                return 'ok';
            }else{
                return 'erro';
            }            
        }catch(PDOException $ex){
            return 'Erro '.$ex->getMessage();
        }
    }
    public function querySelecionaComentario($dado){
        try{
            $this->idMeme = $dado;
            $consulta = $this->conexao->conectar()->prepare("SELECT idComentario, comentario, idUsu, data FROM comentario where idMeme = :idMeme;");
            $consulta->bindParam(":idMeme", $this->idMeme, PDO::PARAM_INT);
            if($consulta->execute()){
                $resultado=$consulta->fetchall();
                for ($i=0; $i<$consulta->rowCount(); $i++) {
                $resultado[$i]= ['idUsu' => $resultado[$i]['idUsu'], 'comentario' => $resultado[$i]['comentario'],'data' => $resultado[$i]['data'],'idComentario' => $resultado[$i]['idComentario']];
                }

                return $resultado;
            }
            else{
                return 'erro';
            }
        }catch(PDOException $ex){
            return 'Erro '.$ex->getMessage();
        }
    }

    public function mostrarComentario($comentario){
        foreach ($comentario as $key => $value) 
        {
        $idUsuario[$key]=$value['idUsu'];
        $dadosUsuario=$this->usuario->querySeleciona($idUsuario[$key]);
        $nome[$key]=$dadosUsuario['nome'];
        $coment[$key]=$value['comentario'];
        $dia[$key]=$value['data'];
        $comentiD[$key]=$value['idComentario'];
        } 
            for ($i=0;$i<count($comentario); $i++) {
            echo '<br><b>'.$nome[$i].'</b><br>';
                if(isset($_GET['alterar']) && $_GET['alterar']==$comentiD[$i]){
                ECHO '<input type="text" id="comentario2" name="comentario2" value="'.$_GET['comentario'].'">';
                }
                else{
                echo $coment[$i].'<br>';
                }
                if(!empty($_SESSION)){
                    if($idUsuario[$i]==$_SESSION['usu']){
                        if(!empty($_GET['alterar']) && $_GET['alterar']==$comentiD[$i]){
                        ECHO '<input type="submit" method="post" name="btnEnviar'.$comentiD[$i].'" role="button" value="Enviar Comentario">';
                        ECHO '<input type="submit" method="post" name="btnCancelar'.$comentiD[$i].'" role="button" value="Cancelar Comentario">';
                        }else{
                        ECHO '<input type="submit" method="post" name="btnExcluir'.$comentiD[$i].'" role="button" value="Excluir Comentario">';
                        ECHO '<input type="submit" method="post" name="btnAlterar'.$comentiD[$i].'" role="button" value="Alterar Comentario">';
                        }

                        if(isset($_POST['btnCancelar'.$comentiD[$i]])){
                            header('location: comentario.php');
                        }
                        if(isset($_POST['btnExcluir'.$comentiD[$i]])){
                            header('location: comentario.php?excluir='.$comentiD[$i]);
                        }
                        if(isset($_POST['btnAlterar'.$comentiD[$i]])){
                            header('location: comentario.php?alterar='.$comentiD[$i].'&comentario='.$coment[$i]);
                        }
                    }
                }   
            echo '<br>';
            $dia[$i]= new datetime($dia[$i]);
            $dataAtual = new datetime($this->funcao->dataAtual(2));
            $diferenca = $dataAtual->diff($dia[$i]);

            if($diferenca->format('%y')>'0'){
                if($diferenca->format('%y')>'1'){
                echo '<font size="2" color="gray">'.$diferenca->format('%y anos atrás').'</font>';
                }else{
                echo '<font size="2" color="gray">'.$diferenca->format('%y ano atrás').'</font>';
                }
            }
            elseif($diferenca->format('%m')>'0'){
                if($diferenca->format('%m')>'1'){
                echo '<font size="2" color="gray">'.$diferenca->format('%m meses atrás').'</font>';
                }else{
                echo '<font size="2" color="gray">'.$diferenca->format('%m mês atrás').'</font>';
                }
            }
            elseif($diferenca->format('%h')>'0'){
                if($diferenca->format('%h')>'1'){
                echo '<font size="2" color="gray">'.$diferenca->format('%h horas atrás').'</font>';
                }else{
                echo '<font size="2" color="gray">'.$diferenca->format('%h hora atrás').'</font>';
                }
            }
            elseif($diferenca->format('%i')>'0'){
                if($diferenca->format('%i')>'1'){
                echo '<font size="2" color="gray">'.$diferenca->format('%i minutos atrás').'</font>';
                }else{
                echo '<font size="2" color="gray">'.$diferenca->format('%i minuto atrás').'</font>';
                }
            }
            elseif($diferenca->format('%s')>'0'){
                if($diferenca->format('%s')>'1'){
                echo '<font size="2" color="gray">'.$diferenca->format('%s segundos atrás').'</font>';
                }else{
                echo '<font size="2" color="gray">'.$diferenca->format('%s segundo atrás').'</font>';
            }
        }
    }
}

    public function deleteComentario($comentario){
        try{
            $this->idComentario = $comentario;
            $consulta = $this->conexao->conectar()->prepare("DELETE FROM comentario WHERE idComentario = :idComent;");
            $consulta->bindParam(":idComent", $this->idComentario, PDO::PARAM_INT);
            if($consulta->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error'.$ex->getMessage();
        }
    }
    public function updateComentario($comentario){
        try{
            $this->idComentario = $comentario['idComentario'];
            $this->comentario = $comentario['comentario2'];
            $consulta = $this->conexao->conectar()->prepare("UPDATE comentario set comentario = :comentario WHERE idComentario = :idComent;");
            $consulta->bindParam(":comentario", $this->comentario, PDO::PARAM_STR);
            $consulta->bindParam(":idComent", $this->idComentario, PDO::PARAM_INT);
            if($consulta->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error'.$ex->getMessage();
        }
    }
}

?>