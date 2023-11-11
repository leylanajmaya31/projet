<?php
    //!import du fichier de configuration
    include './env.php';
    //!import de l'autoloader des classes
    require_once './autoload.php';
    require_once './vendor/autoload.php';
    use App\Controller\UtilisateurController;
    use App\Controller\RoleController;
    use App\Controller\HomeController;
    use App\Controller\RecetteController;
    use App\Controller\CommentaireController;
    $userController = new UtilisateurController();  
    $roleController = new RoleController();
    $homeController = new HomeController();   
    $recetteController = new RecetteController();
    $commentaireController = new CommentaireController();  
    //!utilisation de session_start(pour gérer la connexion au serveur)
    session_start();
    //!Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //!test si l'url posséde une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //!version connecté
    if(isset($_SESSION['connected'])){
        //routeur
        switch ($path) {
            case '/projet':
                $homeController->getHome();
                break;
            case '/projet/roleadd':
                $roleController->addRole();
                break;
            case '/projet/userdeconnexion':
                $userController->deconnexionUser();
                break;
            case '/projet/recetteadd':
                $recetteController->addRecette();
                break;
            // case '/projet/recetteall':
            //     $recetteController->getAllRecette();
            //     break;
            // case '/projet/recetteupdate':
            //     $recetteController->updateRecette();
            //     break;
            case '/projet/emailtest':
                $homeController->testMail();
                break;
            // case '/projet/projetfilter':
            //     $recetteController->filterRecette();
            //     break;
            case '/projett/commentaireadd':
                $commentaireController->addCommentaire();
                break;
            case '/projet/commentaireall':
                $commentaireController->allCommentaire();
                break;
            default:
                $homeController->get404();
                break;
        }
    }
    //!Version deconnecté
    else{
        switch ($path) {
            case '/projet/':
                $homeController->getHome();
                break;
            case '/projet/userconnexion':
                $userController->connexionUser();
                break;
            case '/projet/useradd':
                $userController->addUser();
                break;
            // case '/projet/recetteall':
            //     $recetteController->getAllRecette();
            //     break;
            case '/projet/emailtest':
                $homeController->testMail();
                break;
            case '/projet/useractivate':
                $userController->activateUser();
                break;
            // case '/projet/recettefilter':
            //     $recetteController->filterRecette();
            //     break;
            case '/projet/commentaireall':
                $commentaireController->allCommentaire();
                break;
            case '/projet/commentaireadd':
            case '/projet/recetteupdate':
                $homeController->get401();
                break;
            default:
                $homeController->get404();
                break;
        }
    }
?>
