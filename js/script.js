function carruselLogIn(){
    var fotos = ["img/1.jpg","img/2.jpg","img/3.jpg","img/4.jpg"];
    var img=document.getElementById("carruselLogIn")
    img.src=fotos[Math.floor(Math.random()* 4)]
    
}
setInterval(carruselLogIn, 10000);
