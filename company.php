<?php
require_once('./config.php');
	//header("Content-type:text/html;charset=utf-8");
	$company=$_POST['company'];
	$product_type=$_POST['product_type'];
	  
/*	$pdo=new PDO("mysql:host=localhost;dbname=dh","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	$pdo->query("set names utf8");*/
	$sql="SELECT distinct machine_room,company_logo FROM `product` WHERE  product_type=? AND company=?  ORDER BY `product`.`machine_room` ASC";
	 
	$stmt=$pdo->prepare($sql);
	$stmt->execute(array($product_type,$company));
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

//使用Foreach遍历数组 同时使用urlencode处理 含有中文的字段
foreach ( $result as $key => $value ) {
    $newData[$key] = $value;
    $newData [$key] ['company_logo'] = urlencode ( $value ['company_logo'] );
    $newData [$key] ['machine_room'] = urlencode ( $value ['machine_room'] );
}
$result=urldecode ( json_encode ( $newData ) );
echo $result;	 
function test(){
    $a = array('dfd'=>'dfdssd');
    echo $a;
    switch ($a) {
        case $value:


            break;

        default:
            break;
    }
    $b = 'this is a testing';
    echo "this is a testing, and its very import";
}
function test23(){
    $a = "this is  a test at 2017-08-23";
}    
function test31(){
    $a = "this is  a test at 16:31";
}   
function test1735() {
    echo 'this is 34 at 17:36';
}	
?>
