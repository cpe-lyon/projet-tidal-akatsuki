<?php
abstract class Controller{

/**
 * Permet de charger un modèle
 *
 * @param string $model
 * @return void
 */
public function loadModel(string $model){    
    // On crée une instance de ce modèle. Ainsi "Article" sera accessible par $this->Article
    $this->$model = new $model();
}

}
