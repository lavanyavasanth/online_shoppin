<div class ="scroll" id="bodyright">
      <h3>Viewall Products</h3>
     <form method="post" enctype="multipart/form-data">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Sr No.</th>
              <th scope="col">Product Name</th>
              <th scope="col">Image</th>
              <th scope="col">Description</th>
              <th scope="col">Price</th>
              <th scope="col">Keyword</th>
              <th scope="col">pro_added_date</th>
<!--              <th scope="col">pro_added_date</th>-->
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
               <?php include("../../model/function.php");
                  echo viewall_product();
            ?>
          </tbody>
        </table>    
    </form>
</div>