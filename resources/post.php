<?php

require_once __DIR__.'/ImageHexModPNG.php';

if(isset($_POST['color'])){
$aaa=new hexPNG();
$resp=$aaa->colorChanger($_POST['color']);
}

?>