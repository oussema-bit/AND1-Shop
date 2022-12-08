<?php
include "./config.php";
include "./Model/ModelCart.php";

class CommandeC {
    function ajoutercommande($admin){
        $sql="INSERT INTO commande (id_client, dscrp, Price_Command) 
        VALUES (:id_client,:dscrp, :price)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'id_client' => $admin->getclinet_id(),
                'dscrp' => $admin->getdescrp(),
                'price' => $admin->getprice()
                ]);			
        }	
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }

}
?>