<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
function DelDir($target) {
    if(is_dir($target)) {
        $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned

        foreach( $files as $file )
        {
            DelDir( $file );      
        }

        rmdir( $target );
    } elseif(is_file($target)) {
        unlink( $target );  
    }
}

DelDir('../application_test');
?>