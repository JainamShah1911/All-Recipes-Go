<?php

/* @gantry-admin/partials/php_unsupported.html.twig */
class __TwigTemplate_34e2ea8f31380e2e0f39cf5e9371f148eb8887d5e75ca7700048ba8c672cef88 extends Twig_Template
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
        $context["php_version"] = twig_constant("PHP_VERSION");
        // line 2
        echo "
";
        // line 3
        if ((is_string($__internal_a7145a657776e9157106d19a17cdae425a0528f707dd0740aba946e24e55eaba = (isset($context["php_version"]) ? $context["php_version"] : null)) && is_string($__internal_3a52439f1fbf967fd36758ac30a534cd96e82da84bad96c807a79097972111d1 = "5.4") && ('' === $__internal_3a52439f1fbf967fd36758ac30a534cd96e82da84bad96c807a79097972111d1 || 0 === strpos($__internal_a7145a657776e9157106d19a17cdae425a0528f707dd0740aba946e24e55eaba, $__internal_3a52439f1fbf967fd36758ac30a534cd96e82da84bad96c807a79097972111d1)))) {
            // line 4
            echo "<div class=\"g-grid\">
    <div class=\"g-block alert alert-warning g-php-outdated\">
        ";
            // line 6
            echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PHP54_WARNING", (isset($context["php_version"]) ? $context["php_version"] : null));
            echo "
    </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@gantry-admin/partials/php_unsupported.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 6,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@gantry-admin/partials/php_unsupported.html.twig", "C:\\wamp64\\www\\wordpress\\wp-content\\plugins\\gantry5\\admin\\templates\\partials\\php_unsupported.html.twig");
    }
}
