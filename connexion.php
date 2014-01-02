<?php
    $PARAM_hote='localhost';
    $PARAM_port='80';
    $PARAM_bdd='test';
    $PARAM_users='root';
    $PARAM_password='';    
    try
    {
        $connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd, $PARAM_users, $PARAM_password);
    }
    catch(Exception $e)                                                                 // CONNEXION A LA BDD
    {
        echo 'Connection Error !';
        die();
    }
   
  
    /*$sth = $dbh->prepare('SELECT login,password FROM users WHERE login = $_GET["login"] AND password = $_GET["password"]');         // ANTI INJECTION SQL
    $sth->bindValue(1, $_GET["login"], PDO::PARAM_STR);
    $sth->bindValue(2, $_GET["password"], PDO::PARAM_STR);
    $sth->execute();*/
   
  //  echo ' Tentative de connexion de l utilisateur.... ';
 /*  mysql_select_db("test");
   $sql=mysql_query("SELECT * FROM users");
   while($row=mysql_fetch_assoc($sql))
   $output[]=$row;
   print(json_encode($output));
  mysql_close();*/
  /*$sql ="SELECT * FROM users";
  $req = $connexion->query($sql);
  while ($row = $req->fetch()) {
    print $row[0] . "\t" . $row[1] . "\n";
  }
  */

  /*  if(!empty($_POST)) {
        if(isset($_POST["login"]) && isset($_POST["password"])) {
		   $connect = 0;
           $login = urldecode($_POST['login']);
           $password = urldecode($_POST['password']);                              // Connexion de l'utilisateur
           $req = "SELECT * FROM users WHERE login=$login and password = $password";
           $result=$connexion->query($req);
           while($row=$result->fetch()) // on récupère la liste des membres
            {
                $connect = 1;
            }
			if($connect == 0){
				echo 'Pas connecte';
			}
			else {
				echo 'connecte';
			}
         }
     }
    */

	
	
	
	
                             // Connexion de l'utilisateur
           $req = "SELECT login, password FROM users WHERE login = '".$_POST['login']."' and password = '".$_POST['password']."'";
           $result=$connexion->query($req);
           while($row=$result->fetch(PDO::FETCH_BOTH)) // on récupère la liste des membres
            {
				$login = $row[0];
				$password = $row[1];
				if($login ==$_POST['login'] && $password == $_POST['password'])
				{
		
					$output[]=$row;
					print(json_encode($output));
				}
				else {
				print "erreur";
				}
            }
 
     /*

$pass = md5($_GET['password'] . $salt) . salt;
           
            $req = "SELECT password FROM user WHERE login='$login';";
            $resultats=$connexion->query($req);
            $pass = $resultats->fetch()["password"];
            $salt = substr($pass , strlen($pass)-3 ,3);
           
           
            $req = "SELECT * FROM user WHERE login='$login' and password='$pass';";
            //var_dump($req);
            $resultats=$connexion->query($req);
            //var_dump($resultats);
            $resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
            if( $resultats->fetch() ) // on récupère la liste des membres
            {
                echo "connecte !";
            } else {
                echo "pas bon";
                $ip = $_SERVER["REMOTE_ADDR"];
                $req = "SELECT * FROM user WHERE login='$login' and password='$pass';";
            }
            $resultats->closeCursor(); // on ferme le curseur des résultats
        } else {
            echo "renseigner login pass";
        }
    } else {
        echo "absence des parametres";
    } */





?>