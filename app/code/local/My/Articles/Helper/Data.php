<?php
class My_Articles_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function updateData()
    {
//      $data = array('title' => "test", 'header_h1' =>'test1','meta_tag_keywords'=>'test2','meta_tag_description'=>'test3','image'=>'test4','preview'=>'test5','content'=>'test6');
//  $model=Mage::getModel('myarticles/table_myarticles')->addData($data);
//   try {
// $model->save(); //save data 
//     $insertId = $model->getId();
//     return $insertId;
// } catch (Exception $e) {
//     echo $e->getMessage();
// }

   }
  public function PostRequest()
    {
       
    $adminUrl=Mage::getStoreConfig('sales/backend/PostUrl', $storeId);
    return $adminUrl;

     }
    
}