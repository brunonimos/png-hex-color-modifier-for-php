<?php

if(isset($_POST['color'])){
$hexPNG=new hexPNG();
$resp=$hexPNG->colorChanger($_POST['color']);
print_r($resp);
}

class hexPNG {

public function colorChanger($hex){
$allwebhex=array();
$allwebhex[]="40160180";
$allwebhex[]="d85cb7e2";
$allwebhex[]="af9ada3c";
$allwebhex[]="806ce214";
$allwebhex[]="44e337f2";
$allwebhex[]="6e8b1ecd";
$allwebhex[]="1ee9e118";
$allwebhex[]="712f0232";
$allwebhex[]="c2bb989e";
$allwebhex[]="8e9ea2c2";
$allwebhex[]="17899955";
$allwebhex[]="15b30fc4";
$allwebhex[]="fb2c513d";
$allwebhex[]="de690187";
$allwebhex[]="1ae6d461";
$allwebhex[]="0b23b7e1";
$webhex=null;
$color=null;
switch($hex){
case "00ff21":
$webhex="40160180";
$color="green";
break;
case "00ff90":
$webhex="d85cb7e2";
$color="cyan2";
break;
case "00ffff":
$webhex="af9ada3c";
$color="cyan1";
break;
case "0026ff":
$webhex="806ce214";
$color="blue";
break;
case "0094ff":
$webhex="44e337f2";
$color="turquoise";
break;
case "4800ff":
$webhex="6e8b1ecd";
$color="purple";
break;
case "010101":
$webhex="1ee9e118";
$color="black";
break;
case "404040":
$webhex="712f0232";
$color="gray";
break;
case "b6ff00":
$webhex="c2bb989e";
$color="yellowgreen";
break;
case "b200ff":
$webhex="8e9ea2c2";
$color="lightpurple";
break;
case "ff0000":
$webhex="17899955";
$color="red";
break;
case "ff00dc":
$webhex="15b30fc4";
$color="pink";
break;
case "ff006e":
$webhex="fb2c513d";
$color="lightpink";
break;
case "ff6a00":
$webhex="de690187";
$color="orange";
break;
case "ffd800":
$webhex="1ae6d461";
$color="yellow";
break;
case "ffffff":
$webhex="0b23b7e1";
$color="white";
break;
default:
print_r("Invalid Color");
break;
}
$file=file_get_contents('../img/test.png');
$data=bin2hex($file);
$arr=array();
$arr=explode("5445",$data);
for($i=1;$i<sizeof($arr);$i++){
$subs=substr($arr[$i],0,6);
$data=str_replace($subs,$hex,$data);
}
foreach($allwebhex as $key => $value){
$data=str_replace($value,$webhex,$data);
}
$data=hex2bin($data);
$imageData=base64_encode($data);
$src="data:image/png;base64,".$imageData;
$imagefile=fopen('../img/test.png',"wb");
fwrite($imagefile,$data); 
fclose($imagefile);
return $src;
}

}

?>