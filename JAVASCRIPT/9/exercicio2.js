var img = new Image();
img.src ="paisagem.png";
var canvaXSize = 800;
var canvaYSize =200;
var speed = 30;
var scale =1.5;
var y = -4.5;
var dx = 0.75;
var imgW;
var imgH;
var x = 0;
var clearX;
var clearY;
var ctx;

img.onload =function(){
    imgW = img.width*scale;
    imgH = img.height*scale;
    if(imgW > canvaXSize){
        x = canvaXSize-imgW;
        clearX = imgW;
    }else{
        clearX = canvaXSize;
    }
    if(imgH > canvaYSize){
        clearY = imgH;
    }else{
        clearY = canvaYSize;
    }
    ctx = document.getElementById('canvas').getContext('2d');
    return setInterval(draw, speed);
}
function draw(){
    ctx.clearRect(0,0,clearX,clearY);
    if(imgW <= canvaXSize){
        if(x > (canvaXSize)){
            x = 0;
        }
        if(x > (canvaXSize-imgW)){
            ctx.drawImage(img, x-canvaXSize+1,y,imgW,imgH);
        }
    }else{
        if(x > (canvaXSize)){
            x = canvaXSize-imgW;
        }
        if(x > (canvaXSize-imgW)){
            ctx.drawImage(img, x,y,imgW, imgH)
        }
    }
    ctx.drawImage(img,x,y,imgW,imgH);
    x += dx;
}
