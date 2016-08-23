<?php
class Conexao {
    var $pdo;
    function __construct() {
         $this->pdo = new PDO('mysql:host=mysql.hostinger.com.br;dbname=u776739313_agend', 'u776739313_sky', 'skyweb');
    }

    public function login($login, $senha) {
        $stmt = $this->pdo->prepare("select ds_nome, cd_usuario, ds_login from usuarios where ds_login = :login and ds_senha = :senha");
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', md5(sha1($senha)));
        $run = $stmt->execute();
        return $stmt;
    }

	public function cadastrarPessoa($login, $senha) {
        $stmt = $this->pdo->prepare("insert into usuarios (ds_login, ds_senha) values (?, ?)");
        $stmt->bindParam(1, $login);
		$stmt->bindParam(2, md5(sha1($senha)));
        $run = $stmt->execute();
        return $stmt;
    }

	public function cadastrar_pessoa_completo($nome, $data, $email, $telefone) {
        session_start();
        $stmt = $this->pdo->prepare("update usuarios set ds_nome = ?, dt_nascimento = ?, ds_email = ? where cd_usuario = ?");
        $stmt->bindParam(1, $nome);
		$stmt->bindParam(2, implode("-", array_reverse(explode("/", $data))));
		$stmt->bindParam(3, $email);
		$stmt->bindParam(4, $_SESSION["cd_usuario"]);
        $run = $stmt->execute();


		foreach ($telefone as $key => $value) {

			if ($value != "") {
				$stmt = $this->pdo->prepare("select cd_contato from contatos where nr_telefone = :telefone");
				$stmt->bindValue(':telefone', $value);
				$run = $stmt->execute();

				if ($stmt->rowCount() > 0) {
					$row = $stmt->fetch(PDO::FETCH_OBJ);

					$stmt = $this->pdo->prepare("insert into contato_has_usuarios (contato_cd_contato, usuarios_cd_usuario) values (?, ?)");
					$stmt->bindParam(1, $row->cd_contato);
					$stmt->bindParam(2, $_SESSION["cd_usuario"]);
					$run = $stmt->execute();

				} else {

					$stmt = $this->pdo->prepare("insert into contatos (nr_telefone) values (?)");
					$stmt->bindParam(1, $value);
					$run = $stmt->execute();

					$stmt = $this->pdo->prepare("select cd_contato from contatos where nr_telefone = :telefone");
					$stmt->bindValue(':telefone', $value);
					$run = $stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_OBJ);

					$stmt = $this->pdo->prepare("insert into contato_has_usuarios (contato_cd_contato, usuarios_cd_usuario) values (?, ?)");
					$stmt->bindParam(1, $row->cd_contato);
					$stmt->bindParam(2, $_SESSION["cd_usuario"]);
					$run = $stmt->execute();
				}
			}
		}

