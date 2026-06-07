<!doctype html>
<html lang="en">
  <head>
  	<title>Website menu 09</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

<script>
if('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/sw.js');
}
</script>
<script>
document.addEventListener("visibilitychange", function() {
   if (document.hidden){
       console.log("Browser tab is hidden")
   } else {
       console.log("Browser tab is visible")
       location.reload();
   }
});
</script>

<script>

setInterval( refreshMessages, 5000 );

const station_id = urlParams.get('id');

function refreshMessages()
{
	
	var id = getParameterByName('id'); // "value1"
    $.ajax({
        url: 'table.php?id=' + id,
        type: 'GET',
        dataType: 'html'
    })
    .done(function( data ) {
        $('#colorlib-main').html( data ); // data came back ok, so display it
    })
    .fail(function() {
        $('#colorlib-main').prepend('現在已經夜深喇, 輕鐵應該停左喇...'); // there was an error, so display an error
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
	</head>
	<body onload="refreshMessages()">
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
	<div id="colorlib-page">

		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i>test</i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
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
			</nav>
		</aside> <!-- END COLORLIB-ASIDE -->
			<section class="ftco-section pt-4 mb-5 ftco-intro">
				<div class="container-fluid px-3 px-md-0">
					<div class="row">
						<div id="table" class="col-md-12 mb-4">
							<h1 class="h2"><a class="navbar-brand" href="./">輕鐵 - <?php echo $station; ?></a></h1>

						</div>

					</div>
				</div>
			</section>
		<div id="colorlib-main">
			<section class="ftco-section pt-4 mb-5 ftco-intro">

			

			</section>
	
		</div><!-- END COLORLIB-MAIN -->
	
	</div><!-- END COLORLIB-PAGE -->

	</section>
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

