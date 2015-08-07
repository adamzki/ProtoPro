<?php

/* captcha_default.html */
class __TwigTemplate_16c84c820e7f541476510a1e98a356d6 extends Twig_Template
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
        if (((isset($context["S_TYPE"]) ? $context["S_TYPE"] : null) == 1)) {
            // line 2
            echo "<div class=\"panel captcha-panel\">
\t<div class=\"inner\">

\t<h3 class=\"captcha-title\">";
            // line 5
            echo $this->env->getExtension('phpbb')->lang("CONFIRMATION");
            echo "</h3>
\t<p>";
            // line 6
            echo $this->env->getExtension('phpbb')->lang("CONFIRM_EXPLAIN");
            echo "</p>

\t<fieldset class=\"fields2\">
";
        }
        // line 10
        echo "
\t<dl>
\t\t<dt><label for=\"confirm_code\">";
        // line 12
        echo $this->env->getExtension('phpbb')->lang("CONFIRM_CODE");
        echo $this->env->getExtension('phpbb')->lang("COLON");
        echo "</label></dt>
\t\t<dd class=\"captcha captcha-image\"><img src=\"";
        // line 13
        echo (isset($context["CONFIRM_IMAGE_LINK"]) ? $context["CONFIRM_IMAGE_LINK"] : null);
        echo "\" alt=\"";
        echo $this->env->getExtension('phpbb')->lang("CONFIRM_CODE");
        echo "\" /></dd>
\t\t<dd><input type=\"text\" name=\"confirm_code\" id=\"confirm_code\" size=\"8\" maxlength=\"8\" tabindex=\"";
        // line 14
        echo $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "CAPTCHA_TAB_INDEX");
        echo "\" class=\"inputbox narrow\" title=\"";
        echo $this->env->getExtension('phpbb')->lang("CONFIRM_CODE");
        echo "\" />
\t\t";
        // line 15
        if ((isset($context["S_CONFIRM_REFRESH"]) ? $context["S_CONFIRM_REFRESH"] : null)) {
            echo "<input type=\"submit\" name=\"refresh_vc\" id=\"refresh_vc\" class=\"button2\" value=\"";
            echo $this->env->getExtension('phpbb')->lang("VC_REFRESH");
            echo "\" />";
        }
        // line 16
        echo "\t\t<input type=\"hidden\" name=\"confirm_id\" id=\"confirm_id\" value=\"";
        echo (isset($context["CONFIRM_ID"]) ? $context["CONFIRM_ID"] : null);
        echo "\" /></dd>
\t\t<dd>";
        // line 17
        echo $this->env->getExtension('phpbb')->lang("CONFIRM_CODE_EXPLAIN");
        echo "</dd>
\t</dl>

";
        // line 20
        if (((isset($context["S_TYPE"]) ? $context["S_TYPE"] : null) == 1)) {
            // line 21
            echo "\t</fieldset>
\t</div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "captcha_default.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 16,  58 => 15,  52 => 14,  46 => 13,  30 => 6,  26 => 5,  21 => 2,  139 => 27,  120 => 24,  113 => 22,  92 => 19,  85 => 18,  81 => 17,  77 => 21,  73 => 14,  59 => 11,  56 => 10,  37 => 10,  33 => 6,  29 => 4,  27 => 3,  22 => 2,  323 => 108,  313 => 101,  309 => 100,  305 => 99,  301 => 98,  294 => 93,  287 => 89,  282 => 87,  275 => 82,  273 => 81,  270 => 80,  255 => 78,  251 => 77,  249 => 76,  244 => 73,  243 => 72,  240 => 71,  237 => 70,  228 => 67,  219 => 66,  213 => 65,  199 => 64,  196 => 63,  192 => 62,  186 => 60,  183 => 59,  182 => 58,  179 => 57,  167 => 56,  159 => 53,  154 => 52,  151 => 51,  150 => 50,  146 => 48,  145 => 47,  137 => 44,  132 => 43,  124 => 26,  117 => 39,  109 => 36,  104 => 35,  96 => 20,  89 => 31,  86 => 30,  84 => 29,  78 => 27,  75 => 20,  69 => 17,  61 => 22,  53 => 17,  41 => 12,  31 => 2,  19 => 1,);
    }
}
