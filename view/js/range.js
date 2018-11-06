$(document).ready(function(){
    var outputspan = $('#spanOutput');
    $('#slider').slider({
       range: true,
        min: 1,
        max: 4,
        slide: function(event, ui){
        outputspan.html(ui.values[0] + '-' + ui.values[1] + 'Quantity');
    }
    });
});