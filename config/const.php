<?php
 
 define('DS', '/');
 defined("DSS")? NULL : define("DSS", DIRECTORY_SEPARATOR);
// URL for locating and including php files
    
	defined("URL") ? NULL : define("URL", "");	
	defined("DIR") ? NULL : define("DIR",  "".DSS."TRHS".DSS);	
	defined("INC") ? NULL : define("INC", URL."includes");
	defined("ATT") ? NULL : define("ATT", URL."attachments");
	defined("VW") ? NULL : define("VW", URL."view");
	defined("CTRL") ? NULL : define("CTRL", URL."controller");
	defined("MDL") ? NULL : define("MDL", URL."model");
	defined("PUB") ? NULL : define("PUB", URL."public");
	defined("CFG") ? NULL : define("CFG", URL."config");
	defined("DOCS") ? NULL : define("DOCS", URL."documents");
	
	
	defined("HASH_PASS")? NULL: define("HASH_PASS", "L1taha2ka2ya7K");
     
   defined("HASH_KEY")? NULL: define("HASH_KEY", "02elbMarcsTi71");
?>