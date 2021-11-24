<?php
session_start();

$login = $_POST["login"];
$senha = $_POST["senha"];

   if (empty($login) or empty($senha)) {
       echo "<script>
          alert('Preencha todos os campos');
          history.go(-1);
          </script>";
    exit;    
  }


	include("conecta.php");

	$sql = "SELECT * FROM adm WHERE login ='$login' AND senha ='$senha' ";
	$dados = mysql_query($sql, $conecta);
	$num = mysql_num_rows($dados);

	if ($num == 0){
		echo "<script>
				alert('Usuario ou senha Incorreta');
				history.go(-1);
			  </script>";
		exit;
	} else {
		$linha = mysql_fetch_array($dados);
		$coduser = $linha["codigo"];

		$_SESSION["login_usuario"] = $coduser;
		$_SESSION["login"] = $login;

		header ("Location: file:///C:/Users/gabri/Desktop/hotel/scripts/login.php");

	}
	// mysql_free_result($dados);
 	 mysql_close($conecta);
?>