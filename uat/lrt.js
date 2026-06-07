
<script nonce="2726c7f26c">
if('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/sw.js');
}
</script>
<script nonce="2726c7f26c">
document.addEventListener("visibilitychange", function() {
   if (document.hidden){
       console.log("Browser tab is hidden")
   } else {
       console.log("Browser tab is visible")
       location.reload();
   }
});
</script>

<script nonce="2726c7f26c">

setInterval( refreshMessages, 5000 );

//const station_id = urlParams.get('id');

function refreshMessages()
{
	
	var id = getParameterByName('id'); // "value1"
    $.ajax({
        url: 'table.php?id=' + id,
        type: 'GET',
        dataType: 'html'
    })
    .done(function( data ) {
        $('#table').html( data ); // data came back ok, so display it
    })
    .fail(function() {
        $('#table').prepend('現在已經夜深喇, 輕鐵應該停左喇...'); // there was an error, so display an error
    });
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);
    if (!results) return "220";
    if (!results[2]) return 'no';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

</script>
