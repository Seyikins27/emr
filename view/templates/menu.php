
  <ul class="nav nav-list">
    <?php
	  foreach($this->menuitems as $items=>$url)

		  echo" <li><a href=".$url."><span class='menu-text'>".$items."</span></a></li>";

    ?>

    </ul>
    <div class="sidebar-collapse" id="sidebar-collapse">
      <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>

    <script type="text/javascript">
      try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
    </div>

    <div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
      <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
      </script>

      <ul class="breadcrumb">
        <li>
          <i class="icon-home home-icon"></i>
          <a href="#">Home</a>

          <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
          </span>
        </li>

        <li>
          <a href="#">Other Pages</a>

          <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
          </span>
        </li>
        <li class="active">Blank Page</li>
      </ul><!--.breadcrumb-->

    
    </div>
