<?php

/* @particles/menu.html.twig */
class __TwigTemplate_08f8331a994ecda0e41663129a9f4410ef9ac7f80843bf63f8c71f3bfde9356f extends Twig_Template
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
            $context["menu"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "menu", array()), "instance", array(0 => (isset($context["particle"]) ? $context["particle"] : null)), "method");
        } catch (\Exception $e) {
            if ($context['gantry']->debug()) throw $e;
            GANTRY_DEBUGGER && method_exists('Gantry\Debugger', 'addException') && \Gantry\Debugger::addException($e);
            $context['e'] = $e;
            // line 4
            echo "<div class=\"alert alert-error\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : null), "getMessage", array()), "html", null, true);
            echo "</div>
";
        }
        // line 6
        echo "
";
        // line 14
        echo "
";
        // line 25
        echo "
";
        // line 34
        echo "
";
        // line 85
        echo "
";
        // line 102
        echo "
";
        // line 110
        echo "
";
        // line 123
        echo "
";
        // line 124
        if ($this->getAttribute($this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "root", array()), "count", array(), "method")) {
            // line 125
            echo "<nav class=\"g-main-nav\" role=\"navigation\"";
            echo (($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "mobileTarget", array())) ? (" data-g-mobile-target") : (""));
            echo " data-g-hover-expand=\"";
            echo (((($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "hoverExpand", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "hoverExpand", array()), "true")) : ("true"))) ? ("true") : ("false"));
            echo "\">
    <ul class=\"g-toplevel\">
        ";
            // line 127
            echo $this->getAttribute($this, "displayItems", array(0 => $this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "root", array()), 1 => (isset($context["menu"]) ? $context["menu"] : null), 2 => $context), "method");
            echo "
    </ul>
