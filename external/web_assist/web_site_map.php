<?php

site_map( "top", "index.php", "Home" );
site_map( "company", "company", "Company" );
site_push( "company/" );
site_map( "contacts", "contacts.php", "Contacts" );
site_map( "people", "people", "People" );
site_push( "people/" );
site_map( "gavin", "gavin_stark", "Gavin J Stark" );
site_map( "john", "john_croft", "John Croft" );
site_pop();
site_pop();
site_map( "technology", "technology", "Technology" );
site_push( "technology/" );
site_map( "", "http://cyclicity-cdl.sourceforge.net", "Cyclicity CDL" );
site_pop();
site_map( "white_papers", "white_papers", "White Papers" );
site_map( "background", "background", "Background" );
site_done();

?>
