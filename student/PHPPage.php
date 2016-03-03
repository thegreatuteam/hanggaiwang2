<?php
    
   // $s_scoreinfo[0]=array("name" => "lx", "snumber" => "14050000", "score" => "90");


    //json->array
    //$scoreinfo=array();
    //$scoreinfo=json_decode($scoreinfojs, TURE);
   // echo("scoreinfo");
   // print_r($scoreinfo);  /////////////////////
    // echo("<br/>");////

    //$scoreinfo=array(array("name" => "刘昕", "snumber" => "10000001", "score" => "91"),array("name" => "lxx", "snumber" => "10000002", "score" => "92"));
    //$q=urlencode($scoreinfo);
    //print_r($q);


     //$b=json_encode($scoreinfo, JSON_UNESCAPED_UNICODE);
     //echo("scoreinfo,encode之后");
    //echo($b);
    //echo("<br/>");

    //$a=json_decode($b, TURE);
    //print_r($a);
//echo("<br/>");

    //合并数据,array->json
   // $scoreinfo=array_merge($a, $s_scoreinfo); 
     // echo("2次scoreinfo"); ///
    //print_r($scoreinfo);///////////////ok
    ////
    

    
//$s=array( [0] => array ( ['name'] => '姚璐' ,['snumber'] => 14051001 ,['score'] => 3 ) ,[1] => array ( ['name'] => '朱诗慧', ['snumber'] => 14051003 ,['score'] => 1 ) ,[2] => array ( ['name'] => '刘昕' ,['snumber'] => 14051028 ,['score'] => 0 ) );
//echo($s[0]);
$s=array(array ( 'name' => '朱诗慧', 'snumber' => 14051003 ,'score' => 1 ) ,array ( 'name' => '姚璐' ,'snumber' => 14051001 ,'score' => 3 ) ,array ( 'name' => '刘昕' ,'snumber' => 14051028 ,'score' => 0 ) );
//print_r($s[0]);
//$a=array(array(['name']=>"姚璐",["snumber"]=>14051001,["score"]=>3));
echo(count($s));
for ($i=0; $i<count($s)-1; $i++) {
  for ($j=$i+1; $j<count($s); $j++) {
    if ($s[$i]["snumber"]>$s[$j]["snumber"]) {
      $t=$s[$i]; 
      $s[$i]=$s[$j]; 
      $s[$j]=$t;
    }
  }
}  
print_r($s);
echo("lalalaha");






/*
$team = array('lk','ok');    
$book = array('linux服务器配置与管理',$team);    
      
foreach($book as $val) //意思是for $book each $value( as )    
   if( is_array($val) ) foreach( $val as $value) echo $value.'<br/>';    
   else echo $val.'<br/>'; */

 /* require '../connectvars.php';
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    //ErrorHandler
    if (!$dbc) {
        die('Could not connect: '.mysqli_connect_error().'!');
    }

    $query="INSERT INTO hwscore (teachernumber,classnumber) VALUES (11111114,2224)";
 mysqli_query($dbc, $query);
 $query="SELECT LAST_INSERT_ID()";
 $result=mysqli_query($dbc, $query);
 $rows=mysqli_fetch_row($result);
$a=$rows[0];
echo $a;

         $query5="INSERT INTO sethw (index) VALUES ('$a')";
        mysqli_query($dbc, $query5);*/



    /*  $query1="SELECT * FROM tests";
    $result1=mysqli_query($dbc, $query1);
    $i=0;
    while ($row=mysqli_fetch_array($result1)) {   
        $id=$result1['id']; 
        echo $id;     
        $i=$i+1;      
    }
//print_r($id);


$a = Array('1'=>'one', '2'=>'two', '3'=>'three');
$a=json_encode($a);
   echo($a);


$asr[1] = array("a","b","c","d");

$asr[2] = array("e","f","g","h");

$asr[3] = array("i","j","k","l");

$newarray = array();

foreach($asr as $a)

{

$newarray[] = $a;

}

print_r($newarray);

$s_scoreinfo0=array("name" => "张三", "snumber" => "12345678", "score" =>"90");
$s_scoreinfo1=array("name" => "张三", "snumber" => "12345678", "score" =>"95");
print_r($s_scoreinfo);

$a=array_merge($s_scoreinfo0, $s_scoreinfo1);
print_r($a);*/
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>aaa</title>
    </head>
    <body>

    </body>
</html>
