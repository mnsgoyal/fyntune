<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function something_went_wrong($origin="")
{
	$CI = &get_instance();
    $CI->load->view('errors/html/error_404', array('origin'=> $origin));
}

?>