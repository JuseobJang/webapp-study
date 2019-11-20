function alerthello() {
  alert("Hello, world!");
}

window.onload = function() {
  $("text").style.fontSize = "12pt";
  $("bigger").onclick = biggertime;
  $("bling").onchange = box_checked;
  $("snoopify").onclick = snoopify;
  $("pig").onclick = pig;
  $("mal").onclick = malko;
}

function bigger() {
  var size = parseInt($("text").style.fontSize) + 12;
  $("text").style.fontSize = size + "pt";
  var i=0;

}

function biggertime(){
  setInterval("bigger()",500);
}

function box_checked() {
  if ($("bling").checked) {
    $("text").style.fontWeight = "bold";
    $("text").style.color = "green";
    $("text").style.textDecoration = "underline";
    $("back").style.backgroundImage = "url(http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/8/hundred.jpg)";
  } else {
    $("text").style.fontWeight = "normal";
    $("text").style.color = "black";
    $("text").style.textDecoration = "none";
    $("back").style.backgroundImage = "none";

  }
}

function snoopify() {
  $("text").value = $("text").value.toUpperCase();
  var text = $("text").value.split(".");
  $("text").value = text.join("-izzle");
}


function pig(){
  var texts = $("text").value.split(" ");
  for(var i=0;i<texts.length;i++){
    var word=[];
    var conso=[];
    for(var j=0;j<texts[i].length;j++){
      if(texts[i][j]=='a'||texts[i][j]=='e'||texts[i][j]=='i'||texts[i][j]=='o'||texts[i][j]=='u'){
        word = texts[i].slice(j);
        break;
      }
      else{
        conso += texts[i][j];
      }
    }
    texts[i] = word + conso + "ay";
  }
  $("text").value = texts.join(" ");
}

function malko(){
  var texts = $("text").value.split(" ");
  for(var i = 0 ; i < texts.length ; i++){
    if(texts[i].length >= 5){
      texts[i] = "Malkovitch";
    }
  }
  $("text").value = texts.join(" ");
}
