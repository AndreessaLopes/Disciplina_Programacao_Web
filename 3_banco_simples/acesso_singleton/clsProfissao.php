<?php
require_once 'clsConexao.php';

class clsProfissao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = clsConexao::getInstancia();
    }

    public function inserir($nome, $salario, $cargo)
    {
        $sql = "INSERT INTO tb_profissao (nome, salario, cargo) VALUES (?, ?, ?)";
        $parametros = [$nome, $salario, $cargo];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        return $stmt->affected_rows > 0;
    }

    public function selecionarTodos()
    {
        $sql = "SELECT * FROM tb_profissao";
        $stmt = $this->conexao->executarConsulta($sql);
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM tb_profissao WHERE id = ?";
        $parametros = [$id];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        return $stmt->affected_rows > 0;
    }
}
