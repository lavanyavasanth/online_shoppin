<?php 
    include("pages/links.php");
    include("pages/header.php");   
    include("pages/navbar.php"); 
?>
<div class="container">
<!--
     <header class="mainheader">
        <h1>Payment Details</h1>
        <ul class="nav">
          <li><a href="#" onclick="showhide('sectiona')">Card Type </a></li>
		  <li><a href="#" onclick="showhide('sectionb')">Name</a></li>
		  <li><a href="#" onclick="showhide('sectionc')">Card Number </a></li>
		  <li><a href="#" onclick="showhide('sectiond')">Expiry Date </a></li>
          <li><a href="#" onclick="showhide('sectione')">Card CVV </a></li>          
        </ul>
        </header>
-->
  <form class="form-horizontal" role="form" method="post" class = "contents">
    <fieldset id="sectiona">
      <legend style="text-align: center;">Card Type</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Card Type</label>
        <div class="col-sm-9">
           <div class="col-xs-3">
              <select class="form-control" name="expiry-year">
                <option value="1">Visa</option>
                <option value="2">Master</option>
                <option value="3">American Express</option>
              </select>
            </div>
        </div>
      </div>
      </fieldset>
      <input type="checkbox" id="check1" name="check1" value="yes">
    <fieldset id="sectionb">
    <legend style="text-align: center;">Name</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name">
        </div>
      </div>
      </fieldset>
      <input type="checkbox" id="check2" name="check2" value="yes">
      <fieldset id="sectionc">
        <legend style="text-align: center;">Number on Card</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-number">Card Number</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Debit/Credit Card Number">
        </div>
      </div>
      </fieldset>
      <input type="checkbox" id="check3" name="check3" value="yes">
      <fieldset id="sectiond">
        <legend style="text-align: center;">Expiry Date</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-3">
              <select class="form-control" name="expiry-month">
                <option>Month</option>
                <option value="01">Jan (01)</option>
                <option value="02">Feb (02)</option>
                <option value="03">Mar (03)</option>
                <option value="04">Apr (04)</option>
                <option value="05">May (05)</option>
                <option value="06">June (06)</option>
                <option value="07">July (07)</option>
                <option value="08">Aug (08)</option>
                <option value="09">Sep (09)</option>
                <option value="10">Oct (10)</option>
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
            </div>
            <div class="col-xs-3">
              <select class="form-control" name="expiry-year">
                <option value="13">2018</option>
                <option value="14">2019</option>
                <option value="15">2020</option>
                <option value="16">2021</option>
                <option value="17">2022</option>
                <option value="18">2023</option>
<!--
                <option value="19">2024</option>
                <option value="20">2025</option>
                <option value="21">2026</option>
                <option value="22">2027</option>
                <option value="23">2028</option>
-->
              </select>
            </div>
          </div>
        </div>
      </div>
      </fieldset>
      <input type="checkbox" id="check4" name="check4" value="yes">
      <fieldset id="sectione">
        <legend style="text-align: center;">Security Number</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code">
        </div>
      </div>
        </fieldset>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="button" class="btn btn-success">Confirm</button>
        </div>
      </div>
    
  </form>
</div>
                              
                    
<?php include("pages/footer.php");?> 