<?php
function fail($message){
    die(json_encode(array("status"=>"fail",'message'=>$message)));
}
function success($message){
    die(json_encode(array("status"=>'success','message'=>$message)));
}
try{
    $pdo=new PDO('mysql:dbname=testworktrafgid;host=localhost','root','');
}catch (PDOException $e){
    print "ERROR!:".$e->getMessage()."<br>";
    die();
}
if(isset($_GET['value'])&&$_GET['value']=="show"){
  $mass_show=array();
  $result=$pdo->query("SELECT requests.id,requests.count,operators.id as operid,requests.price,offers.name as nameoffers,operators.name as nameoperators FROM requests  INNER JOIN offers on requests.offer_id=offers.id INNER JOIN operators ON requests.operator_id=operators.id where  requests.count > 2 and  operators.id=10 OR operators.id=12;");
  if(!empty($result)){
foreach ($next=$result->fetchAll(PDO::FETCH_ASSOC )as $tmp){
    array_push($mass_show,array("id"=>$tmp['id'],'count'=>$tmp['count'],'price'=>$tmp['price'],'offersname'=>$tmp['nameoffers'],"operatorsname"=>$tmp['nameoperators'],"operid"=>$tmp['operid']));
}
echo json_encode(array('mass_show'=>$mass_show));
exit;
  }
}
if(isset($_GET['value'])&&$_GET['value']=="show1"){
    $mass_show1=array();
    $result=$pdo->query("SELECT offers.name,requests.price,requests.count FROM requests INNER JOIN offers on requests.offer_id=offers.id GROUP BY offers.name,requests.price,requests.count ORDER BY requests.count DESC;");
    if(!empty($result)){
        foreach ($next=$result->fetchAll(PDO::FETCH_ASSOC) as $item) {

            array_push($mass_show1,array("name"=>$item['name'],"price"=>$item['price'],'count'=>$item['count']));
        }
        echo json_encode(array('mass'=>$mass_show1));
        exit;
    }
}
?>