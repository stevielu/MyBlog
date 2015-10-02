/**
 * Created by Huang on 2015/6/16.
 */



var cow1Obj=document.getElementById("cow1");
var cow2Obj=document.getElementById("cow2");
var cow3Obj=document.getElementById("cow5");
var cow4Obj=document.getElementById("cow6");
var obj=document.getElementsByClassName("more_right");




/*
function skillssliderin(){
    skillsObj[0].style.webkitTransform="translatey(-20px)";
}

function skillssliderout(){
    skillsObj[0].style.webkitTransform="translatey(0px)";
}
*/
function moveleft(index){
    var next=parseInt(index)+1;
    obj[index].style.webkitTransform="translateX(-20px)";
    obj[next].style.webkitTransform="translateX(-22px)";
}
function moveright(index){
    var next=parseInt(index)+1;
    obj[index].style.webkitTransform="translateX(0px)";
    obj[next].style.webkitTransform="translateX(0px)";
}

var dateObj=new Date;
var month=dateObj.getMonth()+1;
var day=dateObj.getDate();
var mdegree=30*month+day;

var mrotate="rotate("+mdegree+"deg)";

window.onload=function() {
    //skillsObj[0].onmouseover=skillssliderin;
    //skillsObj[0].onmouseout=skillssliderout;

    cow1Obj.addEventListener('mouseover',function(){
        moveleft('0');
    },false);
    cow1Obj.addEventListener('mouseout',function(){
        moveright('0');
    },false);
    cow2Obj.addEventListener('mouseover',function(){
        moveleft('2');
    },false);
    cow2Obj.addEventListener('mouseout',function(){
        moveright('2');
    },false);
    cow3Obj.addEventListener('mouseover',function(){
        moveleft('4');
    },false);
    cow3Obj.addEventListener('mouseout',function(){
        moveright('4');
    },false);
    cow4Obj.addEventListener('mouseover',function(){
        moveleft('6');
    },false);
    cow4Obj.addEventListener('mouseout',function(){
        moveright('6');
    },false);

    showHide();

    
    setInterval(function(){
        $("#months").css({"transform":mrotate});
    },1000);
};


//cow1Obj.onmouseover=zoomIn('0');
// Shows and hides circles in the scroll invitation line.
function showHide() {/*
    // Loop throught each circles, do
    $.each($('circle'), function(i, el) {
        // change the opacity to 0.
        $(el).css({
            'opacity': 0
        });
        // change the opacity to 1 with a transition.
        setTimeout(function() {
            $(el).animate({
                'opacity': 1.0
            }, 450);
        }, 50 + (i * 35)); // growing delay to each circles
    });

    // Loop again throught each circles
    $.each($('circle'), function(i, el) {
        // and hide the circles
        setTimeout(function() {
            $(el).animate({
                'opacity': 0
            }, 450);
        }, 50 + (i * 35));
    });
    // Loop the animation
    x = setTimeout("showHide()", 2700);
    */
}
//
