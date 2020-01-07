<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/abscent')) {
                // abscent_index
                if ('/abscent' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\AbscentController::indexAction',  '_route' => 'abscent_index',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_abscent_index;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'abscent_index'));
                    }

                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_abscent_index;
                    }

                    return $ret;
                }
                not_abscent_index:

                // abscent_new
                if ('/abscent/new' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\AbscentController::newAction',  '_route' => 'abscent_new',);
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_abscent_new;
                    }

                    return $ret;
                }
                not_abscent_new:

                // abscent_show
                if (preg_match('#^/abscent/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'abscent_show')), array (  '_controller' => 'AppBundle\\Controller\\AbscentController::showAction',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_abscent_show;
                    }

                    return $ret;
                }
                not_abscent_show:

                // abscent_edit
                if (preg_match('#^/abscent/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'abscent_edit')), array (  '_controller' => 'AppBundle\\Controller\\AbscentController::editAction',));
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_abscent_edit;
                    }

                    return $ret;
                }
                not_abscent_edit:

                // abscent_delete
                if (preg_match('#^/abscent/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'abscent_delete')), array (  '_controller' => 'AppBundle\\Controller\\AbscentController::deleteAction',));
                    if (!in_array($requestMethod, array('DELETE'))) {
                        $allow = array_merge($allow, array('DELETE'));
                        goto not_abscent_delete;
                    }

                    return $ret;
                }
                not_abscent_delete:

            }

            elseif (0 === strpos($pathinfo, '/activite')) {
                // activite_index
                if ('/activite' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\ActiviteController::indexAction',  '_route' => 'activite_index',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_activite_index;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'activite_index'));
                    }

                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_activite_index;
                    }

                    return $ret;
                }
                not_activite_index:

                // saveActtivity
                if ('/activite/saveActtivity' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\ActiviteController::saveActtivity',  '_route' => 'saveActtivity',);
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_saveActtivity;
                    }

                    return $ret;
                }
                not_saveActtivity:

                // activite_new
                if ('/activite/new' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\ActiviteController::newAction',  '_route' => 'activite_new',);
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_activite_new;
                    }

                    return $ret;
                }
                not_activite_new:

                // activite_show
                if (preg_match('#^/activite/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'activite_show')), array (  '_controller' => 'AppBundle\\Controller\\ActiviteController::showAction',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_activite_show;
                    }

                    return $ret;
                }
                not_activite_show:

                // activite_edit
                if (preg_match('#^/activite/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'activite_edit')), array (  '_controller' => 'AppBundle\\Controller\\ActiviteController::editAction',));
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_activite_edit;
                    }

                    return $ret;
                }
                not_activite_edit:

                // activite_delete
                if (preg_match('#^/activite/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'activite_delete')), array (  '_controller' => 'AppBundle\\Controller\\ActiviteController::deleteAction',));
                    if (!in_array($requestMethod, array('DELETE'))) {
                        $allow = array_merge($allow, array('DELETE'));
                        goto not_activite_delete;
                    }

                    return $ret;
                }
                not_activite_delete:

            }

            // attribuer_profil
            if ('/attribuer_profil' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\UserController::attribuer_profil',  '_route' => 'attribuer_profil',);
            }

            // attribuer_role
            if ('/attribuer_role' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\UserController::attribuer_role',  '_route' => 'attribuer_role',);
            }

            // nelmio_api_doc_index
            if (0 === strpos($pathinfo, '/api/doc') && preg_match('#^/api/doc(?:/(?P<view>[^/]++))?$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'nelmio_api_doc_index')), array (  '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',  'view' => 'default',));
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_nelmio_api_doc_index;
                }

                return $ret;
            }
            not_nelmio_api_doc_index:

        }

        elseif (0 === strpos($pathinfo, '/c')) {
            // login
            if ('/connexion' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\AppController::login',  '_route' => 'login',);
            }

            // confirm_registration
            if (0 === strpos($pathinfo, '/confirm_registration') && preg_match('#^/confirm_registration/(?P<id>\\d+)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'confirm_registration')), array (  '_controller' => 'AppBundle\\Controller\\AppController::confirmRegistrationAction',));
            }

            if (0 === strpos($pathinfo, '/change')) {
                // changeLanguage
                if (0 === strpos($pathinfo, '/changeLanguage') && preg_match('#^/changeLanguage/(?P<langue>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'changeLanguage')), array (  '_controller' => 'AppBundle\\Controller\\AppController::changeLanguage',));
                }

                // changepassword
                if (0 === strpos($pathinfo, '/changepassword') && preg_match('#^/changepassword/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'changepassword')), array (  '_controller' => 'AppBundle\\Controller\\AppController::changepasswordAction',));
                }

                // user_profile_pic_change
                if ('/change_profile_pic' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\UserController::submitImage',  '_route' => 'user_profile_pic_change',);
                }

            }

            elseif (0 === strpos($pathinfo, '/creche')) {
                // creche_index
                if ('/creche' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\CrecheController::indexAction',  '_route' => 'creche_index',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_creche_index;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'creche_index'));
                    }

                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_creche_index;
                    }

                    return $ret;
                }
                not_creche_index:

                // creche_new
                if ('/creche/new' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\CrecheController::newAction',  '_route' => 'creche_new',);
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_creche_new;
                    }

                    return $ret;
                }
                not_creche_new:

                // creche_show
                if (preg_match('#^/creche/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'creche_show')), array (  '_controller' => 'AppBundle\\Controller\\CrecheController::showAction',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_creche_show;
                    }

                    return $ret;
                }
                not_creche_show:

                // creche_edit
                if (preg_match('#^/creche/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'creche_edit')), array (  '_controller' => 'AppBundle\\Controller\\CrecheController::editAction',));
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_creche_edit;
                    }

                    return $ret;
                }
                not_creche_edit:

                // creche_delete
                if (preg_match('#^/creche/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'creche_delete')), array (  '_controller' => 'AppBundle\\Controller\\CrecheController::deleteAction',));
                    if (!in_array($requestMethod, array('DELETE'))) {
                        $allow = array_merge($allow, array('DELETE'));
                        goto not_creche_delete;
                    }

                    return $ret;
                }
                not_creche_delete:

            }

        }

        // register
        if ('/inscription' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\AppController::inscriptionAction',  '_route' => 'register',);
        }

        // inviter
        if ('/inviter' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\MessageController::inviterARejoindreEnseigne',  '_route' => 'inviter',);
        }

        // resetting
        if ('/resetting' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\AppController::forget_passwordAction',  '_route' => 'resetting',);
        }

        if (0 === strpos($pathinfo, '/enfant')) {
            // enfant_index
            if ('/enfant' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\EnfantController::indexAction',  '_route' => 'enfant_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_enfant_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'enfant_index'));
                }

                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_enfant_index;
                }

                return $ret;
            }
            not_enfant_index:

            // allTuteurjson
            if ('/enfant/allTuteurjson' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\EnfantController::allTuteur',  '_route' => 'allTuteurjson',);
            }

            // enfant_new
            if ('/enfant/new' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\EnfantController::newAction',  '_route' => 'enfant_new',);
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_enfant_new;
                }

                return $ret;
            }
            not_enfant_new:

            // enfant_show
            if (preg_match('#^/enfant/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'enfant_show')), array (  '_controller' => 'AppBundle\\Controller\\EnfantController::showAction',));
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_enfant_show;
                }

                return $ret;
            }
            not_enfant_show:

            // enfant_edit
            if (preg_match('#^/enfant/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'enfant_edit')), array (  '_controller' => 'AppBundle\\Controller\\EnfantController::editAction',));
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_enfant_edit;
                }

                return $ret;
            }
            not_enfant_edit:

            // change_enfant_pic
            if ('/enfant/change_enfant_pic' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\EnfantController::submitImage',  '_route' => 'change_enfant_pic',);
            }

            // enfant_delete
            if (preg_match('#^/enfant/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'enfant_delete')), array (  '_controller' => 'AppBundle\\Controller\\EnfantController::deleteAction',));
                if (!in_array($requestMethod, array('DELETE'))) {
                    $allow = array_merge($allow, array('DELETE'));
                    goto not_enfant_delete;
                }

                return $ret;
            }
            not_enfant_delete:

            if (0 === strpos($pathinfo, '/enfantmateriel')) {
                // enfantmateriel_index
                if ('/enfantmateriel' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\EnfantMaterielController::indexAction',  '_route' => 'enfantmateriel_index',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_enfantmateriel_index;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'enfantmateriel_index'));
                    }

                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_enfantmateriel_index;
                    }

                    return $ret;
                }
                not_enfantmateriel_index:

                // enfantmateriel_new
                if ('/enfantmateriel/new' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\EnfantMaterielController::newAction',  '_route' => 'enfantmateriel_new',);
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_enfantmateriel_new;
                    }

                    return $ret;
                }
                not_enfantmateriel_new:

                // enfantmateriel_show
                if (preg_match('#^/enfantmateriel/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'enfantmateriel_show')), array (  '_controller' => 'AppBundle\\Controller\\EnfantMaterielController::showAction',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_enfantmateriel_show;
                    }

                    return $ret;
                }
                not_enfantmateriel_show:

                // enfantmateriel_edit
                if (preg_match('#^/enfantmateriel/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'enfantmateriel_edit')), array (  '_controller' => 'AppBundle\\Controller\\EnfantMaterielController::editAction',));
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_enfantmateriel_edit;
                    }

                    return $ret;
                }
                not_enfantmateriel_edit:

                // enfantmateriel_delete
                if (preg_match('#^/enfantmateriel/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'enfantmateriel_delete')), array (  '_controller' => 'AppBundle\\Controller\\EnfantMaterielController::deleteAction',));
                    if (!in_array($requestMethod, array('DELETE'))) {
                        $allow = array_merge($allow, array('DELETE'));
                        goto not_enfantmateriel_delete;
                    }

                    return $ret;
                }
                not_enfantmateriel_delete:

            }

        }

        elseif (0 === strpos($pathinfo, '/historiquepaiement')) {
            // historiquepaiement_index
            if ('/historiquepaiement' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\HistoriquepaiementController::indexAction',  '_route' => 'historiquepaiement_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_historiquepaiement_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'historiquepaiement_index'));
                }

                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_historiquepaiement_index;
                }

                return $ret;
            }
            not_historiquepaiement_index:

            // historiquepaiement_new
            if ('/historiquepaiement/new' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\HistoriquepaiementController::newAction',  '_route' => 'historiquepaiement_new',);
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_historiquepaiement_new;
                }

                return $ret;
            }
            not_historiquepaiement_new:

            // historiquepaiement_show
            if (preg_match('#^/historiquepaiement/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'historiquepaiement_show')), array (  '_controller' => 'AppBundle\\Controller\\HistoriquepaiementController::showAction',));
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_historiquepaiement_show;
                }

                return $ret;
            }
            not_historiquepaiement_show:

            // historiquepaiement_edit
            if (preg_match('#^/historiquepaiement/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'historiquepaiement_edit')), array (  '_controller' => 'AppBundle\\Controller\\HistoriquepaiementController::editAction',));
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_historiquepaiement_edit;
                }

                return $ret;
            }
            not_historiquepaiement_edit:

            // historiquepaiement_delete
            if (preg_match('#^/historiquepaiement/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'historiquepaiement_delete')), array (  '_controller' => 'AppBundle\\Controller\\HistoriquepaiementController::deleteAction',));
                if (!in_array($requestMethod, array('DELETE'))) {
                    $allow = array_merge($allow, array('DELETE'));
                    goto not_historiquepaiement_delete;
                }

                return $ret;
            }
            not_historiquepaiement_delete:

        }

        elseif (0 === strpos($pathinfo, '/li')) {
            if (0 === strpos($pathinfo, '/lienfamilliale')) {
                // lienfamilliale_index
                if ('/lienfamilliale' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\LienfamillialeController::indexAction',  '_route' => 'lienfamilliale_index',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_lienfamilliale_index;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'lienfamilliale_index'));
                    }

                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_lienfamilliale_index;
                    }

                    return $ret;
                }
                not_lienfamilliale_index:

                // lienfamilliale_new
                if ('/lienfamilliale/new' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\LienfamillialeController::newAction',  '_route' => 'lienfamilliale_new',);
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_lienfamilliale_new;
                    }

                    return $ret;
                }
                not_lienfamilliale_new:

                // lienfamilliale_show
                if (preg_match('#^/lienfamilliale/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'lienfamilliale_show')), array (  '_controller' => 'AppBundle\\Controller\\LienfamillialeController::showAction',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_lienfamilliale_show;
                    }

                    return $ret;
                }
                not_lienfamilliale_show:

                // lienfamilliale_edit
                if (preg_match('#^/lienfamilliale/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'lienfamilliale_edit')), array (  '_controller' => 'AppBundle\\Controller\\LienfamillialeController::editAction',));
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_lienfamilliale_edit;
                    }

                    return $ret;
                }
                not_lienfamilliale_edit:

                // lienfamilliale_delete
                if (preg_match('#^/lienfamilliale/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'lienfamilliale_delete')), array (  '_controller' => 'AppBundle\\Controller\\LienfamillialeController::deleteAction',));
                    if (!in_array($requestMethod, array('DELETE'))) {
                        $allow = array_merge($allow, array('DELETE'));
                        goto not_lienfamilliale_delete;
                    }

                    return $ret;
                }
                not_lienfamilliale_delete:

            }

            // liste_message
            if ('/liste_message' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\MessageController::listeMessages',  '_route' => 'liste_message',);
            }

            // listuser
            if ('/listuser' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\UserController::indexaction',  '_route' => 'listuser',);
            }

        }

        // logout
        if ('/logout' === $pathinfo) {
            return array('_route' => 'logout');
        }

        if (0 === strpos($pathinfo, '/m')) {
            if (0 === strpos($pathinfo, '/materiel')) {
                // materiel_index
                if ('/materiel' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\MaterielController::indexAction',  '_route' => 'materiel_index',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_materiel_index;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'materiel_index'));
                    }

                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_materiel_index;
                    }

                    return $ret;
                }
                not_materiel_index:

                // materiel_new
                if ('/materiel/new' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\MaterielController::newAction',  '_route' => 'materiel_new',);
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_materiel_new;
                    }

                    return $ret;
                }
                not_materiel_new:

                // materiel_show
                if (preg_match('#^/materiel/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'materiel_show')), array (  '_controller' => 'AppBundle\\Controller\\MaterielController::showAction',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_materiel_show;
                    }

                    return $ret;
                }
                not_materiel_show:

                // materiel_edit
                if (preg_match('#^/materiel/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'materiel_edit')), array (  '_controller' => 'AppBundle\\Controller\\MaterielController::editAction',));
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_materiel_edit;
                    }

                    return $ret;
                }
                not_materiel_edit:

                // materiel_delete
                if (preg_match('#^/materiel/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'materiel_delete')), array (  '_controller' => 'AppBundle\\Controller\\MaterielController::deleteAction',));
                    if (!in_array($requestMethod, array('DELETE'))) {
                        $allow = array_merge($allow, array('DELETE'));
                        goto not_materiel_delete;
                    }

                    return $ret;
                }
                not_materiel_delete:

            }

            elseif (0 === strpos($pathinfo, '/manager')) {
                // file_manager
                if ('/manager' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'Artgris\\Bundle\\FileManagerBundle\\Controller\\ManagerController::indexAction',  '_route' => 'file_manager',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_file_manager;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'file_manager'));
                    }

                    return $ret;
                }
                not_file_manager:

                // file_manager_rename
                if (0 === strpos($pathinfo, '/manager/rename') && preg_match('#^/manager/rename/(?P<fileName>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'file_manager_rename')), array (  '_controller' => 'Artgris\\Bundle\\FileManagerBundle\\Controller\\ManagerController::renameFileAction',));
                }

                // file_manager_upload
                if ('/manager/upload' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'Artgris\\Bundle\\FileManagerBundle\\Controller\\ManagerController::uploadFileAction',  '_route' => 'file_manager_upload',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_file_manager_upload;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'file_manager_upload'));
                    }

                    return $ret;
                }
                not_file_manager_upload:

                // file_manager_file
                if (0 === strpos($pathinfo, '/manager/file') && preg_match('#^/manager/file/(?P<fileName>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'file_manager_file')), array (  '_controller' => 'Artgris\\Bundle\\FileManagerBundle\\Controller\\ManagerController::binaryFileResponseAction',));
                }

                // file_manager_delete
                if ('/manager/delete/' === $pathinfo) {
                    $ret = array (  '_controller' => 'Artgris\\Bundle\\FileManagerBundle\\Controller\\ManagerController::deleteAction',  '_route' => 'file_manager_delete',);
                    if (!in_array($requestMethod, array('DELETE'))) {
                        $allow = array_merge($allow, array('DELETE'));
                        goto not_file_manager_delete;
                    }

                    return $ret;
                }
                not_file_manager_delete:

            }

            elseif (0 === strpos($pathinfo, '/me')) {
                if (0 === strpos($pathinfo, '/medicament')) {
                    // medicament_index
                    if ('/medicament' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\MedicamentController::indexAction',  '_route' => 'medicament_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_medicament_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'medicament_index'));
                        }

                        if (!in_array($canonicalMethod, array('GET'))) {
                            $allow = array_merge($allow, array('GET'));
                            goto not_medicament_index;
                        }

                        return $ret;
                    }
                    not_medicament_index:

                    // medicament_new
                    if ('/medicament/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\MedicamentController::newAction',  '_route' => 'medicament_new',);
                        if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                            $allow = array_merge($allow, array('GET', 'POST'));
                            goto not_medicament_new;
                        }

                        return $ret;
                    }
                    not_medicament_new:

                    // medicament_show
                    if (preg_match('#^/medicament/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'medicament_show')), array (  '_controller' => 'AppBundle\\Controller\\MedicamentController::showAction',));
                        if (!in_array($canonicalMethod, array('GET'))) {
                            $allow = array_merge($allow, array('GET'));
                            goto not_medicament_show;
                        }

                        return $ret;
                    }
                    not_medicament_show:

                    // medicament_edit
                    if (preg_match('#^/medicament/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'medicament_edit')), array (  '_controller' => 'AppBundle\\Controller\\MedicamentController::editAction',));
                        if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                            $allow = array_merge($allow, array('GET', 'POST'));
                            goto not_medicament_edit;
                        }

                        return $ret;
                    }
                    not_medicament_edit:

                    // medicament_delete
                    if (preg_match('#^/medicament/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'medicament_delete')), array (  '_controller' => 'AppBundle\\Controller\\MedicamentController::deleteAction',));
                        if (!in_array($requestMethod, array('DELETE'))) {
                            $allow = array_merge($allow, array('DELETE'));
                            goto not_medicament_delete;
                        }

                        return $ret;
                    }
                    not_medicament_delete:

                }

                // media
                if (0 === strpos($pathinfo, '/media') && preg_match('#^/media/(?P<element>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'media')), array (  '_controller' => 'AppBundle\\Controller\\UserController::media',));
                }

                if (0 === strpos($pathinfo, '/memo')) {
                    // memo_index
                    if ('/memo' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\MemoController::indexAction',  '_route' => 'memo_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_memo_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'memo_index'));
                        }

                        if (!in_array($canonicalMethod, array('GET'))) {
                            $allow = array_merge($allow, array('GET'));
                            goto not_memo_index;
                        }

                        return $ret;
                    }
                    not_memo_index:

                    // savememo
                    if ('/memo/savememo' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\MemoController::saveMemo',  '_route' => 'savememo',);
                    }

                    // memo_new
                    if ('/memo/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\MemoController::newAction',  '_route' => 'memo_new',);
                        if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                            $allow = array_merge($allow, array('GET', 'POST'));
                            goto not_memo_new;
                        }

                        return $ret;
                    }
                    not_memo_new:

                    // memo_show
                    if (preg_match('#^/memo/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'memo_show')), array (  '_controller' => 'AppBundle\\Controller\\MemoController::showAction',));
                        if (!in_array($canonicalMethod, array('GET'))) {
                            $allow = array_merge($allow, array('GET'));
                            goto not_memo_show;
                        }

                        return $ret;
                    }
                    not_memo_show:

                    // memo_edit
                    if (preg_match('#^/memo/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'memo_edit')), array (  '_controller' => 'AppBundle\\Controller\\MemoController::editAction',));
                        if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                            $allow = array_merge($allow, array('GET', 'POST'));
                            goto not_memo_edit;
                        }

                        return $ret;
                    }
                    not_memo_edit:

                    // memo_delete
                    if (preg_match('#^/memo/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'memo_delete')), array (  '_controller' => 'AppBundle\\Controller\\MemoController::deleteAction',));
                        if (!in_array($requestMethod, array('DELETE'))) {
                            $allow = array_merge($allow, array('DELETE'));
                            goto not_memo_delete;
                        }

                        return $ret;
                    }
                    not_memo_delete:

                }

            }

        }

        // demande_enseigne
        if ('/demande' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\MessageController::demanderARejoindreEnseigne',  '_route' => 'demande_enseigne',);
        }

        if (0 === strpos($pathinfo, '/p')) {
            if (0 === strpos($pathinfo, '/paiement')) {
                // reglement
                if (0 === strpos($pathinfo, '/paiement/reglement') && preg_match('#^/paiement/reglement/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'reglement')), array (  '_controller' => 'AppBundle\\Controller\\PaiementController::reglement',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_reglement;
                    }

                    return $ret;
                }
                not_reglement:

                // paiement_index
                if ('/paiement' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\PaiementController::indexAction',  '_route' => 'paiement_index',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_paiement_index;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'paiement_index'));
                    }

                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_paiement_index;
                    }

                    return $ret;
                }
                not_paiement_index:

                if (0 === strpos($pathinfo, '/paiement/recqche')) {
                    // recqcheInfos
                    if ('/paiement/recqcheInfos' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\PaiementController::recqcheInfos',  '_route' => 'recqcheInfos',);
                    }

                    // recqchePeriodAssurance
                    if ('/paiement/recqchePeriodAssurance' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\PaiementController::recqchePeriodAssurance',  '_route' => 'recqchePeriodAssurance',);
                    }

                    // recqchePeriodScolarite
                    if ('/paiement/recqchePeriodScolarite' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\PaiementController::recqchePeriodScolarite',  '_route' => 'recqchePeriodScolarite',);
                    }

                }

                // saveHistorique
                if ('/paiement/saveHistorique' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\PaiementController::saveHistorique',  '_route' => 'saveHistorique',);
                }

                // paiement_new
                if ('/paiement/new' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\PaiementController::newAction',  '_route' => 'paiement_new',);
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_paiement_new;
                    }

                    return $ret;
                }
                not_paiement_new:

                // paiement_show
                if (preg_match('#^/paiement/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'paiement_show')), array (  '_controller' => 'AppBundle\\Controller\\PaiementController::showAction',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_paiement_show;
                    }

                    return $ret;
                }
                not_paiement_show:

                // paiement_edit
                if (preg_match('#^/paiement/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'paiement_edit')), array (  '_controller' => 'AppBundle\\Controller\\PaiementController::editAction',));
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_paiement_edit;
                    }

                    return $ret;
                }
                not_paiement_edit:

                // paiement_delete
                if (preg_match('#^/paiement/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'paiement_delete')), array (  '_controller' => 'AppBundle\\Controller\\PaiementController::deleteAction',));
                    if (!in_array($requestMethod, array('DELETE'))) {
                        $allow = array_merge($allow, array('DELETE'));
                        goto not_paiement_delete;
                    }

                    return $ret;
                }
                not_paiement_delete:

            }

            elseif (0 === strpos($pathinfo, '/poste')) {
                // poste_index
                if ('/poste' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\PosteController::indexAction',  '_route' => 'poste_index',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_poste_index;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'poste_index'));
                    }

                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_poste_index;
                    }

                    return $ret;
                }
                not_poste_index:

                // poste_new
                if ('/poste/new' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\PosteController::newAction',  '_route' => 'poste_new',);
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_poste_new;
                    }

                    return $ret;
                }
                not_poste_new:

                // poste_show
                if (preg_match('#^/poste/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'poste_show')), array (  '_controller' => 'AppBundle\\Controller\\PosteController::showAction',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_poste_show;
                    }

                    return $ret;
                }
                not_poste_show:

                // poste_edit
                if (preg_match('#^/poste/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'poste_edit')), array (  '_controller' => 'AppBundle\\Controller\\PosteController::editAction',));
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_poste_edit;
                    }

                    return $ret;
                }
                not_poste_edit:

                // poste_delete
                if (preg_match('#^/poste/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'poste_delete')), array (  '_controller' => 'AppBundle\\Controller\\PosteController::deleteAction',));
                    if (!in_array($requestMethod, array('DELETE'))) {
                        $allow = array_merge($allow, array('DELETE'));
                        goto not_poste_delete;
                    }

                    return $ret;
                }
                not_poste_delete:

            }

            // user_profile
            if ('/profile' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\UserController::userProfileAction',  '_route' => 'user_profile',);
            }

        }

        elseif (0 === strpos($pathinfo, '/tuteur')) {
            // tuteur_index
            if ('/tuteur' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\TuteurController::indexAction',  '_route' => 'tuteur_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_tuteur_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'tuteur_index'));
                }

                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_tuteur_index;
                }

                return $ret;
            }
            not_tuteur_index:

            // tuteur_new
            if ('/tuteur/new' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\TuteurController::newAction',  '_route' => 'tuteur_new',);
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_tuteur_new;
                }

                return $ret;
            }
            not_tuteur_new:

            // tuteur_show
            if (preg_match('#^/tuteur/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'tuteur_show')), array (  '_controller' => 'AppBundle\\Controller\\TuteurController::showAction',));
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_tuteur_show;
                }

                return $ret;
            }
            not_tuteur_show:

            // tuteur_edit
            if (preg_match('#^/tuteur/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'tuteur_edit')), array (  '_controller' => 'AppBundle\\Controller\\TuteurController::editAction',));
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_tuteur_edit;
                }

                return $ret;
            }
            not_tuteur_edit:

            // tuteur_delete
            if (preg_match('#^/tuteur/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'tuteur_delete')), array (  '_controller' => 'AppBundle\\Controller\\TuteurController::deleteAction',));
                if (!in_array($requestMethod, array('DELETE'))) {
                    $allow = array_merge($allow, array('DELETE'));
                    goto not_tuteur_delete;
                }

                return $ret;
            }
            not_tuteur_delete:

        }

        // user_home
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\UserController::userHomePageAction',  '_route' => 'user_home',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_user_home;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'user_home'));
            }

            return $ret;
        }
        not_user_home:

        if (0 === strpos($pathinfo, '/user_')) {
            // user_delete
            if (0 === strpos($pathinfo, '/user_delete') && preg_match('#^/user_delete/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_delete')), array (  '_controller' => 'AppBundle\\Controller\\UserController::deleteAction',));
            }

            // user_lock
            if (0 === strpos($pathinfo, '/user_lock') && preg_match('#^/user_lock/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_lock')), array (  '_controller' => 'AppBundle\\Controller\\UserController::userlockAction',));
            }

            // user_unlock
            if (0 === strpos($pathinfo, '/user_unlock') && preg_match('#^/user_unlock/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_unlock')), array (  '_controller' => 'AppBundle\\Controller\\UserController::userunlockAction',));
            }

        }

        // userSave
        if ('/userSave' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\UserController::userSave',  '_route' => 'userSave',);
        }

        if (0 === strpos($pathinfo, '/vaccin')) {
            // vaccin_index
            if ('/vaccin' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\VaccinController::indexAction',  '_route' => 'vaccin_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_vaccin_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'vaccin_index'));
                }

                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_vaccin_index;
                }

                return $ret;
            }
            not_vaccin_index:

            // vaccin_new
            if ('/vaccin/new' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\VaccinController::newAction',  '_route' => 'vaccin_new',);
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_vaccin_new;
                }

                return $ret;
            }
            not_vaccin_new:

            // vaccin_show
            if (preg_match('#^/vaccin/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'vaccin_show')), array (  '_controller' => 'AppBundle\\Controller\\VaccinController::showAction',));
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_vaccin_show;
                }

                return $ret;
            }
            not_vaccin_show:

            // vaccin_edit
            if (preg_match('#^/vaccin/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'vaccin_edit')), array (  '_controller' => 'AppBundle\\Controller\\VaccinController::editAction',));
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_vaccin_edit;
                }

                return $ret;
            }
            not_vaccin_edit:

            // vaccin_delete
            if (preg_match('#^/vaccin/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'vaccin_delete')), array (  '_controller' => 'AppBundle\\Controller\\VaccinController::deleteAction',));
                if (!in_array($requestMethod, array('DELETE'))) {
                    $allow = array_merge($allow, array('DELETE'));
                    goto not_vaccin_delete;
                }

                return $ret;
            }
            not_vaccin_delete:

            if (0 === strpos($pathinfo, '/vaccinenattente')) {
                // vaccinenattente_index
                if ('/vaccinenattente' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\VaccinenattenteController::indexAction',  '_route' => 'vaccinenattente_index',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_vaccinenattente_index;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'vaccinenattente_index'));
                    }

                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_vaccinenattente_index;
                    }

                    return $ret;
                }
                not_vaccinenattente_index:

                // vaccinenattente_new
                if ('/vaccinenattente/new' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\VaccinenattenteController::newAction',  '_route' => 'vaccinenattente_new',);
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_vaccinenattente_new;
                    }

                    return $ret;
                }
                not_vaccinenattente_new:

                // vaccinenattente_show
                if (preg_match('#^/vaccinenattente/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'vaccinenattente_show')), array (  '_controller' => 'AppBundle\\Controller\\VaccinenattenteController::showAction',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_vaccinenattente_show;
                    }

                    return $ret;
                }
                not_vaccinenattente_show:

                // vaccinenattente_edit
                if (preg_match('#^/vaccinenattente/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'vaccinenattente_edit')), array (  '_controller' => 'AppBundle\\Controller\\VaccinenattenteController::editAction',));
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_vaccinenattente_edit;
                    }

                    return $ret;
                }
                not_vaccinenattente_edit:

                // vaccinenattente_delete
                if (preg_match('#^/vaccinenattente/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'vaccinenattente_delete')), array (  '_controller' => 'AppBundle\\Controller\\VaccinenattenteController::deleteAction',));
                    if (!in_array($requestMethod, array('DELETE'))) {
                        $allow = array_merge($allow, array('DELETE'));
                        goto not_vaccinenattente_delete;
                    }

                    return $ret;
                }
                not_vaccinenattente_delete:

            }

            elseif (0 === strpos($pathinfo, '/vacciner')) {
                // vacciner_index
                if ('/vacciner' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\VaccinerController::indexAction',  '_route' => 'vacciner_index',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_vacciner_index;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'vacciner_index'));
                    }

                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_vacciner_index;
                    }

                    return $ret;
                }
                not_vacciner_index:

                // vacciner_new
                if ('/vacciner/new' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\VaccinerController::newAction',  '_route' => 'vacciner_new',);
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_vacciner_new;
                    }

                    return $ret;
                }
                not_vacciner_new:

                // vacciner_show
                if (preg_match('#^/vacciner/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'vacciner_show')), array (  '_controller' => 'AppBundle\\Controller\\VaccinerController::showAction',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_vacciner_show;
                    }

                    return $ret;
                }
                not_vacciner_show:

                // vacciner_edit
                if (preg_match('#^/vacciner/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'vacciner_edit')), array (  '_controller' => 'AppBundle\\Controller\\VaccinerController::editAction',));
                    if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                        $allow = array_merge($allow, array('GET', 'POST'));
                        goto not_vacciner_edit;
                    }

                    return $ret;
                }
                not_vacciner_edit:

                // vacciner_delete
                if (preg_match('#^/vacciner/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'vacciner_delete')), array (  '_controller' => 'AppBundle\\Controller\\VaccinerController::deleteAction',));
                    if (!in_array($requestMethod, array('DELETE'))) {
                        $allow = array_merge($allow, array('DELETE'));
                        goto not_vacciner_delete;
                    }

                    return $ret;
                }
                not_vacciner_delete:

            }

        }

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
