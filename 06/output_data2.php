<?php 

$quenum= 1;
$que_data_2= null;
$type_data_2=null;

$quenum = $_POST['quenum'];
$que_data_2 = $_POST['queData'];
$type_data_2 = $_POST['type'];
$type_2 = explode(',',$type_data_2);
$que_2 = explode(',',$que_data_2);


?>
<html>
<head>
    <meta charset="utf-8">
    <title>結果表示</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
    <body>
        <div id="wrapper"> 
        <table>
            <?php 
            for($loop=0;$loop < $quenum;$loop++)
            {
                echo "<tr><th>質問: </th><td>".$que_2[$loop]."</td>";
                $res = "";
                switch($type_2[$loop])
                {
                    case "text":
                        $res =$_POST['res_text'.$loop];
                        break;
                    case "radio":
                        $res =$_POST['res_radio'.$loop];
                        break;
                    case "checkbox":
                        foreach ($_POST['res_check'.$loop] as $value) {
                            $res = $res.$value.",";
                        }
                        break;
                    case "select":
                        $res =$_POST['res_select'.$loop];
                        break;
                    case "textarea":
                        $res =$_POST['res_textarea'.$loop];
                        break;
                }

                echo "<th>回答: </th><td>".$res."</td></tr>";
            }

            
            ?>
            
        </table>
        </div>
</body>
</html>
