<?php

if(!defined('_PS_VERSION_')){
    exit;
}

class GonzaModule extends Module {
    
    public function __construct(){
        $this->name = 'gonzamodule';
        $this->tab = 'front_office_features';
        $this->version ="1.0.0";
        $this->author = "Gonzalo Waack Carneado";
        $this->boostrap = true;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->displayName = 'WhatsApp';
        $this->description = 'Los clientes pueden enviar mensajes a los administradores vía Whatsapp.';
        parent::__construct();
    }
    public function install(){
    if(!parent::install()
    || !Configuration::updateValue('GONZAMODULE_MESSAGE', 'message')
    || !Configuration::updateValue('GONZAMODULE_WHATSAPP', 'Hello')
    || !Configuration::updateValue('GONZAMODULE_PHONE', '34123456789')
    || !$this->registerHook('displayReassurance')) {
        return false;
    }
    else{
         return true;   
    }
}
    public function uninstall(){
        if(!parent::uninstall()
        || !Configuration::deleteByName('GONZAMODULE_MESSAGE')
        || !Configuration::deleteByName('GONZAMODULE_WHATSAPP')
        || !Configuration::deleteByName('GONZAMODULE_PHONE')){
            return false;
        }
        else{
             return true;   
        }
    }
    public function getContent(){
        $this->smarty->assign('save', false);
        if(Tools::isSubmit('submitgonzamodule')){
            $message = Tools::getValue('exampleMessage');
            $whatsapp = Tools::getValue('whatsappMessage');
            $phone = Tools::getValue('phone');
            Configuration::updateValue('GONZAMODULE_MESSAGE', $message);
            Configuration::updateValue('GONZAMODULE_WHATSAPP', $whatsapp);
            Configuration::updateValue('GONZAMODULE_PHONE', $phone);
            $this->smarty->assign('save', true);
        }
        $messagevalue= Configuration::get('GONZAMODULE_MESSAGE');
        $whatsappvalue= Configuration::get('GONZAMODULE_WHATSAPP');
        $phonevalue= Configuration::get('GONZAMODULE_PHONE');
        $this->smarty->assign('messagevalue', $messagevalue);
        $this->smarty->assign('whatsappvalue', $whatsappvalue);
        $this->smarty->assign('phonevalue', $phonevalue);
        return $this->display(__FILE__,'configure.tpl');
    } 
    
    public function hookDisplayReassurance($params){
        $messagevalue= Configuration::get('GONZAMODULE_MESSAGE');
        $whatsappvalue = Configuration::get('GONZAMODULE_WHATSAPP');
        $conv = array(" " => "%20");
        $result = strtr($whatsappvalue, $conv);
        $phonevalue = Configuration::get('GONZAMODULE_PHONE');
        $this->context->smarty->assign('messagevalue',$messagevalue);
        $this->context->smarty->assign('whatsappvalue',$whatsappvalue);
        $this->context->smarty->assign('result',$result);
        $this->context->smarty->assign('phone',$phonevalue);
        return $this->display(__FILE__,'displayReassurance.tpl');
    }
}


?>