<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Singlechat extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load2();
	  }
	public function index()
	{