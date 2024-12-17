<?php

class Controller{
    protected static function view($page, $data = [], $data2=[], $data3=[], $data4=[]){
        $data;
        $data2;
        $data3;
        $data4;
        require $page;
    }
}