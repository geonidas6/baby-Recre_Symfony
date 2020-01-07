<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Creche;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\User\InMemoryUserProvider;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\MonologBundle\SwiftMailer;
use Symfony\Bundle\SwiftmailerBundle;

use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class AppController extends Controller
{
    
    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Methode qui permet  de se connexion",
     *  filters={
     *      {"name"="a-filter", "dataType"="integer"},
     *      {"name"="another-filter", "dataType"="string", "pattern"="(foo|bar) ASC|DESC"}
     *  }
     * )
     *
     * @Route("/connexion", name="login")
     */
    public function login(Request $request , AuthenticationUtils $authenticationUtils)
    {


        // get the login error if there is one
        //$authenticationUtils = $this->get("security.authentication_utils");

        

        $error = $authenticationUtils->getLastAuthenticationError();
        $langue = (($request->getSession()->get('Langue') == null))?$request->getDefaultLocale():$request->getSession()->get('Langue');
        $request->getSession()->set('Langue',$langue);
            // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();


        return $this->render('app/user/login.html.twig', array(
                    'last_username' => $lastUsername,
                    'error'         => $error,
                ));
    }


    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Methode qui permet  de changer les langues",
     * )
     *
     * @Route("/changeLanguage/{langue}", name="changeLanguage")
     */
    public function changeLanguage(Request $request)
    {
        $url = $request->get('url');
        $langue = $request->get('langue');
        $request->getSession()->set('Langue',$langue);
        return $this->redirectToRoute('user_home');
    }

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Methode qui permet de  s'inscrir",
     * )
     *
     * @Route("/inscription", name="register")
     */
    public function inscriptionAction(Request $request, UserPasswordEncoderInterface $userPasswordEncoder )
    {
        $mailer = $this->get("swiftmailer.mailer.default");
        $user = new User();
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        $dial = "";

        if($form->isSubmitted() && $form->isValid()){
            $user->setPassword($userPasswordEncoder->encodePassword($user,$form->get('plainPassword')->getData()));
            $user->setTel($form->get('tel')->getData());
            $user->setSexe($form->get('sexe')->getData());
            $user->setEnabled(true);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // On envoie un mail a l'individu sur lequel il doit cliquer pour activer son compte
            $message = (new \Swift_Message("Confirmez votre inscription"))
                ->setFrom("antarus@antarus.net")->setTo($user->getEmail())
                ->setBody($this->renderView("app/user/registration_confirm.html.twig",array("id"=>$user->getId())),"text/html");
            $mailer->send($message);
            $this->get('session')->getFlashBag()->add("message","Vous avez été inscrit avec succès, 
                                Veuillez activer votre compte en cliquant sur le lien qui a ete envoyé dans votre boite mail");
           return $this->redirectToRoute('login');
        }

        return $this->render("app/user/register.html.twig", array('form'=>$form->createView()));

    }

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Methode de confirmation après connexion",
     *  filters={
     *      {"name"="id", "dataType"="integer"},
     *  }
     * )
     *
     * @Route("/confirm_registration/{id}", name="confirm_registration", requirements={"id"="\d+"})
     */
    public function confirmRegistrationAction($id){

        $em=$this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        if(null !== $user){
            $user->setEnabled(true);
            $em->persist($user);
            $em->flush();
            $this->get('session')->getFlashBag()->add("message","Votre compte a ete activé avec succès");
        }else{
            $this->get('session')->getFlashBag()->add("message","Impossible d'effectuer l'opération");
        }
        return $this->redirectToRoute('login');
    }


    /**
     *
     *@ApiDoc(
     *  resource=true,
     *  description="Methode qui permet  de récupérer le mot de passe",
     * )
     * @Route("/resetting", name="resetting")
     */
    public function forget_passwordAction(Request $request )
    {
        $mailer = $this->get("swiftmailer.mailer.default");
        if($request->get('data')){
                $data = $request->get('data');
               // dump($email['email']);
            $em=$this->getDoctrine()->getManager();
            $user = $em->getRepository(User::class)->findOneBy(['email'=>$data['email']]);
            if(null !== $user){
                $message = (new \Swift_Message("Récupérer votre mot de pass"))
                    ->setFrom("antarus@antarus.net")->setTo($data['email'])
                    ->setBody($this->renderView("app/user/change_password.html.twig",array("id"=>$user->getId())),"text/html");
                $mailer->send($message);


                $this->get('session')->getFlashBag()->add("message","Un mail contenant votre mot de passe vous été envoyer");
            }else{
                $this->get('session')->getFlashBag()->add("message","Ce utilisteur n'existe pas dans notre base");
            }
        }

        return $this->render('app/user/forget_password.html.twig');
    }

    /**
     *@ApiDoc(
     *  resource=true,
     *  description="Methode qui permet  de changer de mot de passe",
     *  filters={
     *      {"name"="id", "dataType"="integer"},
     *  }
     * )
     * @Route("/changepassword/{id}", name="changepassword")
     */
    public function changepasswordAction(Request $request, UserPasswordEncoderInterface $userPasswordEncoder){
        $em=$this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($request->get('id'));


        if($request->get('data')) {
            $data = $request->get('data');

            //dump($request->get('data'));
            //die('fin');
           $user->setPassword($userPasswordEncoder->encodePassword($user, $data['passwordOne']));
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->get('session')->getFlashBag()->add("message","Mot de passe modifier avec succès");
            return $this->redirectToRoute('login');
        }

        return $this->render('app/user/form_changepassword.html.twig',['user'=>$request->get('id')]);
    }

}
