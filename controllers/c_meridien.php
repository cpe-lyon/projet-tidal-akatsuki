<?php
class Meridien extends Controller{
    
    public function loadModelMeridien(){    
        require_once("../models/m_meridien.php");
        // On crée une instance de ce modèle. Ainsi "Article" sera accessible par $this->Article
        $this->$merdien = new $Meridien();
    }
}
?>