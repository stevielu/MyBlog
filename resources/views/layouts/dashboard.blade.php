@extends('layouts.default')
@section('header')
<title></title>
<link href="{{asset('themes/blog/css/style.css')}}" rel="stylesheet" type="text/css"/>



<style>
.logo-box{
	border: 1px solid;
	background-color:#333;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;

}
.onecolumn-left {
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}
.logo-box:after{
	content: "";
    position: absolute;
    top: 50%;
    right: 0%;
    border-top: 8px solid transparent;
	border-bottom: 8px solid transparent;
	margin-top: -4px;
	margin-right: -1px;
	border-right: 8px solid #f5f5f5;
	border-left: 8px solid transparent;
    /*border-top: 8px solid #ccc;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    margin-left: -8px*/
}	


</style>
@endsection
@section('body')
<div class="dashborder-inner">
	<div class="container-fluid" >
		<div class = 'row'>
			<div class = 'onecolumn-left col-sm-3 col-xs-4' >
				<div class="left-bar">
					<div class="content col-xs-12">
						<ul class="control-panel">
							<li class="article-mgmt">
							<a href="#" class="icon fa fa-book indented">
							<span class="option">&nbsp&nbspBlog Mgmt
							</span></a>
								<ul class="submenu submenu-1">
									<li><a href="#" class="fa"><span>Menu</span></a></li>
									<li><a href="#" class="fa"><span>Menu</span></a></li>
									<li><a href="#" class="fa"><span>Menu</span></a></li>
								</ul>
							</li>
							<li class="gallery-mgmt">
							<a href="#" class="icon fa fa-book indented">
							<span class="option">&nbsp&nbspMy Gallery
							</span></a>
								<ul class="submenu submenu-2">
									<li><a href="#" class="fa"><span>Menu</span></a></li>
									<li><a href="#" class="fa"><span>Menu</span></a></li>
									<li><a href="#" class="fa"><span>Menu</span></a></li>
								</ul>
							</li>	
						</ul>
					</div>
				</div>
			</div>
			<div class = 'onecolumn-right ' >
				<div class="right-box">
					<div class="inner">
						
					</div>
					
				</div>
			</div>   
		</div>
	</div>
</div>		

	  	
	  


<script>
	$('.logo-box').css('background-color','#333');
	(function(){
		$('.logo-box').click(function(){
			// $('this').animate({ width: [ "toggle", "swing" ]},5000,"linear",function(){
				// $('.logo-box').removeClass('col-sm-1');
				// $('.logo-box').addClass('col-sm-3');
				$('.logo-box').toggleClass('col-sm-3 col-sm-1');
				$('.onecolumn-left').toggleClass('col-sm-3 col-sm-1');
				$('.bottom-left').toggleClass('col-sm-3 col-sm-1');
				$('.icon').toggleClass('indented indent');
				//$('.option').toggle('slide', {direction:'right'},1);
				$('.option').fadeToggle( 500,"linear");
				$('.control-panel').toggleClass('larger');
			// });
			
		});
		$('ul.control-panel > li').on('click',function(){
			$('ul.control-panel > li').removeClass('active');
			$(this).toggleClass('active');
		});
	})();
</script>	
@endsection