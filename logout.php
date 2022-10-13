<?php
   session_start();
   if(session_destroy()) {	   
      header("Location:index?pesan=logout");
	  header("Refresh:0");
   }
?>