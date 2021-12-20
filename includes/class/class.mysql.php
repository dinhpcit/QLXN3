<?php

/*
 * @viNagon: class.mysql.php 
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

if ( defined( 'DF_CLASS_SQL_DB_PHP' ) ) return;
define( 'DF_CLASS_SQL_DB_PHP', true );

if ( ! defined( 'DF_SITE_TIMEZONE_NAME' ) ) define( 'DF_SITE_TIMEZONE_NAME', '+00:00' );

/**
 * sql_db
 * 
 * @package   
 * @author viNagon
 * @copyright PCD-GROUP
 * @version 2011
 * @access public
 */
class sql_db
{
    const NOT_CONNECT_TO_MYSQL_SERVER = 'Sorry! Could not connect to mysql server';
    const DATABASE_NAME_IS_EMPTY = 'Error! The database name is not the connection name';
    const UNKNOWN_DATABASE = 'Error! Unknown database';
    
    public $server = 'localhost';
    public $user = 'root';
    public $dbname = '';
    public $sql_version;
    public $db_charset;
    public $db_collation;
    public $db_time_zone;
    public $error = array();
    public $time = 0;
    public $query_strs = array();
    private $persistency = false;
    private $new_link = false;
    private $db_connect_id = false;
    private $create_db = false;
    private $query_result = false;
    private $row = array();
    private $rowset = array();

    /**
     * sql_db::__construct()
     * 
     * @param mixed $db_config
     * @return
     */
    public function __construct ( $db_config = array() )
    {
        $stime = array_sum( explode( " ", microtime() ) );
        
        if ( isset( $db_config['dbhost'] ) and ! empty( $db_config['dbhost'] ) ) $this->server = $db_config['dbhost'];
        if ( isset( $db_config['dbport'] ) and ! empty( $db_config['dbport'] ) ) $this->server .= ':' . $db_config['dbport'];
        if ( isset( $db_config['dbname'] ) ) $this->dbname = $db_config['dbname'];
        if ( isset( $db_config['dbuname'] ) ) $this->user = $db_config['dbuname'];
        if ( isset( $db_config['new_link'] ) ) $this->new_link = ( bool )$db_config['new_link'];
        if ( isset( $db_config['create_db'] ) ) $this->create_db = ( bool )$db_config['create_db'];
        if ( isset( $db_config['persistency'] ) ) $this->persistency = ( bool )$db_config['persistency'];
        
        $this->sql_connect( $db_config['dbpass'] );
        
        if ( $this->db_connect_id ) $this->sql_setdb();
        
        $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
    }

    /**
     * sql_db::sql_connect()
     * 
     * @return
     */
    private function sql_connect ( $dbpass )
    {
        $this->db_connect_id = mysqli_connect ($this->server, $this->user, $dbpass, $this->dbname );
		unset( $dbpass );
        if ( mysqli_connect_errno() )
        {
            $this->error = mysqli_connect_errno();
        }
    }

    /**
     * sql_db::sql_setdb()
     * 
     * @return
     */
    private function sql_setdb ( )
    {
        
    }

    /**
     * sql_db::sql_close()
     * 
     * @return
     */
    public function sql_close ( )
    {
        if ( $this->db_connect_id )
        {
            if ( is_resource( $this->query_result ) ) @mysqli_free_result( $this->query_result );
            if ( ! $this->persistency )
            {
                $result = @mysqli_close( $this->db_connect_id );
                if ( ! $result ) $this->error = $this->sql_error();
                $this->db_connect_id = null;
                $this->row = array();
                $this->rowset = array();
                return $result;
            }
        }
        return false;
    }

    /**
     * sql_db::sql_query()
     * 
     * @param string $query
     * @return
     */
    public function sql_query ( $query = "" )
    {
        $stime = array_sum( explode( " ", microtime() ) );
        $this->query_result = false;
        if ( ! empty( $query ) )
        {
            $query = preg_replace( '/union/', 'UNI0N', $query );
            $this->query_result = @mysqli_query( $this->db_connect_id,$query );
            $this->query_strs[] = array( 
                htmlspecialchars( $query ), ( $this->query_result ? true : false ) 
            );
        }
        if ( $this->query_result )
        {
            $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
            return $this->query_result;
        }
        else
        {
            $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
            return false;
        }
    }

