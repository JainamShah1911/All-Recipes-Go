<?php

/* @nucleus/page_head.html.twig */
class __TwigTemplate_8b9196fe9f9e0b8bc5ba7609842d643efb72ba35ff761bb3a5a6488c08adcbd5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head_stylesheets' => array($this, 'block_head_stylesheets'),
            'head_platform' => array($this, 'block_head_platform'),
            'head_overrides' => array($this, 'block_head_overrides'),
            'head_meta' => array($this, 'block_head_meta'),
            'head_title' => array($this, 'block_head_title'),
            'head_application' => array($this, 'block_head_application'),
            'head_ie_stylesheets' => array($this, 'block_head_ie_stylesheets'),
            'head' => array($this, 'block_head'),
            'head_custom' => array($this, 'block_head_custom'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "debugger", array()), "assets", array(), "method");
        // line 2
        echo "
";
        // line 3
        $assetFunction = $this->env->getFunction('parse_assets')->getCallable();
        $assetVariables = array("priority" => 10);
        if ($assetVariables && !is_array($assetVariables)) {
            throw new UnexpectedValueException('{% scripts with x %}: x is not an array');
        }
        $location = "head";
        if ($location && !is_string($location)) {
            throw new UnexpectedValueException('{% scripts in x %}: x is not a string');
        }
        $priority = isset($assetVariables['priority']) ? $assetVariables['priority'] : 0;
        ob_start();
        // line 4
        echo "    ";
        $this->displayBlock('head_stylesheets', $context, $blocks);
        // line 14
        $this->displayBlock('head_platform', $context, $blocks);
        // line 15
        echo "
    ";
        // line 16
        $this->displayBlock('head_overrides', $context, $blocks);
        $content = ob_get_clean();
        echo $assetFunction($content, $location, $priority);
        // line 25
        ob_start();
        // line 26
        echo "    ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "page", array()), "head", array()), "atoms", array())) {
            // line 27
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "page", array()), "head", array()), "atoms", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["atom"]) {
                // line 28
                echo "            ";
                try {                    // line 29
                    echo "                ";
                    if (((null === $this->getAttribute($this->getAttribute($context["atom"], "attributes", array()), "enabled", array())) || $this->getAttribute($this->getAttribute($context["atom"], "attributes", array()), "enabled", array()))) {
                        // line 30
                        echo "                    ";
                        $this->loadTemplate(array(0 => (("particles/" . $this->getAttribute($context["atom"], "type", array())) . ".html.twig"), 1 => (("@particles/" . $this->getAttribute($context["atom"], "type", array())) . ".html.twig")), "@nucleus/page_head.html.twig", 30)->display(array_merge($context, array("particle" => $this->getAttribute($context["atom"], "attributes", array()))));
                        // line 31
                        echo "                ";
                    }
                    // line 32
                    echo "            ";
                } catch (\Exception $e) {
                    if ($context['gantry']->debug()) throw $e;
                    GANTRY_DEBUGGER && method_exists('Gantry\Debugger', 'addException') && \Gantry\Debugger::addException($e);
                    $context['e'] = $e;
                    // line 33
                    echo "                ";
                    // line 34
                    echo "            ";
                }
                // line 35
                echo "        ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atom'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "    ";
        }
        // line 37
        echo "
    ";
        // line 38
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "page", array()), "assets", array())) {
            // line 39
            echo "        ";
            $this->loadTemplate("@particles/assets.html.twig", "@nucleus/page_head.html.twig", 39)->display(array_merge($context, array("particle" => twig_array_merge($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "page", array()), "assets", array()), array("enabled" => 1)))));
            // line 40
            echo "    ";
        }
        $context["atoms"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 43
        echo "<head>
    ";
        // line 44
        $this->displayBlock('head_meta', $context, $blocks);
        // line 65
        $this->displayBlock('head_title', $context, $blocks);
        // line 69
        echo "
    ";
        // line 70
        $this->displayBlock('head_application', $context, $blocks);
        // line 74
        echo "
    ";
        // line 75
        $this->displayBlock('head_ie_stylesheets', $context, $blocks);
        // line 83
        $this->displayBlock('head', $context, $blocks);
        // line 84
        echo "    ";
        $this->displayBlock('head_custom', $context, $blocks);
        // line 89
        echo "</head>
";
    }

    // line 4
    public function block_head_stylesheets($context, array $blocks = array())
    {
        // line 5
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-assets://css/font-awesome.min.css"), "html", null, true);
        echo "\" type=\"text/css\"/>
        <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-engine://css-compiled/nucleus.css"), "html", null, true);
        echo "\" type=\"text/css\"/>
        ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array(), "any", false, true), "configuration", array(), "any", false, true), "css", array(), "any", false, true), "persistent", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array(), "any", false, true), "configuration", array(), "any", false, true), "css", array(), "any", false, true), "persistent", array()), $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "configuration", array()), "css", array()), "files", array()))) : ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "configuration", array()), "css", array()), "files", array()))));
        foreach ($context['_seq'] as $context["_key"] => $context["css"]) {
            // line 8
            $context["url"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "css", array(0 => $context["css"]), "method"));
            if ((isset($context["url"]) ? $context["url"] : null)) {
                // line 9
                echo "            <link rel=\"stylesheet\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "css", array(0 => $context["css"]), "method")), "html", null, true);
                echo "\" type=\"text/css\"/>
        ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['css'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "    ";
    }

    // line 14
    public function block_head_platform($context, array $blocks = array())
    {
    }

    // line 16
    public function block_head_overrides($context, array $blocks = array())
    {
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "configuration", array()), "css", array()), "overrides", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["css"]) {
            // line 18
            $context["url"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "css", array(0 => $context["css"]), "method"));
            if ((isset($context["url"]) ? $context["url"] : null)) {
                // line 19
                echo "            <link rel=\"stylesheet\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "theme", array()), "css", array(0 => $context["css"]), "method")), "html", null, true);
                echo "\" type=\"text/css\"/>
        ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['css'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "    ";
    }

    // line 44
    public function block_head_meta($context, array $blocks = array())
    {
        // line 45
        echo "        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
        ";
        // line 47
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "page", array()), "head", array()), "meta", array())) {
            // line 48
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "page", array()), "head", array()), "meta", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["attributes"]) {
                // line 49
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["attributes"]);
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 50
                    echo "                    <meta name=\"";
                    echo twig_escape_filter($this->env, $context["key"]);
                    echo "\" property=\"";
                    echo twig_escape_filter($this->env, $context["key"]);
                    echo "\" content=\"";
                    echo twig_escape_filter($this->env, $context["value"]);
                    echo "\" />
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributes'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 55
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "page", array()), "assets", array()), "favicon", array())) {
            // line 56
            echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "page", array()), "assets", array()), "favicon", array())), "html", null, true);
            echo "\" />
        ";
        }
        // line 58
        echo "
        ";
        // line 59
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "page", array()), "assets", array()), "touchicon", array())) {
            // line 60
            echo "        <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "page", array()), "assets", array()), "touchicon", array())), "html", null, true);
            echo "\">
        <link rel=\"icon\" sizes=\"192x192\" href=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "page", array()), "assets", array()), "touchicon", array())), "html", null, true);
            echo "\">
        ";
        }
        // line 63
        echo "    ";
    }

    // line 65
    public function block_head_title($context, array $blocks = array())
    {
        // line 66
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>Title</title>";
    }

    // line 70
    public function block_head_application($context, array $blocks = array())
    {
        // line 71
        echo twig_join_filter($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "styles", array(0 => "head"), "method"), "
");
        echo "
        ";
        // line 72
        echo twig_join_filter($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "scripts", array(0 => "head"), "method"), "
");
    }

    // line 75
    public function block_head_ie_stylesheets($context, array $blocks = array())
    {
        // line 76
        echo "<!--[if (gte IE 8)&(lte IE 9)]>
        <script type=\"text/javascript\" src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-assets://js/html5shiv-printshiv.min.js"), "html", null, true);
        echo "\"></script>
        <link rel=\"stylesheet\" href=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-engine://css/nucleus-ie9.css"), "html", null, true);
        echo "\" type=\"text/css\"/>
        <script type=\"text/javascript\" src=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-assets://js/matchmedia.polyfill.js"), "html", null, true);
        echo "\"></script>
        <![endif]-->
    ";
    }

    // line 83
    public function block_head($context, array $blocks = array())
    {
    }

    // line 84
    public function block_head_custom($context, array $blocks = array())
    {
        // line 85
        echo "        ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "page", array()), "head", array()), "head_bottom", array())) {
            // line 86
            echo "        ";
            echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "page", array()), "head", array()), "head_bottom", array());
            echo "
        ";
        }
        // line 88
        echo "    ";
    }

    public function getTemplateName()
    {
        return "@nucleus/page_head.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  341 => 88,  335 => 86,  332 => 85,  329 => 84,  324 => 83,  317 => 79,  313 => 78,  309 => 77,  306 => 76,  303 => 75,  298 => 72,  293 => 71,  290 => 70,  285 => 66,  282 => 65,  278 => 63,  273 => 61,  268 => 60,  266 => 59,  263 => 58,  257 => 56,  255 => 55,  237 => 50,  233 => 49,  229 => 48,  227 => 47,  223 => 45,  220 => 44,  216 => 22,  206 => 19,  203 => 18,  199 => 17,  196 => 16,  191 => 14,  187 => 12,  177 => 9,  174 => 8,  170 => 7,  166 => 6,  161 => 5,  158 => 4,  153 => 89,  150 => 84,  148 => 83,  146 => 75,  143 => 74,  141 => 70,  138 => 69,  136 => 65,  134 => 44,  131 => 43,  127 => 40,  124 => 39,  122 => 38,  119 => 37,  116 => 36,  102 => 35,  99 => 34,  97 => 33,  91 => 32,  88 => 31,  85 => 30,  82 => 29,  80 => 28,  62 => 27,  59 => 26,  57 => 25,  53 => 16,  50 => 15,  48 => 14,  45 => 4,  33 => 3,  30 => 2,  28 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@nucleus/page_head.html.twig", "C:\\wamp64\\www\\wordpress\\wp-content\\plugins\\gantry5\\engines\\nucleus\\templates\\page_head.html.twig");
    }
}
