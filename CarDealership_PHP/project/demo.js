var countDate=new Date('Aug 17,2021 00:00:00').getTime();
function newChamp(){
    var now= new Date().getTime();
    gap = countDate - now;
    var second= 1000;
    var minute=second*60;
    var hour= minute*60;
    var day= hour*24;
    
    var d= Math.floor(gap/(day));
    var h= Math.floor((gap%(day)) /(hour));
    var m= Math.floor((gap%(hour)) /(minute));
    var s= Math.floor((gap%(minute)) /(second));

    document.getElementById('day').innerText= d;
    document.getElementById('hour').innerText= h;
    document.getElementById('minute').innerText= m;
    document.getElementById('second').innerText= s;
}
setInterval(function(){
    newChamp();
},1000)
