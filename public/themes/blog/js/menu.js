/*

Menu app

*/

(function(){
 
  var menuList = angular.module('MangeMenu', []);
  menuList.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
  });

  menuList.controller('MenuController', ['$http', function($http){
    
    var menu = this;
    menu.posts = {};

    this.Init = function(url,title){
      menu.url = url;
      menu.title = title;
      $http.get(menu.url).success(function(data){
        menu.posts = data;
      });
    };
    
    
    
    

    
    // blog.tab = 'blog';
    
    // blog.selectTab = function(setTab){
    //   blog.tab = setTab;
    //   console.log(blog.tab)
    // };
    
    // blog.isSelected = function(checkTab){
    //   return blog.tab === checkTab;
    // };
    
    // blog.post = {};
    // blog.addPost = function(){
    //   blog.post.createdOn = Date.now();
    //   blog.post.comments = [];
    //   blog.post.likes = 0;
    //   blog.posts.unshift(this.post);
    //   blog.tab = 0;
    //   blog.post ={};
    // };   
    
  }]);
  


  // app.controller('CommentController', function(){
  //   this.comment = {};
  //   this.addComment = function(post){
  //     this.comment.createdOn = Date.now();
  //     post.comments.push(this.comment);
  //     this.comment ={};
  //   };
  // });
 
})();