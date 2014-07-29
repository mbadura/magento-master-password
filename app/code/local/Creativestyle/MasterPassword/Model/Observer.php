<?php
class Creativestyle_MasterPassword_Model_Observer
{
			public function checkCookie(Varien_Event_Observer $observer)
			{

                if(Mage::getStoreConfig('master_password/master_password_config/mp_enable')==1) {

                $requestUrl = Mage::app()->getRequest()->getRequestUri();
                $module = Mage::app()->getRequest()->getModuleName();
                $controller = Mage::app()->getRequest()->getControllerName();
                $action = Mage::app()->getRequest()->getActionName();

                if($requestUrl == '/no_access' || $requestUrl == '/' || $module=='masterpassword'&&$controller=='index'&&$action=='enable'){
                    return $this;
                }

                $cookie = Mage::getModel('core/cookie')->get('masterpassword_coockie_access');

                if($cookie=='enabled'){
                    return $this;
                } else {
                        $destinationUrl = Mage::getBaseUrl() . 'no_access';
                        $response = Mage::app()->getResponse();
                        $response->setRedirect($destinationUrl, 301);
                        $response->sendResponse();
                        exit;
                    }
                }
            }


}
