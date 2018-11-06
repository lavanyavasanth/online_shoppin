<?php 
    include("pages/links.php");
    include("pages/header.php");   
    include("pages/navbar.php"); 
?>
<div class="container">
  <form class="form-horizontal" role="form" method="post" id="formPay">
    <fieldset id="sectiona" class = "contents">
      <legend style="text-align: center;">Card Type</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Card Type</label>
        <div class="col-sm-9">
           <div class="col-xs-3">
<!--
              <select class="form-control" name="expiry-year" id="cardtype">
                <option value="1">Visa</option>
                <option value="2">Master</option>
                <option value="3">American Express</option>
              </select>
-->
               
 
        <input id="ex19" type="text"
              data-provide="slider"
              data-slider-ticks="[1, 2, 3]"
              data-slider-ticks-labels='["Visa", "Master", "Amex"]'
              data-slider-min="1"
              data-slider-max="3"
              data-slider-step="1"
              data-slider-value="3"
              data-slider-tooltip="hide" />

            </div>
        </div>
      </div>
        <input type="checkbox" id="check1" name="check1" value="yes" onclick="showSection('sectionb')">
      </fieldset>
      
    <fieldset id="sectionb" class = "contents">
    <legend style="text-align: center;">Name</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-holder-name" id="card-holder-name name" placeholder="Card Holder's Name">
        </div>
      </div>
        <input type="checkbox" id="check2" name="check2" value="yes" onclick="showSection('sectionc')">
      </fieldset>
      
      <fieldset id="sectionc" class = "contents">
        <legend style="text-align: center;">Number on Card</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-number">Card Number</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-number" id="card-number cardno" placeholder="Debit/Credit Card Number">
        </div>
      </div>
          <input type="checkbox" id="check3" name="check3" value="yes" onclick="showSection('sectiond')">
      </fieldset>
      
      <fieldset id="sectiond" class = "contents">
        <legend style="text-align: center;">Expiry Date</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-3">
              <select class="form-control" name="expiry-month" id="expdate">
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
              <select class="form-control" name="expiry-year" id="expmonth">
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
          <input type="checkbox" id="check4" name="check4" value="yes" onclick="showSection('sectione')">
      </fieldset>
      
      <fieldset id="sectione" class = "contents">
        <legend style="text-align: center;">Security Number</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="cvv" id="cvv cvvno" placeholder="Security Code">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-success" onsubmit="formsubmit()" data-toggle= "modal" data-target = "#mymodal">Confirm</button>
<!--
            <div class="modal fade" id="mymodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal">
                        </div>
                    </div>
                </div>
            </div>
-->
        </div>
      </div>
        </fieldset>
      
    
  </form>
<!--
    <div class="loader" align="center" style="display:none;">

 <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
  <path opacity="0.2" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
    s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
    c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/>
  <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
    C22.32,8.481,24.301,9.057,26.013,10.047z">
    <animateTransform attributeType="xml"
      attributeName="transform"
      type="rotate"
      from="0 20 20"
      to="360 20 20"
      dur="0.5s"
      repeatCount="indefinite"/>
    </path>
  </svg>

	</div>
-->
</div>
<div id="paypal-button-container" style="text-align:center;"></div>
<script src="js/loader.js" type="text/javascript"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>

// Render the PayPal button
paypal.Button.render({
// Set your environment
env: 'sandbox', // sandbox | production

// Specify the style of the button
style: {
  layout: 'vertical',  // horizontal | vertical
  size:   'medium',    // medium | large | responsive
  shape:  'rect',      // pill | rect
  color:  'gold'       // gold | blue | silver | white | black
},

// Specify allowed and disallowed funding sources
//
// Options:
// - paypal.FUNDING.CARD
// - paypal.FUNDING.CREDIT
// - paypal.FUNDING.ELV
funding: {
  allowed: [
    paypal.FUNDING.CARD,
    paypal.FUNDING.CREDIT
  ],
  disallowed: []
},

// PayPal Client IDs - replace with your own
// Create a PayPal app: https://developer.paypal.com/developer/applications/create
client: {
  sandbox: 'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
  production: '<insert production client id>'
},

payment: function (data, actions) {
  return actions.payment.create({
    payment: {
      transactions: [
        {
          amount: {
            total: '0.01',
            currency: 'USD'
          }
        }
      ]
    }
  });
},

onAuthorize: function (data, actions) {
  return actions.payment.execute()
    .then(function () {
      window.alert('Payment Complete!');
    });
}
}, '#paypal-button-container');
</script>
                              
                    
<?php include("pages/footer.php");?> 