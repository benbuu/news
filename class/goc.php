<?php

require_once "../config.php";
class goc{
    protected  $db;
    function  __construct()
    {
        $this->db = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);
        $this->db -> set_charset("utf8");

    }
}