<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        require('application/models/Entity/Obj.php');
        require('application/models/Entity/Perfil.php');
        require('application/models/Entity/Requisicao.php');
    }

}