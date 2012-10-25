<?php
/**
 * @author      Jesse Boyer <contact@jream.com>
 * @copyright   Copyright (C), 2011-12 Jesse Boyer
 * @license     GNU General Public License 3 (http://www.gnu.org/licenses/)
 *              Refer to the LICENSE file distributed within the package.
 *
 * @link        http://jream.com
 * 
 * @category    Cookie
 */
namespace jream;
class Cookie
{
    /**
     * Set a Cookie
     * 
     * @param string $name Name of Cookie
     * @param mixed $data String or Array
     * @param integer $time Default is 1 day, use seconds 
     *          86400 = 1 day
     *          604800 = 1 week
     *          2419200 = 1 month
     * 
     * 
     * @return boolean Was the set successful?
     */
    public static function set($name, $data, $time = 86400)
    {
        if (is_string($data)) 
        {
            setcookie($name, $data, $time);
            return true;
        }
        elseif (is_array($data))
        {
            setcookie($name, json_encode($data), $time);
            return true;
        }
        else
        return false;
    }
    
    /**
     * Returns cookie data
     * 
     * @param string $name Name of the cookie
     * @param boolean $is_json Unserialize if it is JSON
     * 
     * @return mixed 
     */
    public static function fetch($name, $is_json = false)
    {
        if (isset($_COOKIE[$name]))
        {
            if ($is_json == true)
            return json_decode($_COOKIE[$name], true);
            
            else
            return $_COOKIE[$name];
            
        }
        else
        return false;
    }
    
    /**
     * Destroy a cookie
     * 
     * @param string $name
     */
    public static function destroy($name)
    {
        setcookie($name, '', time() - 36000);
        
        if (isset($_COOKIE[$name]))
        unset($_COOKIE[$name]);
    }
    
}