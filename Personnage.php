<?php 
class Personnage
{
    private $id;
    private $nom;
    private $degats;
    // constantes
    const CEST_MOI=1;
    const PERSONNAGE_TUE=2;
    const PERSONNAGE_FRAPPE=3;

}
/**
 * Constructeur
 * 
 */
public function __construct(array $donnees) {
    $this->hydrate($donnees);
}
/**
 * Methode frapper
 */
public function frapper( Personnage $perso)
{
    # code...
    if ($perso->id()==$this->id) {
        # code...
        return self::CEST_MOI;
    }
    // retourne si le personnage a ete frappé ou deja tué
    return recevoirDegats();
}
/**
 * Methode recevoir degats
 */
public function recevoirDegats()
{
    # code...
    $this->degats += 5;
    if ($this->degats>=100) {
        # code...Le peronnage est alors tué
        return self::PERSONNAGE_TUE;
    }
    return self::PERSONNAGE_FRAPPE;
}


public function id()
{
    # code...
    return $this->id;
}
public function nom()
{
    # code...
    return $this->nom;
}

public function degats()
{
    # code...
    return $this->degats;
}

public function setId($id)
{
    # code...
    $id=int($id);
    if ($id>0) {
        # code...
        $this->id=$id;
    }
}


public function setNom($nom)
{
    # code...
    if (is_string($nom)) {
        # code...
        $this->nom=$nom;
    }

}
public function setDegats($degats)
{
    # code...
    $degat=int($degat);
    if ($degat<=100 && $degat>=0) {
        # code...
        $this->degats = $degats
    }
}



public function hydrate(array $donnees)
{
    # code...
    foreach ($donnees as $key => $value) {
        # code...
        $method='set'. ucfirst($key);
        if (method_exist($this,$method)) {
            # code...
            $this->$method($value);
        }
    }
}





?>