    /**
     * sql_db::sql_query_insert_id()
     * 
     * @param string $query
     * @return
     */
    public function sql_query_insert_id ( $query = "" )
    {
        if ( empty( $query ) or ! preg_match( "/^INSERT\s/is", $query ) )
        {
            return false;
        }
        if ( ! $this->sql_query( $query ) )
        {
            return false;
        }
        $result = @mysqli_insert_id( $this->db_connect_id );
        return $result;
    }

    /**
     * sql_db::sql_numrows()
     * 
     * @param integer $query_id
     * @return
     */
    public function sql_numrows ( $query_id = 0 )
    {
        $stime = array_sum( explode( " ", microtime() ) );
        if ( empty( $query_id ) ) $query_id = $this->query_result;
        
        if ( ! empty( $query_id ) )
        {
            $result = @mysqli_num_rows( $query_id );
            $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
            return $result;
        }
        $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
        return false;
    }

    /**
     * sql_db::sql_affectedrows()
     * 
     * @return
     */
    public function sql_affectedrows ( )
    {
        $stime = array_sum( explode( " ", microtime() ) );
        if ( $this->db_connect_id )
        {
            $result = @mysqli_affected_rows( $this->db_connect_id );
            $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
            return $result;
        }
        $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
        return false;
    }

    /**
     * sql_db::sql_numfields()
     * 
     * @param integer $query_id
     * @return
     */
    public function sql_numfields ( $query_id = 0 )
    {
		/*
        $stime = array_sum( explode( " ", microtime() ) );
        if ( empty( $query_id ) ) $query_id = $this->query_result;
        
        if ( ! empty( $query_id ) )
        {
            $result = @mysql_num_fields( $query_id );
            $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
            return $result;
        }
        $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
        */
		return false;
    }

    /**
     * sql_db::sql_fieldname()
     * 
     * @param mixed $offset
     * @param integer $query_id
     * @return
     */
    public function sql_fieldname ( $offset, $query_id = 0 )
    {
		/*
        $stime = array_sum( explode( " ", microtime() ) );
        if ( empty( $query_id ) ) $query_id = $this->query_result;
        
        if ( ! empty( $query_id ) )
        {
            $result = @mysql_field_name( $query_id, $offset );
            $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
            return $result;
        }
        $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
        */
		return false;
    }

    /**
     * sql_db::sql_fieldtype()
     * 
     * @param mixed $offset
     * @param integer $query_id
     * @return
     */
    public function sql_fieldtype ( $offset, $query_id = 0 )
    {
		/*
        $stime = array_sum( explode( " ", microtime() ) );
        if ( empty( $query_id ) ) $query_id = $this->query_result;
        
        if ( ! empty( $query_id ) )
        {
            $result = @mysql_field_type( $query_id, $offset );
            $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
            return $result;
        }
        $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
        */
		return false;
    }

    /**
     * sql_db::sql_fetchrow()
     * 
     * @param integer $query_id
     * @param integer $type
     * @return
     */
    public function sql_fetchrow ( $query_id = 0, $type = 0 )
    {
        $stime = array_sum( explode( " ", microtime() ) );
        if ( empty( $query_id ) ) $query_id = $this->query_result;
        
        if ( ! empty( $query_id ) )
        {
            if ( $type != 1 and $type != 2 ) $type = 0;
            switch ( $type )
            {
                case 1:
                    $this->row = @mysqli_fetch_array( $query_id, MYSQLI_NUM );
                    break;
                
                case 2:
                    $this->row = @mysqli_fetch_array( $query_id, MYSQLI_ASSOC );
                    break;
                
                default:
                    $this->row = @mysqli_fetch_array( $query_id, MYSQLI_BOTH );
            }
            $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
            return $this->row;
        }
        $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
        return false;
    }

    /**
     * sql_db::sql_fetchrowset()
     * 
     * @param integer $query_id
     * @return
     */
    public function sql_fetchrowset ( $query_id = 0 )
    {
        $stime = array_sum( explode( " ", microtime() ) );
        if ( empty( $query_id ) ) $query_id = $this->query_result;
        
        if ( ! empty( $query_id ) )
        {
            unset( $this->rowset );
            unset( $this->row);
            while ( $this->rowset = @mysqli_fetch_array( $query_id ) )
            {
                $result[] = $this->rowset;
            }
            $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
            return $result;
        }
        $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
        return false;
    }

