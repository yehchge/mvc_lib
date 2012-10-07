<!doctype html>
<html>
<head>
    <title>JREAM Library Example</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<div id="wrap">
<header><h1>jream\Database</h1></header>
<div id="content">
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

$db = new jream\Database(null, 'mysql', 'localhost', 'jream_test', 'root', '');

$config = array(
	'type' => 'mysql'
	,'host' => 'localhost'
	,'name' => 'jream_test'
	,'user' => 'root'
	,'pass' => ''
);

echo '<pre>';


$db = new jream\Database($config);

$db->replace('user', array('name' => '123s', 'userid' => '10001'));
echo $db->getQuery();

$db->insert('user', array('name' => 'Jesse'));
echo $db->getQuery();
$db->update('user', array('name' => 'Other'), "userid = '10002'");
echo $db->getQuery();
$db->delete('user', "userid = '10000'");
echo $db->getQuery();

$db->setFetchMode(\PDO::FETCH_ASSOC);
$result = $db->select('SELECT * FROM user', array());
print_r($result);

$db->setFetchMode(\PDO::FETCH_CLASS);
$result = $db->select('SELECT * FROM user', array());
print_r($result);

$result = $db->select('SELECT * FROM user', array(), \PDO::FETCH_NUM);
print_r($result);


$cols = $db->showColumns('user');
print_r($cols);

?>


</div>
<!-- end:Wrap -->

<footer>
	(C) 2011 - 2012 Jesse Boyer &lt;http://jream.com&gt;
</footer>

</body>
</html>