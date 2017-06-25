<?php

class SView
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.

    /*function generate($contentView, $templateView, $data = null)
    {
        //echo $templateView;
        include 'application/views/'.$templateView;
    }*/

    function generate($contentView, $templateView, $data = null, $filters = null)
    {
        /*
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        */

        //echo $templateView;
        include 'application/views/'.$templateView;
    }
}