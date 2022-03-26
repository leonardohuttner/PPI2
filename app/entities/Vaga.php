<?php
    require_once('Conexao.php');
class Vaga
{
    private $id;
    private $titulo;
    private $descricao;
    private $tipo;
    private $empresa;

    public function __construct($titulo = null, $descricao = null, $tipo = null, $empresa = null)
    {
        if($titulo != null) $this->titulo = $titulo;  
        if($descricao != null) $this->descricao = $descricao;
        if($tipo != null) $this->tipo = $tipo;
        if($empresa != null) $this->empresa = $empresa; 
        $this->database = Conexao::getInstancia();
    }

	public function getId(){
		return $this->id;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getDescricao(){
		return $this->descricao;
	}

    public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getEmpresa(){
		return $this->empresa;
	}

	public function setEmpresa($empresa){
		$this->empresa = $empresa;
	}

    public function listar($limite = null)
    {
        $conexao = $this->database->getConexao();
        $sql = 'SELECT * FROM vaga';
        if ($limite != null) $sql = $sql . ' LIMIT ' . $limite;
        $consulta = $conexao->query($sql);
        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Vaga'); //array de objetos do tipo Post
    }

    public function selecionar($id)
    {
        $sql = 'SELECT * FROM vaga WHERE id = ?';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1, $id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchObject('Vaga');
    }

    public function excluir()
    {
        if ($this->id == null) return false;
        $sql = 'DELETE FROM vaga WHERE id = ?';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1, $this->id, PDO::PARAM_INT);
        $resultado = $consulta->execute();
        if (!$resultado) {
            var_dump($consulta->errorInfo());
            return false;
        }

        return true;
    }

    public function atualizar()
    {
        $sql = 'UPDATE vaga SET titulo = ?, 
                descricao = ?, tipo = ?, empresa = ? WHERE id = ?';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1, $this->titulo, PDO::PARAM_STR);
        $consulta->bindValue(2, $this->descricao, PDO::PARAM_STR);
        $consulta->bindValue(3, $this->tipo, PDO::PARAM_STR);
        $consulta->bindValue(4, $this->empresa, PDO::PARAM_STR);
        $consulta->bindValue(5, $this->id, PDO::PARAM_INT);
        $resultado = $consulta->execute();
        if (!$resultado) {
            var_dump($consulta->errorInfo());
            return false;
        }

        return true;
    }

    public function novo()
    {
        $sql = 'INSERT INTO vaga(titulo, descricao, tipo, empresa) VALUES (?, ?, ?, ?)';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1, $this->titulo, PDO::PARAM_STR);
        $consulta->bindValue(2, $this->empresa, PDO::PARAM_STR);
        $consulta->bindValue(3, $this->tipo, PDO::PARAM_STR);
        $consulta->bindValue(4, $this->descricao, PDO::PARAM_STR);
        $resultado = $consulta->execute();
        if (!$resultado) {
            var_dump($consulta->errorInfo());
            return false;
        }
        return true;
    }
}
