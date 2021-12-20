<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

function fn_delete_cache ( $pattern )
{
    if ( $dh = opendir( DF_ROOTDIR . "/" . DF_CACHEDIR ) )
    {
        while ( ( $file = readdir( $dh ) ) !== false )
        {
            if ( preg_match( $pattern, $file ) )
            {
                unlink( DF_ROOTDIR . "/" . DF_CACHEDIR . "/" . $file );
            }
        }
        closedir( $dh );
    }
}

function fn_delete_all_cache ( )
{
    $pattern = "/(.*)\.cache/";
    fn_delete_cache( $pattern );
}

function fn_del_moduleCache ( $module_name, $lang = DF_LANG_DATA )
{
    $pattern = "/^" . $lang . "\_" . $module_name . "\_(.*)\.cache$/i";
    fn_delete_cache( $pattern );
}

function fn_get_cache ( $filename )
{
    if ( empty( $filename ) or ! preg_match( "/(.*)\.cache/", $filename ) ) return false;
    $filename = basename( $filename );
    if ( ! file_exists( DF_ROOTDIR . "/" . DF_CACHEDIR . "/" . $filename ) ) return false;
    return file_get_contents( DF_ROOTDIR . "/" . DF_CACHEDIR . "/" . $filename );
}

function fn_set_cache ( $filename, $content )
{
    if ( empty( $filename ) or ! preg_match( "/(.*)\.cache/", $filename ) ) return false;
    $filename = basename( $filename );
    return file_put_contents ( DF_ROOTDIR . "/" . DF_CACHEDIR . "/" . $filename, $content );
}

function fn_db_cache ( $sql, $key = '', $modname = '', $lang = DF_LANG_DATA )
{
    global $db;
    $list = array();
    if ( empty( $sql ) ) return $list;
    $cache_file = $lang . "_" . $modname . "_" . md5( $sql ) . "_" . DF_CACHE_PREFIX . ".cache"; 
    if ( ( $cache = fn_get_cache( $cache_file ) ) != false )
    {
		$list = unserialize( $cache );
    }
    else
    {
        if ( ( $result = $db->sql_query( $sql ) ) !== false )
        {
            while ( $row = $db->sql_fetchrow( $result, 2 ) )
			{
				if(!empty($row[$key])) $list[$row[$key]] = $row;
				else $list[] = $row;
			}
            $db->sql_freeresult( $result );
            $cache = serialize( $list );
            fn_set_cache( $cache_file, $cache );
        }
    }
    return $list;
}

function fn_db_cache_ex ( $sql, $key = '', $modname = '' )
{
    global $db;
    
    $list = array();
    
    if ( empty( $sql ) ) return $list;
    
    $cache_file = DF_LANG_DATA . "_" . $modname . "_" . md5( $key ) . "_" . DF_CACHE_PREFIX . ".cache";
    if ( ( $cache = fn_get_cache( $cache_file ) ) != false )
    {
        $list = unserialize( $cache );
    }
    else
    {
        if ( ( $result = $db->sql_query( $sql ) ) !== false )
        {
			while ( $row = $db->sql_fetchrow( $result, 2 ) )
			{
				if(!empty($row[$key])) $list[$row[$key]] = $row;
				else $list[] = $row;
			}
			
            $db->sql_freeresult( $result );
            
            $cache = serialize( $list );
            fn_set_cache( $cache_file, $cache );
        }
    }
    return $list;
}

function fn_db_cache_av ( $sql, $cache_name, $cache_timeout, $modname = '' )
{
    global $db;
    $list = array();
    if ( empty( $sql ) ) return $list;
    $cache_file = DF_LANG_DATA . "_" . $modname . "_adv_" . md5( $cache_name ) . "_" . DF_CACHE_PREFIX . ".cache";
    $timeout = fn_get_filemtime( $cache_file );
    if ( DF_CURRENTTIME - $timeout >= $cache_timeout )
    {
        if ( ( $result = $db->sql_query( $sql ) ) !== false )
        {
            while ( $row = $db->sql_fetchrow( $result, 2 ) )
			{
				$list[] = $row;
			}
            $db->sql_freeresult( $result );
            
            $cache = serialize( $list );
            fn_set_cache( $cache_file, $cache );
        }
    }
    elseif ( ( $cache = fn_get_cache( $cache_file ) ) != false )
    {
        $list = unserialize( $cache );
    }
    return $list;
}

function fn_get_filemtime ( $filename )
{
    if ( empty( $filename ) or ! preg_match( "/(.*)\.cache/", $filename ) ) return 0;
    $filename = basename( $filename );
    if ( ! file_exists( DF_ROOTDIR . "/" . DF_CACHEDIR . "/" . $filename ) ) return 0;
    return filemtime( DF_ROOTDIR . "/" . DF_CACHEDIR . "/" . $filename );
}

function fn_db_cache_array ( $sql, $cache_name, $cache_timeout, $modname = '' )
{
    global $db, $module_name;
    if ( empty( $modname ) ) $modname = $module_name;
    $list = array( "numrow"=> 0 , 'list' => array() );
    if ( empty( $sql ) ) return $list;
    $cache_file = DF_LANG_DATA . "_" . $modname . "_adv_" . md5( $cache_name ) . "_" . DF_CACHE_PREFIX . ".cache";
    $timeout = fn_get_filemtime( $cache_file );
    if ( DF_CURRENTTIME - $timeout >= $cache_timeout )
    {
        if ( ( $result = $db->sql_query( $sql ) ) !== false )
        {
            $result_all = $db->sql_query( "SELECT FOUND_ROWS()" );
            list( $numf ) = $db->sql_fetchrow( $result_all );
            $all_page = ( $numf ) ? $numf : 1;
            $list_temp = array();
            while ( $row = $db->sql_fetchrow( $result,2 ) )
            {
                $list_temp[] = $row;
            }
            $db->sql_freeresult( $result );
            $list = array( 
                "numrow" => $all_page, 'list' => $list_temp 
            );
            unset( $list_temp );
            $cache = serialize( $list );
            fn_set_cache( $cache_file, $cache );
        }
    }
    elseif ( ( $cache = fn_get_cache( $cache_file ) ) != false )
    {
        $list = unserialize( $cache );
    }
    return $list;
}

function fn_db_cache_none ( $sql )
{
    global $db;
    $list = array();
    if ( ( $result = $db->sql_query( $sql ) ) !== false )
    {
        while ( $row = $db->sql_fetchrow( $result,2 ) )
        {
            $list[] = $row;
        }
        $db->sql_freeresult( $result );
    }
    return $list;
}
?>