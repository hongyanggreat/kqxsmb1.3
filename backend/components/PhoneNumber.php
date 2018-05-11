<?php 

namespace backend\components;
use Yii;
use yii\web\Controller;
class PhoneNumber 
{
    function start_with($needle, $haystack) {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }
    function detect_number ($number) {
        $number = str_replace(array('-', '.', ' '), '', $number);
        // $number is not a phone number
        if (!preg_match('/^(01[2689]|09)[0-9]{8}$/', $number)) return false;

        // Store all start number in an array to search
        $carriers_number = $this->carriers();
        $start_numbers = array_keys($carriers_number);
        

           //echo $number .'<br>';
        foreach ($start_numbers as $start_number) {
           //echo $start_number.'<br>';
          // echo $this->start_with($start_number, $number);
            // if $start number found in $number then return value of $carriers_number array as carrier name
            if ($this->start_with($start_number, $number)) {
               return $carriers_number[$start_number];
            }
        }

        // if not found, return false
        return false;
    }
    function carriers(){
        return $carriers_number = [

            '086'  =>'Viettel',
            '096'  =>'Viettel',
            '097'  =>'Viettel',
            '098'  =>'Viettel',
            '0161' =>'Viettel',
            '0162' =>'Viettel',
            '0163' =>'Viettel',
            '0164' =>'Viettel',
            '0165' =>'Viettel',
            '0166' =>'Viettel',
            '0167' =>'Viettel',
            '0168' =>'Viettel',
            '0169' =>'Viettel',
            
            '089'  =>'Mobifone',
            '090'  =>'Mobifone',
            '093'  =>'Mobifone',
            '0120' =>'Mobifone',
            '0121' =>'Mobifone',
            '0122' =>'Mobifone',
            '0126' =>'Mobifone',
            '0128' =>'Mobifone',
            
            '088'  =>'Vinaphone',
            '091'  =>'Vinaphone',
            '094'  =>'Vinaphone',
            '0123' =>'Vinaphone',
            '0125' =>'Vinaphone',
            '0127' =>'Vinaphone',
            '0129' =>'Vinaphone',
            '0124' =>'Vinaphone',
            
            '0993' => 'Gmobile',
            '0994' => 'Gmobile',
            '0995' => 'Gmobile',
            '0996' => 'Gmobile',
            '0997' => 'Gmobile',
            '0199' => 'Gmobile',
            
            '092'  => 'Vietnamobile',
            '0186' => 'Vietnamobile',
            '0188' => 'Vietnamobile',
            

            '095'  =>'SFone',
           

        ];
    }
  
}