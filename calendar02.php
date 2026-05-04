<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
</head>
<body>
    <h1>月曆</h1>
    <?php 
    $today = date("Y-m-d");
    $MonthDays = date("t"); // 核心：取得當月總天數 (28-31)
    
    // 核心：取得當月 1 號是星期幾 (0為週日，1為週一...)
    $FirstDayWeek = date("w", strtotime(date("Y-m-01"))); 
    
    $LastDay = date("Y-m-$MonthDays");
    $LastDayWeek = date('w', strtotime($LastDay));
    
    // 核心：計算月曆總格子數（前補空白 + 當月天數 + 後補空白）
    $TotalDays = $MonthDays + $FirstDayWeek + (6 - $LastDayWeek);
    
    // 核心：總天數除以 7 取得需要畫出的週數 (列數)
    $TotalWeeks = $TotalDays / 7;
    ?>
    
    <h3>今天是<?= $today; ?></h3>
    <ul>
        <li>這個月的天數一共有<?= $MonthDays; ?> 天</li>
        <li>這個月的第 1 天是星期 <?= $FirstDayWeek; ?> (0代表週日)</li>
        <li>這個月曆一共畫出(含空白) <?= $TotalDays ?> 個格子</li>
    </ul>

    <style>
        table { border-collapse: collapse; }
        table td { padding: 5px 10px; border: 1px solid black; text-align: center; }
        .holiday { color: red; } /* 額外練習：標示假日 */
    </style>

    <table>
        <tr>
            <!-- 注意：PHP 的 date("w") 預設 0 是週日，所以標頭建議從「日」開始排列 -->
            <td>日</td>
            <td>一</td>
            <td>二</td>
            <td>三</td>
            <td>四</td>
            <td>五</td>
            <td>六</td>
        </tr>

    <?php
    for($i = 0; $i < $TotalWeeks; $i++){
        echo "<tr>";
        for($j = 0; $j < 7; $j++){
            echo "<td>";

            /* 核心邏輯：日期位移計算 
               (目前的週數 * 7 + 目前的星期索引) - (1號的星期索引) + 1
            */
            $DayNumber = ($i * 7 + $j) - $FirstDayWeek + 1;

            if($DayNumber > 0 && $DayNumber <= $MonthDays){
                echo $DayNumber;
            } else {
                echo "&nbsp;"; // 沒日期的格子輸出空白符，維持表格框線
            }
            
            echo "</td>";
        }
        echo "</tr>";
    }
    ?>
    </table>
    <br>
    <HR>

    <style>
        #calender .tr div{
            padding:0;
            display: inline-block;
            width: 50px;
            height: 50px;
            border: 1px solid black;
           vertical-align: top;
        }
        #calender .tr div:hover{
            padding:0;
            font-size: 26px;
            background: lightgreen;
            font-weight: bold;
            margin: -1px 0 0 -px;
        }

    </style>

    <div id="calender">
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
    // for($i = 0; $i < $TotalWeeks; $i++){
    //     echo "<div  class='tr'>";
    //     for($j = 0; $j < 7; $j++){
    //         $DayNumber = ($i * 7 + $j) - ($FirstDayWeek - 1);

    //         if($DayNumber > 0 && $DayNumber <= $MonthDays){
    //             $date=date("Y-m-$DayNumber");
    //             if($date=='2026-05-16'){
    //             echo "<div data-date='$date' style='background:skyblue;font-weight:bold'>";
            
    //             }else{
    //                 echo "<div data-date='$date'>";
        
    //     echo date("d", strtotime($date));
    //     echo "</div>";
    //     }
    // else{
    //     echo "<div> &nbsp;</div>";
        
    // }
    // echo "</div>";
    // }
    // ?>


for($i=0;$i<$TotalWeeks;$i++){
        echo "<div class='tr'>";
        for($j=0;$j<7;$j++){

            $DayNumber=($i*7+$j)-($FirstDayWeek-1);
            if($DayNumber>0 && $DayNumber<=$MonthDays){
                $date=date("Y-m-$DayNumber");
                if($date=='2026-05-16'){
                    echo "<div data-date='$date' style='background:skyblue;font-weight:bolder'>";

                }else{
                    echo "<div data-date='$date'>";
                }
                    
                echo date("d",strtotime($date));
                echo "</div>";
            }else{
                echo "<div>&nbsp;</div>";
            }
        }
        echo "</div>";
    }
    </div>
</body>
</html>