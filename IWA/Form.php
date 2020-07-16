<?php
namespace IWA;

class Form
{
    public static function select($name, $options, $defaultSelected = null)
    {
        $el = "";
        $el .= '<select name="'.$name.'">';

        foreach ($options as $key => $value) {
            ($defaultSelected == $key ) ? $selected = 'selected' : $selected = null;
            
            $el .='<option "value="'.$key.'" '.$selected.'>'.$value.'</option>';
        }

        $el .= '</select>';
        echo $el;
    }
}
