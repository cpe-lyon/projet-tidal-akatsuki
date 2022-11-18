<?php
class Meridien extends Model{
public function _construct(){
    //on ouvre la connexion à la BD
    $this->getConnection();
}
}