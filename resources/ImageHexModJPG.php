<?php

if(isset($_POST['color'])){
$hexJPG=new hexJPG();
$resp=$hexJPG->colorChanger($_POST['color']);
print_r($resp);
}

class hexJPG {

public function colorChanger($hex){
$allwebhex=array();
$allwebhex["f64a28a2bfcef3fc4b"]="0a28a280";
$allwebhex["fa628a28af8f3fc270"]="a28a2800";
$allwebhex["fb328a28afeac3fc03"]="0a28a280";
$allwebhex["fccba28a2bfdcc3f9ac2"]="8a28a002";
$allwebhex["e3e8a28aff004e0ff2cc"]="28a28a00";
$allwebhex["fccba28a2bfdcc3ef0"]="28a28a00";
$allwebhex["fe7fe8"]="a28a0028";
$allwebhex["fcff00"]="a28a2800";
$allwebhex["fd30a28a2bfc333f3f"]="0a28a280";
$allwebhex["f91e8a28aff610ff0044"]="028a28a0";
$allwebhex["f8be8a28afe533fdfc"]="0a28a280";
$allwebhex["f13a28a2bfd0c3fdb8"]="0a28a280";
$allwebhex["f98e8a28afb03fddc0"]="a28a2800";
$allwebhex["ea28a28aff0031cff530"]="28a28a00";
$allwebhex["fd2ca28a2bfc333fa5"]="028a28a0";
$allwebhex["fdfc"]="a28a2800";
$color=null;
switch($hex){
case "00ff21":
$header="f64a28a2bfcef3fc4b";
$webhex="0a28a280";
$color="green";
break;
case "00ff90":
$header="fa628a28af8f3fc270";
$webhex="a28a2800";
$color="cyan2";
break;
case "00ffff":
$header="fb328a28afeac3fc03";
$webhex="0a28a280";
$color="cyan1";
break;
case "0026ff":
$header="fccba28a2bfdcc3f9ac2";
$webhex="8a28a002";
$color="blue";
break;
case "0094ff":
$header="e3e8a28aff004e0ff2cc";
$webhex="28a28a00";
$color="turquoise";
break;
case "4800ff":
$header="fccba28a2bfdcc3ef0";
$webhex="28a28a00";
$color="purple";
break;
case "010101":
$header="fe7fe8";
$webhex="a28a0028";
$color="black";
break;
case "404040":
$header="fcff00";
$webhex="a28a2800";
$color="gray";
break;
case "b6ff00":
$header="fd30a28a2bfc333f3f";
$webhex="0a28a280";
$color="yellowgreen";
break;
case "b200ff":
$header="f91e8a28aff610ff0044";
$webhex="028a28a0";
$color="lightpurple";
break;
case "ff0000":
$header="f8be8a28afe533fdfc";
$webhex="0a28a280";
$color="red";
break;
case "ff00dc":
$header="f13a28a2bfd0c3fdb8";
$webhex="0a28a280";
$color="pink";
break;
case "ff006e":
$header="f98e8a28afb03fddc0";
$webhex="a28a2800";
$color="lightpink";
break;
case "ff6a00":
$header="ea28a28aff0031cff530";
$webhex="28a28a00";
$color="orange";
break;
case "ffd800":
$header="fd2ca28a2bfc333fa5";
$webhex="a28a2800";
$color="yellow";
break;
case "ffffff":
$header="fdfc";
$webhex="a28a2800";
$color="white";
break;
default:
print_r("Invalid Color");
break;
}
$file=file_get_contents('../img/test.jpg');
$data=bin2hex($file);
$arr=array();
$arr=explode("003f00",$data);
foreach($allwebhex as $key => $value){
if(strpos($arr[1],$key)!==false){
$data=str_replace($key,$header,$data);
}
/*JPG Fix.
if(strpos($arr[1],$value)!==false){
$data=str_replace($value,$webhex,$data,$i);
}
*/
}
$data=hex2bin($data);
$imageData=base64_encode($data);
$src='data:image/jpg;base64,'.$imageData;
$imagefile=fopen('../img/test.jpg',"wb");
fwrite($imagefile,$data);
fclose($imagefile);
return $src;
}

}

?>