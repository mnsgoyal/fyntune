<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class API
{
	protected $CI;
	public function __construct()
    {
		$this->CI =& get_instance();
    }
	/*--------------------------------------
       function for getting calculation for all pages stuffs---------------------------------------------------------------
	------------------------------------------------------------------*/
	function get_API_Response($service_url){
		$service_url	= $service_url;
		$curl			= curl_init($service_url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array());

		$curl_response	= curl_exec($curl);
		if($errno = curl_errno($curl)) 
		{
			$error_message = curl_strerror($errno);
			curl_close($curl);
			return array('api_status'=>'error','api_response'=>$error_message);			
		}
		elseif(strpos($curl_response,'404 page not found') !== false)
		{
			curl_close($curl);
			return array('api_status'=>'error', 'api_response'=>'API URL not found');
		}
		else
		{
			$curl_api_decoded 	= json_decode($curl_response);
			if($curl_api_decoded->response_code == 0)
			{
				curl_close($curl);
				return array('api_status'=>'success','api_response'=>$curl_api_decoded);
			}
			else
			{
				curl_close($curl);
				return array('api_status'=>'error','api_response'=>$curl_api_decoded);
			}
		}
	}
    
    //Function for get questions
	public function get_my_questions()
	{
		
		$api_url			= API_PREFIX;
		$api_response 		= $this->get_API_Response($api_url);
		$api_content 		= array();
		if($api_response['api_status'] == "success")
		{
			if(isset($api_response['api_response']->results))
			{
				$api_content = $api_response['api_response']->results;
			}
		}
		//set error page when API result getting blank

		if(empty($api_content))
		{
			something_went_wrong($api_url);
		}
		else
		{
			return $api_content;
		}
	}
   
}
?>