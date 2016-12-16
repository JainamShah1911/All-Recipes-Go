<?php

/* archive.html.twig */
class __TwigTemplate_77db4d69fd4ad94b18969426cf078d124e1d85fa5f5fa4f0667f516699acd5cc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("partials/page.html.twig", "archive.html.twig", 1);
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
        $context["twigTemplate"] = "archive.html.twig";
        // line 3
        $context["scope"] = "archive";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    <div class=\"platform-content\">
        <div class=\"archive\">

            ";
        // line 11
        echo "            ";
        if ($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".heading.enabled"), 1 => "0"), "method")) {
            // line 12
            echo "                <header class=\"page-header\">
                    <h1>
                        ";
            // line 14
            if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".heading.text")), "method"))) {
                // line 15
                echo "                            ";
                echo $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".heading.text")), "method");
                echo "
                        ";
            } else {
                // line 17
                echo "                            ";
                echo (isset($context["title"]) ? $context["title"] : null);
                echo "
                        ";
            }
            // line 19
            echo "                    </h1>
                </header>
            ";
        }
        // line 22
        echo "            ";
        // line 23
        echo "
            ";
        // line 24
        if ( !twig_test_empty((isset($context["posts"]) ? $context["posts"] : null))) {
            // line 25
            echo "
                ";
            // line 27
            echo "                <section class=\"entries\">
                    ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 29
                echo "                        ";
                $this->loadTemplate(array(0 => (("partials/content-" . (isset($context["scope"]) ? $context["scope"] : null)) . ".html.twig"), 1 => (($this->getAttribute($context["post"], "format", array())) ? ((("partials/content-" . $this->getAttribute($context["post"], "format", array())) . ".html.twig")) : ("")), 2 => "partials/content.html.twig"), "archive.html.twig", 29)->display($context);
                // line 30
                echo "                    ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "                </section>
                ";
            // line 33
            echo "
                ";
            // line 35
            echo "                ";
            if (($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : null), "pages", array()) && (twig_length_filter($this->env, $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : null), "pages", array())) > 1))) {
                // line 36
                echo "                    ";
                $this->loadTemplate("partials/pagination.html.twig", "archive.html.twig", 36)->display($context);
                // line 37
                echo "                ";
            }
            // line 38
            echo "                ";
            // line 39
            echo "
            ";
        } else {
            // line 41
            echo "
                ";
            // line 43
            echo "                <div class=\"no-matches-notice\">
                    <h1>
                        ";
            // line 45
            echo call_user_func_array($this->env->getFunction('__')->getCallable(), array("Sorry, but there aren't any posts matching your query.", "g5_hydrogen"));
            echo "
                    </h1>
                </div>

            ";
        }
        // line 50
        echo "
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "archive.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 50,  143 => 45,  139 => 43,  136 => 41,  132 => 39,  130 => 38,  127 => 37,  124 => 36,  121 => 35,  118 => 33,  115 => 31,  101 => 30,  98 => 29,  81 => 28,  78 => 27,  75 => 25,  73 => 24,  70 => 23,  68 => 22,  63 => 19,  57 => 17,  51 => 15,  49 => 14,  45 => 12,  42 => 11,  36 => 6,  33 => 5,  29 => 1,  27 => 3,  25 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "archive.html.twig", "C:\\wamp64\\www\\wordpress\\wp-content\\themes\\g5_hydrogen\\views\\archive.html.twig");
    }
}
