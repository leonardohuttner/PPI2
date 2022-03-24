<!-- "id": 2,
"nome": "Fulano",
"email": "Sincere@april.biz",
"phone": "1-770-736-8031 x56442",
"senha": "1234" -->
<?php
class Vaga
{
    private $id;
    private $nome;
    private $email;
    private $phone;
    private $senha;

    public function __construct($nome = null, $email = null, $phone = null, $senha = null)
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function selecionar($id)
    {
        $sql = 'SELECT * FROM usuario WHERE id = ?';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1, $id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchObject('Vaga');
    }

    public function login($usuario, $senha)
    {
        $sql = 'SELECT senha FROM usuario WHERE usuario = ?';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1, $usuario, PDO::PARAM_STR);
        $consulta->execute();
        $senha_banco = $consulta->fetchColumn();
        if ($senha == $senha_banco) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir()
    {
        if ($this->id == null) return false;
        $sql = 'DELETE FROM usuario WHERE id = ?';
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
        $sql = 'UPDATE usuario SET nome = ?, 
                email = ?, phone = ?, senha = ? WHERE id = ?';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1, $this->nome, PDO::PARAM_STR);
        $consulta->bindValue(2, $this->email, PDO::PARAM_STR);
        $consulta->bindValue(3, $this->phone, PDO::PARAM_STR);
        $consulta->bindValue(4, $this->senha, PDO::PARAM_STR);
        $consulta->bindValue(5, $this->id, PDO::PARAM_INT);
        $resultado = $consulta->execute();
        if (!$resultado) {
            var_dump($consulta->errorInfo());
            return false;
        }

        return true;
    }

    public function salvar()
    {
        $sql = 'INSERT INTO usuario(nome, email, phone, senha), VALUES(?, ?, ?, ?)';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1, $this->nome, PDO::PARAM_STR);
        $consulta->bindValue(2, $this->email, PDO::PARAM_STR);
        $consulta->bindValue(3, $this->phone, PDO::PARAM_STR);
        $consulta->bindValue(4, $this->senha, PDO::PARAM_STR);
        $resultado = $consulta->execute();
        if (!$resultado) {
            var_dump($consulta->errorInfo());
            return false;
        }
    }
}
?>