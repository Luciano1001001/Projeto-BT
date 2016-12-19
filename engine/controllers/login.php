<?php session_start();

	require_once "../config.php";

	//1. Receber os dados do form
	$email = $_POST['email'];
	$senha = sha1($_POST['senha']);

	$res;

	//2. Validar os dados

	$Usuario = new Usuario();
	$Usuario = $Usuario->ReadByEmail($email);

	if ($Usuario === NULL) {
		$res = 'no_user_found';
		session_destroy();
	} else {
		$verificaEmail = strcmp($email,$Usuario['email_usuario']);
		if ($verificaEmail === 0) {
			$verificaSenha = strcmp($senha,$Usuario['senha_usuario']);
			if ($verificaSenha === 0) {
				$_SESSION['id_user'] = $Usuario['id_usuario'];
				$_SESSION['name_user'] = $Usuario['nome_usuario'];
				$_SESSION['email_user'] = $Usuario['email_usuario'];
				$_SESSION['nivel_user'] = $Usuario['nivel_usuario'];

				$res = 'true';
			} else {
				$res = 'wrong_password';
				session_destroy();
			}
		} else {
			$res = 'wrong_user_found';
			session_destroy();
		}
	}

	echo $res;
?>
