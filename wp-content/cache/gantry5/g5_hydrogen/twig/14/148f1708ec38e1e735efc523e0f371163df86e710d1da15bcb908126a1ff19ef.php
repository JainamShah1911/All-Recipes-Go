<?php

/* @nucleus/content/particle.html.twig */
class __TwigTemplate_bf7b82c8578c12d89e7d18b2eeae1297a50d556184ea2bb9ba5e4958444e6a9e extends Twig_Template
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
        try {            // line 2
            echo "    ";
            $context["id"] = $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "id", array());
            // line 3
            echo "    ";
            if ((isset($context["noConfig"]) ? $context["noConfig"] : null)) {
                // line 4
                echo "        ";
                $context["enabled"] = true;
                // line 5
                echo "        ";
                $context["particle"] = $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array());
                // line 6
                echo "    ";
            } else {
                // line 7
                echo "        ";
                $context["enabled"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("particles." . $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "subtype", array())) . ".enabled"), 1 => 1), "method");
                // line 8
                echo "        ";
                $context["particle"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "getJoined", array(0 => ("particles." . $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "subtype", array())), 1 => $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array())), "method");
                // line 9
                echo "    ";
            }
            // line 10
            echo "
    ";
            // line 11
            ob_start();
            // line 12
            echo "        ";
            if (((isset($context["enabled"]) ? $context["enabled"] : null) && ((null === $this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "enabled", array())) || $this->getAttribute($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "attributes", array()), "enabled", array())))) {
                // line 13
                echo "            ";
                $this->loadTemplate(array(0 => (("particles/" . $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "subtype", array())) . ".html.twig"), 1 => (("@particles/" . $this->getAttribute(                // line 14
(isset($context["segment"]) ? $context["segment"] : null), "subtype", array())) . ".html.twig"), 2 => "@nucleus/content/missing.html.twig"), "@nucleus/content/particle.html.twig", 13)->display($context);
                // line 16
                echo "        ";
            }
            // line 17
            echo "    ";
            $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 18
            echo "
    ";
            // line 19
            $context["classes"] = trim(((( !(isset($context["inContent"]) ? $context["inContent"] : null)) ? ("g-content g-particle ") : ("g-particle ")) . twig_join_filter($this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "classes", array()), " ")));
            // line 20
            echo "    ";
            if (trim((isset($context["html"]) ? $context["html"] : null))) {
                // line 21
                echo "    <div class=\"";
                echo twig_escape_filter($this->env, (isset($context["classes"]) ? $context["classes"] : null), "html", null, true);
                echo "\">
        ";
                // line 22
                echo (isset($context["html"]) ? $context["html"] : null);
                echo "
    </div>
    ";
            }
            // line 25
            echo "
";
        } catch (\Exception $e) {
            if ($context['gantry']->debug()) throw $e;
            GANTRY_DEBUGGER && method_exists('Gantry\Debugger', 'addException') && \Gantry\Debugger::addException($e);
            $context['e'] = $e;
            // line 27
            echo "    <div class=\"alert alert-error\"><strong>Error</strong> while rendering ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["segment"]) ? $context["segment"] : null), "subtype", array()), "html", null, true);
            echo " particle.</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@nucleus/content/particle.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 27,  81 => 25,  75 => 22,  70 => 21,  67 => 20,  65 => 19,  62 => 18,  59 => 17,  56 => 16,  54 => 14,  52 => 13,  49 => 12,  47 => 11,  44 => 10,  41 => 9,  38 => 8,  35 => 7,  32 => 6,  29 => 5,  26 => 4,  23 => 3,  20 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@nucleus/content/particle.html.twig", "C:\\wamp64\\www\\wordpress\\wp-content\\plugins\\gantry5\\engines\\nucleus\\templates\\content\\particle.html.twig");
    }
}
