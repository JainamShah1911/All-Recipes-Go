<?php

/* searchform.html.twig */
class __TwigTemplate_c3d2fcca4ddcbb64ccbcfdfa539422fa91c8f53ff5adff221f5770b3325ee959 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'searchform' => array($this, 'block_searchform'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["twigTemplate"] = "searchform.html.twig";
        // line 2
        $context["scope"] = "searchform";
        // line 3
        echo "
";
        // line 4
        $this->displayBlock('searchform', $context, $blocks);
    }

    public function block_searchform($context, array $blocks = array())
    {
        // line 5
        echo "
    <form role=\"search\" method=\"get\" class=\"search-form form\" action=\"";
        // line 6
        echo $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "url", array());
        echo "/\">
        <label>
            <span class=\"screen-reader-text\">";
        // line 8
        echo call_user_func_array($this->env->getFunction('__')->getCallable(), array("Search for:", "g5_hydrogen"));
        echo "</span>
            <input type=\"search\" class=\"search-field\" placeholder=\"";
        // line 9
        echo call_user_func_array($this->env->getFunction('__')->getCallable(), array("Search …", "g5_hydrogen"));
        echo "\" value=\"\" name=\"s\" title=\"";
        echo call_user_func_array($this->env->getFunction('__')->getCallable(), array("Search for:", "g5_hydrogen"));
        echo "\" />
        </label>
        <input type=\"submit\" class=\"search-submit button\" value=\"Search\" />
    </form>

";
    }

    public function getTemplateName()
    {
        return "searchform.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 9,  41 => 8,  36 => 6,  33 => 5,  27 => 4,  24 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "searchform.html.twig", "C:\\wamp64\\www\\wordpress\\wp-content\\themes\\g5_hydrogen\\views\\searchform.html.twig");
    }
}