        return $stmt;
    }

	public function cadastrar_materia($materia, $professor, $semestre) {
		session_start();
        $stmt = $this->pdo->prepare("insert into materias (ds_titulo, ds_professor, ds_semestre, cd_usuario) values (?, ?, ?, ?)");
        $stmt->bindParam(1, $materia);
		$stmt->bindParam(2, $professor);
		$stmt->bindParam(3, $semestre);
		$stmt->bindParam(4, $_SESSION["cd_usuario"]);
        $run = $stmt->execute();
        return $stmt;
    }

	public function cadastrar_horario($hrInicial, $hrFinal) {
		session_start();
        $stmt = $this->pdo->prepare("insert into horarios (hr_inicial, hr_final, cd_usuario) values (?, ?, ?)");
        $stmt->bindParam(1, $hrInicial);
		$stmt->bindParam(2, $hrFinal);
		$stmt->bindParam(3, $_SESSION["cd_usuario"]);
        $run = $stmt->execute();
        return $stmt;
    }

	public function cadastrar_lembrete($titulo, $data, $lembrete) {
		session_start();
        $stmt = $this->pdo->prepare("insert into lembretes (ds_titulo, dt_lembrete, ds_lembrete, cd_usuario) values (?, ?, ?, ?)");
        $stmt->bindParam(1, $titulo);
		$stmt->bindParam(2, implode("-", array_reverse(explode("/", $data))));
		$stmt->bindParam(3, $lembrete);
		$stmt->bindParam(4, $_SESSION["cd_usuario"]);
        $run = $stmt->execute();
        return $stmt;
    }

	public function editar_lembrete($titulo, $data, $lembrete, $cdLembrete) {
		session_start();
        $stmt = $this->pdo->prepare("update lembretes set ds_titulo = ?, dt_lembrete = ?, ds_lembrete = ? where cd_lembrete = ? and cd_usuario = ? ");
        $stmt->bindParam(1, $titulo);
		$stmt->bindParam(2, implode("-", array_reverse(explode("/", $data))));
		$stmt->bindParam(3, $lembrete);
		$stmt->bindParam(4, $cdLembrete);
		$stmt->bindParam(5, $_SESSION["cd_usuario"]);
        $run = $stmt->execute();
        return $stmt;
    }

	public function cadastrar_aula($diaSemana, $horario, $materia, $sala) {
		session_start();
        $stmt = $this->pdo->prepare("insert into aulas (en_dia, cd_horario, cd_materia, ds_sala, cd_usuario) values (?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $diaSemana);
		$stmt->bindParam(2, $horario);
		$stmt->bindParam(3, $materia);
		$stmt->bindParam(4, $sala);
		$stmt->bindParam(5, $_SESSION["cd_usuario"]);
        $run = $stmt->execute();
        return $stmt;
    }

	public function editar_aula($diaSemana, $horario, $materia, $sala, $cdAula) {
		session_start();
        $stmt = $this->pdo->prepare("update aulas set en_dia = ?, cd_horario = ?, cd_materia = ?, ds_sala = ? where cd_aula = ? and cd_usuario = ?");
        $stmt->bindParam(1, $diaSemana);
		$stmt->bindParam(2, $horario);
		$stmt->bindParam(3, $materia);
		$stmt->bindParam(4, $sala);
		$stmt->bindParam(5, $cdAula);
		$stmt->bindParam(6, $_SESSION["cd_usuario"]);
        $run = $stmt->execute();
        return $stmt;
    }

	public function getMaterias() {
		session_start();
        $stmt = $this->pdo->prepare("select cd_materia, ds_titulo from materias where cd_usuario = :cdUsuario order by ds_titulo asc");
		$stmt->bindValue(':cdUsuario', $_SESSION["cd_usuario"]);
        $run = $stmt->execute();
        return $stmt;
    }

	public function getHorarios() {
		session_start();
        $stmt = $this->pdo->prepare("select cd_horario, hr_inicial, hr_final from horarios where cd_usuario = :cdUsuario order by hr_inicial asc");
		$stmt->bindValue(':cdUsuario', $_SESSION["cd_usuario"]);
        $run = $stmt->execute();
        return $stmt;
    }

	public function getLembretesHojeMais() {
        $stmt = $this->pdo->prepare("select cd_lembrete, ds_titulo, dt_lembrete, ds_lembrete
									from lembretes
									where cd_usuario = :cdUsuario
									and dt_lembrete >= (NOW()  - 1)
									order by dt_lembrete asc");
		$stmt->bindValue(':cdUsuario', $_SESSION["cd_usuario"]);
        $run = $stmt->execute();
        return $stmt;
    }

	public function getAula($aula) {
        $stmt = $this->pdo->prepare("select en_dia, cd_horario, cd_materia, ds_sala, cd_aula
									from aulas
									where cd_usuario = :cdUsuario
									and cd_aula = :aula ");
		$stmt->bindValue(':cdUsuario', $_SESSION["cd_usuario"]);
		$stmt->bindValue(':aula', $aula);
        $run = $stmt->execute();
        return $stmt;
    }

	public function getLembrete($lembrete) {
        $stmt = $this->pdo->prepare("select cd_lembrete, ds_titulo, dt_lembrete, ds_lembrete
									from lembretes
									where cd_usuario = :cdUsuario
									and cd_lembrete = :lembrete ");
		$stmt->bindValue(':cdUsuario', $_SESSION["cd_usuario"]);
		$stmt->bindValue(':lembrete', $lembrete);
        $run = $stmt->execute();
        return $stmt;
    }

	public function getAulas($dia) {
        $stmt = $this->pdo->prepare("select m.ds_professor, m.ds_titulo, a.cd_aula, a.ds_sala, h.hr_inicial, h.hr_final
									from aulas a join materias m on (a.cd_materia = m.cd_materia)
									join horarios h on(a.cd_horario = h.cd_horario)
									where a.cd_usuario = :cdUsuario
									and a.en_dia = :dia
									order by h.hr_inicial asc");
		$stmt->bindValue(':cdUsuario', $_SESSION["cd_usuario"]);
		$stmt->bindValue(':dia', $dia);
        $run = $stmt->execute();
        return $stmt;
    }

	public function excluir_lembrete($cdLembrete) {
		session_start();
        $stmt = $this->pdo->prepare("delete from lembretes where cd_usuario = :cdUsuario and cd_lembrete = :cdLembrete");
		$stmt->bindValue(':cdUsuario', $_SESSION["cd_usuario"]);
		$stmt->bindValue(':cdLembrete', $cdLembrete);
        $run = $stmt->execute();
        return $stmt;
    }

	public function excluir_aula($cdAula) {
		session_start();
        $stmt = $this->pdo->prepare("delete from aulas where cd_usuario = :cdUsuario and cd_aula = :cdAula");
		$stmt->bindValue(':cdUsuario', $_SESSION["cd_usuario"]);
		$stmt->bindValue(':cdAula', $cdAula);
        $run = $stmt->execute();
        return $stmt;
    }

    public function getAlunoByClass(){
      $stmt = $this->pdo->prepare("select count(DISTINCT aulas.cd_usuario) as total_aluno, materias.ds_titulo as titulo
from aulas
inner join usuarios on aulas.cd_usuario = usuarios.cd_usuario
inner join materias on aulas.cd_materia = materias.cd_materia
group by materias.ds_titulo");
        $run = $stmt->execute();
        return $stmt;
    }
}
?>
