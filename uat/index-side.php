<html>

<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="theme-color" content="#488298">
<link rel="apple-touch-icon" sizes="192x192" href="/icons/192.png" />


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="refresh" content="10">
<link rel="manifest" href="manifest.json">

<script>
if('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/sw.js');
}
</script>
  <?php
  $station = $_GET['name'];
	  if ($station == "") {
	  $station = "大興 (南)";
	}
  ?>
  
  
<div class="offcanvas offcanvas-start w-50" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false">
    <div class="offcanvas-header">
        <h6 class="offcanvas-title d-none d-sm-block" id="offcanvas">輕鐵站列表 - <?php echo $station?></h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-0">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
            <li class="nav-item">
                <a href="./?id=220&name=大興 (南)" class="nav-link text-truncate">
                    大興(南)
                </a>
            </li>
            <li>
                <a href="./?id=100&name=兆康"  class="nav-link text-truncate">
                    兆康
            </li>
            <li>
                <a href="./?id=270&name=安定" class="nav-link text-truncate">
                    安定</span></a>
            </li>
            <li>
                <a href="./?id=560&name=水邊圍"  class="nav-link text-truncate">
                    水邊圍
            </li>
            <li>
                <a href="./?id=570&name=豐年路" class="nav-link text-truncate">
                    豐年路</span></a>
            </li>
            <li>
                <a href="./?id=580&name=康樂路" class="nav-link text-truncate">
                    康樂路
            </li>
            <li>
                <a href="./?id=590&name=大棠路"  class="nav-link text-truncate">
                    大棠路
            </li>
            <li>
                <a href="./?id=600&name=元朗"  class="nav-link text-truncate">
                    元朗
            </li>
            <li>
                <a href="./?id=430&name=天水圍"  class="nav-link text-truncate">
                    天水圍
            </li>
            <li>
                <a href="./?id=460&name=天瑞"  class="nav-link text-truncate">
                    天瑞
            </li>
            <li>
                <a href="./?id=480&name=天富"  class="nav-link text-truncate">
                    天富
            </li>
            <li>
                <a href="./?id=468&name=頌富"  class="nav-link text-truncate">
                    頌富
            </li>
            
        </ul>
    </div>
</div>


<div class="container-fluid">

    <div class="row">
        <div class="col min-vh-100 p-4">
            <!-- toggler -->
			<button class="btn float-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
                輕鐵選站
            </button>

<?php
$stationid = $_GET['id'];
if ($stationid == "") {
  $stationid = "220";
}
$jsonurl = 'https://rt.data.gov.hk/v1/transport/mtr/lrt/getSchedule?station_id='.$stationid;
$str_data = file_get_contents($jsonurl);
$data = json_decode($str_data, true);
$d = sizeof($data["platform_list"][0]['route_list']);
$lastupdate = $data['platform_list'][0]['system_time'];
if ($lastupdate == "")
{
	echo "輕鐵站列表 - " .$station;
	echo "</br> no time!";
}
else
{
		echo "輕鐵站列表 - " .$station;
	echo "</br> " .$lastupdate;
}
/*Initializing temp variable to design table dynamically*/
$temp = "<table class='table table-hover table-responsive'>";
 
/*Defining table Column headers depending upon JSON records*/
$temp .= "<tr><th scope='col'><h4>路綫</h4></th>";
$temp .= "<th scope='col'><h4>目的地</h4></th>";
$temp .= "<th scope='col'><h4>車卡數</h4></th>";
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
					$temp .= "<td><strong>" . $data["platform_list"][$i]['route_list'][$j]['time_ch'] . "</strong></td>";
					$temp .= "</tr>";
	}
}
 
/*End tag of table*/
$temp .= "</table>";
$temp .=  $lastupdate;
/*Printing temp variable which holds table*/
echo $temp;
?>
        </div>
    </div>
</div>
</html>