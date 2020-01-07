<?php

/* app/user/login.html.twig */
class __TwigTemplate_65a64e0ec63828d4aebc5f9442acfe31f4e4ba6b8af1ff9cbd7c10ff83b85774 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

  <title id=\"title\"> Crèche Recré | S'identifier </title>

  <!-- Bootstrap -->
  <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("vendors/bootstrap/dist/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
  <!-- Font Awesome -->
  <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
  <!-- NProgress -->
  <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/nprogress.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
  <!-- Animate.css -->
  <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/animate.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

  <!-- Custom Theme Style -->
  <link href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/custom.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
  <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.jpg"), "html", null, true);
        echo "\" />

  <link href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("vendors/material-design-iconic-font/dist/css/material-design-iconic-font.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
  <link href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("vendors/animate.css/animate.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
  <link href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

  <style>

    body {
      background-image: url(\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/background-2633962_960_720.jpg"), "html", null, true);
        echo "\");

    }
  </style>
</head>

<body >
<div id=\"preloader\">
  <div class=\"refresh-preloader\"><div class=\"preloader\"><i>.</i><i>.</i><i>.</i></div></div>
</div>
<div>
  <a class=\"hiddenanchor\" id=\"signup\"></a>
  <a class=\"hiddenanchor\" id=\"signin\"></a>

  <div class=\"login_wrapper\">
    <div class=\"animate form login_form\">
      <section class=\"panel login_content\">
        <form class=\"panel-body\" id=\"login_form\" action=\"";
        // line 49
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("login");
        echo "\" method=\"post\" >
        <h1 >Connectez vous</h1>

            ";
        // line 52
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", []), "flashBag", []), "get", [0 => "message"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 53
            echo "              <div >
                  ";
            // line 54
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
              </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "

          <span class=\"red\">";
        // line 59
        if ((($context["error"] ?? null) != "")) {
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans($this->getAttribute(($context["error"] ?? null), "messageKey", [])), "html", null, true);
            echo " ";
        }
        echo "</span>
          <div>
            <input type=\"text\" id=\"username\" name=\"_username\" class=\"form-control\" placeholder=\"Identifiant\" required />
          </div>
          <div>
            <input type=\"password\" id=\"password\" name=\"_password\" class=\"form-control\" placeholder=\"Mot de passe\" required />
          </div>
          <div style=\"margin-left: 25%\">
            <!--a id=\"submit\" class=\"btn btn-primary submit\" href=\"#\">Connexion</a--->
            <input type=\"submit\"  class=\"btn btn-primary \" value=\"Connexion\">
          </div>

          <div class=\"clearfix\"></div>

          <div class=\"separator\">
            <p class=\"change_link\">Nouveau sur le site?
              <a href=\"";
        // line 75
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("register");
        echo " \" class=\"to_register\" id=\"title_register\"> Créer un compte </a>
            </p>
            <p class=\"change_link\">
              <a href=\"";
        // line 78
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("resetting");
        echo " \" class=\"reste\" id=\"title_reste\"> mot de passe perdu?</a>
            </p>

            <div class=\"clearfix\"></div>
            <br />

            <div>
              <h1><img src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/favicon.jpg"), "html", null, true);
        echo "\" width=\"40\" height=\"40\"/> Crèche Recré</h1>
              <p>©2018 All Rights Reserved. Crèche Recré</p>
            </div>
          </div>
        </form>
      </section>
    </div>

    <div id=\"register\" class=\"animate form registration_form\">
      <section class=\"login_content\">
        <form id=\"register_form\" action=\"";
        // line 95
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("register");
        echo "\" method=\"post\">
          <h2>Inscrivez vous</h2>
          <div class=\"row\">
            <div class=\"col col-lg-6\">
              <div ><input type=\"text\" id=\"user_lastName\" name=\"user[lastName]\" required=\"required\" placeholder=\"Nom de famille\" class=\"form-control\" /></div>
            </div>
            <div class=\"col col-lg-6\">
              <div ><input type=\"text\" id=\"user_firstName\" name=\"user[firstName]\" required=\"required\" placeholder=\"Prénoms\" class=\"form-control\" /></div>
            </div>
          </div>
          <div class=\"row\">
            <div class=\"col col-lg-6\">
              <div ><input type=\"email\" id=\"user_email\" name=\"user[email]\" required=\"required\" placeholder=\"Email\" class=\"form-control\" /></div>
            </div>
            <div class=\"col col-lg-6\">
              <div ><input type=\"text\" id=\"user_username\" name=\"user[username]\" required=\"required\" placeholder=\"Identifiant\" class=\"form-control\" /></div>
            </div>
          </div>
          <div ><input type=\"password\" id=\"user_plainPassword_first\" name=\"user[plainPassword][first]\" required=\"required\" placeholder=\"Mot de passe\" class=\"form-control\" /></div>    <div ><input type=\"password\" id=\"user_plainPassword_second\" name=\"user[plainPassword][second]\" required=\"required\" placeholder=\"Saisir à nouveau\" class=\"form-control\" /></div>
          <input type=\"hidden\" id=\"user__token\" name=\"user[_token]\" value=\"n9QjlyCSZBUmRWTr0-SlTx6FrUF-hKyZUKCTJjKKHoU\" />
          <input type=\"submit\"  class=\"btn btn-primary \" value=\"Soumettre\">
        </form>


        <div class=\"clearfix\"></div>

        <div class=\"separator\">
          <p class=\"change_link\">Déjà membre ?
            <a href=\"#signin\" class=\"to_register\" id=\"title_login\"> S'identifier </a>
          </p>

          <div class=\"clearfix\"></div>
          <br />

          <div>
            <h1><img src=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/inetschools.jpg"), "html", null, true);
        echo "\" width=\"40\" height=\"40\"/> Antarus!</h1>
            <p>©2018 All Rights Reserved. Antarus</p>
          </div>
        </div>
        </form>
      </section>
    </div>
  </div>
</div>
</body>
</html>

<script src=\"";
        // line 142
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("vendors/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
<script>
    sessionStorage.removeItem('messageid');
    \$(function(){
        \$(\"#submit\").on('click',function(e){
            e.preventDefault();
            \$(\"#login_form\").submit();
        })

        \$(\"#submit_register\").on('click',function(e){
            e.preventDefault();
            \$(\"#register_form\").submit();
        })
    });


    \$('#preloader').height(\$(window).height() + \"px\");
    \$(window).on('load', function(){
        setTimeout(function(){
            \$('body').css(\"overflow-y\",\"visible\");
            \$('#preloader').fadeOut(400);
        }, 800);
    });


</script>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "app/user/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  230 => 142,  215 => 130,  177 => 95,  164 => 85,  154 => 78,  148 => 75,  125 => 59,  121 => 57,  112 => 54,  109 => 53,  105 => 52,  99 => 49,  79 => 32,  71 => 27,  67 => 26,  63 => 25,  58 => 23,  54 => 22,  48 => 19,  43 => 17,  38 => 15,  33 => 13,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "app/user/login.html.twig", "/opt/lampp/htdocs/paroise/app/Resources/views/app/user/login.html.twig");
    }
}
