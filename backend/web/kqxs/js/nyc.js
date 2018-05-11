// Bật tắt đầu đuôi
$(document).ready(function(){
  $("#daudit").click(function(){
    $("#bangdaudit").fadeToggle();
  });
});

// Hiệu ứng mở kqxs
$(document).ready(function(){
  $("#nyc-kqxs-open").click(function(){
    $("#nyc-kqxs").fadeToggle();
  });
});

// Hiệu ứng mở thống kê
$(document).ready(function(){
  $("#nyc-thongkesoi-open").click(function(){
    $("#nyc-thongkesoi").fadeToggle();
  });
});
// Hiệu ứng mở chơi số
$(document).ready(function(){
  $("#nyc-choiso-open").click(function(){
    $("#nyc-choiso").fadeToggle();
  });
});
// Hiệu ứng mở tiện ích
$(document).ready(function(){
  $("#nyc-tienich-open").click(function(){
    $("#nyc-tienich").fadeToggle();
  });
});

// Hiệu ứng mở danh mục thành viên online
$(document).ready(function(){
	$("#nyc-tv-open").click(function(){
		$("#nyc-danhsachtv").fadeToggle();
	});
});
// Change style of top container on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
  if (document.body.scrollTop > 900 || document.documentElement.scrollTop > 900) {
    document.getElementById("nyc-kqxs").style.display = "none";
    document.getElementById("nyc-thongkesoi").style.display = "none";
    document.getElementById("nyc-choiso").style.display = "none";
    document.getElementById("nyc-tienich").style.display = "none";
  }
}
//scroll top
$(document).ready(function() {
 $(window).scroll(function() { 
  if($(window).scrollTop() > '800') { 
    $('#top').fadeIn();
  } else {
    $('#top').fadeOut();
  }
});
 $('#top').click(function() {
   $('html, body').animate({scrollTop:0},2000);
 });
});

//hiệu ứng chử
// farbbibliothek = new Array();
// farbbibliothek[0] = new Array("#FF0000","#FF1100","#FF2200","#FF3300","#FF4400","#FF5500","#FF6600","#FF7700","#FF8800","#FF9900","#FFaa00","#FFbb00","#FFcc00","#FFdd00","#FFee00","#FFff00","#FFee00","#FFdd00","#FFcc00","#FFbb00","#FFaa00","#FF9900","#FF8800","#FF7700","#FF6600","#FF5500","#FF4400","#FF3300","#FF2200","#FF1100");
// farbbibliothek[1] = new Array("#FF0000","#FF4000","#FF8000","#FFC000","#FFFF00","#C0FF00","#80FF00","#40FF00","#00FF00","#00FF40","#00FF80","#00FFC0","#00FFFF","#00C0FF","#0080FF","#0040FF","#0000FF","#4000FF","#8000FF","#C000FF","#FF00FF","#FF00C0","#FF0080","#FF0040");
// farbbibliothek[2] = new Array("#FF0000","#EE0000","#DD0000","#CC0000","#BB0000","#AA0000","#990000","#880000","#770000","#660000","#550000","#440000","#330000","#220000","#110000","#000000","#110000","#220000","#330000","#440000","#550000","#660000","#770000","#880000","#990000","#AA0000","#BB0000","#CC0000","#DD0000","#EE0000");
// farbbibliothek[3] = new Array("#FF0000","#EE0000","#DD0000","#CC0000","#BB0000","#AA0000","#990000","#880000","#770000","#660000","#550000","#440000","#330000","#220000","#110000","#000000","#110000","#220000","#330000","#440000","#550000","#660000","#770000","#880000","#990000","#AA0000","#BB0000","#CC0000","#DD0000","#EE0000");
// farbbibliothek[4] = new Array("#FF0000","#FF1100","#FF2200","#FF3300","#FF4400","#FF5500","#FF6600","#FF7700","#FF8800","#FF9900","#FFaa00","#FFbb00","#FFcc00","#FFdd00","#FFee00","#FFff00","#FFee00","#FFdd00","#FFcc00","#FFbb00","#FFaa00","#FF9900","#FF8800","#FF7700","#FF6600","#FF5500","#FF4400","#FF3300","#FF2200","#FF1100");
// farben = farbbibliothek[4];
// function farbschrift(){for(var b=0;b<Buchstabe.length;b++){document.all["a"+b].style.color=farben[b]}farbverlauf()}function string2array(b){Buchstabe=new Array();while(farben.length<b.length){farben=farben.concat(farben)}k=0;while(k<=b.length){Buchstabe[k]=b.charAt(k);k++}}function divserzeugen(){for(var b=0;b<Buchstabe.length;b++){document.write("<span id='a"+b+"' class='a"+b+"'>"+Buchstabe[b]+"</span>")}farbschrift()}var a=1;function farbverlauf(){for(var b=0;b<farben.length;b++){farben[b-1]=farben[b]}farben[farben.length-1]=farben[-1];setTimeout("farbschrift()",30)}var farbsatz=1;function farbtauscher(){farben=farbbibliothek[farbsatz];while(farben.length<text.length){farben=farben.concat(farben)}farbsatz=Math.floor(Math.random()*(farbbibliothek.length-0.0001))}setInterval("farbtauscher()",5000);
//Thay đổi hình nền
/*var num;
var temp=120;
var speed=5;
var preloads=[];*/
/* add any number of images here */
/*preload(
  '../img/bg_2.png',
  '../img/bg_4.png',
  '../img/bg_2.png'
  );
function preload(){
  for(var c=0;c<arguments.length;c++) {
    preloads[preloads.length]=new Image();
    preloads[preloads.length-1].src=arguments[c];
  }
}
function rotateImages() {
  num=Math.floor(Math.random()*preloads.length);
  if(num==temp){
    rotateImages();
  }
  else{
    document.body.style.backgroundImage='url('+preloads[num].src+')';
    temp=num;
    setTimeout(function(){rotateImages()},speed);
  }
}

if(window.addEventListener){
  window.addEventListener('load',function(){setTimeout(function(){rotateImages()},speed)},false);
}
else {
  if(window.attachEvent){
    window.attachEvent('onload',function(){setTimeout(function(){rotateImages()},speed)});
  }
}*/
//slide show
// var myIndex = 0;
// // carousel();

// // function carousel() {
// //     var i;
// //     var x = document.getElementsByClassName("SlideLogo");
// //     for (i = 0; i < x.length; i++) {
// //       x[i].style.display = "none";  
// //     }
// //     myIndex++;
// //     if (myIndex > x.length) {myIndex = 1}    
// //     x[myIndex-1].style.display = "block";  
// //     setTimeout(carousel, 2500);    
// // }
