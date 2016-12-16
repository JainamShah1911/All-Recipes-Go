<?php

/* partials/messages.html.twig */
class __TwigTemplate_a4653811bc01b968cca3e1a24f35bb7dced053de074f1e7dcf832b32283ed329 extends Twig_Template
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
        echo "<div id=\"system-message-container\">
    <div id=\"system-message\">
        ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) ? $context["messages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 4
            echo "        <div class=\"alert alert-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["message"], "type", array()), "html", null, true);
            echo "\">
            <div>
                <p>";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute($context["message"], "message", array()), "html", null, true);
            echo "</p>
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "partials/messages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 10,  33 => 6,  27 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/messages.html.twig", "C:\\wamp64\\www\\wordpress\\wp-content\\plugins\\gantry5\\engines\\nucleus\\views\\partials\\messages.html.twig");
    }
}
