<?php

/* @gantry-admin/partials/navigation.html.twig */
class __TwigTemplate_7be71eabbe31e35c2adac3d6d0d82ec9918d7465aed75d605deea70141b2ebea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"g-grid\">
    <div class=\"g-block navbar-block\">
        <nav id=\"gantry\">
            ";
        // line 4
        $context["style"] = ((twig_in_filter((isset($context["location"]) ? $context["location"] : null), array(0 => "menu", 1 => "about", 2 => "configurations"))) ? (" style=\"overflow: hidden; height: 0; visibility: hidden;\"") : (""));
        // line 5
        echo "            <section id=\"navbar\"";
        echo (isset($context["style"]) ? $context["style"] : null);
        echo ">
                <ul>
                    ";
        // line 7
        $this->loadTemplate("partials/configuration-selector.html.twig", "@gantry-admin/partials/navigation.html.twig", 7)->display($context);
        // line 8
        echo "                    <li ";
        echo ((((isset($context["location"]) ? $context["location"] : null) == "configurations/styles")) ? ("class=\"active\"") : (""));
        echo ">
                        <a data-g5-ajaxify=\"\"
                           data-g5-nav=\"styles\"
                           data-g5-ajaxify-target=\"[data-g5-content-wrapper]\"
                           data-g5-ajaxify-params=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array("navbar" => true)), "html_attr");
        echo "\"
                           href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["configuration"]) ? $context["configuration"] : null), 2 => "styles"), "method"), "html", null, true);
        echo "\"
                        >
                            <i class=\"fa fa-fw fa-adjust\"></i><span>";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_STYLES"), "html", null, true);
        echo "</span>
                        </a>
                    </li>
                    <li ";
        // line 18
        echo ((((isset($context["location"]) ? $context["location"] : null) == "configurations/content")) ? ("class=\"active\"") : (""));
        echo ">
                        <a data-g5-ajaxify=\"\"
                           data-g5-nav=\"content\"
                           data-g5-ajaxify-target=\"[data-g5-content-wrapper]\"
                           data-g5-ajaxify-params=\"";
        // line 22
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array("navbar" => true)), "html_attr");
        echo "\"
                           href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["configuration"]) ? $context["configuration"] : null), 2 => "content"), "method"), "html", null, true);
        echo "\"
                        >
                            <i class=\"fa fa-fw fa-file-text-o\"></i><span>";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_CONTENT"), "html", null, true);
        echo "</span>
                        </a>
                    </li>
                    ";
        // line 28
        if ((((isset($context["location"]) ? $context["location"] : null) == "configurations/settings") || $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "particles", array()), "overrides", array(0 => (isset($context["configuration"]) ? $context["configuration"] : null)), "method"))) {
            // line 29
            echo "                    <li ";
            echo ((((isset($context["location"]) ? $context["location"] : null) == "configurations/settings")) ? ("class=\"active\"") : (""));
            echo ">
                        <a data-g5-ajaxify=\"\"
                           data-g5-nav=\"settings\"
                           data-g5-ajaxify-target=\"[data-g5-content-wrapper]\"
                           data-g5-ajaxify-params=\"";
            // line 33
            echo twig_escape_filter($this->env, twig_jsonencode_filter(array("navbar" => true)), "html_attr");
            echo "\"
                           href=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["configuration"]) ? $context["configuration"] : null), 2 => "settings"), "method"), "html", null, true);
            echo "\"
                        >
                            <i class=\"fa fa-fw fa-wrench\"></i><span>";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PARTICLE_DEFAULTS"), "html", null, true);
            echo "</span>
                        </a>
                    </li>
                    ";
        }
        // line 40
        echo "                    <li ";
        echo ((((isset($context["location"]) ? $context["location"] : null) == "configurations/page")) ? ("class=\"active\"") : (""));
        echo ">
                        <a data-g5-ajaxify=\"\"
                           data-g5-nav=\"page\"
                           data-g5-ajaxify-target=\"[data-g5-content-wrapper]\"
                           data-g5-ajaxify-params=\"";
        // line 44
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array("navbar" => true)), "html_attr");
        echo "\"
                           href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["configuration"]) ? $context["configuration"] : null), 2 => "page"), "method"), "html", null, true);
        echo "\"
                        >
                            <i class=\"fa fa-fw fa-list-alt\"></i><span>";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PAGESETTINGS"), "html", null, true);
        echo "</span>
                        </a>
                    </li>
                    <li ";
        // line 50
        echo ((((isset($context["location"]) ? $context["location"] : null) == "configurations/layout")) ? ("class=\"active\"") : (""));
        echo ">
                        <a data-g5-ajaxify=\"\"
                           data-g5-nav=\"layout\"
                           data-g5-nav-url=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["configuration"]) ? $context["configuration"] : null), 2 => "layout"), "method"), "html", null, true);
        echo "\"
                           data-g5-ajaxify-target=\"[data-g5-content-wrapper]\"
                           data-g5-ajaxify-params=\"";
        // line 55
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array("navbar" => true)), "html_attr");
        echo "\"
                           href=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["configuration"]) ? $context["configuration"] : null), 2 => "layout"), "method"), "html", null, true);
        echo "\"
                        >
                            <i class=\"fa fa-fw fa-columns\"></i><span>";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LAYOUT"), "html", null, true);
        echo "</span>
                        </a>
                    </li>
                    ";
        // line 61
        if ((((isset($context["configuration"]) ? $context["configuration"] : null) && ((isset($context["configuration"]) ? $context["configuration"] : null) != "default")) &&  !(is_string($__internal_c18acb2bcd4f5d33af7e574a994ac9c9925fe524c34204a74464b5815842a3ca = (isset($context["configuration"]) ? $context["configuration"] : null)) && is_string($__internal_a8a218b0486a7c42bae4fcb511ef6a51f6f00d6d8892ab86259f76531651f12f = "_") && ('' === $__internal_a8a218b0486a7c42bae4fcb511ef6a51f6f00d6d8892ab86259f76531651f12f || 0 === strpos($__internal_c18acb2bcd4f5d33af7e574a994ac9c9925fe524c34204a74464b5815842a3ca, $__internal_a8a218b0486a7c42bae4fcb511ef6a51f6f00d6d8892ab86259f76531651f12f))))) {
            // line 62
            echo "                    <li ";
            echo ((((isset($context["location"]) ? $context["location"] : null) == "configurations/assignments")) ? ("class=\"active\"") : (""));
            echo ">
                        <a data-g5-ajaxify=\"\"
                           data-g5-nav=\"assignments\"
                           data-g5-ajaxify-target=\"[data-g5-content-wrapper]\"
                           data-g5-ajaxify-params=\"";
            // line 66
            echo twig_escape_filter($this->env, twig_jsonencode_filter(array("navbar" => true)), "html_attr");
            echo "\"
                           href=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "configurations", 1 => (isset($context["configuration"]) ? $context["configuration"] : null), 2 => "assignments"), "method"), "html", null, true);
            echo "\"
                        >
                            <i class=\"fa fa-fw fa-check-square-o\"></i><span>";
            // line 69
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ASSIGNMENTS"), "html", null, true);
            echo "</span>
                        </a>
                    </li>
                    ";
        }
        // line 73
        echo "                </ul>
            </section>
        </nav>
        <a href=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "themes"), "method"), "html", null, true);
        echo "\" aria-hidden=\"true\" tabindex=\"-1\">
            <svg version=\"1.1\" id=\"gantry-logo\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" width=\"81px\" height=\"28.239px\" viewBox=\"0 0 81 28.239\" style=\"enable-background:new 0 0 81 28.239;\" xml:space=\"preserve\">
                <g>
                    <path style=\"fill:#a0a0a0;\" d=\"M8.101,26.332c2.639-0.358,4.636-2.603,4.672-5.311l0.008-1.451l-1.184,0.847
                        c-1.255,0.903-2.734,1.38-4.27,1.38C3.288,21.797,0,18.511,0,14.471c0-4.039,3.286-7.325,7.325-7.325
                        c1.633,0,3.182,0.483,4.481,1.491l0.198,0.104h2.694V20.95c0,3.792-2.969,6.92-6.597,7.289V26.332z M7.325,9.039
                        c-2.995,0-5.432,2.437-5.432,5.432c0,2.996,2.437,5.433,5.432,5.433s5.432-2.437,5.432-5.433
                        C12.757,11.476,10.32,9.039,7.325,9.039 M74.403,26.332c2.639-0.358,4.683-2.603,4.719-5.311l0.032-1.451l-1.172,0.847
                        c-1.256,0.903-2.725,1.38-4.26,1.38c-3.914,0-7.07-3.024-7.235-6.938V14.37V8.741H68.3v6.418c0.275,2.577,2.682,4.768,5.413,4.768
                        c2.692,0,5.331-2.28,5.467-4.589h0.005V8.741H81v12.507l-0.014,0.395c-0.169,1.807-1.016,3.48-2.359,4.711
                        c-1.171,1.073-2.575,1.728-4.224,1.885V26.332z M24.114,21.797c-4.039,0-7.325-3.286-7.325-7.326c0-4.039,3.286-7.325,7.325-7.325
                        c4.037,0,7.404,3.282,7.407,7.319v0.014c-0.002,0.033,0,0.838,0,0.838v4.641h-2.683l-0.199,0.212
                        C27.333,21.198,25.768,21.797,24.114,21.797 M24.114,9.039c-2.996,0-5.433,2.437-5.433,5.432c0,2.996,2.437,5.433,5.433,5.433
                        s5.432-2.437,5.432-5.433C29.546,11.476,27.109,9.039,24.114,9.039 M57.415,19.957V8.741h2.732l0.167-0.111
                        c1.099-0.846,2.379-1.313,3.698-1.448v1.906c-2.474,0.332-4.319,2.328-4.598,4.799l-0.015,0.228l-0.005,0.473v5.37H57.415z
                         M51.808,19.957V7.422h-2.309V5.443h2.309V0h1.979v5.443h2.144v1.979h-2.144v12.535H51.808z M46.695,19.957v-6.103
                        c-0.16-2.616-2.559-4.816-5.347-4.816c-2.787,0-5.539,2.518-5.539,4.828v0.836v0.74v4.515h-1.814V8.576h2.868l0.192-0.085
                        c1.261-0.915,2.746-1.372,4.292-1.372c4.037,0,7.32,3.294,7.326,7.329l0.002,0.016c-0.003,0.038-0.002,0.083-0.002,0.124v0.768
                        v4.602H46.695z\"/>
                </g>
            </svg>
        </a>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/partials/navigation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 76,  180 => 73,  173 => 69,  168 => 67,  164 => 66,  156 => 62,  154 => 61,  148 => 58,  143 => 56,  139 => 55,  134 => 53,  128 => 50,  122 => 47,  117 => 45,  113 => 44,  105 => 40,  98 => 36,  93 => 34,  89 => 33,  81 => 29,  79 => 28,  73 => 25,  68 => 23,  64 => 22,  57 => 18,  51 => 15,  46 => 13,  42 => 12,  34 => 8,  32 => 7,  26 => 5,  24 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@gantry-admin/partials/navigation.html.twig", "C:\\wamp64\\www\\wordpress\\wp-content\\plugins\\gantry5\\admin\\templates\\partials\\navigation.html.twig");
    }
}
