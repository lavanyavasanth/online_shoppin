<!--
<div class="footer">
    <p>Copyright 2018 @copy; Lavanya Boutique</p>
</div>
-->
<script>
		function mobiledevice() {
			return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test( navigator.userAgent );
		}

		function checkbrowser() {
			var isOpera = ( !!window.opr && !!opr.addons ) || !!window.opera || navigator.userAgent.indexOf( ' OPR/' ) >= 0;
			var isFirefox = typeof InstallTrigger !== 'undefined'; 
			var isSafari = /constructor/i.test( window.HTMLElement ) || ( function ( p ) {
				return p.toString() === "[object SafariRemoteNotification]";
			} )( !window[ 'safari' ] || ( typeof safari !== 'undefined' && safari.pushNotification ) );

			var isIE = /*@cc_on!@*/ false || !!document.documentMode;
			var isEdge = !isIE && !!window.StyleMedia;
			var isChrome = !!window.chrome && !!window.chrome.webstore;
			var isBlink = ( isChrome || isOpera ) && !!window.CSS;

			if ( isIE ) {
				return "INTERNET EXPLORER";
			}

			else if ( isChrome ) {
				return "GOOGLE CHROME";

			}
			else if ( isFirefox ) {
				return "FIREFOX";
			}
			else if ( isSafari ) {
				return "SAFARI";

			}
			else if ( isOpera ) {
				return "OPERA";

			}
		}
	</script>
<div class="container">
<!--<h3>Multi-Coloured</h3>-->
    <hr>
        <div class="text-center center-block">
            <p class="txt-railway">- Copyright 2018 @copy; Lavanya Boutique -</p>
            <br />
                <a href="https://www.facebook.com/bootsnipp"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
	            <a href="https://twitter.com/bootsnipp"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
	            <a href="https://plus.google.com/+Bootsnipp-page"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
	            <a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
        </div>
        <div class="policy" style="float: right;">
                <a href="../view/policy.php" style="padding:10px;">Refund Policy</a>
                <a href="../view/termCon.php" style="padding:10px;">Terms and Conditions</a>
                <a href="../view/priPolicy.php" style="padding:10px;">Privacy Policy</a>
                <a href="/online_shopping/downloadfile/MeasurementForm.xlsx" style="padding:10px;">Measurement Form</a>
        </div>
        
<!--
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Contact US</button>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Contact US</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div><i class="fas fa-envelope"></i>&nbsp;lavanboutique@gmail.com</div>
              <div><i class="fas fa-phone"></i>&nbsp;0412563789</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
-->

        
    
    
<?php
//    session_start();
    echo "<div>";
    if(isset($_SESSION['error'])){
        echo"<div>{$_SESSION['error']}</div>";
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['message'])){
        echo"<div>{$_SESSION['message']}</div>";
        unset($_SESSION['message']);
    }
    echo "</div>";
    echo "<div>";
    print_r($_SESSION);
    echo "</div><div>";
    print_r($_GET);
    echo "</div><div>";
    print_r($_POST);
    echo"</div>";
?>


    <hr>
    <p id="browserCheck">Browser Check</p>
	
	<script>
	
		document.getElementById("browserCheck").innerHTML = "Mobile: " + mobiledevice() + "\nBrowser: " + checkbrowser();
	
	</script>
</div>

<br />