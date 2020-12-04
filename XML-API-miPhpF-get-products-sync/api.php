<?php

//TODO check $_GET user and pass

//TODO - get next sync id nextLS

$products = file_get_contents('php://input');

$xml = new SimpleXMLElement($products);
Header('Content-type: text/xml');
//print($xml->asXML());

foreach ($xml->Products->Product as $Product) {
    
    $ts = time();
    $SKU = $Product->ProductCode;
    $QTY = (int) $Product->ProductQuantity;
    $sql = "INSERT INTO SyncTable ( id , SyncID , TimeStamp , SKU , QTY ) VALUES "
        . " ( NULL , '{$nextLS}' , '{$ts}' , '{$SKU}' , '{$QTY}' )";
    miStaticDBUtil::execSelect($sql);
}
