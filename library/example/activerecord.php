<!doctype html>
<html>
<head>
    <title>JREAM Library Example</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<div id="wrap">
<header><h1>jream\activerecord</h1></header>
<div id="content">

<p>
Temporary class, will be placed into the Database class soon.
</p>
    
<?php
/**
 * @author		Jesse Boyer <contact@jream.com>
 * @copyright	Copyright (C), 2011-12 Jesse Boyer
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *				Refer to the LICENSE file distributed within the package.
 *
 * @link		http://jream.com
 */
require_once '../jream/autoload.php';

new jream\Autoload('../jream/');

/**
 * Simple Interval to run in Command Line Interface
 * 
 * $ php cmd.php
 */
$ar = new jream\ActiveRecord('user');
$ar->select([
    'count(id)' => 'total',
    'name',
    'age'    
])->where([
    'age <' => 10,
    '&age >' => 5,
    '&DATE(date) <=' => '2012-10-25'
])->orderBy([
    'name', 
    'age,',
    'gender'
])->groupBy([
    'id'
])->limit([1, 2]);

//$ar->insert('table', [
//    'array', 'array', 'array'
//]);

$ar->run();
echo $ar->fetchQuery();

?>

</div>
<!-- end:Wrap -->

<footer>
	(C) 2011 - 2012 Jesse Boyer &lt;http://jream.com&gt;
</footer>

</body>
</html>