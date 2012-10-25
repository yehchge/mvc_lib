<?php require 'markdown.php';?>
<?php $sections = array('namespaces', 'autoload', 'cookie', 'database', 'hash', 'input', 'mvc', 'output', 'registry', 'session'); ?>
<!doctype html>
<html>
<head>
    <title>Doc</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<div id="sidebar">
    <h1>Docs</h1>
    <a href='index.php'?>Index</a>
    <?php foreach ($sections as $i) {
        echo "<a href='?p=$i'>".ucwords($i)."</a>";
    }?>
        
</div>

<div id="content">
<h1></h1>

<?php 
$p = isset($_REQUEST['p']) ? $_REQUEST['p'] : null;

if (in_array($p, $sections)) {
    // Remove null byte
    $p = str_replace(chr(0), '', $p);
    $f = file_get_contents($p . ".md");
} else {
    $f = file_get_contents('home' . ".md");
}

echo markdown($f);

?>
</div>


</body>
</html>