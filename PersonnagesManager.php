<?php 
class Personnagesmanager
{
    private $db; //instance PDO

}
public function __construct($db) {
    $this->setDb($db);



public function setDb(PDO $db)
{
    # code...
    $this->db=$db;
}
ADD COUNT DELETE EXISTS GET GETlist UPDATE


public function add()
{
    # code...
    $q=$this->db->prepare('INSERT INTO personnages(nom) VALUES(:nom)');
    $q->bindValue(':nom', $perso->nom());
    $q->execute();

    $perso->hydrate([
        'id' =>$this->db->lastInsertId(),
        'degats' => 0,
    ])
}
public function count()
{
    # code...
    return $this->db->query('SELECT COUNT(*) FROM personnages')->fetchColumn();
}



public function delete(Personnage $perso)
{
    return $this->db->exec('DELETE FROM personnages WHERE id='.$perso->id());
    # code...
}
public function exists($info)
{
    # code...
    if (is_int($info)) {
        # code...
        return (bool) $this->db->query('SELECT COUNT(*) FROM personnages WHERE id='.$info)->fetchColumn;
    }
    //le nom
    $q=$this->db->query('SELECT COUNT(*) FROM personnages WHERE nom=:nom');
    $q->execute(['nom' => $info]);
    return (bool) $q->fetchColumn();
}
public function get($info)
{
    # code...
    if (is_int($info)) {
        # code...
        $q->$this->db->query(' SELECT * FROM personnages WHERE id='.$info);
       $donnees=$q->fetch((PDO::FETCH_ASSOC));
        return new Personnage($donnees);
    }
    else {
        $q->$this->db->query(' SELECT * FROM personnages WHERE nom= :nom');
        $q->execute(['nom' => $info]);
        return new Personnage($q->fetch(PDO::FETCH_ASSOC));
        # code...

    }
}
public function getList($nom)
{
    # code...
    $persos=[];
    $q= $this->db->prepare('SELECT * FROM personnages WHERE nom <> :nom ORDER BY nom');
    $q->execute(['nom' => $nom]);
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
        # code...
        $persos[]=new Personnage($donnees);
    }
return $persos;
}
public function update()
{
    $q=$this->db->prepare('UPDATE personnages SET degats=:degats WHERE id=:id');
    $q->bindvalue(':degats',$perso->degats(), PDO::PARAM_INT);
    $q->bindvalue(':id',$perso->id(), PDO::PARAM_INT);
    $q->execute();
    # code...
}


?>