    /**
     * sql_db::sql_fetchfield()
     * 
     * @param mixed $field
     * @param integer $rownum
     * @param integer $query_id
     * @return
     */
    public function sql_fetchfield ( $field, $rownum = -1, $query_id = 0 )
    {
		/*
        if ( empty( $query_id ) ) $query_id = $this->query_result;
        
        $result = false;
        if ( ! empty( $query_id ) )
        {
            if ( $rownum > - 1 )
            {
                $result = @mysql_result( $query_id, $rownum, $field );
            }
            else
            {
                if ( empty( $this->row['' . $query_id . ''] ) && empty( $this->rowset['' . $query_id . ''] ) )
                {
                    if ( $this->sql_fetchrow() ) $result = $this->row['' . $query_id . ''][$field];
                }
                else
                {
                    if ( $this->rowset['' . $query_id . ''] )
                    {
                        $result = $this->rowset['' . $query_id . ''][$field];
                    }
                    elseif ( $this->row['' . $query_id . ''] )
                    {
                        $result = $this->row['' . $query_id . ''][$field];
                    }
                }
            }
        }
        return $result;
		*/
    }

    /**
     * sql_db::sql_rowseek()
     * 
     * @param mixed $rownum
     * @param integer $query_id
     * @return
     */
    public function sql_rowseek ( $rownum, $query_id = 0 )
    {
        if ( empty( $query_id ) ) $query_id = $this->query_result;
        
        if ( ! empty( $query_id ) )
        {
            $result = @mysqli_data_seek( $query_id, $rownum );
            return $result;
        }
        return false;
    }

    /**
     * sql_db::sql_fetch_assoc()
     * 
     * @param integer $query_id
     * @return
     */
    public function sql_fetch_assoc ( $query_id = 0 )
    {
        $stime = array_sum( explode( " ", microtime() ) );
        if ( empty( $query_id ) ) $query_id = $this->query_result;
        
        if ( ! empty( $query_id ) )
        {
            $this->row = @mysqli_fetch_assoc( $query_id );
            $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
            return $this->row;
        }
        $this->time += ( array_sum( explode( " ", microtime() ) ) - $stime );
        return false;
    }

    /**
     * sql_db::sql_freeresult()
     * 
     * @param integer $query_id
     * @return
     */
    public function sql_freeresult ( $query_id = 0 )
    {
        if ( empty( $query_id ) ) $query_id = $this->query_result;
        
        if ( is_resource( $query_id ) )
        {
            unset( $this->row );
            unset( $this->rowset );
            @mysqli_free_result( $query_id );
            return true;
        }
        return false;
    }

    /**
     * sql_db::sql_error()
     * 
     * @param string $message
     * @return
     */
    public function sql_error ( $message = '' )
    {
        if ( ! $this->db_connect_id )
        {
            return array( 
                'message' => @mysqli_error(), 'user_message' => $message, 'code' => @mysqli_error() 
            );
        }
        return array( 
            'message' => @mysqli_error( $this->db_connect_id ), 'user_message' => $message, 'code' => @mysqli_error( $this->db_connect_id ) 
        );
    }

    /**
     * sql_db::fixdb()
     * 
     * @param mixed $value
     * @return
     */
    public function fixdb ( $value )
    {
		/*
        $value = str_replace( '\'', '&#039;', $value );
        $value = preg_replace( array( 
            "/(se)(lect)/i", "/(uni)(on)/i", "/(con)(cat)/i", "/(c)(har)/i", "/(out)(file)/i", "/(al)(ter)/i", "/(in)(sert)/i", "/(d)(rop)/i", "/(f)(rom)/i", "/(whe)(re)/i", "/(up)(date)/i", "/(de)(lete)/i", "/(cre)(ate)/i" 
        ), "$1-$2", $value );
		*/
        return $value;
    }

    /**
     * sql_db::unfixdb()
     * 
     * @param mixed $value
     * @return
     */
    function unfixdb ( $value )
    {
        /*
		$value = preg_replace( array( 
            "/(se)\-(lect)/i", "/(uni)\-(on)/i", "/(con)\-(cat)/i", "/(c)\-(har)/i", "/(out)\-(file)/i", "/(al)\-(ter)/i", "/(in)\-(sert)/i", "/(d)\-(rop)/i", "/(f)\-(rom)/i", "/(whe)\-(re)/i", "/(up)\-(date)/i", "/(de)\-(lete)/i", "/(cre)\-(ate)/i" 
        ), "$1$2", $value );
		*/
        return $value;
    }

