<?php

/* @gantry-admin/pages/configurations/content/content.html.twig */
class __TwigTemplate_c0f36009b502a1f4ce278894078685bc33032f17ba993cca17ec7c19b7af0d9b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'gantry' => array($this, 'block_gantry'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate(((((isset($context["ajax"]) ? $context["ajax"] : null) - (isset($context["suffix"]) ? $context["suffix"] : null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/configurations/content/content.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_gantry($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["stored_data"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->jsonDecodeFilter(_twig_default_filter($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->getCookie("g5-collapsed"), "{}"));
        // line 5
        echo "    <div id=\"content-settings\">
        <form method=\"post\">
            <div data-set-page=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["page_id"]) ? $context["page_id"] : null), "html", null, true);
        echo "\" data-set-root=\"\">
                <span class=\"float-right\">
                    <button type=\"submit\" class=\"button button-primary button-save\" data-save=\"Content Settings\">
                    <i class=\"fa fa-fw fa-check\"></i> <span>";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SAVE_CONTENT_SETTINGS"), "html", null, true);
        echo "</span></button>
                </span>
                ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["content"]) ? $context["content"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["group"] => $context["list"]) {
            // line 13
            echo "                    <h2 class=\"page-title\">
                        <span class=\"title\">";
            // line 14
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["group"]), "html", null, true);
            echo "</span>
                    </h2>

                    <div class=\"g-filter-actions\">
                        <div class=\"g-panel-filters\" data-g-global-filter=\"\">
                            <div class=\"search settings-block\">
                                <input type=\"text\" data-g-collapse-filter=\"\" placeholder=\"";
            // line 20
            echo twig_escape_filter($this->env, (($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILTER") . " ") . twig_capitalize_string_filter($this->env, $context["group"])), "html", null, true);
            echo "...\" aria-label=\"";
            echo twig_escape_filter($this->env, (($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILTER") . " ") . twig_capitalize_string_filter($this->env, $context["group"])), "html", null, true);
            echo "...\" role=\"search\">
                                <i class=\"fa fa-fw fa-search\"></i>
                            </div>
                            <button class=\"button\" type=\"button\" data-g-collapse-all=\"true\"><i class=\"fa fa-fw fa-toggle-up\"></i> ";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_COLLAPSE_ALL"), "html", null, true);
            echo "</button>
                            <button class=\"button\" type=\"button\" data-g-collapse-all=\"false\"><i class=\"fa fa-fw fa-toggle-down\"></i> ";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EXPAND_ALL"), "html", null, true);
            echo "</button>
                        </div>
                    </div>

                    <div class=\"cards-wrapper g-grid\">
                        ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["list"]);
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["id"] => $context["item"]) {
                // line 30
                echo "                            ";
                if ( !$this->getAttribute($context["item"], "hidden", array())) {
                    // line 31
                    echo "                                ";
                    $context["prefix"] = (((("content." . $context["group"]) . ".") . $context["id"]) . ".");
                    // line 32
                    echo "                                ";
                    $context["collapsed"] = ($this->getAttribute($this->getAttribute($context["item"], "form", array()), "collapsed", array()) || $this->getAttribute((isset($context["stored_data"]) ? $context["stored_data"] : null), (isset($context["prefix"]) ? $context["prefix"] : null)));
                    // line 33
                    echo "                                ";
                    $context["labels"] = array("collapse" => $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_COLLAPSE"), "expand" => $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EXPAND"));
                    // line 34
                    echo "                                <div class=\"card settings-block";
                    echo (((isset($context["collapsed"]) ? $context["collapsed"] : null)) ? (" g-collapsed") : (""));
                    echo "\">
                                    <input type=\"hidden\" name=\"content[";
                    // line 35
                    echo twig_escape_filter($this->env, $context["group"], "html", null, true);
                    echo "][";
                    echo twig_escape_filter($this->env, $context["id"], "html", null, true);
                    echo "]\"/>
                                    <h4 data-g-collapse=\"";
                    // line 36
                    echo twig_escape_filter($this->env, twig_jsonencode_filter(twig_array_merge((isset($context["labels"]) ? $context["labels"] : null), array("collapsed" => (((isset($context["collapsed"]) ? $context["collapsed"] : null)) ? (true) : (false)), "id" => (isset($context["prefix"]) ? $context["prefix"] : null), "target" => "~ .inner-params"))), "html_attr");
                    echo "\"
                                        data-g-collapse-id=\"";
                    // line 37
                    echo twig_escape_filter($this->env, (isset($context["prefix"]) ? $context["prefix"] : null), "html", null, true);
                    echo "\"
                                        ";
                    // line 38
                    echo (((isset($context["overrideable"]) ? $context["overrideable"] : null)) ? (" class=\"card-overrideable\"") : (""));
                    echo "
                                    >
                                        <span class=\"g-collapse\" data-title=\"";
                    // line 40
                    echo twig_escape_filter($this->env, (((isset($context["collapsed"]) ? $context["collapsed"] : null)) ? ($this->getAttribute((isset($context["labels"]) ? $context["labels"] : null), "expand", array())) : ($this->getAttribute((isset($context["labels"]) ? $context["labels"] : null), "collapse", array()))), "html", null, true);
                    echo "\" data-tip=\"";
                    echo twig_escape_filter($this->env, (((isset($context["collapsed"]) ? $context["collapsed"] : null)) ? ($this->getAttribute((isset($context["labels"]) ? $context["labels"] : null), "expand", array())) : ($this->getAttribute((isset($context["labels"]) ? $context["labels"] : null), "collapse", array()))), "html", null, true);
                    echo "\" data-tip-place=\"top-right\">
                                            <i class=\"fa fa-fw  fa-caret-up\"></i>
                                        </span>
                                        <span class=\"g-title\">";
                    // line 43
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                    echo "</span>
                                        ";
                    // line 44
                    if ($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "form", array()), "fields", array()), "enabled", array())) {
                        // line 45
                        echo "                                            ";
                        $this->loadTemplate("forms/fields/enable/enable.html.twig", "@gantry-admin/pages/configurations/content/content.html.twig", 45)->display(array_merge($context, array("default" => true, "scope" => (isset($context["prefix"]) ? $context["prefix"] : null), "name" => "enabled", "field" => $this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "form", array()), "fields", array()), "enabled", array()), "value" => $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => ((isset($context["prefix"]) ? $context["prefix"] : null) . "enabled")), "method"))));
                        // line 46
                        echo "
                                            ";
                        // line 47
                        if ((isset($context["overrideable"]) ? $context["overrideable"] : null)) {
                            // line 48
                            echo "                                                ";
                            $this->loadTemplate("forms/override.html.twig", "@gantry-admin/pages/configurations/content/content.html.twig", 48)->display(array_merge($context, array("scope" => (isset($context["prefix"]) ? $context["prefix"] : null), "name" => "enabled", "default_value" => $this->getAttribute((isset($context["defaults"]) ? $context["defaults"] : null), ((isset($context["prefix"]) ? $context["prefix"] : null) . "enabled")), "value" => $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => ((isset($context["prefix"]) ? $context["prefix"] : null) . "enabled")), "method"), "field" => array("label" => (("Enabled of the " . $this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "name", array())) . " Particle")))));
                            // line 49
                            echo "                                            ";
                        }
                        // line 50
                        echo "                                        ";
                    }
                    // line 51
                    echo "                                    </h4>

                                    <div class=\"inner-params\">
                                        ";
                    // line 54
                    $this->loadTemplate("forms/fields.html.twig", "@gantry-admin/pages/configurations/content/content.html.twig", 54)->display(array_merge($context, array("overrideable" => (isset($context["overrideable"]) ? $context["overrideable"] : null), "blueprints" => $this->getAttribute($context["item"], "form", array()), "skip" => array(0 => "enabled"), "prefix" => (isset($context["prefix"]) ? $context["prefix"] : null))));
                    // line 55
                    echo "                                    </div>
                                </div>
                            ";
                }
                // line 58
                echo "                        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "                    </div>
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['group'], $context['list'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "
                <div class=\"g-footer-actions\">
                    <span class=\"float-right\">
                        <button type=\"submit\" class=\"button button-primary button-save\" data-save=\"Content Settings\">
                            <i class=\"fa fa-fw fa-check\"></i> <span>";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SAVE_CONTENT_SETTINGS"), "html", null, true);
        echo "</span></button>
                    </span>
                </div>
            </div>
        </form>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/configurations/content/content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  228 => 65,  222 => 61,  207 => 59,  193 => 58,  188 => 55,  186 => 54,  181 => 51,  178 => 50,  175 => 49,  172 => 48,  170 => 47,  167 => 46,  164 => 45,  162 => 44,  158 => 43,  150 => 40,  145 => 38,  141 => 37,  137 => 36,  131 => 35,  126 => 34,  123 => 33,  120 => 32,  117 => 31,  114 => 30,  97 => 29,  89 => 24,  85 => 23,  77 => 20,  68 => 14,  65 => 13,  48 => 12,  43 => 10,  37 => 7,  33 => 5,  30 => 4,  27 => 3,  18 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@gantry-admin/pages/configurations/content/content.html.twig", "C:\\wamp64\\www\\wordpress\\wp-content\\plugins\\gantry5\\admin\\templates\\pages\\configurations\\content\\content.html.twig");
    }
}
