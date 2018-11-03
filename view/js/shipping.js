/////**********************************///////////
//var first = "hello";
//console.log(first);
//getShipping();

function getShipping() {
    document.getElementById('editform').addEventListener('submit', AJAXupdateAddress);
    document.getElementById('addform').addEventListener('submit', AJAXaddAddress);
    
    console.log("get shipping");
    var shipURL = "../model/webserver.php?getAddress=selAdd";
    $.ajax({
        url: shipURL,
        method: 'get',
        datatype: 'json',
        success: function(res) {
            console.log(res);
            displayAdd(res);
        },
        error: function(err) {
            console.log(err);
        }
    });
}

function displayAdd(shipArray) {
    console.log(shipArray);
    outHTML = '';
    for(var loop=0;loop<shipArray.length;loop++) {
        outHTML += '<div class="shiprow">';
        outHTML += '<h5><b>Address: </b><span>' + shipArray[loop].address + '</span></h5>';
         outHTML += '<h5><b>Mobile No: </b><span>' + shipArray[loop].mobileno + '</span></h5>';
        outHTML += '<h5><b>Country: </b><span>' + shipArray[loop].country + '</span></h5>';
        outHTML += '<h5><b>City: </b><span>' + shipArray[loop].city + '</span></h5>';
        outHTML += '<h5><b>Postcode: </b><span>' + shipArray[loop].postcode + '</span></h5>';
        outHTML += '<span><a href="#" onClick="editShipForm(' + shipArray[loop].shippingid + ')">Edit</a></span>&nbsp;&nbsp;&nbsp;';
        outHTML += '<span><a href="#" onClick="deleteShipForm(' + shipArray[loop].shippingid + ')">Delete</a></span>';
        outHTML += '</div>';
    }
    document.getElementById('listAddress').innerHTML = outHTML;
}

function editShipForm(theship) {
    var shipURL = "../model/webserver.php?getAddress=oneAddress&shippingid=" + theship;
    $.ajax({
        url: shipURL,
        method: 'get',
        datatype: 'json',
        success: function(res) {
            populateForm(res);
        },
        error: function(err) {
            console.log(err);
        }
    });
}

function populateForm(ship) {
    document.getElementById('shipid').value = ship.shippingid;
    document.getElementById('shipaddress').value = ship.address;
    document.getElementById('shipmobile').value = ship.mobileno;
    document.getElementById('shipcountry').value = ship.country;
    document.getElementById('shipcity').value = ship.city;
    document.getElementById('shipcode').value = ship.postcode;
}
function deleteShipForm(shipid) {
    var returnVal = confirm('Are you sure?');
    if(returnVal == true) {
        AJAXdeleteShip(shipid);
    }
}
function AJAXupdateAddress() {
    var shipURL = "../model/webserver.php?getAddress=updateAddress";
    $.ajax({
        url: shipURL,
        method: 'post',
        data: $('#editform').serialize(),
        datatype: 'json',
        success: function(res) {
            updateLineFromForm();
            clearForm();
        },
        error: function(err) {
            console.log(err);
        }
    });
}
function AJAXaddAddress() {
    var shipURL = "../model/webserver.php?getAddress=addAddress";
    $.ajax({
        url: shipURL,
        method: 'post',
        data: $('#addform').serialize(),
        datatype: 'json',
        success: function(res) {
            addLineFromForm();
            clearForm();
        },
        error: function(err) {
            console.log(err);
        }
    });
}
function AJAXdeleteShip(theship) {
    var shipURL = "../model/webserver.php?getAddress=deleteAddress&shippingid=" + theship;
    $.ajax({
        url: shipURL,
        method: 'get',
        datatype: 'json',
        success: function(res) {
            deleteLineFromForm();
        },
        error: function(err) {
            console.log(err);
        }
    });
}

function clearForm() {
    var inputFields = document.getElementsByTagName('input');
    for(loop=0;loop<inputFields;loop++) {
        inputFields[loop].value = '';
    }
}

function deleteLineFromForm() {
    getShipping();
}

function addLineFromForm() {
    getShipping();
}

function updateLineFromForm() {
    getShipping();
}

/////**********************************///////////