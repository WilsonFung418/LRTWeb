<html>
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="theme-color" content="#488298">

<meta http-equiv="Content-Security-Policy" content="frame-ancestors 'self';block-all-mixed-content;default-src 'self';script-src 'self' 'sha256-Cpd32em1EetWh5CwiM/smwBXahrRpAsh+ViNrRYxJa0=' 'sha256-iBXTLU0UJYt5FLyubgRrgtwduT+B4XaYY4Cti2R3l50=' 'sha256-vIly8yhN2g6DDpauvorbGfo98FU3oAr0fIU1UGLS4o8=' 'sha256-w1RORtkJrXV397eL962CwqM+VGJVLdVwMG7EN+md2dY=' 'report-sample' 'unsafe-inline' https://cdn.jsdelivr.net;style-src 'self' 'report-sample' 'unsafe-inline' cdn.jsdelivr.net;object-src 'none';frame-src 'self';child-src 'self';img-src
 'self' data: cdn.jsdelivr.net; font-src 'self' cdn.jsdelivr.net;connect-src 'self' cdn.jsdelivr.net; manifest-src 'self';base-uri 'self';form-action 'self';media-src 'self';prefetch-src 'self';worker-src 'self';">


<meta http-equiv="X-XSS-Protection" content="1; mode=block" />
<link rel="apple-touch-icon" sizes="192x192" href="/icons/192.png" />

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js" integrity="sha384-UG8ao2jwOWB7/oDdObZc6ItJmwUkR/PfMyt9Qs5AwX7PsnYn1CRKCTWyncPTWvaS" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="refresh" content="180">
<link rel="manifest" href="manifest.json">


<script nonce="rAnd0m">
if('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/sw.js');
}
</script>
<script nonce="rAnd0m">
document.addEventListener("visibilitychange", function() {
   if (document.hidden){
       console.log("Browser tab is hidden")
   } else {
       console.log("Browser tab is visible")
       location.reload();
   }
});
</script>

<script nonce="rAnd0m">

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
    <script nonce="rAnd0m">
        window.addEventListener('load', refreshMessages());
    </script>


<nav class="navbar navbar-expand-lg navbar-dark bg-secondary" style="background-color: #e3f2fd;">
  <div class="container-fluid">
  <?php
  if (isset($_GET['name']))
  {
	  		$station = $_GET['name'];

  }
	else
	{
	  $station = "大興(南)";
  }


  ?>
    <a class="navbar-brand" href="./">輕鐵 - <?php echo $station; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./?id=220&name=大興(南)">大興 (南)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?id=100&name=兆康">兆康</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?id=295&name=屯門">屯門</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=./?id=280&name=市中心>市中心</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?id=270&name=安定">安定</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="./?id=560&name=水邊圍">水邊圍</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?id=570&name=豐年路">豐年路</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?id=580&name=康樂路">康樂路</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?id=590&name=大棠路">大棠路</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="./?id=600&name=元朗">元朗</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="./?id=430&name=天水圍">天水圍</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="./?id=460&name=天瑞">天瑞</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="./?id=480&name=天富">天富</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="./?id=468&name=頌富">頌富</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div id="table">
</div>
</body>

</html>