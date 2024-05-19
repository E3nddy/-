<?php

require_once 'osamu_config.php';

$c = 13;
$o = 0;
if (isset($_GET['count'])) $c = intval($_GET['count']);
if ($c > 13) $c = 13;
if (isset($_GET['offset'])) $o = intval($_GET['offset']);

$sql = sprintf('SELECT `id`, `title`, `description`, `director`, `year`, `logo` FROM `videos` LIMIT %d OFFSET %d', $c, $o);
$videos = $conn->query($sql);

$result = '{"videos": [';
foreach ($videos as $row){
$id = $row['id'];
$title = $row['title'];
$de = $row['description'];
$di = $row['director'];
$year = $row['year'];
$logo = $row['logo'];

$result .= sprintf('{"id": %d, "title": "%s", "description": "%s", "director":%s, "year":%d, "logo": "%s"},', $id, $title, $de, $di, $year, $logo);
}
$result = rtrim($result, ',');
$result .= ']}';

echo $result;
?>