<?php

require_once('include/miphpf/Init.php');
require_once('include/sc/Init.php');

scSession::singleton()->openSession();

class scDistributorApplicationPage implements ICMSBlock
{
    public function getControllerCommands()
    {
        $t = new scTemplateParser();		
        $t->readTemplate('customer/example.tmpl');
	$t->assign('%%PRODUCTNAME%%', 'TestName');
	$html = $t->templateParse();
	return array(
            new miControllerCommand(miControllerCommand::CONTROLLER_COMMAND_HTML, $html)
        );
    }
}

$userPageDistributorApplication = new scDistributorApplicationPage;
$page = new scUserDisplayController(array($userPageDistributorApplication));
$page->setSeo(new scDynamicPageSeo('com.summercart.productcomparison', _t('Distributor Application')));
$page->showPage();
