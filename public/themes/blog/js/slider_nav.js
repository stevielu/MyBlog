var homeObj=document.getElementsByClassName("home");
var workObj=document.getElementsByClassName("work");
var galleryObj=document.getElementsByClassName("gallery");
var foodsObj=document.getElementsByClassName("foods");
var diariyObj=document.getElementsByClassName("diariy");
var skillsObj=document.getElementsByClassName("skills");
var slideConObj=document.getElementById("login_eff");
var slideObj=document.getElementById("login_slide");

function loginSliderin(){
    slideObj.style.webkitTransition="all 0.5s ease-in-out";
    slideObj.style.webkitTransform = "translateX(36px)";
}
function loginSliderout(){
    slideObj.style.webkitTransform = "translateX(0px)";
}
function homesliderin(){
    workObj[0].style.webkitTransform="translateX(-15px)";
    setTimeout(worksliderin,200);
    setTimeout(gallerysliderin,400);
    setTimeout(foodssliderin,600);
    setTimeout(diariysliderin,800);
}
function homesliderout(){
    workObj[0].style.webkitTransform="translateX(0px)";
    setTimeout(worksliderout,200);
    setTimeout(gallerysliderout,400);
    setTimeout(foodssliderout,600);
    setTimeout(diariysliderout,800);
}
function worksliderin(){
    galleryObj[0].style.webkitTransform="translateX(-15px)";
    setTimeout(gallerysliderin,200);
    setTimeout(foodssliderin,400);
    setTimeout(diariysliderin,600);
}
function worksliderout(){
    galleryObj[0].style.webkitTransform="translateX(0px)";
    setTimeout(gallerysliderout,200);
    setTimeout(foodssliderout,400);
    setTimeout(diariysliderout,600);
}

function gallerysliderin(){
    foodsObj[0].style.webkitTransform="translateX(-15px)";
    setTimeout(foodssliderin,200);
    setTimeout(diariysliderin,400);
}
function gallerysliderout(){
    foodsObj[0].style.webkitTransform="translateX(0px)";
    setTimeout(foodssliderout,200);
    setTimeout(diariysliderout,400);
}

function foodssliderin(){
    diariyObj[0].style.webkitTransform="translateX(-15px)";
    setTimeout(diariysliderin,200);
}
function foodssliderout(){
    diariyObj[0].style.webkitTransform="translateX(0px)";
    setTimeout(diariysliderout,200);
}

function diariysliderin(){
    skillsObj[0].style.webkitTransform="translateX(-15px)";
}
function diariysliderout(){
    skillsObj[0].style.webkitTransform="translateX(0)";
}
window.onload=function() {    
	slideConObj.onmouseover = loginSliderin;
    slideConObj.onmouseout = loginSliderout;
    homeObj[0].onmouseover=homesliderin;
    homeObj[0].onmouseout=homesliderout;
    workObj[0].onmouseover=worksliderin;
    workObj[0].onmouseout=worksliderout;
    galleryObj[0].onmouseover=gallerysliderin;
    galleryObj[0].onmouseout=gallerysliderout;
    foodsObj[0].onmouseover=foodssliderin;
    foodsObj[0].onmouseout=foodssliderout;
    diariyObj[0].onmouseover=diariysliderin;
    diariyObj[0].onmouseout=diariysliderout;
    $("#login_eff").click(function(){
        var loginPage = document.createElement("div");
        var quit = document.createElement("div");
        var info = document.createElement("div");

        loginPage.style.width="355px";
        loginPage.style.height="550px";
        loginPage.style.position = "absolute";
        loginPage.style.background = "url('images/LOGIN.png') center no-repeat";
        loginPage.style.left="50%";
        loginPage.style.marginLeft="-177.5px";
        loginPage.style.zIndex="99";
        loginPage.style.top="25%";
        loginPage.style.transition="all 1s";
        loginPage.style.opacity = "0";
        var imgObj="<img src='images/myportrait.png' style='position:absolute;top: 0%;left: 50%;width: 92px;height:94px;margin-left:-46px;margin-top:-46px;'>" +
            "<form id='mylogin' method='post'action='php/login.php' style='width: 355px;height: 107px;position: absolute;bottom: 0;'><p style='padding-left: 35px'>ID :<input id='user' type='text' style='width: 235px;height:26px;border-bottom:solid 1px #d2d2d2;border-top-style:  none;border-left-style:  none;border-right-style: none;text-decoration: none;background-color: transparent;'><i id='errusr' style='color:#ff5962;font-size: 0.7em;padding-left: 8px;visibility: hidden;' class=\"fa fa-times\"></i></p>"+
                "<p style='padding-left: 19px'>PSW :<input id='pwd' type='text' style='width: 235px;height:26px;border-bottom:solid 1px #d2d2d2;border-top-style:  none;border-left-style:  none;border-right-style: none;text-decoration: none;background-color: transparent;'><i id='errpwd' style='color:#ff5962;font-size: 0.7em;padding-left: 10px;visibility: hidden;' class=\"fa fa-times\"></i></p>"+
                "<button id='done' type='button'>submit</form>"
            ;
        $("#index").append(loginPage);
        setTimeout(function(){
            loginPage.style.opacity = "1";
        },100);

        info.style.width="355px";
        info.style.height="195px";
        info.style.position="absolute";
        info.style.bottom="0%";
        loginPage.appendChild(info);
        info.innerHTML=imgObj;
        quit.style.filter = "alpha(opacity=100)";

        quit.style.opacity = "0.7";
        quit.style.zIndex = "98";
        quit.style.width="100%";
        var boxwidth=document.body.scrollHeight;
        quit.style.height=boxwidth+'px';
        quit.style.backgroundColor="black";
        quit.style.position = "absolute";
        quit.style.top="0%";

        $("body").append(quit);
        $("#user").blur(function() {
            if ($("#user").val() == "") {
                $("#errusr").css({"visibility": "visible"});
                return false;
            }
            else {
                $("#errusr").css({"visibility": "hidden"});
                return true;
            }
        });

         $("#pwd").blur(function(){
            if($("#pwd").val()==""){
                $("#errpwd").css({"visibility":"visible"});
                return false;
            }
            else{
                $("#errpwd").css({"visibility":"hidden"});
                return true;
            }
         });

         $("#mylogin").click(function(){
            if(($("#user").val()!=="")&&($("#pwd").val()!=="")){
                $("#mylogin").submit();
            }
        });
        quit.onclick=function(){
            //$("#loginPage").remove();
            //loginPage.innerHTML="";
            $(this).remove();
            $(loginPage).remove();
        }
    });
}