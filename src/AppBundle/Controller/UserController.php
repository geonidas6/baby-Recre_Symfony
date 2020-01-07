<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Activite;
use AppBundle\Entity\Anneeacademique;
use AppBundle\Entity\Creche;
use AppBundle\Entity\Enfant;
use AppBundle\Entity\Enseigne;
use AppBundle\Entity\Image;
use AppBundle\Entity\Lienfamilliale;
use AppBundle\Entity\Paiement;
use AppBundle\Entity\Poste;
use AppBundle\Entity\Relation;
use AppBundle\Entity\Tuteur;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use AppBundle\Service\FileUploader;
use AppBundle\Service\UtilService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends Controller
{
    /**
     * @Route("/", name="user_home")
     */
    public function userHomePageAction(Request $request,UtilService $utilService){
        $em = $this->getDoctrine()->getManager();
        $Creche = $em->getRepository(Creche::class)->findAll();
        if (count($Creche) == 0){
            $request->getSession()->getFlashBag()->add('notice', ['message'=>"Vous devez d'abord entrez les informations de la crèche",'type'=>'info','title'=>'Info']);
            return $this->redirectToRoute('creche_new');
        }
        $tab_enfant_age = [];
        $tab_enfant_age_nom = [];
        $enfant = $em->getRepository(Enfant::class)->findAll();
        if (count($enfant) > 0){
            foreach ($enfant as $key =>$value){
                $age =  $utilService->calculage($value->getDatenaissance(), new \DateTime(date("Y-m-d H:m:s")));
                if ($age['lib'] != 'ans'){
                    $age['nbr'] = 0;
                }
                array_push($tab_enfant_age, number_format($age['nbr'],0));
                array_push($tab_enfant_age_nom,$value->getNom());
            }
        }

/*dump(implode("','",$tab_enfant_age_nom));
dump(implode(",",$tab_enfant_age));
        die();*/
        $tab_enfant_age_nom =   implode("','",$tab_enfant_age_nom);
        $tab_enfant_age =   implode(",",$tab_enfant_age);
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $userInfo = ['firstName'=>$user->getFirstName(),'lastName'=>$user->getLastName(),
            'email'=>$user->getEmail(), 'username'=>$user->getUsername(), 'image'=>$user->getImage()];
        return $this->render("@App/user/home.html.twig",[
            'userinfo'=>$userInfo,
            'tab_enfant_ages'=>$tab_enfant_age,
            'tab_enfant_age_noms'=>$tab_enfant_age_nom,
            'activiters'=>$em->getRepository(Activite::class)->findBy([],['id'=>'DESC'],6),
            'nbruser'=>count($em->getRepository(User::class)->findAll()),
            'nbrenfant'=>count($em->getRepository(Enfant::class)->findAll()),
            'nbruserlock'=>count($em->getRepository(User::class)->findBy(['locked'=>true])),
        ]);
    }

    public function statEnfant(){

    }



    /**
     * Lists all medium entities.
     *
     * @Route("/media/{element}", name="media")
     */
    public function media(Request $request)
    {
        $tab_photo = [];
        if ($handle = opendir(__DIR__.'/../../../web/uploads/enfant/')) {
            /* This is the correct way to loop over the directory. */
            //dump($handle);

            while (false !== ($entry = readdir($handle))) {
                if ((strpos($entry,'.jpeg') != false) || (strpos($entry,'.jpg') !=false) || (strpos($entry,'.png') !=false)){
                    $tab_photo[] = [
                        "link"=>'uploads/enfant/',
                        "name"=>$entry
                    ];
                }
            }

            /* This is the WRONG way to loop over the directory. */
            while ($entry = readdir($handle)) {
                if ((strpos($entry,'.jpeg') != false) || (strpos($entry,'.jpg') !=false) || (strpos($entry,'.png') !=false)){
                    $tab_photo[] = [
                        "link"=>'uploads/enfant/',
                        "name"=>$entry
                    ];
                }

            }

            closedir($handle);

        }
        if ($handle = opendir(__DIR__.'/../../../web/uploads/profile/')) {
            /* This is the correct way to loop over the directory. */
            //dump($handle);

            while (false !== ($entry = readdir($handle))) {
                if ((strpos($entry,'.jpeg') != false) || (strpos($entry,'.jpg') !=false) || (strpos($entry,'.png') !=false)){
                    $tab_photo[] = [
                        "link"=>'uploads/profile/',
                        "name"=>$entry
                    ];
                }

            }

            /* This is the WRONG way to loop over the directory. */
            while ($entry = readdir($handle)) {
                if ((strpos($entry,'.jpeg') != false) || (strpos($entry,'.jpg') !=false) || (strpos($entry,'.png') !=false)){
                    $tab_photo[] = [
                        "link"=>'uploads/profile/',
                        "name"=>$entry
                    ];
                }
            }

            closedir($handle);
        }
        $nb = $request->query->get('nb',12);
        $paginator = $this->get('knp_paginator');
        $tab_photo = $paginator->paginate($tab_photo,
            $request->query->get('page',1),$nb);
        $em = $this->getDoctrine()->getManager();
        $Image = $em->getRepository(Image::class)->findAll();
//        $Enfant = $em->getRepository(Enfant::class)->findAll();
        if ($request->get('element') == 'enfant')
            return $this->render("@App/user/gallerie/media_enfant.html.twig",[
//                'Enfant'=>$Enfant,
                'tab_photos'=>$tab_photo,
            ]);

        if ($request->get('element') == 'gallerie')
            return $this->render("@App/user/gallerie/media.html.twig",['images'=>$Image]);
    }



    /**
     * @Route("/profile", name="user_profile")
     */
    public function userProfileAction(Request $request, UserPasswordEncoderInterface $userPasswordEncoder){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $userInfo = ['firstName'=>$user->getFirstName(),'lastName'=>$user->getLastName(),
            'email'=>$user->getEmail(), 'username'=>$user->getUsername(), 'image'=>$user->getImage(),'tel'=>$user->getTel(),'dateajout'=>$user->getDateAjout()];
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);
        $dial = "";
        if($form->isSubmitted() && $form->isValid()){
            $user->setPassword($userPasswordEncoder->encodePassword($user,$form->get('plainPassword')->getData()));
            $em = $this->getDoctrine()->getManager();
           // $em->persist($user);
            $em->flush();
            $notification = $this->get('translator')->trans("Opération reussie",[],'user',  $request->getSession()->get('Langue'));
            $this->get('session')->getFlashBag()->add("notice",array('title'=>$notification,'type'=>'success','message'=>'Profil modifié avec succès'));
            $userInfo = ['firstName'=>$user->getFirstName(),
                'lastName'=>$user->getLastName(), 'email'=>$user->getEmail(), 'username'=>$user->getUsername(),'image'=>$user->getImage(),'tel'=>$user->getTel(),'dateajout'=>$user->getDateAjout()];
        }else{
           // $request->getSession()->getFlashBag()->add('notice', ['message'=>'Vérifier les données saisies.','type'=>'error','title'=>'Error']);

        }

        return $this->render("@App/user/profile.html.twig",['form'=>$form->createView(),'userinfo'=>$userInfo,  ]);
    }

    /**
     * @Route("/change_profile_pic", name="user_profile_pic_change")
     */
    public function submitImage(Request $request, FileUploader $updater){
        $file = $request->files->get('picture');
        $acceptable= array("gif","png","jpg","jpeg");
        if(null !== $file && in_array($file->guessExtension(),$acceptable)){
            //  $file
            $fileName = $updater->upload($file,$this->getParameter("profile_pic_directory"));
            $em =$this->getDoctrine()->getManager();
            $user = $this->getUser();
            $image = new Image();
            $image->setName($fileName);
            $user->setImage($image);
            $em->persist($user);
            $em->flush();
            return $this->json(array("success"=>true,
										'name'=>$fileName));
        }

        return new Response(
						$this->json(array("success"=>false,'message'=>"Veuillez soumettre une image valide")),
						Response::HTTP_NOT_ACCEPTABLE,
						array('content-type' => 'application/json'));
    }

    public function asideRenderer(){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $userInfo = ['firstName'=>$user->getFirstName(),'lastName'=>$user->getLastName(),
            'email'=>$user->getEmail(), 'username'=>$user->getUsername(), 'image'=>$user->getImage(),
            'user_role'=>$user->getRole()];
        $nbrEnf = $em->getRepository(Enfant::class)->findAll();
        $nbrTuteur = $em->getRepository(Tuteur::class)->findAll();
        return $this->render("app/user/aside.html.twig",[
            'userinfo'=>$userInfo,
            'nbrEnf'=>count($nbrEnf),
            'nbrTuteur'=>count($nbrTuteur),
            ]);
    }

    /**
     * récupere la liste des enfant et de leur vaccin en attents
     * @return array
     */
    public function Enfant_notify_vaccin(){
        $em = $this->getDoctrine()->getManager();
        $enfant = $em->getRepository("AppBundle:Enfant")->findAll();
        $tab_enfant_vaccin = [];
        foreach ($enfant as $key=>$value){
            $vaccinerJointureENfant = $em->getRepository("AppBundle:Vacciner")->findByEnfant($value);
            if ((count($vaccinerJointureENfant) > 0) && (count($em->getRepository("AppBundle:Vaccin")->findAll()) > count($vaccinerJointureENfant) )){
                //enfant qui ont reçus au moin un vaccin
                //TODO: récuperer la liste des vaccin quil n'a pas reçus
                $vaccin = $em->getRepository("AppBundle:Vaccin")->Vacciner_enfant($value->getId());
                $tab_enfant_vaccin[] = [
                    "enfant"=>$value,
                    "vaccin_restant"=>$vaccin
                ];
            }elseif(count($vaccinerJointureENfant) == 0){
                //enfant qui n'on reçus aucun vaccin
                $vaccin = $em->getRepository("AppBundle:Vaccin")->Vacciner_enfant($value->getId());
                $tab_enfant_vaccin[] = [
                    "enfant"=>$value,
                    "vaccin_restant"=>$vaccin
                ];
            }
        }
       return $tab_enfant_vaccin;
    }

    public function paiement_attent(UtilService $utilService){
        $em = $this->getDoctrine()->getManager();
        $enfant = $em->getRepository("AppBundle:Enfant")->findAll();
        $tab_enfant_vaccin = [];
        foreach ($enfant as $key=>$value){
            $Paiement = $em->getRepository("AppBundle:Paiement")->findByEnfant($value);
            if ((count($Paiement) > 0) ){
                $inscription_existe = $em->getRepository("AppBundle:Paiement")->findBy([
                    'enfant'=>$value,
                    'type'=>Paiement::INSCRIPTION
                ]);
                $assurance_enregle = $em->getRepository("AppBundle:Paiement")->findBy([
                    'enfant'=>$value,
                    'type'=>Paiement::ASSURANCE
                ]);

                if (count($inscription_existe) == 0){
                    $tab_enfant_vaccin[] = [
                        "enfant"=>$value,
                        "Alert"=>"Veillez payer les frais d'inscription pour cet enfant!"
                    ];
                }
                if (count($assurance_enregle) == 0){
                    $tab_enfant_vaccin[] = [
                        "enfant"=>$value,
                        "Alert"=>"Veillez payer les frais d'assurance pour cet enfant!"
                    ];
                }else{
                  $intervale  =  $utilService->calculage($assurance_enregle[count($assurance_enregle)-1]->getDatepaiement(),  new \DateTime(date("Y-m-d H:m:s")));
                  if (($intervale['lib'] = 'mois') && ($intervale['nbr'] > 11 )){
                      $tab_enfant_vaccin[] = [
                          "enfant"=>$value,
                          "Alert"=>"l'assurance de cet enfant a expirer depuis ". ($intervale['nbr']-11)." mois!"
                      ];
                  }elseif (($intervale['lib'] = 'ans') && ($intervale['nbr'] > 11)){
                      $tab_enfant_vaccin[] = [
                          "enfant"=>$value,
                          "Alert"=>"l'assurance de cet enfant a expirer depuis plusieurs années!"
                      ];
                  }
                }

            }elseif(count($Paiement) == 0){
                $tab_enfant_vaccin[] = [
                    "enfant"=>$value,
                    "Alert"=>"cet enfant n'a encore payer ni frais d'assurance ni frais d'inscription!"
                ];
            }
        }

        return $tab_enfant_vaccin;
    }


        public function scolariter_alert(){
            $em = $this->getDoctrine()->getManager();
            $Paiement = $em->getRepository("AppBundle:Paiement")->paiement_impayer();
            return $Paiement;
        }

        public function tuteur_alert(){
            $em = $this->getDoctrine()->getManager();
            $Lienfamilliale = $em->getRepository("AppBundle:Lienfamilliale")->findBy([
                'nominationlien'=>[Lienfamilliale::MERE,Lienfamilliale::PERE],
                'tuteur'=>$em->getRepository("AppBundle:Tuteur")->findBy([
                    'email'=>null,
                    'telwhat'=>null
                ])
            ]);
           /* dump($Lienfamilliale);
            die();*/
            return $Lienfamilliale;
        }






    public function topRenderer(Request $request, UtilService $utilService){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $userInfo = ['firstName'=>$user->getFirstName(),'lastName'=>$user->getLastName(),
            'email'=>$user->getEmail(), 'username'=>$user->getUsername(), 'image'=>$user->getImage()];
        $messages = $this->getDoctrine()->getRepository("AppBundle:Message")->findBy(['recipient'=>$user,"read"=>false]);


        $vaccinEnenttennt = $this->Enfant_notify_vaccin();
        $paiement_retard = $this->paiement_attent($utilService);
        $Lienfamilliale = $this->tuteur_alert();
        $memo = $this->getDoctrine()->getRepository("AppBundle:Memo")->findAll();
        $request->getSession()->set('memo',$memo);
         $scolarit_restant =   $this->scolariter_alert();
        return $this->render("app/user/top.html.twig",[
            'userinfo'=>$userInfo,
            'messages'=>$messages,
            'vaccinEnttents'=>$vaccinEnenttennt,
            'paiement_retards'=>$paiement_retard,
            'scolarit_restants'=>$scolarit_restant,
            'Lienfamilliales'=>$Lienfamilliale,
            'nbrnotif'=>count($vaccinEnenttennt)+count($paiement_retard)+count($scolarit_restant)+count($Lienfamilliale)

        ]);
    }

    public function sideRenderer(){
        return $this->render("app/user/side-panel.html.twig");
    }

    public function deskopmsgpRenderer(){
        $user = $this->getUser();
        $userInfo = ['firstName'=>$user->getFirstName(),'lastName'=>$user->getLastName(),
            'email'=>$user->getEmail(), 'username'=>$user->getUsername(), 'image'=>$user->getImage()];
        $messages = $this->getDoctrine()->getRepository("AppBundle:Message")->findBy(['recipient'=>$user,"read"=>false]);
        return $this->render("app/user/deskop_push.html.twig",['userinfo'=>$userInfo, 'messages'=>$messages]);
    }





    /**
     * @Route("/listuser", name="listuser")
     */
    public function indexaction(Request $request){

        $user = $this->getUser();
        if($user->getRole() == User::ROLE_ADMIN){
            $userInfo = ['firstName'=>$user->getFirstName(),'lastName'=>$user->getLastName(),
                'email'=>$user->getEmail(), 'username'=>$user->getUsername(), 'image'=>$user->getImage()];

            $AllUser = $this->getDoctrine()->getRepository(User::class)->findAll();


            return $this->render("@App/user/list_user.html.twig",[
                'userinfo'=>$userInfo,
                'AllUser'=>$AllUser,
            ]);
        }else{
            $data = [
                'message' => "vous nest pas autoriser a acceder a cette page",
            ];
            return $this->json($data, '404');
        }

    }



    /**
     *
     * @Route("user_delete/{id}", name="user_delete")
     */
    public function deleteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getDoctrine()->getRepository(User::class)->find($request->get('id'));
        $em->remove($user);
        $em->flush();


        return $this->redirectToRoute('listuser');
    }

    /**
     *
     * @Route("user_lock/{id}", name="user_lock")
     */
    public function userlockAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getDoctrine()->getRepository(User::class)->find($request->get('id'));
        $user->setLocked(true);
        $em->flush();


        return $this->redirectToRoute('listuser');
    }

    /**
     *
     * @Route("user_unlock/{id}", name="user_unlock")
     */
    public function userunlockAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getDoctrine()->getRepository(User::class)->find($request->get('id'));
        $user->setLocked(false);
        $em->flush();


        return $this->redirectToRoute('listuser');
    }

    /**
     * @Route("/userSave", name="userSave")
     */
    public function userSave(Request $request, UserPasswordEncoderInterface $userPasswordEncoder )
    {
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

            $this->get('session')->getFlashBag()->add("message","Vous avez été inscrit avec succès, 
                                Veuillez activer votre compte en cliquant sur le lien qui a ete envoyé dans votre boite mail");
            return $this->redirectToRoute('listuser');
        }

        return $this->render("@App/user/user_new", array('form'=>$form->createView()));

    }


    /**
     *
     * @Route("attribuer_profil", name="attribuer_profil")
     */
    public function attribuer_profil(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository(User::class)->findAll();
        $post = $em->getRepository(Poste::class)->findAll();
        $data = $request->get('data');
//        dump($data);
//        die();
        if ($data != null){
            $Utilisateur =  $em->getRepository(User::class)->find($data['user']);
            $Poste =  $em->getRepository(Poste::class)->find($data['post']);
            $Utilisateur->setPost($Poste);
            $em->flush();

            return $this->redirectToRoute('listuser');
        }

        return $this->render("@App/user/attribution_poste", array(
            'users'=>$user,
            'postes'=>$post,
        ));
    }

    /**
     *
     * @Route("attribuer_role", name="attribuer_role")
     */
    public function attribuer_role(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository(User::class)->findAll();
        $data = $request->get('data');
        if ($data != null){
            $Utilisateur =  $em->getRepository(User::class)->find($data['user']);
            $Utilisateur->setRole($data['role']);
            $em->flush();

            return $this->redirectToRoute('listuser');
        }

        return $this->render("@App/user/attribution_role", array(
            'users'=>$user,
        ));
    }


}
