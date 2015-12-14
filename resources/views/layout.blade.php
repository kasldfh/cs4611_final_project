<html lang="=en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(function() {
        $( "#datepicker1" ).datepicker();
        $( "#datepicker2" ).datepicker();
        });
    </script>
    <script src="/js/script.js"></script>
    @yield('js')
    @yield('style')
  </head>
  <body>
    @if(Auth::user())
    <!-- TOP BAR -->
    	<div id="top-bar">
    		
    		<div class="page-full-width cf">
    
    			<ul id="nav" class="fl">
    	
    				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong><?php echo Auth::user()->name?></strong></a>
    					<ul>
    						<li><a href="/auth/reset">Change Password</a></li>
    					</ul> 
    				</li>
    			<li><a href="/producer/edit/{!!Auth::user()->producer_id!!}" class="round button dark menu-settings image-left">Update Store Details</a></li>
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
            @if(Auth::user()->admin)
            <li><a href="/admin" class="<?php if(isset($nav) && $nav == "dashboard") echo "active-tab "?> dashboard-tab">Dashboard</a></li>
            @endif
                <li><a href="/listings" class="<?php if(isset($nav) && $nav == "selling") echo "active-tab "?>purchase-tab">Selling</a></li>
                <li><a href="/orders" class="<?php if(isset($nav) && $nav == "orders")  echo "active-tab "?>supplier-tab">View Orders</a></li>
                <li><a href="/create" class="<?php if(isset($nav) && $nav == "create") echo "active-tab "?>supplier-tab">Create Listing</a></li>
                <li><a href="/reserved" class="<?php if(isset($nav) && $nav == "buying") echo "active-tab "?>sales-tab">Buying</a></li>
                <li><a href="/listing" class="<?php if(isset($nav) && $nav == "store") echo "active-tab "?> stock-tab">Store</a></li>
                <li><a href="/reports" class="<?php if(isset($nav) && $nav == "reports") echo "active-tab "?>report-tab">Reports</a></li>
                @if($nav == "transport")
                <li><a href="/" class="active-tab payment-tab">Transportation</a></li>
                @endif
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
