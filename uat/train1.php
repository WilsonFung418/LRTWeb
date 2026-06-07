
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.wrap{
  overflow:hidden;
  border-radius:10px 10px 0px 0px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.35);
}

table{
  font-family: 'Oswald', sans-serif;
  border-collapse:collapse;

}

th{
  background-color:#009879;
  color:#ffffff;
  width:25vw;
  height:75px;
}

td{
  background-color:#ffffff;
  width:25vw;
  height:50px;
  text-align:center;
}

tr{
  border-bottom: 1px solid #dddddd;
}

tr:last-of-type{
  border-bottom: 2px solid #009879;
}

tr:nth-of-type(even) td{
  background-color:#f3f3f3;
}
</style>
<?php
$gamertag = $_GET['id'];
$jsonurl = 'https://rt.data.gov.hk/v1/transport/mtr/lrt/getSchedule?station_id='.$gamertag;
$str_data = file_get_contents($jsonurl);
$data = json_decode($str_data, true);
$d = sizeof($data["platform_list"][0]['route_list']);
/*Initializing temp variable to design table dynamically*/
$temp = "<table>";
 
/*Defining table Column headers depending upon JSON records*/
$temp .= "<tr><th>路綫</th>";

$temp .= "<th>目的地</th>";
$temp .= "<th>下一班車</th>";
$temp .= "<th>卡數</th></tr>";
 
/*Dynamically generating rows & columns*/
for($i = 0; $i < sizeof($data["platform_list"]); $i++)
{
	
	$temp .= "<tr>";
	$temp .= "<td colspan='4'>月台: " . $data['platform_list'][$i]['platform_id'] . "</td>";
	$temp .= "</tr>";
	
	for($j = 0; $j < sizeof($data["platform_list"][$i]['route_list']); $j++)
	{
					$temp .= "<tr>";
					$temp .= "<td>" . $data['platform_list'][$i]['route_list'][$j]['route_no'] . "</td>";

					$temp .= "<td>" . $data["platform_list"][$i]['route_list'][$j]['dest_ch'] . "</td>";
					$temp .= "<td>" . $data["platform_list"][$i]['route_list'][$j]['time_ch'] . "</td>";
					$temp .= "<td><img src=" . $data["platform_list"][$i]['route_list'][$j]['train_length'] . ".png></td>";
					$temp .= "</tr>";
	}
}
 
/*End tag of table*/
$temp .= "</table>";
 
/*Printing temp variable which holds table*/
echo $temp;
echo $d;
echo $gamertag;
?>