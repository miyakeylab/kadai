<?php 
$quenum= 1;
$que_data= null;
$ans_data=null;
$type_data=null;
$title_data= "";
$add_flg= false;
if($_SERVER["REQUEST_METHOD"] != "POST"){
    // ブラウザからHTMLページを要求された場合
    $add_flg= true;
}else{
    // フォームからPOSTによって要求された場合
    if (isset($_POST['out']) === TRUE) {
        $quenum = $_POST['quenum'];
        $title_data = $_POST['title'];
        $que_data = $_POST['que'];
        $type_data = $_POST['type'];
        $ans_data = $_POST['ans'];
        // CSVへ出力
        $fp = fopen('data/data.csv', 'w');
        fwrite($fp, $quenum . "\n");
        fwrite($fp, $title_data . "\n");
        

        $line = implode(',' , $que_data);
        fwrite($fp, $line . "\n");
        $line = implode(',' , $type_data);
        fwrite($fp, $line . "\n");
        $line = implode(',' , $ans_data);
        fwrite($fp, $line . "\n");
        fclose($fp);
        
    } else if (isset($_POST['reload']) === TRUE) {
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

    } else if (isset($_POST['btn_add']) === TRUE) {
        // 項目追加
        $quenum = $_POST['quenum'];
        $quenum++;
        $que_data = $_POST['que'];
        $ans_data = $_POST['ans'];
        $type_data = $_POST['type'];
        $title_data = $_POST['title'];
        $add_flg = true;
    }
}
?>


<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>アンケートフォーム作成アンケート</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <div id="wrapper"> 
    <h1>アンケートフォーム作成アンケート</h1>
    <br>
    <form action="input_data.php" method="post">
        <div> 
            <div>
                <table border="1">
                   <tr>
                    <th>アンケートタイトル：</th>
                    <td><input type="text" name="title" value="<?=$title_data?>"></td>
                    <th></th><td></td><th></th><td></td>
                    </tr>
                <?php 
                    $loopMax= $quenum;
                   // 追加フラグ有無
                    if($add_flg== true)
                    {
                        $loopMax -= 1;
                    }
                   // 描画
                   for($loop=0;$loop<$loopMax;$loop++)
                        {
                            $text ="<option>text</option>";
                            $radio ="<option>radio</option>";
                            $checkbox ="<option>checkbox</option>";
                            $select ="<option>select</option>";
                            $textarea ="<option>textarea</option>";
                            
                            switch($type_data[$loop])
                            {
                                case "text":
                                    $text ="<option selected>text</option>";
                                    break;
                                case "radio":
                                    $radio ="<option selected>radio</option>";
                                    break;
                                case "checkbox":
                                    $checkbox ="<option selected>checkbox</option>";
                                    break;
                                case "select":
                                    $select ="<option selected>select</option>";
                                    break;
                                case "textarea":
                                    $textarea ="<option selected>textarea</option>";
                                    break;
                                    
                            }
                            
                            echo '<tr>
                            <th>  質問内容:</th><td>  <input type="text" name="que[]" value="'.$que_data[$loop].'"></td>
                            <td>  質問タイプ:</th><td>    <select name="type[]">'.$text.$radio.$checkbox.$select.$textarea.'
                            </select>
                            </td>
                            <td>  回答("/"で複数):</th><td>  <input type="text" name="ans[]" value="'.$ans_data[$loop].'"></td></tr>';
                        }

                   // 追加フラグあり
                   if($add_flg == true)
                   {
                        echo '<tr>
                            <td>  質問内容:</th><td>  <input type="text" name="que[]"></td>
                            <td>  質問タイプ:</th><td>  <select name="type[]">
                            <option>text</option>
                            <option>radio</option>
                            <option>checkbox</option>
                            <option>textarea</option>
                            <option>select</option>
                            </select>
                            </td>
                            <td>  回答("/"で複数):</th><td>  <input type="text" name="ans[]"></td>
                            </tr>';
                   }
                ?>
                </table>
            </div>
            
            
            
        </div>
        <br>
        <input type="submit" name="btn_add" value="アンケート項目追加" /><br><br>
        <input type="submit" name="out" value="CSVへ保存" />
        <input type="submit" name="reload" value="CSVから読込" />
        
        <!-- 見えないデータ -->
        <input type="hidden" name="quenum" value="<?=$quenum?>">
    </form>
    <br>
    <ul>
        <li><a href="output_data.php">CSVに保存したら、こちらへ</a></li>
    </ul>
    </div>
</body>

</html>
