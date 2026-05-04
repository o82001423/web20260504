<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆 - 完整教學版</title>
    <style>
        table { border-collapse: collapse; width: 350px; }
        table td { padding: 10px; border: 1px solid black; text-align: center; }
        .header { background-color: #eee; font-weight: bold; }
    </style>
</head>
<body>
    <h1>月曆</h1>
    <?php 
    $today = date("Y-m-d");
    $MonthDays = date("t"); // 本月天數
    $FirstDayWeek = date("w", strtotime(date("Y-m-01"))); // 1號是星期幾 (0是週日)
    $LastDay = date("Y-m-$MonthDays");
    $LastDayWeek = date('w', strtotime($LastDay));
    
    // 計算總格子數
    $TotalDays = $MonthDays + $FirstDayWeek + (6 - $LastDayWeek);
    $TotalWeeks = $TotalDays / 7;
    ?>

    <h3>今天是 <?= $today; ?></h3>
    <!-- 這裡是你的寶貴資料，全部幫你留著 -->
    <ul>
        <li>這個月的天數一共有 <?= $MonthDays; ?> 天</li>
        <li>這個月的第 1 天是 <?= date("Y-m-01"); ?></li>
        <li>這個月的第 1 天是星期 <?= $FirstDayWeek; ?> (0代表週日)</li>
        <li>這個月的最後 1 天是 <?= $LastDay ?></li>
        <li>這個月的最後 1 天是星期 <?= $LastDayWeek; ?></li>
        <li>這個月曆一共要畫出 <?= $TotalDays; ?> 個格子</li>
    </ul>

    <hr>

    <table>
        <tr class="header">
            <!-- 核心修正：標頭順序要跟 PHP 的 date("w") 對齊，從「日」開始 -->
            <td>日</td><td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td>六</td>
        </tr>

    <?php
    for($i = 0; $i < $TotalWeeks; $i++){
        echo "<tr>";
        for($j = 0; $j < 7; $j++){
            echo "<td>";

            /* 核心邏輯解釋：
               $i*7 + $j 是目前的格子編號 (0~41)
               扣掉 $FirstDayWeek (1號前面的空白數) 
               加 1 (因為日期從1號開始)
            */
            $DayNumber = ($i * 7 + $j) - $FirstDayWeek + 1;

            if($DayNumber > 0 && $DayNumber <= $MonthDays){
                echo $DayNumber;
            } else {
                echo "&nbsp;"; // 空白格
            }
            
            echo "</td>";
        }
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>


    
    <br>
    <HR>

    <style>
        #calender .tr div{
            padding:0;
            display: inline-block;
            width: 50px;
            height: 50px;
            border: 1px solid black;
            margin: -1px 0 0 -1px;
        }

    </style>

    <div id="calendar">
        <div class="tr">
            <!-- 注意：PHP 的 date("w") 預設 0 是週日，所以標頭建議從「日」開始排列 -->
            <div>日</div>
            <div>一</div>
            <div>二</div>
            <div>三</div>
            <div>四</div>
            <div>五</div>
            <div>六</div>
        </div>

    <?php
    for($i = 0; $i < $TotalWeeks; $i++){
        echo "<div  class='tr'>";
        for($j = 0; $j < 7; $j++){
            echo "<div class='tr'>";

            /* 核心邏輯：日期位移計算 
               (目前的週數 * 7 + 目前的星期索引) - (1號的星期索引) + 1
            */
            $DayNumber = ($i * 7 + $j) - $FirstDayWeek + 1;

            if($DayNumber > 0 && $DayNumber <= $MonthDays){
                echo $DayNumber;
            } else {
                echo "&nbsp;"; // 沒日期的格子輸出空白符，維持表格框線
            }
            
            echo "</div>";
        }
        echo "</div>";
    }
    ?>
    </div>
</body>
</html>