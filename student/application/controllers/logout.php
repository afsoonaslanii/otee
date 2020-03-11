<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{
    function index()
    {
        $_SESSION['user_id']= false;
        session_destroy();
        redirect('login');
    }
}