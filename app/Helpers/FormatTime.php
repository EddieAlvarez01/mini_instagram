<?php

class FormatTime{

    //FORMATEA LA FECHA DE FORMA RELATIVA AL MOMENTO(POR EJEMPLO HACE 4 MINUTOS)
    public static function relativeDate($date){
        \Moment\Moment::setLocale('es_ES'); //IDIOMA
        $m = new \Moment\Moment(date("Y-m-d H:i:s", strtotime($date))); //SETEAR FECHA, FORMATO UTC
        $mF = $m->fromNow();    //COMPARATIVA
        return $mF->getRelative();
    }

}
