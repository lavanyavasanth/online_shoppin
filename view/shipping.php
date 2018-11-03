<?php 
    include("pages/links.php");
    include("pages/header.php");   
    include("pages/navbar.php"); 
?>


<div class="container">
<div class="col-md-12 col-sm-12 col-xs-12" id="listAddress"></div> 
<div class="col-md-6 col-sm-6 col-xs-12" id="addressForm">
    <h3 class="text-center">Shipping Address</h3>
    <div class="clearfix"></div>
         <hr><form action="#" method="POST" id="addform" novalidate onsubmit="return false">
<!--
            <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        <input type="hidden" id="shipid" name="shipid" class="form-control input-sm">
    </div>
        </div>
-->


        <!--
                                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                                         <div class="form-group">
                                                             <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
                                                        </div>
                                         </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
                                            </div>
                                        </div>
        -->

            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
            <input type="text" name="address" id="first_name" class="form-control input-sm" placeholder="Address">
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
            <input type="text" name="mobile" id="last_name" class="form-control input-sm" placeholder="Mobile no">
            </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
            <input type="text" name="country" id="first_name" class="form-control input-sm" placeholder="country">
            </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
            <input type="text" name="city" id="first_name" class="form-control input-sm" placeholder="city">
            </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
            <input type="text" name="pcode" id="last_name" class="form-control input-sm" placeholder="postcode">
            </div>
            </div>  
            <div class="col-md-12">
            <button class="btn btn-primary pull-right">Add Address</button>
            </div>
        </form>

</div>
<div class="col-md-6 shipping col-sm-6 col-xs-12" id="updateAddress">
    <h3 class="text-center">Update Address</h3>
    <div class="clearfix"></div>
    <hr><form action="#" method="POST" id="editform" novalidate onsubmit="return false">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        <input type="hidden" id="shipid" name="shipid" class="form-control input-sm">
    </div>
        </div>
        <!--
                                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                                         <div class="form-group">
                                                             <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
                                                        </div>
                                         </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
                                            </div>
                                        </div>
        -->

        <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        <input type="text" name="address" id="shipaddress" class="form-control input-sm" placeholder="Address">
        </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        <input type="text" name="mobile" id="shipmobile" class="form-control input-sm" placeholder="Mobile no">
        </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group">
        <input type="text" name="country" id="shipcountry" class="form-control input-sm" placeholder="country">
        </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group">
        <input type="text" name="city" id="shipcity" class="form-control input-sm" placeholder="city">
        </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group">
        <input type="text" name="pcode" id="shipcode" class="form-control input-sm" placeholder="postcode">
        </div>
        </div>
        <div class="col-md-12">
        <button class="btn btn-primary pull-right">Update Address</button>
        </div>
    </form>
    
    <!--
                                      <div class="col-md-12">
                                        <button class="btn btn-primary pull-right">
                                            Continue
                                        </button>
                                    </div>
    -->
</div> 
</div>
<div><a href="payment.php" style=" display: block; width: 155px; height: 55px;
    background: #4E9CAF;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold; margin-left: 45%; margin-top: 5%;">proceed to payment</a>
</div>

    
<script>
    getShipping();
</script>
                              
                    
<?php include("pages/footer.php");?> 