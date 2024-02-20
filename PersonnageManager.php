<?php 


 class PersonnageManager {

    private $db;

    public function __construct($db){
        $this->db =$db;
    }

    public function addPersonnage(Personnage $perso) :bool{
        $requete = "INSERT INTO personnages VALUES (NULL, :nom, :atk, :pv)";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':nom', $perso->getNom(), PDO::PARAM_STR);
        $stmt->bindValue(':atk', $perso->getAtk(), PDO::PARAM_INT);
        $stmt->bindValue(':pv', $perso->getPv(), PDO::PARAM_INT);
        // $stmt->bindValue(':img_perso', $perso->getImg(), PDO::PARAM_STR);

        return $stmt->execute();
    }


    public function deletePersonnage($id) :bool{
        $requete = "DELETE FROM personnages WHERE id_perso= :id_perso";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':id_perso', $id, PDO::PARAM_STR);

        return $stmt->execute();    
    }

    public function modifyPersonnage(Personnage $perso) :bool{
        $requete = "UPDATE personnages SET nom=:nom, atk=:atk, pv=:pv WHERE id_perso={$perso->getId_perso()}";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':nom', $perso->getNom(), PDO::PARAM_STR);
        $stmt->bindValue(':atk', $perso->getAtk(), PDO::PARAM_INT);
        $stmt->bindValue(':pv', $perso->getPv(), PDO::PARAM_INT);

        return $stmt->execute();

    }

    public function getAllPersonnages() :array{ //tableau d'objets personnages
        $requete = "SELECT * FROM personnages ORDER BY id_perso DESC";
        $stmt = $this->db->query($requete);
        $stmt->execute();
        $personnages=[];
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $personnages[]= new Personnage($result);
        
        }

        return($personnages);
        
    } 

    public function getOnePersonnageById ($id) :Personnage{
        $requete = "SELECT * FROM personnages  WHERE id_perso=:id_perso";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':id_perso', $id, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Personnage($result);
    }

    public function getLastIdPerso() {
        $requete = "SELECT id_perso FROM personnages ORDER BY id_perso DESC LIMIT 1";

        $stmt = $this->db->prepare($requete);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result['id_perso'];
        } else {
            return false; 
        }
        
    }



}

?>