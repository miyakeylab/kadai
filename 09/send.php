<?php
header("Content-type: text/plain; charset=UTF-8");    //テキスト形式で返す
/**
 * 注意！
 * UTF-8 BOMなしで保存してください
 */
if (isset($_GET['request']))
{
    //HTMLを起動したままで、ここのOKという文字列の値を変えるとHTML側でメッセージが出る
    echo "OK";
}
else
{
    echo 'The parameter of "request" is not found.';
}
?>