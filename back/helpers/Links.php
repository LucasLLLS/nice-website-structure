<?php

namespace Back\Helpers;

class Links {


    public static function CMS( $path ){
        return  HOST.'/cms/'.$path;
    }

    public static function Front( $path ){
        return  HOST.'/'.$path;
    }


}
