
       <?php 
          include("pages/links.php");
          include("pages/header.php");   
          include("pages/navbar.php"); 
          echo "<div id='bodyleft'><ul>";cat_detail(); sub_cat_detail();echo"</ul></div> <br clear='all'/>"; 
          echo "<div class='bodyright' id='bodyright'><ul>";viewall_subcat(); viewall_cater();echo"</ul></div> <br clear='all'/>"; 
          include("pages/footer.php");
      ?> 