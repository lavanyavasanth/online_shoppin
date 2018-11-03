<?php 
    include("pages/links.php");
    include("pages/header.php");   
    include("pages/navbar.php"); 
?>
<script>
    $(function(){
       $("#submitbtn")
            .after("&nbsp; <input type = 'submit' value = 'Save Form' class= 'btn btn-primary btn-lg' id = 'saveData'>")
            .after("&nbsp; <input type = 'submit' value = 'Clear Saved Data' class= 'btn btn-primary btn-lg' id = 'clearData'>");
       $("#saveData")    
            .click(function(e){
           e.preventDefault();
           localStorage.setItem("flag","set");
          var data = $("#formReg").serializeArray();
           $.each(data,function(i,obj){
//              console.log(i,obj);
               localStorage.setItem(obj.name,obj.value);
           });
//           console.log(data);
       });
        if(localStorage.getItem("flag") == "set"){
            $("header").before("<p>This form has saved data</p>");
            var data = $("#formReg").serializeArray();
           $.each(data,function(i,obj){
//              console.log(i,obj);
               $("[name= '"+ obj.name +"']").val(localStorage.getItem(obj.name));
           });
        }
        $("#clearData")
            .click(function(e){
                e.preventDefault();
                localStorage.setItem("flag","");
        });
    });

</script>
        <header></header>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Thank you for Sign Up!</div>
                <div class="panel-body">
                    <form role="Form" method="POST" id="formReg" action="../control/regprocess.php" accept-charset="UTF-8" onsubmit="return errmsg()" name="valform">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" id="uname" class="form-control textInput" name="username" placeholder="" autocomplete="off" pattern="[A-Za-z]{1,}">
                            <span id="avail"></span>
                            <div id= "msg1" style="color:red; font-weight:bold"></div>
                        </div>
                        <div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="pname" class="form-control textInput" name="password" placeholder="" autocomplete="off" pattern="[A-Za-z]{1,}[0-9]{1}">
                            <div id= "msg2" style="color:red; font-weight:bold"></div>
                        </div>
						<div class="form-group">
							<label for="firstname">FirstName</label>
							<input type="text" id="fname" class="form-control textInput" name="firstname" placeholder="" autocomplete="off" pattern="[A-Za-z]{1,}">
                            <div id= "msg3" style="color:red; font-weight:bold"></div>
                        </div>
						<div class="form-group">
							<label for="lastname">LastName</label>
							<input type="text" id="lname" class="form-control textInput" name="lastname" placeholder="" autocomplete="off" pattern="[A-Za-z]{1,}">
                            <div id= "msg4" style="color:red; font-weight:bold"></div>
                        </div>
                        <div class="form-group">
							<label for="email">Email</label>
							<input type="text" id="email" class="form-control textInput" name="email" placeholder="" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            <div id= "msg5" style="color:red; font-weight:bold"></div>
                        </div>
						<div class="form-group">
							<label for="verifypass">Role</label>
							<input type="text" id="role" class="form-control textInput" name="role" placeholder="" autocomplete="off" pattern="[A-Za-z]{1,}">
                            <div id= "msg6" style="color:red; font-weight:bold"></div>
                        </div>
                        <div class="form-group">
							<label for="verifypass">DOB</label>
				            <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" name="dob" />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            </div>
                        </div>
						<div class="form-group text-center">
							<input type="submit" class="btn btn-primary btn-lg" id="submitbtn" name="submit" value="signup">
                        </div>
                    </form>
<?php
        if(!isset($_GET['reg'])){
            exit();
        }
        else
        {
            $regCheck = $_GET['reg'];

            if($regCheck == "empty"){
                echo"<div style='color: red; text-align: center; font-family: bolder; font-size: 35px;'>Fill in all fields!!!</div>";
                exit();
            }
            elseif($regCheck == "char"){
                echo"<div style='color: red; text-align: center; font-family: bolder; font-size: 35px;'>Used invalid characters!!!
                </div>";
                exit();
            }
            elseif($regCheck == "email"){
                echo"<div style='color: red; text-align: center; font-family: bolder; font-size: 35px;'>Invalid Email!!!</div>";
                exit();
            }
             elseif($regCheck == "success"){
                echo"<div style='color: Green; text-align: center; font-family: bolder; font-size: 35px;'>Login Successfull!!!</div>";
                exit();
            }
        }
?>
                </div>
            </div>
        </div>          
    </div>


      <?php include("pages/footer.php");?>  
      
  
<!--
    <footer class="text-right">
        
            <a class="nav-link" href="#" ><i class="fab fa-facebook"></i><span class="sr-only">Facebook</span></a>
              <a class="nav-link" href="#" ><i class="fab fa-twitter"></i><span class="sr-only">Twitter</span></a>
              <a class="nav-link" href="#" ><i class="fab fa-instagram"></i><span class="sr-only">Instgram</span></a>
        
        </footer>
-->

