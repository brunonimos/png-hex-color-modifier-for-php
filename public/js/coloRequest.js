var coloRequest=(function(){
function coloRequest(){}
function inprivate(){
var colors=document.getElementsByName("color");
for(var i=0;i<colors.length;i++){
colors.item(i).addEventListener("click",function(){
var image=document.body.style.backgroundImage;
var extension=null;
var kind=null;
if(image.indexOf("data:image/png")===5){
extension="png";
}
if(image.indexOf("data:image/jpg")===5){
extension="jpg";
}
if(image.indexOf("data:image/")===5){
kind="stringImage";
}else{
kind="srcImage";
extension=image.split('"');
extension=extension[1];
extension=extension.split(".");
extension=extension.pop();
}
var request=new XMLHttpRequest();
var colors="color="+this.value+"";
if(extension=="png"){
request.open("POST","../resources/ImageHexModPNG.php");
}
if(extension=="jpg"){
request.open("POST","../resources/ImageHexModJPG.php");
}
request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
request.onreadystatechange=function(){
if(request.status==200){
document.body.style.backgroundImage='url('+request.responseText.replace(/(\r\n|\n|\r)/gm,"")+')';
}
};
request.send(colors);
});
}
}
coloRequest.prototype.inpublic=function(){
return inprivate.call(this);
};
return coloRequest;
})();
var req = new coloRequest();
req.inpublic();