<!DOCTYPE html>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title反轉陣列</title>
</head>
<body>
    <H2>請設計一支程式,在不產生新陣列的狀況下,將一個陣列的元素順序反轉(利用迴圈)</H2>
    <P>例:$a=[2,4,6,1,8] 反轉後 $a=[8,1,6,4,2]</P>
    <?php
    $a=[2,4,6,1,8];
    $max_idx=count($a)-1;
    for($i=0;$i<count($a)/2;$i++){
    $tmp=$a[$i];
 
    $a[$i]=$a[$max_idx-$i];
    $a[$max_idx-$i]=$tmp;
    }
    echo "<pre>";
    print_r($a);
    echo "</pre>";
    ?>

</body>
</html>