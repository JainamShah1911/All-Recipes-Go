<?php

/* bbpress.html.twig */
class __TwigTemplate_77786eba0041d6a20c91dea55a2e51ceb6f26c2ccf81b0bcdf23385ab2b70edd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("partials/page.html.twig", "bbpress.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "partials/page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["twigTemplate"] = "bbpress.html.twig";
        // line 3
        $context["scope"] = "bbpress";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    <div class=\"platform-content\">
        <div class=\"bbpress-content\">

            <article class=\"g-content ";
        // line 10
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "class", array());
        echo "\" id=\"content-";
        echo (isset($context["scope"]) ? $context["scope"] : null);
        echo "\">
                ";
        // line 11
        echo (isset($context["content"]) ? $context["content"] : null);
        echo "
            </article>

        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "bbpress.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 11,  42 => 10,  36 => 6,  33 => 5,  29 => 1,  27 => 3,  25 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "bbpress.html.twig", "C:\\wamp64\\www\\wordpress\\wp-content\\themes\\g5_hydrogen\\views\\bbpress.html.twig");
    }
}
