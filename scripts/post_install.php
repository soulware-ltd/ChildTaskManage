<?php

function post_install(){
        require_once(__DIR__.'/../vendor/autoload.php');
        require_once (__DIR__.'/metadata_merge.config.php');
        require_once (__DIR__.'/view_merge.config.php');
        
        
        
        $view_merge = new Soulware\EditViewOnInstall\viewMerge();
	$view_merge->setMergeConfig($view_merge_configs);
        $view_merge->install();
        
        $meta_merge = new Soulware\EditMetadataOnInstall\metadataMerge();
        $meta_merge->setMergeConfig($meta_merge_configs);
        $meta_merge->install();
        
} 

?>
