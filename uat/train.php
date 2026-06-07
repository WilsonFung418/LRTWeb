<?php
$gamertag = '200';
$jsonurl = 'https://rt.data.gov.hk/v1/transport/mtr/lrt/getSchedule?station_id='.$gamertag;
$json = file_get_contents($jsonurl);
#var_dump(json_decode($json, true));

/* json formatted for readability
object(stdClass)#1 (2) { 
    ["status"]=> string(3) "200" 
    ["response"]=> object(stdClass)#2 (5) { // response is an array()
        ["onlineId"]=> string(6) "x0--II" 
        ["avatar"]=> string(77) "http://static-resource.np.community.playstation.net/avatar_m/SCEI/I0053_m.png" 
        ["plus"]=> int(0) 
        ["aboutMe"]=> string(0) "" 
        ["trophies"]=> object(stdClass)#3 (6) { // trophies is an array()
            ["trophyLevel"]=> int(3) 
            ["progress"]=> int(7) 
            ["platinum"]=> int(0) 
            ["gold"]=> int(2) 
            ["silver"]=> int(6) 
            ["bronze"]=> int(19) 
        } 

    }

}
*/

$json = json_decode($json, true);
$rsp = $json['response']; // response array
$trophies = $rsp['trophies']; // trophy array

// examples
$avatar = $rsp['avatar'];
$onlineId = $rsp['onlineId'];
$trophylevel = $trophies['trophyLevel'];

// inline html example
echo("<div><img src=\"".$rsp['avatar']."\".png /></div>");
// or
echo("<div><img src=\"".$json['platform_list'][0]['route_list'][0]['train_length']."\".png /></div>");

echo("<div>".$json['platform_list'][0]['route_list'][0]['train_length']."</div>");
// or
echo("<div>".$json['platform_list'][0]['route_list'][0]['route_no']."</div>");
?>