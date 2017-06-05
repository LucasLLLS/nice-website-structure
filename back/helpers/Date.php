<?php

namespace Back\Helpers;

class Date {

    public static function dateFormat( $originalDate, $explode = false, $dateFormat = "Y-m-d" ){

        if( $explode ){
            $data = explode( $explode, $originalDate);
            list($dia, $mes, $ano) = $data;
            $originalDate = "$ano-$mes-$dia";
        }

        return date ( $dateFormat, strtotime($originalDate));
    }

}
