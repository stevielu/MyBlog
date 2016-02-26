@extends('layouts.default')
@section('header')
<script type="text/javascript" src="{{asset('themes/blog/js/article.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/blog/js/menu.js')}}"></script>
<link href="{{asset('themes/blog/css/style.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('themes/blog/css/article.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('css/navlist.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('body')

<script>
	angular.element(document).ready(function() {
      angular.bootstrap(document.getElementById('article'), ['article']);
    }); 
</script>

<div class="container-fluid" >
	<div class="row">
		<div class="nav-box " style="border-bottom:0px solid transparent">
			<div id='menu' ng-app = "MangeMenu">
				<div ng-controller = "MenuController as menu" ng-init = "menu.Init('/Menu','Catagories')">
					<ul class="menu-list">
						<li ng-repeat = 'list in menu.posts'><a  href="#">[[list.menu_name]]</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
		

	<div><?php echo "<a class = 'a_nav' href='".url()."'>Home</a>"."<a class='a_nav_active' href='Request::getRequestUri();'>".Request::getRequestUri()."</a>"?></div>
	<div class = "extraspace-tiny bg_line"></div>
	
    <div class = "extraspace-large"></div>
	<div id = "article" ng-app="article">
  		<div ng-controller="BlogController as blog" >
	      	<div class="topbar">
	        	<div class="container">
	          		<div class="row">
	            		<div class="col-sm-4">
	              			<h1 ng-click="blog.selectTab('blog')" class="push-left">[[blog.title]]</h1>
	            		</div>
			            <div class="offset-sm-4 col-sm-4">
		              		<nav role='navigation' class="push-right">
				                <ul>
				                  	<li><a href="#" ng-click="blog.selectTab('blog')">See All Posts</a></li> 
				                  	<li><a href="#" ng-click="blog.selectTab('new')">Add New Post</a></li>
				                </ul>
			              	</nav> 
			            </div>
		          	</div>
        		</div>
	      	</div>
	 
      		<div class="content">
	        	<div class="container">
	          		<div class="row">
	            		<ul class="post-grid" ng-show="blog.isSelected('blog')">
	          				<li ng-repeat="post in blog.posts" class="col-s-4" ng-class="{ 'reset-s' : $index%3==0 }" ng-click="blog.selectTab($index)" >
					            <h3>[[ post.title ]]</h3>
					            <p>[[ post.body[0] | limitTo:70 ]]...</p>
					            <p class="fa fa-comment push-left"> [[post.comments.length]]
					            </p>
					            <p class="fa fa-heart push-right"> [[post.likes]]
					            </p>
	          				</li>
	        			</ul>
	        			<div class="post" ng-repeat="post in blog.posts" ng-show="blog.isSelected($index)">
	          				<div>
		            			<h2>[[post.title]]</h2>
		           				<img src="[[post.image]]" ng-show="[[post.image]]"/>
		            			<cite>by [[post.author]] on [[post.createdOn | date]]</cite>
		            			<div class="post-body">
			             			<p ng-repeat="paragraph in post.body">
						               [[paragraph]]
						            </p> 
		            			</div>
		            
		            			<div class="comments" ng-controller="CommentController as commentCtrl">
		              				<button class="fa fa-heart" ng-click="post.likes = post.likes+1"> [[post.likes]]</button>
		              				<h3>Comments</h3>
		              				<ul>
		               					<li ng-repeat="comment in post.comments">
		                 					"[[comment.body]]"
		                 					<cite>- <b>[[comment.author]]</b></cite>
	               						</li>
		              				</ul>
		              				<form name="commentForm" ng-submit="commentForm.$valid && commentCtrl.addComment(post)" novalidate>
		                				<h4>Add Comment</h4>
		                  				<textarea ng-model="commentCtrl.comment.body" cols="30" rows="10" required></textarea>
		                				<label for="">by:</label>
		                  				<input type="text" ng-model="commentCtrl.comment.author" required placeholder="Name"/>
		                  
		                  				<input type="submit" value="Submit" />
		                			</form>
		            			</div>
	        				</div>
	      				</div>
	       		 		<div class="post" ng-show="blog.isSelected('new')">
	          				<h2>Add New Post</h2>
	          
	          				<form name="postForm" ng-submit=" blog.addPost()" novalidate>
		                  		<h4>Title</h4>
		                  		<input type="text" ng-model="blog.post.title"/>
			                  	<h4>Body</h4>
			                  	<textarea ng-model="blog.post.body" ng-list="/\n/" rows="10"></textarea>
		                  		<label for="">Featured Image URL</label>
			                  	<input type="text" ng-model="blog.post.image" placeholder="http://placekitten.com/g/2000/600" />
			                  	<label for="">by:</label>
			                  	<input type="text" ng-model="blog.post.author" placeholder="Author Name" required/>
				                  
			                  	<input type="submit" value="Submit" />
	                		</form>
	            		</div>
	          		</div>
	        	</div>
	    	</div>
	  	</div>
	</div>
	 
<div class = "extraspace-large"></div>
</div>

@endsection