<?php
$rt = new \parallel\Runtime();

$rt->run(function(){
 for ($i = 0; $i < 50; $i++)
 echo "+";
});

for ($i = 0; $i < 50; $i++) {
 echo "-";
}