<?php
namespace App\Controller;
use App\Model\Ingredient;
use App\vue\Template;
use App\Model\Utilisateur;
use App\Utils\Utilitaire;


class IngredientController extends Ingredient{
    public function addIngredient(){
        $error = "";
        if(isset($_POST['submit'])){
            if(!empty($_POST['nom_ingredient'] )AND !empty($_POST['quantite_ingredient'])){
                $this->setNom(Utilitaire::cleanInput($_POST['nom_ingredient']));
                $this->setQuantite(Utilitaire::cleanInput($_POST['quantite_ingredient']));
                if(!$this->findOneBy()){
                    $this->add();
                    $error = "Les ingredients ont été ajoutés en BDD";
                }else{
                    $error = "Les ingredients existent déja";
                }
            }
            else{
                $error = "Veuillez saisir le nom des ingredients";
            }
        }
        Template::render('navbar.php', 'footer.php','vueAddIngredient.php','Ingredient',   
        ['script.js', 'main.js'],['style.css', 'main.css'],$error);
    }
}