</nav>
";
        }
    }

    // line 7
    public function getgetCustomWidth($__item__ = null, $__menu__ = null, $__mode__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "menu" => $__menu__,
            "mode" => $__mode__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 8
            if ((((($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "width", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "width", array()), "auto")) : ("auto")) != "auto") &&  !(((isset($context["dropdown_type"]) ? $context["dropdown_type"] : null) == "fullwidth") && ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "level", array()) > 1)))) {
                // line 9
                if (((isset($context["mode"]) ? $context["mode"] : null) == "item")) {
                    echo " style=\"position: relative;\"";
                } elseif ((                // line 10
(isset($context["mode"]) ? $context["mode"] : null) == "submenu")) {
                    echo " style=\"width:";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "width", array()), "html", null, true);
                    echo ";\" data-g-item-width=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "width", array()), "html", null, true);
                    echo "\"";
                }
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 15
    public function getdisplayParticle($__item__ = null, $__context__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "context" => $__context__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 16
            echo "    ";
            if (((null === $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "options", array()), "particle", array()), "enabled", array())) || $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "options", array()), "particle", array()), "enabled", array()))) {
                // line 17
                echo "        ";
                $context["context"] = twig_array_merge((isset($context["context"]) ? $context["context"] : null), array("particle" => $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "options", array()), "particle", array())));
                // line 18
                echo "        ";
                $context["classes"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "options", array()), "block", array()), "class", array());
                // line 19
                echo "        <div class=\"menu-item-particle";
                echo twig_escape_filter($this->env, (((isset($context["classes"]) ? $context["classes"] : null)) ? ((" " . (isset($context["classes"]) ? $context["classes"] : null))) : ("")), "html", null, true);
                echo "\">
        ";
                // line 20
                try {
                    $this->loadTemplate(array(0 => (("particles/" . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "particle", array())) . ".html.twig"), 1 => (("@particles/" . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "particle", array())) . ".html.twig")), "@particles/menu.html.twig", 20)->display(                    // line 21
(isset($context["context"]) ? $context["context"] : null));
                } catch (Twig_Error_Loader $e) {
                    // ignore missing template
                }

                // line 22
                echo "        </div>
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 26
    public function getdisplayTitle($__item__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 27
            echo "    ";
            if (( !$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "icon_only", array()) ||  !($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array()) || $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "icon", array())))) {
                // line 28
                echo "        <span class=\"g-menu-item-title\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), "html", null, true);
                echo "</span>
        ";
                // line 29
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "subtitle", array())) {
                    // line 30
                    echo "            <span class=\"g-menu-item-subtitle\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "subtitle", array()), "html", null, true);
                    echo "</span>
        ";
                }
                // line 32
                echo "    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 35
    public function getdisplayItem($__item__ = null, $__menu__ = null, $__context__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "menu" => $__menu__,
            "context" => $__context__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 36
            echo "    ";
            $context["SELF"] = $this;
            // line 37
            echo "    ";
            if ((($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "type", array()) == "particle") &&  !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "options", array()), "particle", array()), "enabled", array()))) {
                echo " 
        ";
                // line 38
                $context["enabled"] = 0;
                // line 39
                echo "    ";
            }
            // line 40
            echo "    ";
            if ((($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "visible", array()) && $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "enabled", array())) && ((array_key_exists("enabled", $context)) ? (_twig_default_filter((isset($context["enabled"]) ? $context["enabled"] : null), 1)) : (1)))) {
                // line 41
                echo "        ";
                $context["title"] = ((($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "icon_only", array()) || $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "link_title", array()))) ? (((" title=\"" . (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "link_title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "link_title", array()), $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()))) : ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array())))) . "\"")) : (""));
                // line 42
                echo "        ";
                $context["active"] = (($this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "isActive", array(0 => (isset($context["item"]) ? $context["item"] : null)), "method")) ? (" active") : (""));
                // line 43
                echo "        ";
                $context["dropdown"] = ((($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "level", array()) == 1)) ? ((" g-" . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "getDropdown", array(), "method"))) : (""));
                // line 44
                echo "        ";
                $context["parent"] = (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "children", array())) ? (" g-parent") : (""));
                // line 45
                echo "        ";
                $context["target"] = ((($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "target", array()) != "_self")) ? (((" target=\"" . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "target", array())) . "\"")) : (""));
                // line 46
                echo "        ";
                $context["rel"] = (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "rel", array())) ? (((" rel=\"" . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "rel", array())) . "\"")) : (""));
                // line 47
                echo "
        <li class=\"g-menu-item g-menu-item-type-";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "type", array()), "html", null, true);
                echo " g-menu-item-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id", array()), "html", null, true);
                if ( !$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "dropdown_hide", array())) {
                    echo (isset($context["parent"]) ? $context["parent"] : null);
                }
                echo (isset($context["active"]) ? $context["active"] : null);
                echo (isset($context["dropdown"]) ? $context["dropdown"] : null);
                echo " ";
                if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url", array()) && $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "children", array()))) {
                    if ( !$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "dropdown_hide", array())) {
                        echo "g-menu-item-link-parent";
                    }
                }
                echo " ";
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "class", array()), "")) : ("")), "html", null, true);
                echo "\"";
                // line 49
                echo $context["SELF"]->getgetCustomWidth((isset($context["item"]) ? $context["item"] : null), (isset($context["menu"]) ? $context["menu"] : null), "item", (isset($context["dropdown"]) ? $context["dropdown"] : null));
                // line 50
                if ((($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "particle", array(), "any", false, true), "renderTitles", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "particle", array(), "any", false, true), "renderTitles", array()), 0)) : (0))) {
                    echo " title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), "html", null, true);
                    echo "\"";
                }
                echo ">
            ";
                // line 51
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url", array())) {
                    echo "<a class=\"g-menu-item-container";
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "anchor_class", array())) ? ((" " . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "anchor_class", array()))) : ("")), "html", null, true);
                    echo "\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url", array()), "html", null, true);
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "hash", array()), "html", null, true);
                    echo "\"";
                    echo (((isset($context["title"]) ? $context["title"] : null) . (isset($context["target"]) ? $context["target"] : null)) . (isset($context["rel"]) ? $context["rel"] : null));
                    echo ">
            ";
                } else {
                    // line 52
                    echo "<div class=\"g-menu-item-container";
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "anchor_class", array())) ? ((" " . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "anchor_class", array()))) : ("")), "html", null, true);
                    echo "\" data-g-menuparent=\"\">";
                }
                // line 53
                echo "                ";
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array())) {
                    // line 54
                    echo "                    <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array())), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), "html", null, true);
                    echo "\" />
                ";
                } elseif ($this->getAttribute(                // line 55
(isset($context["item"]) ? $context["item"] : null), "icon", array())) {
                    // line 56
                    echo "                    <i class=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "icon", array()), "html", null, true);
                    echo "\"></i>
                ";
                }
                // line 58
                echo "                ";
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url", array())) {
                    // line 59
                    echo "                    <span class=\"g-menu-item-content\">
                        ";
                    // line 60
                    echo $context["SELF"]->getdisplayTitle((isset($context["item"]) ? $context["item"] : null));
                    echo "
                    </span>
                    ";
                    // line 62
                    if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "children", array()) &&  !$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "dropdown_hide", array()))) {
                        // line 63
                        echo "<span class=\"g-menu-parent-indicator\" data-g-menuparent=\"\"></span>";
                    }
                    // line 65
                    echo "                ";
                } else {
                    // line 66
                    echo "                    ";
                    if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "type", array()) == "particle")) {
                        // line 67
                        echo "                        ";
                        echo $context["SELF"]->getdisplayParticle((isset($context["item"]) ? $context["item"] : null), (isset($context["context"]) ? $context["context"] : null));
                        echo "
                    ";
                    } elseif (($this->getAttribute(                    // line 68
(isset($context["item"]) ? $context["item"] : null), "type", array()) == "heading")) {
                        // line 69
                        echo "                        <span class=\"g-nav-header g-menu-item-content\"";
                        echo (isset($context["title"]) ? $context["title"] : null);
                        echo ">";
                        echo $context["SELF"]->getdisplayTitle((isset($context["item"]) ? $context["item"] : null));
                        echo "</span>
                    ";
                    } else {
                        // line 71
                        echo "                        <span class=\"g-separator g-menu-item-content\"";
                        echo (isset($context["title"]) ? $context["title"] : null);
                        echo ">";
                        echo $context["SELF"]->getdisplayTitle((isset($context["item"]) ? $context["item"] : null));
                        echo "</span>
                    ";
                    }
                    // line 73
                    echo "                        ";
                    if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "children", array())) {
                        // line 74
                        echo "<span class=\"g-menu-parent-indicator\"></span>";
                    }
                    // line 76
                    echo "                ";
                }
                // line 77
                echo "            ";
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url", array())) {
                    echo "</a>
            ";
                } else {
                    // line 78
                    echo "</div>";
                }
                // line 79
                echo "            ";
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "children", array())) {
                    // line 80
                    echo $context["SELF"]->getdisplaySubmenu((isset($context["item"]) ? $context["item"] : null), (isset($context["menu"]) ? $context["menu"] : null), (isset($context["context"]) ? $context["context"] : null), (isset($context["dropdown_type"]) ? $context["dropdown_type"] : null));
                }
                // line 82
                echo "        </li>
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 86
    public function getdisplayContainers($__item__ = null, $__menu__ = null, $__context__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "menu" => $__menu__,
            "context" => $__context__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 87
            echo "    ";
            $context["SELF"] = $this;
            // line 88
            echo "    <div class=\"g-grid\">
        ";
            // line 89
            $context["groups"] = ((($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "getDropdown", array(), "method") == "standard")) ? (array(0 => (isset($context["item"]) ? $context["item"] : null))) : ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "groups", array())));
            // line 90
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : null));
            foreach ($context['_seq'] as $context["column"] => $context["items"]) {
                // line 91
                echo "        <div class=\"g-block ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('toGrid')->getCallable(), array($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "columnWidth", array(0 => $context["column"]), "method"))), "html", null, true);
                echo "\">
            <ul class=\"g-sublevel\">
                <li class=\"g-level-";
                // line 93
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "level", array()), "html", null, true);
                echo " g-go-back\">
                    <a class=\"g-menu-item-container\" href=\"#\" data-g-menuparent=\"\"><span>Back</span></a>
                </li>
                ";
                // line 96
                echo $context["SELF"]->getdisplayItems($context["items"], (isset($context["menu"]) ? $context["menu"] : null), (isset($context["context"]) ? $context["context"] : null), (isset($context["dropdown_type"]) ? $context["dropdown_type"] : null));
                echo "
            </ul>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['column'], $context['items'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 100
            echo "    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 103
    public function getdisplayItems($__items__ = null, $__menu__ = null, $__context__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "items" => $__items__,
            "menu" => $__menu__,
            "context" => $__context__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 104
            echo "    ";
            $context["SELF"] = $this;
            // line 105
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 106
                echo "        ";
                if (($this->getAttribute($context["item"], "level", array()) == 1)) {
                    $context["dropdown_type"] = $this->getAttribute($context["item"], "dropdown", array());
                }
                // line 107
                echo "        ";
                echo $context["SELF"]->getdisplayItem($context["item"], (isset($context["menu"]) ? $context["menu"] : null), (isset($context["context"]) ? $context["context"] : null), (isset($context["dropdown_type"]) ? $context["dropdown_type"] : null));
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 111
    public function getdisplaySubmenu($__item__ = null, $__menu__ = null, $__context__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "menu" => $__menu__,
            "context" => $__context__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 112
            echo "    ";
            $context["SELF"] = $this;
            // line 113
            echo "    ";
            if ( !$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "dropdown_hide", array())) {
                // line 114
                echo "        ";
                $context["animation"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "gantry", array(), "any", false, true), "config", array(), "any", false, true), "get", array(0 => "styles.menu.animation"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "gantry", array(), "any", false, true), "config", array(), "any", false, true), "get", array(0 => "styles.menu.animation"), "method"), "g-fade")) : ("g-fade"));
                // line 115
                echo "        ";
                if (((((twig_length_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "groups", array())) == 1) && ( !(isset($context["dropdown_type"]) ? $context["dropdown_type"] : null) == "fullwidth")) || ((isset($context["dropdown_type"]) ? $context["dropdown_type"] : null) == "standard")) || (((($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "width", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "width", array()), "auto")) : ("auto")) != "auto") && ((isset($context["dropdown_type"]) ? $context["dropdown_type"] : null) == "fullwidth")))) {
                    $context["dropdown_dir"] = ("g-dropdown-" . (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "dropdown_dir", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "dropdown_dir", array()), "right")) : ("right")));
                }
                // line 116
                echo "        <ul class=\"g-dropdown g-inactive ";
                echo twig_escape_filter($this->env, (isset($context["animation"]) ? $context["animation"] : null), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, (isset($context["dropdown_dir"]) ? $context["dropdown_dir"] : null), "html", null, true);
                echo "\"";
                echo $context["SELF"]->getgetCustomWidth((isset($context["item"]) ? $context["item"] : null), (isset($context["menu"]) ? $context["menu"] : null), "submenu", (isset($context["dropdown_type"]) ? $context["dropdown_type"] : null));
                echo ">
            <li class=\"g-dropdown-column\">
                ";
                // line 118
                echo $context["SELF"]->getdisplayContainers((isset($context["item"]) ? $context["item"] : null), (isset($context["menu"]) ? $context["menu"] : null), (isset($context["context"]) ? $context["context"] : null), (isset($context["dropdown_type"]) ? $context["dropdown_type"] : null));
                echo "
            </li>
        </ul>
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@particles/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  569 => 118,  559 => 116,  554 => 115,  551 => 114,  548 => 113,  545 => 112,  530 => 111,  508 => 107,  503 => 106,  498 => 105,  495 => 104,  480 => 103,  464 => 100,  454 => 96,  448 => 93,  442 => 91,  437 => 90,  435 => 89,  432 => 88,  429 => 87,  414 => 86,  397 => 82,  394 => 80,  391 => 79,  388 => 78,  382 => 77,  379 => 76,  376 => 74,  373 => 73,  365 => 71,  357 => 69,  355 => 68,  350 => 67,  347 => 66,  344 => 65,  341 => 63,  339 => 62,  334 => 60,  331 => 59,  328 => 58,  322 => 56,  320 => 55,  313 => 54,  310 => 53,  305 => 52,  293 => 51,  285 => 50,  283 => 49,  265 => 48,  262 => 47,  259 => 46,  256 => 45,  253 => 44,  250 => 43,  247 => 42,  244 => 41,  241 => 40,  238 => 39,  236 => 38,  231 => 37,  228 => 36,  213 => 35,  197 => 32,  191 => 30,  189 => 29,  184 => 28,  181 => 27,  169 => 26,  152 => 22,  146 => 21,  144 => 20,  139 => 19,  136 => 18,  133 => 17,  130 => 16,  117 => 15,  95 => 10,  92 => 9,  90 => 8,  75 => 7,  66 => 127,  58 => 125,  56 => 124,  53 => 123,  50 => 110,  47 => 102,  44 => 85,  41 => 34,  38 => 25,  35 => 14,  32 => 6,  26 => 4,  20 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/menu.html.twig", "C:\\wamp64\\www\\wordpress\\wp-content\\plugins\\gantry5\\engines\\nucleus\\particles\\menu.html.twig");
    }
}
