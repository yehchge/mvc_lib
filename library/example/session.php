<!doctype html>
<html>
<head>
    <title>JREAM Library Example</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<div id="wrap">
<header><h1>jream\Session</h1></header>
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
new jream\Autoload('../jream');

jream\Session::start();
jream\Session::destroy();

jream\Session::set('name', 'jesse');
$data = array(
    'animal' => array(
        'dog'
    ),
    'horse' => array(
        'main' => 'other',
        'fish' => array(
            'something'
        )
    )
);
jream\Session::set($data);

echo '<pre>';
print_r(jream\Session::fetch('horse', 'fish', '0'));

echo '<hr />';

print_r($_SESSION);
?>

</div>
<!-- end:Wrap -->


<footer>
	(C) 2011 - 2012 Jesse Boyer &lt;http://jream.com&gt;
</footer>

</body>
</html>