    /**
     * sql_db::dbescape()
     * 
     * @param mixed $value
     * @return
     */
    public function dbescape ( $value )
    {
        if ( is_array( $value ) )
        {
            $value = array_map( array( 
                $this, __function__ 
            ), $value );
        }
        else
        {
            if ( ! is_numeric( $value ) || $value{0} == '0' )
            {
                $value = "'" . mysqli_real_escape_string( $this->db_connect_id,$this->fixdb( $value ) ) . "'";
            }
        }
        
        return $value;
    }

    /**
     * sql_db::dbescape_string()
     * 
     * @param mixed $value
     * @return
     */
    public function dbescape_string ( $value )
    {
        if ( is_array( $value ) )
        {
            $value = array_map( array( 
                $this, __function__ 
            ), $value );
        }
        else
        {
            $value = "'" . mysqli_real_escape_string( $this->db_connect_id, $this->fixdb( $value ) ) . "'";
        }
        
        return $value;
    }

    /**
     * sql_db::DF_dblikeescape()
     * 
     * @param mixed $value
     * @return
     */
    public function dblikeescape ( $value )
    {
        if ( is_array( $value ) )
        {
            $value = array_map( array( 
                $this, __function__ 
            ), $value );
        }
        else
        {
            $value = mysqli_real_escape_string($this->db_connect_id, $this->fixdb( $value ) );
            $value = addcslashes( $value, '_%' );
        }
        
        return $value;
    }

    /**
     * sql_db::constructQuery()
     * 
     * @return
     */
    public function constructQuery ( )
    {
        $numargs = func_num_args();
        if ( empty( $numargs ) ) return false;
        
        $pattern = func_get_arg( 0 );
        if ( empty( $pattern ) ) return false;
        unset( $matches );
        $pattern = preg_replace( "/[\n\r\t]/", " ", $pattern );
        $pattern = preg_replace( "/[ ]+/", " ", $pattern );
        $pattern = preg_replace( array( 
            "/([\S]+)\[/", "/\]([\S]+)/", "/\[[\s]+/", "/[\s]+\]/", "/[\s]*\,[\s]*/" 
        ), array( 
            "\\1 [", "] \\1", "[", "]", ", " 
        ), $pattern );
        
        preg_match_all( "/[\s]*[\"|\']*[\s]*\[([s|d])([a]*)\][\s]*[\"|\']*[\s]*/", $pattern, $matches );
        
        $replacement = func_get_args();
        unset( $replacement[0] );
        
        $count1 = count( $matches[0] );
        $count2 = count( $replacement );
        
        if ( ! empty( $count1 ) )
        {
            if ( $count2 < $count1 ) return false;
            $replacement = array_values( $replacement );
            $pattern = str_replace( "%", "[:25:]", $pattern );
            $pattern = preg_replace( "/[\s]*[\"|\']*[\s]*\[([s|d])([a]*)\][\s]*[\"|\']*[\s]*/", " %s ", $pattern );
            
            $repls = array();
            foreach ( $matches[1] as $key => $datatype )
            {
                $repls[$key] = $replacement[$key];
                if ( $datatype == 's' )
                {
                    if ( isset( $matches[2][$key] ) and $matches[2][$key] == 'a' )
                    {
                        $repls[$key] = ( array )$repls[$key];
                        if ( ! empty( $repls[$key] ) )
                        {
                            $repls[$key] = array_map( array( 
                                $this, 'fixdb' 
                            ), $repls[$key] );
                            $repls[$key] = array_map( 'mysqli_real_escape_string', $repls[$key] );
                            $repls[$key] = "'" . implode( "','", $repls[$key] ) . "'";
                        }
                        else
                        {
                            $repls[$key] = "''";
                        }
                    }
                    else
                    {
                        $repls[$key] = "'" . ( ! empty( $repls[$key] ) ? mysqli_real_escape_string( $this->fixdb( $repls[$key] ) ) : "" ) . "'";
                    }
                }
                else
                {
                    if ( isset( $matches[2][$key] ) and $matches[2][$key] == 'a' )
                    {
                        $repls[$key] = ( array )$repls[$key];
                        $repls[$key] = ( ! empty( $repls[$key] ) ) ? "'" . implode( "','", array_map( 'intval', $repls[$key] ) ) . "'" : "'0'";
                    }
                    else
                    {
                        $repls[$key] = "'" . intval( $repls[$key] ) . "'";
                    }
                }
            }
            eval( "\$query = sprintf(\$pattern,\"" . implode( "\",\"", $repls ) . "\");" );
            $query = str_replace( "[:25:]", "%", $query );
        }
        else
        {
            $query = $pattern;
        }
        
        return $query;
    }
}

?>