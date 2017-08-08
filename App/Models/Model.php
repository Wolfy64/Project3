<?php
require_once('Database/PDOFactory.php');

abstract class Model
{
    private $db;

    // Exécute une requête SQL éventuellement paramétrée
    protected function executeRequest($sql, $params = null) {
        if ($params == null) {
            $result = $this->getDb()->query($sql); // exécution directe    
        }else {
            $result = $this->getDb()->prepare($sql);  // requête préparée
            $result->execute($params);
        }
        return $result;
    }

    // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
    private function getDb() {
        if ($this->db == null) {
        // Création de la connexion
        $this->db = PDOFactory::getMysqlConnexion();
        }
        return $this->db;
    }
}