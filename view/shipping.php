<?php 
    include("pages/links.php");
    include("pages/header.php");   
    include("pages/navbar.php"); 
?>
<style>
/*
.container{
position: relative;
  padding: 1em;
  background: #2B3134;
  color: #777;
  text-align: center;
  font-family: "Gill sans", sans-serif;
  width: 80%;
  margin: 0 auto;
}
*/
.loader{
position: absolute;
  margin: 0 0 2em;
  height: 100px;
  width: 20%;
  text-align: center;
  padding: 1em;
  margin: 0 auto 1em;
  display: inline-block;
  vertical-align: top;
    background: rgba(255,255,255,.8);
}

/*
  Set the color of the icon
*/
svg path,
svg rect{
  fill: #FF6700;
}
    #load{
        display: none;
        
        
    }
</style>

<div class="container">
    <div class="loader loader--style3" title="2" id="load" >
  <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
  <path fill="#000" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
    <animateTransform attributeType="xml"
      attributeName="transform"
      type="rotate"
      from="0 25 25"
      to="360 25 25"
      dur="0.6s"
      repeatCount="indefinite"/>
    </path>
  </svg>
</div>

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
            <input type="text" name="country" id="country" class="form-control input-sm" placeholder="country">
            </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
            <input type="text" name="city" id="city" class="form-control input-sm" placeholder="city">
            </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
            <input type="text" name="pcode" id="pcode" class="form-control input-sm" placeholder="postcode">
            </div>
            </div>  
            <div class="col-md-12">
            <button class="btn btn-primary pull-right" onclick="addAddress()">Add Address</button>
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
        <button class="btn btn-primary pull-right" onclick="addAddress()">Update Address</button>
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
    
    function addAddress(){
        startLoading();
//        clearForm();
        
    }
    
    function startLoading(){
        document.getElementById("load").style.display="block";
        setTimeout(function(){
           document.getElementById("load").style.display="none"; 
            document.getElementById("first_name").value ="";
            document.getElementById("last_name").value ="";
            document.getElementById("country").value ="";
            document.getElementById("city").value ="";
            document.getElementById("pcode").value ="";
            document.getElementById("shipaddress").value ="";
            document.getElementById("shipmobile").value ="";
            document.getElementById("shipcountry").value ="";
            document.getElementById("shipcity").value ="";
            document.getElementById("shipcode").value ="";
        }, 500);
        
    }
    
</script>
                              
                    
<?php include("pages/footer.php");?> 