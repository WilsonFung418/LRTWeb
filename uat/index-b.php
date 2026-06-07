
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="refresh" content="10">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LRT - <?php echo $_GET['name']; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index-b.php?id=220&name=大興 (南)">大興 (南)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./index-b.php?id=100&name=兆康">兆康</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/index-b.php?id=295&name=屯門">屯門</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/index-b.php?id=270&name=安定">安定</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="/index-b.php?id=560&name=水邊圍">水邊圍</a>
        </li>
		
        <li class="nav-item">
          <a class="nav-link" href="/index-b.php?id=570&name=豐年路">豐年路</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/index-b.php?id=580&name=康樂路">康樂路</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/index-b.php?id=590&name=大棠路">大棠路</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="/index-b.php?id=600&name=元朗">元朗</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="/index-b.php?id=430&name=天水圍">天水圍</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="/index-b.php?id=460&name=天瑞">天瑞</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="/index-b.php?id=480&name=天富">天富</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="/index-b.php?id=468&name=頌富">頌富</a>
  
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
$gamertag = $_GET['id'];
if ($gamertag == "") {
  $gamertag = "220";
}
$jsonurl = 'https://rt.data.gov.hk/v1/transport/mtr/lrt/getSchedule?station_id='.$gamertag;
$str_data = file_get_contents($jsonurl);
$data = json_decode($str_data, true);
$d = sizeof($data["platform_list"][0]['route_list']);
/*Initializing temp variable to design table dynamically*/
$temp = "<table class='table table-hover table-responsive'>";
 
/*Defining table Column headers depending upon JSON records*/
$temp .= "<tr><th scope='col'><h4>路綫</h4></th>";
$temp .= "<th scope='col'><h4>目的地</h4></th>";
$temp .= "<th scope='col'><h4>卡數</h4></th>";
$temp .= "<th scope='col'><h4>下一班車</h4></th></tr>";
 
/*Dynamically generating rows & columns*/
for($i = 0; $i < sizeof($data["platform_list"]); $i++)
{
	
	$temp .= "<tr>";
	$temp .= "<td colspan='4' class='table-primary text-center'><strong>月台: " . $data['platform_list'][$i]['platform_id'] . "</strong></td>";
	$temp .= "</tr>";
	
	for($j = 0; $j < sizeof($data["platform_list"][$i]['route_list']); $j++)
	{
					$temp .= "<tr scope='row'>";
					$temp .= "<td><strong>" . $data['platform_list'][$i]['route_list'][$j]['route_no'] . "</strong></td>";

					$temp .= "<td>" . $data["platform_list"][$i]['route_list'][$j]['dest_ch'] . "</td>";
					$temp .= "<td><img src=" . $data["platform_list"][$i]['route_list'][$j]['train_length'] . ".png></td>";
					$temp .= "<td>" . $data["platform_list"][$i]['route_list'][$j]['time_ch'] . "</td>";
					$temp .= "</tr>";
	}
}
 
/*End tag of table*/
$temp .= "</table>";
 
/*Printing temp variable which holds table*/
echo $temp;

?>