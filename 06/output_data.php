<?php 

$quenum= 1;
$que_data= null;
$ans_data=null;
$type_data=null;
$title_data= "";
$add_flg= false;

// CSVから取込み
$fp = fopen('data/data.csv', 'r');
$n = 0;
while (($data = fgetcsv($fp)) !== FALSE) {
    if($n == 0)
    {
        $quenum = $data[0];
    }else if($n == 1)
    {
        $title_data = $data[0];
    }else if($n == 2)
    {
        $data2 = array();
        for($i = 0; $i < count($data); ++$i ){

            $elem = $data[$i];
            $data2[] = $elem;
        }

        $que_data = $data2;
    }else if($n == 3)
    {
        $type_data = $data;
    }else if($n == 4)
    {
        $data2 = array();
        for($i = 0; $i < count($data); ++$i ){

            $elem = $data[$i];
            $data2[] = $elem;
        }

        $ans_data = $data2;
    }
    $n++;
}
fclose($fp);

?>
<html>

<head>
    <meta charset="utf-8">
    <title>
        <?php echo $title_data; ?>
    </title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

    <body>
        <div id="wrapper"> 
        <h1><?php echo $title_data; ?></h1>
        <form action="output_data2.php" method="post">
       <table border="1">
        <?php 

        // 描画
           for($loop=0;$loop<$quenum;$loop++)
        {
               $res = "";
               switch($type_data[$loop])
               {
                   case "text":
                       $res ='<input type="'.$type_data[$loop].'" name="res_text'.$loop.'" >';
                       break;
                   case "radio":
                       $ans_loop=explode('/',$ans_data[$loop]);
                       $opt = "";
                       for ($i = 0 ; $i < count($ans_loop); $i++) {
                           $opt = $opt.'<input type="'.$type_data[$loop].'" name="res_radio'.$loop.'" value="'.$ans_loop[$i].'">'.$ans_loop[$i];
                       }
                       $res = $opt;
                       break;
                   case "checkbox":
                       $ans_loop=explode('/',$ans_data[$loop]);
                       $opt = "";
                       for ($i = 0 ; $i < count($ans_loop); $i++) {
                           $opt = $opt.'<input type="'.$type_data[$loop].'" name="res_check'.$loop.'[]" value="'.$ans_loop[$i].'">'.$ans_loop[$i];
                       }
                       $res = $opt;
                       break;
                   case "select":
                       $ans_loop=explode('/',$ans_data[$loop]);
                       $opt = "";
                       for ($i = 0 ; $i < count($ans_loop); $i++) {
                           $opt = $opt.'<option>'.$ans_loop[$i].'</option>';
                       }
                       $res ='<select name="res_select'.$loop.'" >'.$opt.'</select>';
                       break;
                   case "textarea":
                       $res ='<input type="'.$type_data[$loop].'" name="res_textarea'.$loop.'" >';
                       break;
               }
               echo '<tr><th>  '.$que_data[$loop].'</th> <td>'.$res.'</td></tr>';
            }
           $type_2 = implode(',',$type_data);
           $que_2 = implode(',',$que_data);
        ?>
            </table>
            <br>
            <input type="submit" name="send" value="回答を送信" />
            <!-- 見えないデータ -->
            <input type="hidden" name="quenum" value="<?=$quenum?>">
            <input type="hidden" name="type" value="<?=$type_2?>">
            <input type="hidden" name="queData" value="<?=$que_2?>">
        </form>
    </div>
</body>

</html>
