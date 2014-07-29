<?php

$installer = $this;
$installer->startSetup();

Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

$html = '<h1>You dont have access to that page. Please enter password.</h1><form id="masterPassword" action="masterpassword/index/enable/" method="post"><p><input type="password" name="password" /></p><button>Check</button></form>';


$cmsPageData = array(
    'title' => 'No access page',
    'root_template' => 'one_column',
    'identifier' => 'no_access',
    'content_heading' => 'content heading',
    'stores' => array(0),//available for all store views
    'content' => $html
);

Mage::getModel('cms/page')->setData($cmsPageData)->save();

$installer->endSetup();
