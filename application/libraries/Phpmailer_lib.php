<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailer_lib{
    public function __Construct(){
        log_message('Debug','PHPMailer Class Is Loaded..');
    }
    public function loadmail(){
        require_once APPPATH.'third_party/PHPMailer/Exception.php';
        require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
        require_once APPPATH.'third_party/PHPMailer/SMTP.php';
        $mail = new PHPMailer;
        return $mail;
    }
}