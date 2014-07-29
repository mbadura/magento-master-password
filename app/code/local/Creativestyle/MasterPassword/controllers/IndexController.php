<?php

class Creativestyle_MasterPassword_IndexController extends Mage_Core_Controller_Front_Action{

    public function enableAction(){
        $hash = $this->getRequest()->getParam('password');

        if(Mage::getStoreConfig('master_password/master_password_config/mp_password') == $hash) {

        $cookie = Mage::getSingleton('core/cookie');
        $lifetime = 86400 * 7;

        $cookie->set('masterpassword_coockie_access', 'enabled', time()+$lifetime, '/');

        Mage::getSingleton('core/session')->addSuccess(Mage::helper('masterpassword')->__('Access to this store has been granted, enjoy!'));

        $this->_redirectUrl(Mage::getBaseUrl(), array('secure' => 'OK'));

        } else {
          $this->_redirectUrl(Mage::getBaseUrl());
        }

}

}
