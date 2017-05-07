<?php


function connect_db(){
	global $connection;

	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
    global $connection;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['login'])){

        // check if form fields are filled
        if (empty($_POST['user'])){
            $errors[] = 'Kasutajanimi on puudu';
        }
        if (empty($_POST['pass'])){
            $errors[] = 'Parool on puudu';
        }

        // if errors then do errors on login page
        if (!empty($errors)){
            include_once('views/login.html');
            die();
        }
        else { // if no errors then try to login
            $u = mysqli_real_escape_string($connection, $_POST['user']);
            $p = mysqli_real_escape_string($connection, $_POST['pass']);

            $sql = "SELECT * FROM tvari_vorgurakendus1_test_kylastajad WHERE username = '".$u."' AND passw = SHA1('".$p."')";
            $result = mysqli_query($connection, $sql);

            if ($result && mysqli_num_rows($result) == 1){

                $row = mysqli_fetch_assoc($result);
                $_SESSION['user'] = $row['username'];

                header("Location: ?page=loomad");
                die();
            }
            else {
                include_once('views/login.html');
            }
        }
    }
    else {
        include_once('views/login.html');
    }

}

function logout(){
	$_SESSION = array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){

    if (!isset($_SESSION['user'])){
        header("Location: ?page=login");
        die();
    }

    global $connection;
    global $puurid;

    $puurid = array();

    $sql = "SELECT DISTINCT puur FROM tvari_vorgurakendus1_test_loomaaed ORDER BY puur";
    $result = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($result)){
        $puurid[$row["puur"]] = array();
    }

    $sql = "SELECT * FROM tvari_vorgurakendus1_test_loomaaed";
    $result = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($result)){
        $puurid[$row["puur"]][] = $row;
    }

    include_once('views/puurid.html');
}

function lisa(){
    global $connection;
    global $errors;

    if (empty($loom)){
        $loom = array();
    }

    if (!isset($_SESSION['user'])){
        header("Location: ?page=login");
        die();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['add_animal'])){
        if (empty($_POST['nimi'])){
            $errors[] = 'Looma nimi on puudu';
        }
        else {
            $loom['nimi'] = htmlspecialchars($_POST['nimi']);
        }

        if (empty($_POST['puur'])){
            $errors[] = 'Puur on määramata';
        }
        else {
            $loom['puur'] = htmlspecialchars($_POST['puur']);
        }

        $upload_result = upload("liik");

        if ( $upload_result == ""){
            $errors[] = 'Viga näofaili üleslaadimisel';
        }
        else {
            $loom['liik'] = htmlspecialchars($upload_result);
        }

        // if errors
        if (!empty($errors)){
            include_once('views/loomavorm.html');
            die();
        }
        else {
            $nimi = mysqli_real_escape_string($connection, $loom['nimi']);
            $puur = mysqli_real_escape_string($connection, $loom['puur']);
            $liik = mysqli_real_escape_string($connection, $loom['liik']);

            $sql = "INSERT INTO tvari_vorgurakendus1_test_loomaaed (nimi, puur, liik) VALUES ('".$nimi."', ".$puur.", '".$liik."')";
            $result = mysqli_query($connection, $sql);

            if ($result && mysqli_insert_id($connection) > 0){
                header("Location: ?page=loomad");
                die();
            }
            else{
                $errors[] = 'Looma lisamine ebaõnnestus';
                include_once('views/loomavorm.html');
                die();
            }
        }
    }
    else {
        include_once('views/loomavorm.html');
    }
}

function upload($name){
    global $errors;

	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");

    $tmp = explode('.', $_FILES[$name]["name"]);
    $extension = end($tmp);
    // Original line gives errors, changed into working one
	// $extension = end(explode(".", $_FILES[$name]["name"]));

    if ($_FILES[$name]["size"] > 100000){
        $errors[] = "Fail on liiga suur, otsi pisem pilt (väiksem kui 100KB)";
        return "";
    }

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		    && in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>