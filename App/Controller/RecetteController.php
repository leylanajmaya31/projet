<?php
namespace App\Controller;
use App\vue\Template;
use App\Model\Utilisateur;
use App\Utils\Utilitaire;
use App\Model\Recette;
class RecetteController extends Recette{
    public function addRecette(){
        $error ="";
        $user = new Utilisateur();
        $user->setId(Utilitaire::cleanInput($_SESSION['id']));
        $users = $user->findAll();
        if(isset($_POST['submit'])){
            if(!empty($_POST['nom_recette']) AND !empty($_POST['date_recette']) 
            AND !empty($_POST['cible_chocoblast'])){
                $this->setNom(Utilitaire::cleanInput($_POST['slogan_chocoblast']));
                $this->setDate(Utilitaire::cleanInput($_POST['date_chocoblast']));
                // $this->setStatut(false);
                $recette = $this->findOneBy();
                if($recette){
                    $error = "La recette existe déja";
                }
                else{
                    $this->add();
                    $error = "La recette a été ajoutée en BDD";
                }
            }
            else{
                $error = "Veuillez remplir tous les champs du formulaire";
            }
        }
        Template::render('navbar.php', 'footer.php','vueAddRecette.php','Recette',   
        ['script.js', 'main.js'],['style.css', 'main.css'],$error,$users);
    }
}

    // public function getRecette(){
    //     $error = "";
    //     $recettes = $this->findAll();
    //     if(empty($recettes)){
    //         $error = "Il n'y a pas de recettes sur le site";
    //     }
    //     Template::render('navbar.php','footer.php','vueAllRecette.php','Toutes les Recettes', 
    //     ['script.js', 'main.js'],['style.css', 'main.css'],$error,$recettes);
    // }


//     public function filterRecette(){
//         $error = "";
//         $recettes = $this->filterAll(5);
//         if($recettes){
//             if(isset($_POST['submit'])){
//                 if(!empty($_POST['filter'])){
//                     $recettes = $this->filterAll(Utilitaire::cleanInput($_POST['filter']));
//                 }
//             }
//         }
//         else{
//             $error = "La liste des recettes est vide ";
//         }

//         Template::render('navbar.php','footer.php','vueFilterAllRecettes.php','Filtrer recettes', 
//         ['script.js', 'main.js'], ['style.css', 'main.css'],$error, $recettes);
//     }
// }
