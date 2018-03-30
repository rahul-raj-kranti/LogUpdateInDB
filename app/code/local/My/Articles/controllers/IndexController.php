<?php
class My_Articles_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {

     $data = array('title' => "test234", 'header_h1' =>'test1','meta_tag_keywords'=>'test2','meta_tag_description'=>'test3','image'=>'test4','preview'=>'test5','content'=>'test6');
 $model=Mage::getModel('myarticles/articles'); //this is module name like which is mention on  $this->_init("myarticles/articles");
try{
    $model->setData($data)
    ->save();
    $insertId = $model->getId();
} catch (Exception $e) {
    echo $e->getMessage();
}
  
    }
}