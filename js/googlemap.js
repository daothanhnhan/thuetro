// JavaScript Document
$('#map').html("<iframe title='Bản đồ' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q=Hà Nội&amp;output=embed'></iframe>");
function searchMap() {
    var address = document.getElementById('searchkey').value;
    if (address.length == 0)
        return;
   $('#map').html("<iframe title='Bản đồ' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q="+address+"&amp;output=embed'></iframe>");

}
$(function() {
    $('#searchkey').keypress(function(e) {

        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            searchMap()
        }
    });
});