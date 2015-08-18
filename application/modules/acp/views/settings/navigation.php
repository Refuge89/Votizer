<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>IgnitionCMS | Dashboard</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="/addons/acp/css/style.css">
	<link rel="stylesheet" href="/addons/acp/css/jquery.jqplot.css">
	<link rel="stylesheet" href="/addons/acp/js/alertify/dist/css/alertify-bootstrap-3.css" />
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<script src="/addons/acp/js/script.js"></script>  
	<script src="/addons/acp/js/jquery.jqplot.min.js"></script>  
	<script src="/addons/acp/js/pagination.js"></script> 
	<script src="/addons/acp/js/acp.js"></script> 
	<script src="/addons/acp/js/alertify/dist/js/alertify.js"></script>
    <script src="/addons/acp/js/jquery.jeditable.mini.js"></script>


    <script src="/addons/acp/js/Sortable.min.js"></script>

	<style>
        /*
		ul.pagination { position: absolute; margin-top: 37px; list-style: none; }
		ul.pagination li { display:inline; }
		ul.pagination li a { margin-left: 5px; padding:3px 5px; color:#fff; background-color:rgb(93, 102, 119); text-decoration:none; }
		ul.pagination li a:hover { background-color:rgb(95, 108, 121)*/
        .move {
            cursor: move;
            cursor: -webkit-grabbing;
        }
	</style>
	
	<script>
        $(document).ready(function() {
            $('.editable').editable(function(value, settings) {
                editNavigation(value,$(this).attr('id'),$(this).attr('data-field'));
                return(value);
            }, {
                onblur    : 'submit',
                event : 'dblclick'
            });
        });
        // List with handle
        $(document).ready(function() {
            var sortable = Sortable.create(listWithHandle, {
                handle: '.move',
                dataIdAttr: 'id',
                onSort: function (evt) {
                    updateNavigationPosition(sortable.toArray());
                }
            });
        });

	</script>
</head>

<body>
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark ic-left-arrow image-left">Go to website</a></li>
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong>{$username}</strong></a></li>
			
				<li><a href="/acp/dashboard/logout" class="round button dark menu-logoff image-left">Log out</a></li>
				
			</ul> <!-- end nav -->

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="/acp/dashboard">Dashboard</a></li>
				<li><a href="/acp/dashboard/categories" class="active-tab dashboard-tab">Categories</a></li>
			</ul> <!-- end tabs -->
						
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="content-module">
			
				<div class="content-module-heading cf">
				
					<h3 class="fl">Categories</h3>
					<span class="fr expand-collapse-text">Click to collapse</span>
					<span class="fr expand-collapse-text initial-expand">Click to expand</span>
				
				</div> <!-- end content-module-heading -->
				<div class="content-module-main">
					<p>Here you manage your navigation links. Double click on a field to edit existing data. Arrange link display order using drag and drop on the id fields.</p>
                    <a href="#" style="position: relative; border-bottom: 1px dotted; font-size: 11px; bottom: 3px;" onclick="showAddNavigation()">Add Navigation</a>
					<form action="#" method="POST" id="search-form" class="fr"
					style="position: absolute; right: 50px; top: 235px;">
						<fieldset>
							<input type="text" name="search" id="search-keyword" class="round button dark ic-search image-right" placeholder="Search...">
							<input type="hidden" value="SUBMIT">
						</fieldset>
					</form>
					
					<table>

						<thead>

							<tr>
								<th style="position: relative;">Id</th>
								<th>Link Name</th>
								<th>Link URL</th>
								<th>Permission</th>
                                <th>Actions</th>
							</tr>

						</thead>
                        </tbody>
                        <tbody id="listWithHandle">
                        {foreach $navigation val}
                        <tr id="{$val.id}">
                            <td class="move">{$val.id}</td>
                            <td id="{$val.id}" data-field="name" class="editable">{$val.name}</td>
                            <td id="{$val.id}" data-field="href" class="editable">{$val.href}</td>
                            <td id="{$val.id}" data-field="permission" class="editable">{$val.permission}</td>
                            <td>
                                <a href="#" class="table-actions-button ic-table-delete" onclick="removeNavigation({$val.id})"></a>
                            </td>
                        </tr>
                        {/foreach}
                        </tbody>


						
					</table>
					
					<div class="stripe-separator"><!--  --></div>
										
				</div> <!-- end content-module-main -->
			
			</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2012 <a href="#">IgnitionCMS</a>. All rights reserved.</p>
	
	</div> <!-- end footer -->

</body>
</html>