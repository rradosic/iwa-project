<?php
namespace IWA;

class Helpers
{
    public static function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }

    public static function dd($var)
    {
        var_dump($var);
        die();
    }

    public static function pluck($arr, $value, $key=null)
    {
        $result = [];
        $tempKey = null;
        $tempValue = null;

        foreach ($arr as $arrKey => $arrValue) {
            if(is_object($arrValue)){
                $array = (array) $arrValue;
                $returnedArr = Helpers::pluck($array, $value, $key);

                $result = array_replace($result, $returnedArr);
            }
            else{
                if($arrKey == $value){
                    $tempValue = $arrValue;
                }
    
                if($arrKey == $key){
                    $tempKey = $arrValue;
                }
    
                if($tempValue && $tempKey){
                    $result[$tempKey] = $tempValue;
                    $tempValue = null;
                    $tempKey = null;
                }
            }
        }

        return $result;
    }
}
