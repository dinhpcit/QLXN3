<?php

/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

if ( defined( 'DF_CLASS_REQUEST' ) ) return;
define( 'DF_CLASS_REQUEST', true );

/**
 * @Request
 * @package   
 * @author 
 * @copyright PCD-GROUP
 * @version 2012
 * @access public
 */

class Request
{

    /**
     * Request::__construct()
     * @return
     */
    
    public function __construct ( )
    {
    
    }
	/**
     * Request::GetString()
     * @return
     */
    function GetString ( $name = "", $type = "post", $default = "" )
    {
        $val = "";
        if ( strtolower( $type ) == "post" )
        {
            $val = isset( $_POST[$name] ) ? $_POST[$name] : "";
        }
        elseif ( strtolower( $type ) == "get" )
        {
            $val = isset( $_GET[$name] ) ? $_GET[$name] : "";
        }
        if(empty($val)) $val = $default;
        return trim($val);
    }
	/**
     * Request::GetInt()
     * @return
     */
    function GetInt ( $name = "", $type = "post", $default = 0 )
    {
        $val = $default;
        if ( strtolower( $type ) == "post" )
        {
            $val = isset( $_POST[$name] ) ? $_POST[$name] : $default;
        }
        elseif ( strtolower( $type ) == "get" )
        {
            $val = isset( $_GET[$name] ) ? $_GET[$name] : $default;
        }
        return intval( $val );
    }
	/**
     * Request::GetDouble()
     * @return
     */
    function GetDouble ( $name = "", $type = "post", $default = 0 )
    {
        $val = $default;
        if ( strtolower( $type ) == "post" )
        {
            $val = isset( $_POST[$name] ) ? $_POST[$name] : $default;
        }
        elseif ( strtolower( $type ) == "get" )
        {
            $val = isset( $_GET[$name] ) ? $_GET[$name] : $default;
        }
        return doubleval( $val );
    }

}

?>