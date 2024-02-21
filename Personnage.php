<?php 
class Personnage {   
    private $id_perso;
    private $nom;
    private $pv;
    private $atk;
    private $img;
    private static $compteur=0;
    private const MAXLIFE=100;

    public function setId_perso($id){
        $this->id_perso=$id;
    }

    public function getId_perso(){
        return $this->id_perso;
    }

    public function setNom($nom){
        $this->nom=$nom;
    }
    
    public function getNom(){
        return $this->nom;
    }


    public function setPv($pv){
        if($pv > 0 && $pv <= 100){
            $this->pv=$pv;
        }else{
            $this->pv=0;        
        }
    }



    public function getPv(){
        return $this->pv;
    }

    public function setAtk($atk){

        if($atk > 0 && $atk<= 100){
            $this->atk=$atk;
        }else{
            $this->atk=0;        
        }

        // $this->atk=$atk;
    }
    
    public function getAtk(){
        return $this->atk;
    }


    public function setImg($img){
        $this->img=$img;
    }

    public function getImg(){
        return $this->img;
    }

    public static function getCompteur(){
        return self::$compteur;
    }

    public static function setCompteur(){
        self::$compteur++;
    }

    // public function reinitPV(){
    //     return $this->$pv=MAXLIFE;
    // }

    private function hydrate($data){
        foreach ($data as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
                $method = 'set'.ucfirst($key);      
            // Si le setter correspondant existe.
                if (method_exists($this, $method))   {
            // On appelle le setter.
                  $this->$method($value);
                //$this->$key = $ value;
                }
            }

    }
    
  
    public function __construct(array $data){    
        $this->hydrate($data);
        self::setCompteur();
      
    }

    // public function crier(){
    //     return"$this->nom dit : Vous ne passerez pas !";        
    // }

    public function regenerer(int $x=NULL){
        if(is_null()){
            $this->setPv($this->pv+100) ;
        }else{
            $this->setPv($this->pv +$x);
        }
        
    }

    public function is_alive(){
        if($this->pv>0){
            return 'true';
        }else{
            return 'false' ;
        }

    }

    public function attaquer(Personnage $perso){
        $perso->setPv($perso->getPv()-$this->atk) ;
    }

    
    

    public function reinitPV(Personnage $perso){
        $perso->setPv($perso->getPv()) ;
    }

    
    
}
?>