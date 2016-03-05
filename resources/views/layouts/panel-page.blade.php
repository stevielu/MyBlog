<li  ng-class="{ active:dashboard.isSet(1) }" class="article-mgmt">
  <a href="#" class="icon fa fa-book indented">
  <span class="option">&nbsp&nbspBlog Mgmt
  </span></a>

  <ul class="submenu submenu-1">
    <li>
      <a href ng-click="dashboard.setTab(1)" class="fa"><span>Menu</span></a>
    </li>
    
  </ul>
</li>
<li ng-class="{ active:dashboard.isSet(2) }" class="gallery-mgmt">
    <a href="#" class="icon fa fa-book indented">
    <span class="option">&nbsp&nbspMy Gallery
    </span></a>
    
    <ul class="submenu submenu-2">
      <li><a href ng-click="dashboard.setTab(2)" class="fa"><span>Menu</span></a></li>
      <li><a href ng-click="dashboard.setTab(2)" class="fa"><span>Menu</span></a></li>
      <li><a href ng-click="dashboard.setTab(2)" class="fa"><span>Menu</span></a></li>
    </ul>
</li>



