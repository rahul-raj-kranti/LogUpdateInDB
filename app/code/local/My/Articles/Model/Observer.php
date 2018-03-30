<?php 
class My_Articles_Model_Observer {
    public function LogUpdatesFunction($observer) {
$order = $observer->getEvent()->getOrder();

  try {  
// Retrieve the order details  being placed 
     $orderId     = $order->getId();
     $orderPrice  = $order->getGrandTotal();
     $orderStatusLabel =$order->getStatusLabel();
//parameters can be change according to requirment
  	$data = array("orderId" => "$orderId ","orderTotal" => "$orderPrice");
  	//$adminUrl='http://localhost:8080/EmployeDetailsRestFullServices/addEmpDeatils';
    //$adminUrl= Mage::getStoreConfig('sales/backend/PostUrl');
    $ch = curl_init();
//encoding php dta supportated to json suporated data 
$data_string = json_encode($data);                       
$ch = curl_init(Mage::helper('myarticles')->PostRequest()); //this is getting from helper data.php
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); //post method                                                                    
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))); 
     $token = curl_exec($ch);
$data = array('orderId' => "$orderId ","orderTotal" =>"$orderPrice","orderStatusLabel"=>"$orderStatusLabel","Apimessage"=>"$token");
 $model=Mage::getModel('myarticles/articles'); //this is module name like which is mention on  $this->_init("myarticles/articles");
try{
    $model->setData($data)
    ->save();
    $insertId = $model->getId();
} catch (Exception $e) {
    echo $e->getMessage();
}

//       //For Inserting data in databse table
//       //Get the resource model
//   $resource = Mage::getSingleton('core/resource');
//   // Retrieve the write connection
//   $writeConnection = $resource->getConnection('core_write');
//   $query="INSERT INTO `order_log`(`OrderId`, `OrderTotal`, `ApiContent`) VALUES ('{$orderId }','{$orderPrice}','{$token}')";
// $writeConnection->query($query);


//      // For getting data from databse table
//   //Get the resource model
//  $resource = Mage::getSingleton('core/resource');
//  //Retrieve the read connection
// $readConnection = $resource->getConnection('core_read');

// $query = 'SELECT * FROM ' . $resource->getTableName('order_log');
// //take a look at your config.xml that added extensa_econt_city table for the correct name   

// //Execute the query and store the results in $results
// $results = $readConnection->fetchAll($query);

//  //display result

// foreach($results as $row){
// echo $row['fieldName']
//  }

Mage::log(" MagentoDatabaseTableId-{$insertId} RestUrlMessage-{$token} OrderId-{$orderId} orderStatusLabel-{$orderStatusLabel}", null, 'LogFile.log');
 
        } catch (Exception $e) {
               Mage::logException($e);}
     }
        
    }?>