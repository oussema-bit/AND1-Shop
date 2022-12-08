<?php
	require_once 'config_user.php';
	require_once 'Client.php';
	class ClientC {
		function afficheruser(){
			$sql="SELECT * FROM client";
			$db = config_user::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerusers($id){
			$sql="DELETE FROM client WHERE id=:id";
			$db = config_user::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouteradmin($admin){
			$sql="INSERT INTO client (nom, prenom, pwd, email,img,date_naissance) 
			VALUES (:nom,:prenom, :pwd,:email, :img, :date_naissance)";
			$db = config_user::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'nom' => $admin->getnom(),
					'prenom' => $admin->getprenom(),
					'pwd' => $admin->getpwd(),
					'email' => $admin->getemail(),
					'img' => $admin->getimg(),
					'date_naissance' => $admin->getdate_naissance()
					]);			
			}
			catch (Exception $e){
				echo "<script>alert(\"email has to be unique\")</script>";
			}			
		}
		function recupereruser($email){
			$sql="SELECT * from client where email=$email";
			$db = config_user::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function recupereruser_email($email){
			$sql="SELECT * from client where email = :email";
			$db = config_user::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute([
					'email' => $email
				]);
				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

	}
?>