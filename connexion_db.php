<?php

    class connexion_db {   
        private $bd=null;

        
        public function getConnexion(){ 

            $servername = "localhost";
            $username = "saw24";
            $password = "saw24";
            $dbname = "gesstagiaire";
            $port = 3306; 
            $connexion = null;
            $message = "";

            try {
                $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connexion = $conn;
                $message = "Connexion réussie";
            } catch(PDOException $e) {
                $message = "Erreur de connexion à la base : " . $e->getMessage();
            }

            return array(
                'connexion' => $connexion,
                'message' => $message
            );

        }





        public function getNouveauCode(){
        
            return uniqid();

        }

        public function genererCodeRoute() {

          try {
              // Date et heure actuelles
              $date = date('Ymd');
              $heure = date('His');
              
              // Adresse MAC  
              ob_start();
              system('getmac'); 
              $mac = ob_get_contents(); 
              ob_end_clean();
              $mac = str_replace(":", "", $mac);

              // On tronque la MAC à 12 caractères
              $mac = substr($mac, 0, 35);

              // Construction du code route  
              return $date . $heure . $mac;
            } catch (Exception $e) {
              // Gestion d'erreur    
              error_log("Erreur génération du code route: ".$e->getMessage()); 
              return $e->getMessage();
            }

        }

    }
?>