$( document ).ready(function() {
    // DOM ready

    // Test data
    /*
     * To test the script you should discomment the function
     * testLocalStorageData and refresh the page. The function
     * will load some test data and the loadProfile
     * will do the changes in the UI
     */
    // testLocalStorageData();
    // Load profile if it exits
    loadProfile();
});

/**
 * Function that gets the data of the profile in case
 * thar it has already saved in localstorage. Only the
 * UI will be update in case that all data is available
 *
 * A not existing key in localstorage return null
 *
 */
function getLocalProfile(callback){
    var profileImgSrc      = localStorage.getItem("PROFILE_IMG_SRC");
    var profileName        = localStorage.getItem("PROFILE_NAME");
    var profileReAuthEmail = localStorage.getItem("PROFILE_REAUTH_EMAIL");

    if(profileName !== null
            && profileReAuthEmail !== null
            && profileImgSrc !== null) {
        callback(profileImgSrc, profileName, profileReAuthEmail);
    }
}

/**
 * Main function that load the profile if exists
 * in localstorage
 */
function loadProfile() {
    if(!supportsHTML5Storage()) { return false; }
    // we have to provide to the callback the basic
    // information to set the profile
    getLocalProfile(function(profileImgSrc, profileName, profileReAuthEmail) {
        //changes in the UI
        $("#profile-img").attr("src",profileImgSrc);
        $("#profile-name").html(profileName);
        $("#reauth-email").html(profileReAuthEmail);
        $("#inputEmail").hide();
        $("#remember").hide();
    });
}

/**
 * function that checks if the browser supports HTML5
 * local storage
 *
 * @returns {boolean}
 */
function supportsHTML5Storage() {
    try {
        return 'localStorage' in window && window['localStorage'] !== null;
    } catch (e) {
        return false;
    }
}

/**
 * Test data. This data will be safe by the web app
 * in the first successful login of a auth user.
 * To Test the scripts, delete the localstorage data
 * and comment this call.
 *
 * @returns {boolean}
 */
function testLocalStorageData() {
    if(!supportsHTML5Storage()) { return false; }
    localStorage.setItem("PROFILE_IMG_SRC", "//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" );
    localStorage.setItem("PROFILE_NAME", "César Izquierdo Tello");
    localStorage.setItem("PROFILE_REAUTH_EMAIL", "oneaccount@gmail.com");
}
 $(document).ready(function(){
     $('.datepicker').datepicker();           

    });
function errmsg(){
    var uname = document.getElementById('uname');
    var pname = document.getElementById('pname');
    var fname = document.getElementById('fname');
    var lname = document.getElementById('lname');
    var email = document.getElementById('email');
    var role = document.getElementById('role');
    if(!uname.checkValidity()){
        document.getElementById("msg1").innerHTML = uname.validationMessage;
    }else
    {
        document.getElementById("msg1").innerHTML="";
    }
    if(!pname.checkValidity()){
        document.getElementById("msg2").innerHTML = pname.validationMessage;
    }else
    {
        document.getElementById("msg2").innerHTML="";
    }
    if(!fname.checkValidity()){
        document.getElementById("msg3").innerHTML = fname.validationMessage;
    }else
    {
        document.getElementById("msg3").innerHTML="";
    }
    if(!lname.checkValidity()){
        document.getElementById("msg4").innerHTML = lname.validationMessage;
    }else
    {
        document.getElementById("msg4").innerHTML="";
    }
    if(!email.checkValidity()){
        document.getElementById("msg5").innerHTML = email.validationMessage;
    }else
    {
        document.getElementById("msg5").innerHTML="";
    }
    if(!role.checkValidity()){
        document.getElementById("msg6").innerHTML = role.validationMessage;
    }else
    {
        document.getElementById("msg6").innerHTML="";
    }
}