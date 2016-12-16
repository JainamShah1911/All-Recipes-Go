<?php

/* partials/meta.html.twig */
class __TwigTemplate_fe28d45031b5de7cae663551de5e5919b5b907ab4f7dd30924b8cd89fb4c8155 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["twigTemplate"] = "meta.html.twig";
        // line 2
        echo "
<div class=\"entry-meta\">

    ";
        // line 5
        $this->displayBlock('meta', $context, $blocks);
        // line 118
        echo "
</div>
";
    }

    // line 5
    public function block_meta($context, array $blocks = array())
    {
        // line 6
        echo "
        ";
        // line 8
        echo "        ";
        if (($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-date.enabled"), 1 => "1"), "method") && $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "date", array()))) {
            // line 9
            echo "            <div class=\"meta-date\">
                <i class=\"fa fa-clock-o\"></i>

                ";
            // line 12
            if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-date.prefix"), 1 => ""), "method"))) {
                // line 13
                echo "                    <span class=\"meta-prefix\">";
                echo ($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-date.prefix"), 1 => ""), "method") . " ");
                echo "</span>
                ";
            }
            // line 15
            echo "
                ";
            // line 16
            if ($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-date.link"), 1 => "1"), "method")) {
                // line 17
                echo "                    <a href=\"";
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "link", array());
                echo "\" title=\"";
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title", array());
                echo "\" class=\"meta-date-link\">
                        <span class=\"date\">";
                // line 18
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "date", array(0 => $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-date.format"), 1 => "j F Y"), "method")), "method");
                echo "</span>
                    </a>
                ";
            } else {
                // line 21
                echo "                    <span class=\"date\">";
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "date", array(0 => $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-date.format"), 1 => "j F Y"), "method")), "method");
                echo "</span>
                ";
            }
            // line 23
            echo "            </div>
        ";
        }
        // line 25
        echo "        ";
        // line 26
        echo "
        ";
        // line 28
        echo "        ";
        if (($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-author.enabled"), 1 => "1"), "method") && $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "author", array()), "name", array()))) {
            // line 29
            echo "            <div class=\"meta-author\">
                <i class=\"fa fa-pencil\"></i>

                ";
            // line 32
            if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-author.prefix"), 1 => ""), "method"))) {
                // line 33
                echo "                    <span class=\"meta-prefix\">";
                echo ($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-author.prefix"), 1 => ""), "method") . " ");
                echo "</span>
                ";
            }
            // line 35
            echo "
                ";
            // line 36
            if ($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-author.link"), 1 => "1"), "method")) {
                // line 37
                echo "                    <a href=\"";
                echo $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "author", array()), "link", array());
                echo "\" title=\"";
                echo $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "author", array()), "name", array());
                echo "\" class=\"meta-author-link\"><span class=\"author\">";
                echo $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "author", array()), "name", array());
                echo "</span></a>
                ";
            } else {
                // line 39
                echo "                    <span class=\"author\">";
                echo $this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "author", array()), "name", array());
                echo "</span>
                ";
            }
            // line 41
            echo "            </div>
        ";
        }
        // line 43
        echo "        ";
        // line 44
        echo "
        ";
        // line 46
        echo "        ";
        if ($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-comments.enabled"), 1 => "1"), "method")) {
            // line 47
            echo "            <div class=\"meta-comments-count\">
                <i class=\"fa fa-comments\"></i>

                ";
            // line 50
            if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-comments.prefix"), 1 => ""), "method"))) {
                // line 51
                echo "                    <span class=\"meta-prefix\">";
                echo ($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-comments.prefix"), 1 => ""), "method") . " ");
                echo "</span>
                ";
            }
            // line 53
            echo "
                ";
            // line 54
            if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "comment_count", array()) == "0")) {
                // line 55
                echo "                    ";
                $context["comment_count"] = call_user_func_array($this->env->getFunction('__')->getCallable(), array("No comments", "g5_hydrogen"));
                // line 56
                echo "                ";
            } elseif (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "comment_count", array()) == "1")) {
                // line 57
                echo "                    ";
                $context["comment_count"] = (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "comment_count", array()) . " ") . call_user_func_array($this->env->getFunction('__')->getCallable(), array("Comment", "g5_hydrogen")));
                // line 58
                echo "                ";
            } else {
                // line 59
                echo "                    ";
                $context["comment_count"] = (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "comment_count", array()) . " ") . call_user_func_array($this->env->getFunction('__')->getCallable(), array("Comments", "g5_hydrogen")));
                // line 60
                echo "                ";
            }
            // line 61
            echo "
                ";
            // line 62
            if ($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-comments.link"), 1 => "0"), "method")) {
                // line 63
                echo "                    <a href=\"";
                echo ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "link", array()) . "#comments");
                echo "\" title=\"";
                echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "comment_count", array());
                echo "\" class=\"meta-comments-link\"><span class=\"comment-count\">";
                echo (isset($context["comment_count"]) ? $context["comment_count"] : null);
                echo "</span></a>
                ";
            } else {
                // line 65
                echo "                    <span class=\"comments-count\">";
                echo (isset($context["comment_count"]) ? $context["comment_count"] : null);
                echo "</span>
                ";
            }
            // line 67
            echo "            </div>
        ";
        }
        // line 69
        echo "        ";
        // line 70
        echo "
        ";
        // line 72
        echo "        ";
        if (($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-categories.enabled"), 1 => "1"), "method") &&  !twig_test_empty($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "categories", array())))) {
            // line 73
            echo "            <div class=\"meta-categories\">
                <i class=\"fa fa-folder-open\"></i>

                ";
            // line 76
            if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-categories.prefix"), 1 => "Categories:"), "method"))) {
                // line 77
                echo "                    <span class=\"meta-prefix\">";
                echo ($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-categories.prefix"), 1 => "Categories:"), "method") . " ");
                echo "</span>
                ";
            }
            // line 79
            echo "
                <span class=\"categories\">
                    ";
            // line 81
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "categories", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 82
                if ($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-categories.link"), 1 => "1"), "method")) {
                    // line 83
                    echo "<a href=\"";
                    echo $this->getAttribute($context["category"], "link", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["category"], "name", array());
                    echo "\" class=\"meta-category-link\"><span class=\"single-cat\">";
                    echo $this->getAttribute($context["category"], "name", array());
                    echo "</span></a>";
                } else {
                    // line 85
                    echo "<span class=\"single-cat\">";
                    echo $this->getAttribute($context["category"], "name", array());
                    echo "</span>";
                }
                // line 87
                if ( !$this->getAttribute($context["loop"], "last", array())) {
                    echo trim(",");
                }
                // line 88
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 89
            echo "                </span>
            </div>
        ";
        }
        // line 92
        echo "        ";
        // line 93
        echo "
        ";
        // line 95
        echo "        ";
        if (($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-tags.enabled"), 1 => "1"), "method") &&  !twig_test_empty($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "tags", array())))) {
            // line 96
            echo "            <div class=\"meta-tags\">
                <i class=\"fa fa-tags\"></i>

                ";
            // line 99
            if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-tags.prefix"), 1 => "Tags:"), "method"))) {
                // line 100
                echo "                    <span class=\"meta-prefix\">";
                echo ($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-tags.prefix"), 1 => "Tags:"), "method") . " ");
                echo "</span>
                ";
            }
            // line 102
            echo "
                <span class=\"tags\">
                    ";
            // line 104
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "tags", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 105
                if ($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "config", array()), "get", array(0 => (("content." . (isset($context["scope"]) ? $context["scope"] : null)) . ".meta-tags.link"), 1 => "1"), "method")) {
                    // line 106
                    echo "<a href=\"";
                    echo $this->getAttribute($context["tag"], "link", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["tag"], "name", array());
                    echo "\" class=\"meta-tag-link\"><span class=\"single-tag\">";
                    echo $this->getAttribute($context["tag"], "name", array());
                    echo "</span></a>";
                } else {
                    // line 108
                    echo "<span class=\"single-tag\">";
                    echo $this->getAttribute($context["tag"], "name", array());
                    echo "</span>";
                }
                // line 110
                if ( !$this->getAttribute($context["loop"], "last", array())) {
                    echo trim(",");
                }
                // line 111
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            echo "                </span>
            </div>
        ";
        }
        // line 115
        echo "        ";
        // line 116
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "partials/meta.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  364 => 116,  362 => 115,  357 => 112,  343 => 111,  339 => 110,  334 => 108,  325 => 106,  323 => 105,  306 => 104,  302 => 102,  296 => 100,  294 => 99,  289 => 96,  286 => 95,  283 => 93,  281 => 92,  276 => 89,  262 => 88,  258 => 87,  253 => 85,  244 => 83,  242 => 82,  225 => 81,  221 => 79,  215 => 77,  213 => 76,  208 => 73,  205 => 72,  202 => 70,  200 => 69,  196 => 67,  190 => 65,  180 => 63,  178 => 62,  175 => 61,  172 => 60,  169 => 59,  166 => 58,  163 => 57,  160 => 56,  157 => 55,  155 => 54,  152 => 53,  146 => 51,  144 => 50,  139 => 47,  136 => 46,  133 => 44,  131 => 43,  127 => 41,  121 => 39,  111 => 37,  109 => 36,  106 => 35,  100 => 33,  98 => 32,  93 => 29,  90 => 28,  87 => 26,  85 => 25,  81 => 23,  75 => 21,  69 => 18,  62 => 17,  60 => 16,  57 => 15,  51 => 13,  49 => 12,  44 => 9,  41 => 8,  38 => 6,  35 => 5,  29 => 118,  27 => 5,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/meta.html.twig", "C:\\wamp64\\www\\wordpress\\wp-content\\themes\\g5_hydrogen\\views\\partials\\meta.html.twig");
    }
}
