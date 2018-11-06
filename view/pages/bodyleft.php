<div class="container">
<div class="row" >
    <div class = "col-md-12" id="bodyleft">
        <?php if(!isset($_GET['cat_id'])){ ?>
        <div id="slider" >
            <h2>New Arrival</h2>
            <?php
                $files = scandir("../view/img/slider/");
            ?>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" class="slider">
                  <?php
                    $i = 0;
                    for ($a=2; $a<count($files); $a++):
                  ?>
                <div class="carousel-item <?php echo $i == 0 ? 'active': ''; ?> "><a href="#">
                    <img class="d-block w-100" src="../view/img/slider/<?php echo $files[$a];?>" alt="First slide" style="height: 400px; width:400px;"></a>
                </div>
                  <?php
                  $i++;
                  endfor;
                  ?>

              </div>
            </div>
        </div>

        
        <ul><?php echo salwar();?></ul><br clear='all'/>
        <ul><?php echo lehenga();?></ul><br clear='all'/>
        <ul><?php echo saree();?></ul><br clear='all'/>
        <ul><?php echo accessories();?></ul><br clear='all'/>
        <?php } ?>
        
    </div>

    
</div>
</div>
   