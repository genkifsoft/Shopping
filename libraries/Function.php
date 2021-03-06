<?php

/**
 *  get input
 */


/**
 * post input
*/

	/**
	 * Function get input.
	 * param $string.
	 * if pamram != NULL return param data. Else NULL;
	 */
	function getInput($string)
	{
		return isset($_GET[$string]) ? $_GET[$string] : '';
	}

    /**
     * Function create token
     */
    function createToken(){
        $string = "0123456789zxcvbnmasdfghjklqwertyuiopZXCVBNMASDFGHJKLQWERTYUIOP";
        $stringLength = strlen($string)-1;
        $token = '';
        for($i=1; $i<=32; $i++){
            $token .= substr($string,rand(0,$stringLength),1);
        }
        return $token;
    }

	/**
	 * Function get input.
	 * param $string.
	 * if pamram != NULL return param data. Else NULL;
	 */
	function postInput($string)
	{
		return isset($_POST[$string]) ? $_POST[$string] : '';
	}

    /**
     * Create time now
     * 
     * return time format(22-10-2018)
     */
    function timeNow()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        return date('Y_m_d_H_m_s');
    }

    function timeNowComment()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        return date('Y-m-d H:m:s');
    }

	/**
	 * Config link souce code
	 * 
	 * File header, footer.
	 */
	function base_url()
	{
		return $url = "/";
	}

    function base_domain()
	{
		return $url = "";
    }
    

    /*
     * Function check option selected
     *
     */ 
    function checkSelected($dataKey1, $dataKey2, $key1, $key2)
    {
        echo ($dataKey1["$key1"] == $dataKey2["$key2"]) ? 'selected' : '';
    }
     
	/**
	 * param $url
	 */
	function modules($url)
    {
        return base_url() . "admin/modules/" .$url ;
	}
	
	/**
     *  Function redirect
	 * 
	 * 	parmam $redirectAdmin
     */
    if ( ! function_exists('redirectAdmin'))
    {
        function redirectAdmin($url = "")
        {
            header("location: ".base_url()."admin/modules/{$url}");exit();
        }
    }

    /**
     * Format number
     */
    function formatNumber($number)
    {
        $data = intval($number);
        return number_format($data);
    }

    /**
     * Function sale price product
     */
    function saleProduct($number, $sale)
    {
        $sale = intval($sale);
        $number = intval($number);

        $data = $number * (100 - $sale) / 100;
        return number_format($data);
    }

    /**
     *  Sale
     */
    function sale($totalPrice) {
        $sale = 0;
        if ($totalPrice > 10000000)
            $sale = 10;
        else if ($totalPrice < 9999999)
                $sale = 5;
        else $sale = 0;
        return $sale;
    }

	/**
    * Replace name to slug. URL
    **/
    function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
	}
	
	/**
    * debug
    **/
    function _debug($data) {

        echo '<pre style="background: #000; color: #fff; width: 100%; overflow: auto">';
        echo '<div>Your IP: ' . $_SERVER['REMOTE_ADDR'] . '</div>';

        $debug_backtrace = debug_backtrace();
        $debug = array_shift($debug_backtrace);

        echo '<div>File: ' . $debug['file'] . '</div>';
        echo '<div>Line: ' . $debug['line'] . '</div>';

        if(is_array($data) || is_object($data)) {
            print_r($data);
        }
        else {
            var_dump($data);
        }
        echo '</pre>';
	}

	if( ! function_exists('xss_clean') ) {
        function xss_clean($data)
        {
            // Fix &entity\n;
            $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
            $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
            $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
            $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

            // Remove any attribute starting with "on" or xmlns
            $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

            // Remove javascript: and vbscript: protocols
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

            // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

            // Remove namespaced elements (we do not need them)
            $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

            do
            {
                // Remove really unwanted tags
                $old_data = $data;
                $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
            }
            while ($old_data !== $data);

            // we are done...
            return $data;
        }
    }
	
?>