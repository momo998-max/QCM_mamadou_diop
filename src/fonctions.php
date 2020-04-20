<?php

   function connexion($login,$psw){
   	$users=getData();
   	foreach ($users as $key => $user) {

   		if ($users[0]["login"]===$login && $users[0]["password"]===$psw) {
   			$_SESSION['user']=$user;
   				$_SESSION['statut']=$login;
   			if ($user[0]["profil"]==="admin") {
   				
   				return "acceuil";
   			}else{
   				return "jeux";
   			}
            
   		}
      } 
      return "error";
   }
   function is_connect(){
   	if (isset($_SESSION['statut'])) {
   	    header("location:index.php");
   	}
   }
   function Deconnexion(){
   	    unset($_SESSION['user']);
   	 	unset($_SESSION['statut']); 
   	 	session_destroy();
   }


 
  function getData($file="user"){
  $data=file_get_contents("./asset/js/".$file.".json");
  $data=json_decode($data,true); 
  return $data;
   }
 ?>