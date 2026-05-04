<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>時間/日期處理</title>
</head>
<body>
    <h1>給定兩個日期，計算中間間隔天數</h1>
    <ul>
        <li>起始日期: 2026-04-19</li>
        <li>結束日期: 2026-05-04</li>
    </ul>
    <?php 
        $start = "2026-04-19";
        $end = "2026-05-04";

        /* 核心說明：strtotime() 會將日期字串轉為 Unix 時間戳（秒） */
        $start_time = strtotime($start);
        $end_time = strtotime($end);

        // 注意：date("h:m:s") 中的 m 是月份，分鐘應該用 i
        echo "起始秒數轉換: " . date("Y-m-d H:i:s", $start_time) . "<br>";
        echo "結束秒數轉換: " . date("Y-m-d H:i:s", $end_time) . "<br>";

        /* 計算原理：(結束秒 - 開始秒) / 一天的總秒數 */
        $diff = ($end_time - $start_time) / (60 * 60 * 24);
        echo "間隔天數: " . $diff . " 天";
    ?>

<br><hr>

    <h2>計算自己下一次的生日還有幾天</h2>
    <?php 
        // 修正：strtotime 內應放入時間字串，或直接用 time() 取得現在秒數
        $start_time = strtotime(date("Y-m-d")); 
        $birthday = "2000-04-06";
        
        // 核心邏輯：將生日的年份強制替換為今年
        $birthday_string = date("Y") . date("-m-d", strtotime($birthday));
        $birthday_time = strtotime($birthday_string);

        // 如果今年的生日已經過了，就計算明年的生日
        if ($birthday_time < $start_time) {
            $birthday_time = strtotime("+1 year", $birthday_time);
        }

        $diff = ($birthday_time - $start_time) / (60 * 60 * 24);
        
        echo "今天是: " . date("Y-m-d", $start_time) . "<br>";
        echo "距離下一次生日 [" . date("Y-m-d", $birthday_time) . "] 還有 " . $diff . " 天";
    ?>

<br><hr>

    <h2>常用日期格式練習</h2>
    <?php 
        echo date("Y/m/d") . "<br>";
        echo date("n月/j日 l") . "<br>"; // l 是星期幾的全寫
        
        // 假日判斷修正：date("N") 回傳 1(一) 到 7(日)
        $w = date("N");
        echo "今天日期: " . date("Y-m-d");
        echo ($w >= 6) ? " 【假日】" : " 【上班日】";
    ?>

<br><hr>

    <h2>練習：接下來五週的起始日</h2>
    <?php
    $date = "2026-05-04";
    // 修正：for 迴圈後面的分號要拿掉，並加上花括號 {}
    for ($i = 1; $i <= 5; $i++) {
        /* strtotime 的強大之處：可以直接使用相對時間字串如 "+1 week" */
        $timetring = strtotime("+$i week", strtotime($date));
        echo "第 $i 週後是: " . date("Y-m-d (l)", $timetring) . "<br>";
    }
    ?>
</body>
</html>