<?php
/**
 * Created by PhpStorm.
 * User: geonidas
 * Date: 07/05/2019
 * Time: 16:08
 */

namespace AppBundle\Service;
use AppBundle\Entity\Message;
use AppBundle\Entity\Relation;
use AppBundle\URLTest;
use Doctrine\ORM\EntityManager;

class UtilService
{
    protected $em ;

    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    function isDateBetweenDates($date,$startDate,  $endDate) {
        return $date > $startDate && $date < $endDate;
    }



    public function AllClasseOfProfByEnseigne($user,$enseigne){


        $relation_user_enseigne = $this->em->getRepository('AppBundle:Relation')->findOneBy(
            [
                "enseigne"=>$enseigne,
                "user"=>$user,
            ]
        );
        $professeur_classe_matiers = $this->em->getRepository('AppBundle:Professeur_classe_matier')->findBy(
            [
                "enseigne"=>$enseigne,
                "professeur"=>$relation_user_enseigne,
            ]
        );
        return $professeur_classe_matiers;
    }

    public function ListMatierByClasseSerie($classe_serie_id){

        $Enseigne_classe_matier = $this->em->getRepository('AppBundle:Enseigne_classe_matier')->findBy(
            [
                "enseigneClasseSerie"=> $this->em->getRepository('AppBundle:Enseigne_classe_serie')->find($classe_serie_id),
                "enseigne"=> $this->em->getRepository('AppBundle:Enseigne_classe_serie')->find($classe_serie_id)->getEnseigne(),
            ]
        );
        $tab_matier = [];
        foreach ($Enseigne_classe_matier as $MatierObjetVal){
            $tab_matier []=
                [
                    "id"=>$MatierObjetVal->getMatier()->getId(),
                    "nom"=>$MatierObjetVal->getMatier()->getNom(),

                ]
            ;
        }
        return $tab_matier;
    }

    public function ListEdutianByProfByHerAllClasseWherHeTeach($PersonneQUiVeutVoir,$enseigne){

        $Professeur_classe_matier = $this->em->getRepository('AppBundle:Professeur_classe_matier')->findBy([
            "professeur"=>$PersonneQUiVeutVoir,
            "enseigne"=>$enseigne
        ]);
        $etudiant_Enseigne_classe_series = [];
        foreach ($Professeur_classe_matier as $infosenseigneclassemaiter){
            $enseigneclasseserie[] = $infosenseigneclassemaiter->getEnseigneclassematier()->getEnseigneClasseSerie();
            $etudiant_Enseigne_classe_series = $this->em->getRepository('AppBundle:Etudiant_Enseigne_classe_serie')->findBy([
                "enseigneclasseserie"=>$enseigneclasseserie,
            ]);
            //die( count($etudiant_Enseigne_classe_series));
        }
        return $etudiant_Enseigne_classe_series;
    }


    public function ListEdutianByProfByHerClasseWherHeTeach($id_claseserie){

        $Enseigne_classe_serie = $this->em->getRepository('AppBundle:Enseigne_classe_serie')->find($id_claseserie);
        $etudiant_Enseigne_classe_series= $this->em->getRepository('AppBundle:Etudiant_Enseigne_classe_serie')->findBy([
            "enseigneclasseserie"=>$Enseigne_classe_serie,]);
        return $etudiant_Enseigne_classe_series;
    }

    public function calculage($datestart, $datend){

        $interval = date_diff($datestart,$datend);
        $age_lib = '';
        if ($interval->format('%R%a') > 30){
            $age = ($interval->format('%R%a')/30);
            $age_lib = 'mois';
            if ($interval->format('%R%a') > 365){
                $age = ($interval->format('%R%a')/30)/12;
                $age_lib = 'ans';
            }
        }else{
            $age_lib = 'jour';
            $age = $interval->format('%R%a');
        }
        return ["nbr"=>$age,"lib"=>$age_lib];
    }

    /**
     * send SMS to parent
     * @param $num
     * @param $msg
     * @param string $from
     */
    function sendSmsMessage($num,$msg,$from='STEP-ALL'){
        $url='sendmsg.php?';
        $url.='user=magmatel2';
        $url.='&password=SMSmagamatelys2@2017';
        $url.='&from='.urlencode(trim($from));
        $url.='&to='.$num;
        $url.='&text='.urlencode($msg);
        $url.='&api=6355';
        return $results=file('http://74.207.224.67/api/http/'.$url);
        //return file_get_contents('http://74.207.224.67/api/http/'.$url);
        //en local se script s'arrete car il n'arive pas à ateindre le cible
        //die();

    }

    const COURS_INDEX = "COURS_INDEX";
    const COURS_NEW = "COURS_NEW";
    const ETUDIENTCLASSESERIE_INDEX = "ETUDIENTCLASSESERIE_INDEX";
    const EVALUATION_NEW = "EVALUATION_NEW";
    const EVALUATION_INDEX = "EVALUATION_INDEX";
    public function ProfilAutoriser($action,$tab_user_profile =[]){

        //cours index
        $relation = new Relation();
        if ($action == UtilService::COURS_INDEX){
            $tab_profil_acepter = [
                "'".$relation::Enseignants."'",
                "'".$relation::Etudiant."'",
                "'".$relation::Parents."'",
                "'".$relation::Tuteurs."'",
                "'".$relation::Directeur_des_etude."'",
                "'".$relation::Secretaires."'",
                "'".$relation::Administrator."'",
                "'".$relation::Directeurs_generaux."'",
                "'".$relation::Fondateurs."'",
                "'".$relation::Surveillants."'"
            ];
        }elseif ($action == UtilService::COURS_NEW){
            $tab_profil_acepter = [
                "'".$relation::Enseignants."'",
            ];
        }elseif ($action == UtilService::ETUDIENTCLASSESERIE_INDEX){
            $tab_profil_acepter = [
                "'".$relation::Enseignants."'",
                "'".$relation::Directeur_des_etude."'",
                "'".$relation::Secretaires."'",
                "'".$relation::Administrator."'",
            ];
        }elseif ($action == UtilService::EVALUATION_NEW){
            $tab_profil_acepter = [
                "'".$relation::Enseignants."'",
            ];
        }elseif ($action == UtilService::EVALUATION_INDEX){
            $tab_profil_acepter = [
                "'".$relation::Enseignants."'",
                "'".$relation::Administrator."'",
            ];
        }



        $autoriser = array_intersect($tab_profil_acepter,$tab_user_profile);

        if (empty($autoriser) )
            return false;

        return true;



    }
}
