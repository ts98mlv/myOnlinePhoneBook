<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthentificationController extends AbstractController
{
    /**
     * @Route("/", name="HomePage")
     * show home page
     */
    public function showHomePage(): Response
    {
        /* formulaire d'inscription */
        $inscriptionForm = $this->createFormBuilder()
        ->add('login', TextType::class)
        ->add('email', EmailType::class)
        ->add('pass', PasswordType::class)
        ->getForm();


        /* affichage de la vue */
        return $this->render('authentification/HomePage.html.twig', [
            'controller_name' => 'AuthentificationController',
            'inscriptionForm' => $inscriptionForm->createView()
        ]);
    }

    /**
     * @Route("/api/accounts/add", name="addAccount")
     * add account
     */
    public function addAccount(Request $request){
        $posted_datas = "";

        // si le verbe http n'est pas du post alors on rejète la requete
        if(!$request->isMethod("POST")){
            return $this->json(["message" => "Le verbe http n'est pas bon !", "status" => 403], 403);
        }

        // on récupère les données en POST
        $posted_datas = ($_POST["account_creation"]) ? $_POST["account_creation"] : null;
        if(! isset($posted_datas)){
            return $this->json(["message" => "Aucune donnée n'a été trouvée ou elles sont incomplètes", "status" => 500], 500);
        }

        //décodage des données
        $posted_datas = json_decode($posted_datas);

        //création du user
        $accountManager = $this->getDoctrine()->getManager();

        $account = new User();
        $account->setLogin($posted_datas["login"]);
        $account->setEmail($posted_datas["email"]);
        $account->setPass(password_hash($posted_datas["pass"], PASSWORD_DEFAULT));

        $accountManager->persist();
        $accountManager->flush();

        //retour de la fonction
        return $this->json([
            "message" => "ajout réussi !",
            "status" => "200",
            "user" => [
                "id" => $account->getId(),
                "email" => $account->setEmail(),
                "login" => $account->getLogin()
            ]
        ], 200);
    }
}
