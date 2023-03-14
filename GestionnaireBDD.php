<?php
require_once "FamilleProduit.php";
require_once "Produit.php";
require_once "Promotion.php";
require_once "LignePromotion.php";

class PdoBIOCOOP{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=BIOCOOP';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoBIOCOOP=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoBIOCOOP::$monPdo = new PDO(PdoBIOCOOP::$serveur.';'.PdoBIOCOOP::$bdd, PdoBIOCOOP::$user, PdoBIOCOOP::$mdp); 
		PdoBIOCOOP::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoBIOCOOP::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoBIOCOOP = PdoBIOCOOP::getPdoBIOCOOP();
 
 * @return l'unique objet de la classe PdoBIOCOOP
 */
	public  static function getPdoBIOCOOP(){
		if(PdoBIOCOOP::$monPdoBIOCOOP==null){
			PdoBIOCOOP::$monPdoBIOCOOP= new PdoBIOCOOP();
		}
		return PdoBIOCOOP::$monPdoBIOCOOP;  
	}

/**
 * Retourne sous forme d'un tableau associatif toutes les lignes d'une promotion
 * dont on fournit l'id
 
 * @param $idPromotion
 * @return un tableau associatif 
*/
public function getLesLignesPromotions($idPromotion){
    $req = "select * from lignepromotion
    where idPromotion ='$idPromotion'"; 
    $res = PdoBIOCOOP::$monPdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes; 
}


}

    ?>