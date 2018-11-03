//*****************loader***********************// 
function formsubmit(){
    var cardtype = document.getElementById('cardtype').value;
    var name = document.getElementById('name').value;
    var cardno = document.getElementById('cardno').value;
    var expdate = document.getElementById('expdate').value;
    var expmonth = document.getElementById('expmonth').value;
    var cvvno = document.getElementById('cvvno').value;
    $.ajax({
       url: '../model/process.php',
       type: 'post',
       data: 
        {
        cardtype : cardtype,
        name  : name,
        cardno : cardno,
        expdate : expdate,
        expmonth : expmonth,
        cvvno : cvvno,
        },
        beforeSend: function(){
            $('.modal').show();
        },
        success: function(data){
            $('.modal').hide();
        },
        error: function(data){
            
        }
    });
}
//*****************loader***********************// 
