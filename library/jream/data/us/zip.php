<?php
/**
 * @author      Jesse Boyer <contact@jream.com>
 * @copyright   Copyright (C), 2011-12 Jesse Boyer
 * @license     GNU General Public License 3 (http://www.gnu.org/licenses/)
 *              Refer to the LICENSE file distributed within the package.
 *
 * @link        http://jream.com
 * 
 */
namespace jream\data\us;

class Zip
{
    
    private static $_list = array(
        'AK' => array(99500, 99999),
        'AL' => array(35000, 36999),
        'AR' => array(71600, 72999),
        'AZ' => array(58000, 86599),
        'CA' => array(90000, 96199),
        'CO' => array(80000, 81699),
        'CT' => array(06800, 06999),
        'DC' => array(20001, 20599),
        'DE' => array(19700, 19999),
        'FL' => array(32100, 34999),
        'GA' => array(30000, 31999),
        'HI' => array(96700, 96899),
        'IA' => array(50000, 52899),
        'ID' => array(83200, 83899),
        'IL' => array(60000, 62999),
        'IO' => array(83200, 83899),
        'IN' => array(46000, 47999),
        'KS' => array(66000, 64799),
        'KY' => array(40000, 42799),
        'LA' => array(70000, 71499),
        'MA' => array(01000, 02799),
        'MD' => array(20600, 21999),
        'ME' => array(03000, 04999),
        'MI' => array(48000, 49799),
        'MN' => array(55000, 56799),
        'MO' => array(63000, 65899),
        'MS' => array(38600, 39599),	
        'MT' => array(59000, 59999),
        'NC' => array(27000, 28999),
        'ND' => array(58000, 58899),
        'NE' => array(68000, 69399),
        'NH' => array(03000, 03899),
        'NJ' => array(07000, 08999),
        'NM' => array(87000, 88499),
        'NV' => array(89000, 89899),	
        'NY' => array(10000, 14999),
        'OH' => array(43000, 45899),
        'OK' => array(73000, 74999),
        'OR' => array(97000, 97999),
        'PA' => array(15000, 16999),	
        'PR' => array(00600, 00799),
        'RI' => array(02800, 02999),	
        'SC' => array(29000, 29999),
        'SD' => array(57000, 57799),	
        'TN' => array(37000, 35899),
        'TX' => array(75000, 79999),
        'UT' => array(84000, 84799)
    );

    /**
     * Fetch a state based on its acronym
     * 
     * @param mixed $acronym (Optional) 
     * 
     * @return string|array
     */
    public static function fetch($acronym = null)
    {
        if ($acronym == null) {
            return self::$_list;
        }
        
        if (isset(self::$_list[$acronym]))
        return self::$_list[$acronym];
        
        else 
        return false;
    }

}