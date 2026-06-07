<head>
  <meta charset="UTF-8">
</head>
<?php
class ArrayHelper {

  public static function arrayRandShuffle($arr) {

    // 使用 array_keys 獲取數組的 key 值
    $keys = array_keys($arr);

    // 打亂 keys 數組
    shuffle($keys);

    // 返回隨機數組的值
    return $arr[$keys[0]];
  } 
}

$arr = array("我覺得你今天有點怪。", 
"你知道你和星星的區別嗎？ ", 
"你聞到什麼味道了嗎？",
"你累不累啊?","問你一個問題，你跑步快嗎？",
"總覺得一個腦袋不夠用","我找不到路了~~",
"我的手被劃了一條口子，你也去劃一道吧。",
"你知道我喜歡誰嗎？","我是九你是三。",
"我想買一塊地。",
"如果你是方便麵你覺得你是什麼味的？",
"你知道我為什麼感冒了嗎?",
"我優點很多，但有一個缺點",
"報告~我變心了");

$rand = ArrayHelper::arrayRandShuffle($arr);
print_r($rand);
?>
