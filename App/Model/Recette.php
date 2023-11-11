<?php
namespace App\Model;
use App\Utils\BddConnect;
use App\Model\Utilisateur;
class Recette extends BddConnect{
    /*---------------------------- 
                Attributs
    -----------------------------*/
    private ?int $id_recette;
    private ?string $nom_recette;
    private ?string $niveau_recette;
    private ?string $date_recette;
    private ?int $portion_recette;
    private ?int $temps_recette;
    
    /*---------------------------- 
            Getters et Setters
    -----------------------------*/
    public function getId(){
        return $this->id_recette;
    }
    public function setId(?int $id):void{
        $this->id_recette = $id;
    }
    public function getNom():?string{
        return $this->nom_recette;
    }
    public function setNom(?string $nom):void{
        $this->nom_recette = $nom;
    }
    public function getNiveau():?string{
        return $this->niveau_recette;
    }
    public function setNiveau(?string $niveau):void{
        $this->niveau_recette = $niveau;
    }
    public function getDate():?string{
        return $this->date_recette;
    }
    public function setdate(?string $date):void{
        $this->date_recette = $date;
    }
    public function getPortion():?int{
        return $this->portion_recette;
    }
    public function setPortion(?int $portion):void{
        $this->portion_recette = $portion;
    }
    
    public function getTemps():?int{
        return $this->temps_recette;
    }
    public function setTemps(?int $temps):void{
        $this->temps_recette = $temps;
    }

    /*---------------------------- 
                Méthodes
    -----------------------------*/

    //!Ajouter un chocoblast
    public function add(){
        try {
            $nom = $this->getNom();
            $niveau = $this->getNiveau();
            $date = $this->getDate();
            $portion = $this->getPortion();
            $temps = $this->getTemps();
            $req = $this->connexion()->prepare('INSERT INTO recette(nom_recette,
            niveau_recette, date_recette, portion_recette, temps_recette)
            VALUES (?,?,?,?,?)');
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->bindParam(2, $niveau, \PDO::PARAM_STR);
            $req->bindParam(3, $date, \PDO::PARAM_STR);
            $req->bindParam(4, $portion, \PDO::PARAM_INT);
            $req->bindParam(5, $temps, \PDO::PARAM_INT);
            $req->execute();
        } catch (\Exception $e) {
            die('Error :'.$e->getMessage());
        } 
    }

    //!Rechercher une recette
    public function findOneBy(){
        try {
            $nom = $this->getNom();
            $niveau = $this->getNiveau();
            $date = $this->getDate();
            $portion = $this->getPortion();
            $temps = $this->getTemps();
            $req = $this->connexion()->prepare('SELECT id_recette, nom_recette,
            niveau_recette, date_recette, portion_recette, temps_recette FROM recette 
            WHERE nom_recette = ? AND niveau_recette = ? AND date_recette = ? 
            AND portion_recette = ? AND temps_recette = ?');
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->bindParam(2, $niveau, \PDO::PARAM_STR);
            $req->bindParam(3, $date, \PDO::PARAM_STR);
            $req->bindParam(4, $portion, \PDO::PARAM_INT);
            $req->bindParam(5, $temps, \PDO::PARAM_INT);
            $req->setFetchMode(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Recette::class);
            $req->execute();
            return $req->fetch();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
}