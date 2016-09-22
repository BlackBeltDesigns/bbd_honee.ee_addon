<?php

/**
 * Hon:EE
 *
 * This file must be placed in the
 * system/user/addons folder in your ExpressionEngine installation.
 *
 * @package Hon:EE
 * @version 1.0.0
 * @author Brian Mallett http://bbdokc.com
 * @copyright Copyright (c) 2016 Brian Mallett
 * @license http://creativecommons.org/licenses/by-nd/3.0/ Creative Commons Attribution-No Derivative Works 3.0 Unported
 */

$plugin_info       = array(
    'pi_name'        => 'Hon:EE',
    'pi_version'     => '1.0.0',
    'pi_author'      => 'Brian Mallett, Black Belt Designs, LLC',
    'pi_author_url'  => 'http://bbdokc.com',
    'pi_description' => 'Hon:EE is an EXTREMELY simple plugin to give you a better spam option than captcha for your forms and UI experience.',
    'pi_usage'       => Honee::usage()
);

class Honee {

    public static $name         = 'Hon:EE';
    public static $version      = '1.0.0';
    public static $author       = 'Brian Mallett, Black Belt Designs, LLC';
    public static $author_url   = 'http://bbdokc.com';
    public static $description  = 'Hon:EE is an EXTREMELY simple plugin to give you a better spam option than captcha for your forms and UI experience.';
    public static $typography   = FALSE;

    public $return_data = "";


    // --------------------------------------------------------------------


    /**
     * Hon:EE
     *
     * @access  public
     * @return  string
     */

    public function __construct()
    {
        // Away we go...
        $class = (ee()->TMPL->fetch_param('class')) ? ee()->TMPL->fetch_param('class') : 'honee';
        $required = ee()->TMPL->fetch_param('required');
        $css = '';
        $input = '';

        /**
         * Build out the CSS needed
         */
        $css .= '<style>.'.$class.'{display: block!important;left:-9999px!important;position:absolute!important;}</style>';


        /**
         * Build the input needed
         */
        if($required)
        {
            $input .= '<label for="'.$class.'" class="'.$class.'">'.ucwords($class).'</label>';
            $input .= '<input type="text" class="'.$class.'" name="'.$class.'" id="'.$class.'" required value="'.$required.'" tabindex="-1">';
        }
        else
        {
            $input .= '<label for="'.$class.'" class="'.$class.'">'.ucwords($class).'</label>';
            $input .= '<input type="text" class="'.$class.'" name="'.$class.'" id="'.$class.'" tabindex="-1">';
        }


        /**
         * Return the new content
         */
        $this->return_data = $css.$input;
    }


    // --------------------------------------------------------------------


    /**
     * Usage
     *
     * This function describes how the plugin is used.
     *
     * @access  public
     * @return  string
     */
    public static function usage()
    {
        ob_start();
        ?>

        Using forms is a must in today's web world. Don't muddy up your UI with an ugly, unfriendly captcha.
        Use Hon:EE. Using the honeypot technique of providing a hidden field on your form to remain blank,
        you can validate against it for your form submissions.

        Since some of the bots have gotten smart to the technique, Hon:EE allows you to provide a name parameter
        which it uses for your class, id, and name fields for creating the label and form input field. It also
        allows you to make it a required field to trick the bots and a required value for you to set.

        There are 3 parameters, all of which are optional.

        {exp:honee}

        This will return:

        <label for="honee" class="honee">Honee</label>
        <input type="text" class="honee" name="honee" id="honee" tabindex="-1">

        You can change the class with the class parameter like this:

        {exp:honee class="your_class"}

        This will return:

        <label for="your_class" class="your_class">Your Class</label>
        <input type="text" class="your_class" name="your_class" id="your_class" tabindex="-1">

        You can make the field a required field and force a value:

        {exp:honee class="your_class" required="your_value"}

        This will return:

        <label for="your_class" class="your_class">Your Class</label>
        <input type="text" class="your_class" name="your_class" id="your_class" required value="your_value" tabindex="-1">

        <?php
        $buffer         = ob_get_contents();

        ob_end_clean();

        return $buffer;
    }
    // END

}


/* End of file pi.honee.php */
/* Location: ./system/user/addons/honee/ */
