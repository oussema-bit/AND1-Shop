<?php
include "./config.php";
include "./Model/ModelProd.php";

class ProdC {
    function afficherprod(){
        $sql="SELECT * FROM product";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }
    function howmanyprods(){
        $sql="SELECT * FROM product";
        $db = config::getConnexion();
        try{
            $nb=0;
            $liste = $db->query($sql);
            foreach($liste as $prod)
            {
                $nb++;
            }
            return $nb;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }
    function afficheroffer(){
        $sql="SELECT * FROM product LIMIT 9";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }
    
    function recupererprod($id){
        $sql="SELECT * from product where id=$id";
        $db = config::getConnexion();
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

}
?>