<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function zodiac( $data ) {

        $day = str_replace("-","",substr($data,5));
        $zodiak = array(
            'ot' => array('1222','0101'),
            'do' => array('1231','0119'),
            'zn' => array('Козерог','Козерог'));
        $i = 0;

        while (empty($znak) && ($i < 2)){
            $znak = (($zodiak['ot'][$i] <= $day) && ($zodiak['do'][$i] >= $day)) ? true : false;
            ++$i;
        }
        return $znak;
    }
}
