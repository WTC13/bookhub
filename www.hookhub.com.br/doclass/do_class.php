<?php

session_start();


class DoFramwork{

	public $instance;
	public $instances;
	public $last_inserted_id;

	
	function setInstanceDB( $key, $properties ){
		$this->instances[ $key ] = $properties;

	}

	function crypt_str($str, $type){
		if($type == "encode") {
			$first = $str[0];
			$last = $str[strlen($str) - 1];
			$size = strlen($str);
			$str = base64_encode($str);
			$str = $size . $first . $last . "_ma_" . $str;
		} else {
			$explode_str = explode("_ma_", $str);
			$new_str = end($explode_str);
			$str = base64_decode($new_str);
		}

		return $str;
	}

	function getInstanceDB(){
		$db = $this->instance;
		if($db){
			foreach ( $this->instances as $key => $value ) {
				if ( $key == $db ){
					return $value["instance"];
				}
			}
		} else {
			return $this->instances[DEFAULT_DB]["instance"];
		}
	}

	function check_session(){
		if(!isset($_SESSION['BHSession'])){
		    session_destroy();
		    $caminho = "http://localhost/www.hookhub.com.br/app/login/index.php";
		    echo "<script>top.window.location = '$caminho'</script>";
		    exit;
		}
	}

	function get_user_session(){
		return $_SESSION["BHSession"]["user"];
	}

	function to_json( $objRresult ){
		$rows;
		while ($row = $objRresult->fetch_array( MYSQLI_ASSOC )){
			foreach ( $row as $name => $value ) {
				if (!preg_match('!!u', $value)) {
					$value = utf8_encode( $value );
				}
				$row[$name] = $value;
			}
		    $rows[] = $row;
		}
		return $rows;
	}

	function executeQuery($instanceDB, $commandSql, $db_name = 'mysql', $erro = 1) {
		$resultQuery;
		if ( $db_name == "mysql" ){
			if (!($resultQuery = mysqli_query( $instanceDB, $commandSql ))) {
				echo '{"success":false,"message":"Ocorreu um erro na execução do Comando SQL no banco de dados. Por favor contate o administrador.", "response": "' . mysqli_error($instanceDB) . '"}';
				exit;
			}
		}
		return $resultQuery;
	}

	function select( $sqlCommand ){
		$result = $this->executeQuery($this->getInstanceDB(), $sqlCommand, $db_name = 'mysql', $erro = 1);
		return $result;
	}

	function update( $sqlCommand ){
		$result = $this->executeQuery($this->getInstanceDB(), $sqlCommand, $db_name = 'mysql', $erro = 1);
		return true;
	}

	function insert( $sqlCommand ){
		$result = $this->executeQuery($this->getInstanceDB(), $sqlCommand, $db_name = 'mysql', $erro = 1);
		$this->last_inserted_id = mysqli_insert_id($this->getInstanceDB());

		return true;
	}

	function delete( $sqlCommand ){
		$result = $this->executeQuery($this->getInstanceDB(), $sqlCommand, $db_name = 'mysql', $erro = 1);
		return true;
	}

	function begin( $transaction = MYSQLI_TRANS_START_READ_WRITE ){
		mysqli_begin_transaction($this->getInstanceDB(), $transaction);
	}

	function commit(){
		mysqli_commit($this->getInstanceDB());
	}

	function end(){
		mysqli_close($this->getInstanceDB());
	}
}

$do = new DoFramwork();

foreach ( $DB_APPLICATION as $key => $value ) {
	$dbparameter = $value;
	$server = "";
	$server = $dbparameter["server"];

	$instanceMySql = mysqli_connect($server, $dbparameter["user"], $dbparameter["password"], $dbparameter["name"]);

	if (!$instanceMySql) {
	    echo '{"success":false, "message": "Não foi possível estabelecer uma conexão com o gerenciador MySQL.", "Debugging errno":"' . mysqli_connect_errno() .'", "Debugging error": ' . json_encode( utf8_encode( mysqli_connect_error() ), JSON_UNESCAPED_SLASHES )  . '}';
	    exit;
	}

	$value["instance"] = $instanceMySql;

	$do->setInstanceDB( $key, $value );
}
?>