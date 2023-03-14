<?php
require_once 'gestionnaireBDD.php';

$pdoBiocoop = PdoBIOCOOP::getPdoBIOCOOP();
$idPromotion='promo1';
var_dump($pdoBiocoop->getLesLignesPromotions($idPromotion))
?>