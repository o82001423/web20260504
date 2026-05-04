<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 字串處理練習</title>
</head>
<body>

    <h2>字串擷取 (mb_substr)</h2>
    <?php
    $str = "科學的全部不過就是日常思考的提煉";
    /* 核心說明：mb_substr 用於處理多位元組字元（如中文），避免出現亂碼 */
    // 參數：(字串, 開始位置, 長度)
    $short = mb_substr($str, 0, 10);
    echo $short . "...";
    ?>

    <hr>

    <h2>關鍵字高亮 (str_replace)</h2>
    <?php 
    $str = "學會PHP網頁程式設計，薪水會加倍，工作會好找";
    $keyword = "程式設計";
    
    // 準備取代後的 HTML 樣式字串
    $tmp = "<span style='color:blue; font-size:24px;'>$keyword</span>";

    /* 核心說明：strpos 尋找字串出現的位置，大於 0 表示有找到 */
    if (strpos($str, $keyword) !== false) {
        $str = str_replace($keyword, $tmp, $str);
    }
    echo $str;
    ?>

    <hr>

    <h2>批次關鍵字取代 (Array Replace)</h2>
    <?php
    $str = "PHP 是一種廣泛應用於網頁開發的程式語言，具備語法簡單、學習門檻低的優點。
            它能快速建立動態網站。此外，PHP 擁有資源與框架，是企業常見的選擇。";
    
    echo "<strong>原始文字：</strong><br>" . $str . "<br><br>";

    // 核心說明：str_replace 支持陣列對陣列的批次替換
    $keyword = ["PHP", "網站", "企業"];
    $tmp = [];

    // 透過迴圈將每個關鍵字包裝成超連結樣式
    foreach ($keyword as $k) {
        $tmp[] = "<a href='#' style='color:red;'>$k</a>";
    }

    /* 核心：將 $keyword 陣列內的字對應替換成 $tmp 陣列內的樣式 */
    $new_str = str_replace($keyword, $tmp, $str);
    
    echo "<strong>取代後文字：</strong><br>" . $new_str;
    ?>

    <hr>

    <h2>未完成練習補充：字串分割與組合</h2>
    <?php 
    // 題目：將 "this, is, a, book" 切割後成為陣列
    $string = "this, is, a, book";
    
    /* 核心說明：explode() 將字串切開變陣列 */
    $array = explode(", ", $string);
    echo "陣列第 0 個元素：" . $array[0] . "<br>"; 

    /* 核心說明：implode() 將陣列組合回字串 */
    $new_string = implode(" - ", $array);
    echo "組合後字串：" . $new_string;
    ?>

</body>
</html>