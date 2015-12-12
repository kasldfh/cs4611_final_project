<html lang="=en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="/js/script.js"></script>
    @yield('style')
    @yield('js')
  </head>
  <body>
    @if(Auth::user())
    <!-- TOP BAR -->
    	<div id="top-bar">
    		
    		<div class="page-full-width cf">
    
    			<ul id="nav" class="fl">
    	
    				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong><?php echo Auth::user()->name?></strong></a>
    					<ul>
    						<li><a href="change_password.php">Change Password</a></li>
    					</ul> 
    				</li>
    			<li><a href="update_details.php" class="round button dark menu-settings image-left">Update Store Details</a></li>
    				<li><a href="/auth/logout" class="round button dark menu-logoff image-left">Log out</a></li>
    				
    			</ul> <!-- end nav -->
    
    					
    			<form action="/auth/logout" method="POST" id="search-form" class="fr">
    				<fieldset>
    				<a href="/auth/logout" class="round button dark menu-logoff image-left">Log out</a>
    				</fieldset>
    			</form>
    
    		</div> <!-- end full-width -->	
    	
    	</div> <!-- end top-bar -->
        <div id="header-with-tabs">
    
        <div class="page-full-width cf">
     
            <ul id="tabs" class="fl">
                <li><a href="/admin" class="active-tab dashboard-tab">Dashboard</a></li>
                <li><a href="/listings" class="purchase-tab">Selling</a></li>
                <li><a href="/orders" class="supplier-tab">View Orders</a></li>
                <li><a href="/create" class="supplier-tab">Create Listing</a></li>
                <li><a href="/reserved" class="sales-tab">Buying</a></li>
                <li><a href="/listing" class=" stock-tab">Store</a></li>
                <li><a href="/reports" class="report-tab">Reports</a></li>
            </ul>
            <!-- end tabs -->
    
            <!-- Change this image to your own company's logo -->
            <!-- The logo will automatically be resized to 30px height. -->
            <?php //$line = $db->queryUniqueObject("SELECT * FROM store_details ");
            //$_SESSION['logo'] = $line->log;
            ?>
            <a href="#" id="company-branding-small" class="fr"><img src="/upload/posnic.png"
                alt="Point of Sale"/></a>
    
        </div>
        <!-- end full-width -->
    
    </div>
    @endif
    @yield('header')
    <div id="content">
      <div class="page-full-width cf">
        @yield('content')
      </div>
    </div>

  </body>
</html>
