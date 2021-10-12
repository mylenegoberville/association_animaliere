<?php
class ModelPDO {

    public  static $pdo;

    public static function set_instance() {
        $host = 'localhost';
        $dbname = 'association';
        $login = 'root';
        $pass = '';
        
        try {
            // Connexion à la base de données            
            // Le dernier argument sert à ce que toutes les chaines de charactères 
            // en entrée et sortie de MySql soit dans le codage UTF-8
            self::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $login, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
                echo $ex->getMessage();
                
        }
    }
}
// On initialise la connexion $pdo un fois pour toute
ModelPDO::set_instance();
?>
