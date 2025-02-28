<?php

require_once '../../db/conexao.php';
require_once 'aluno.php';

class AlunoDao extends Conexao {
  private $conexao;

  public function inserir(Aluno $aluno)
  {

    $conexao = $this->conectar();
    // monta SQL
    $sql = 'INSERT INTO tb_aluno (nome, endereco, telefone, data_nascimento) VALUES (:nome, :endereco, :telefone, :data_nascimento)';

    // preencher SQL com dados do aluno que eu quero inserir
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':nome', $aluno->__get('nome'));
    $stmt->bindValue(':endereco', $aluno->__get('endereco'));
    $stmt->bindValue(':telefone', $aluno->__get('telefone'));
    $stmt->bindValue(':data_nascimento', $aluno->__get('data_nascimento'));

    // manda executar SQL
    $stmt->execute();
  }

  public function listar_tudo() {
    $conexao = $this->conectar();
    $sql = 'SELECT * FROM tb_aluno';
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
    $alunos = array();

    // percorrer resultados
    foreach ($resultados as $item) {

      // instanciar aluno novo
      $novo_aluno = new Aluno($item->id, $item->nome, $item->endereco, $item->telefone, $item->data_nascimento);

      // guardar num novo array
      $alunos[] = $novo_aluno;
    }
    // retornar esse novo array
    return $alunos;
  }

  public function buscar_id(int $id) {
    $conexao = $this->conectar();
    $sql = "SELECT * FROM tb_aluno  WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_OBJ);

    $novo_aluno = new Aluno($resultado->id, $resultado->nome, $resultado->endereco, $resultado->telefone, $resultado->data_nascimento);

    return $novo_aluno;
  }
}