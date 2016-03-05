<div class="col-sm-9 col-xs-8 ">
	<div class="col-sm-6 col-xs-12 menu-panel">
		<div class="menu-panel-headerbox col-sm-12">
			<div class="col-sm-3 border-right panel-title">
				<h3 class="col-sm-12 fa fa-sitemap"><p class="col-sm-12"> Category</p></h3>
				
			</div>
			<div class="col-sm-3  border-right panel-title">
				<h3 class="col-sm-12 fa fa-plus-square"><p class="col-sm-12">Add Menu</p></h3>
				
			</div>
			<div class="col-sm-3  border-right panel-title">
				<h3 class="col-sm-12 fa fa-times-circle"><p class="col-sm-12">Delete Menu</p></h3>
				
			</div>
			<div class="col-sm-3  panel-title">
				<h3 class="col-sm-12 fa fa-check-square"><p class="col-sm-12">	Save Menu</p></h3>
			</div>
		</div>
		<div class="menu-panel-bodybox col-sm-12"></div>
	</div>
	<div class="col-sm-3 col-xs-12 menu-panel black-background" style="min-height: 300px">
		<div class="menu-panel-headerbox col-sm-12">
			<div class="col-sm-12 panel-title">
				<p class="col-sm-12"> Root Menu</p>
				
			</div>

		</div>
		<div class="menu-panel-bodybox col-sm-12 nested-list">
			<ul>
				<li >
					<p>default</p>
					<ul>
						<li>
							<p>subcatgory</p>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function() {
        
  $('.list-group-item').on('click', function() {
    $('.glyphicon', this)
      .toggleClass('glyphicon-chevron-right')
      .toggleClass('glyphicon-chevron-down');
  });

});
</script>