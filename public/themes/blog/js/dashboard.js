(function(){
	var app = angular.module('DashBoard', []);

  	app.controller('DashboardController', function(){
    	this.tab = 0;
  	});
  	app.directive('panelPage', function() {
	  	return {
		    restrict: 'E',
		    templateUrl: 'panel-page',
		    controller: function() {
		        

		        this.isSet = function(checkTab) {
		          return this.tab === checkTab;
		        };

		        this.setTab = function(activeTab) {
		          this.tab = activeTab;
		        };
	      	},
	    	controllerAs: 'dashboard'
	  	};
});
})();