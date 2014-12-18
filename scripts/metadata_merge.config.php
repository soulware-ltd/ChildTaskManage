<?php


if (!isset($meta_merge_configs))
    $meta_merge_configs = array();

$load = require (__DIR__.'/../vendor/autoload.php');

$content = array(
    'Project' =>
    array(
        'EditView' =>
        array(
            'templateMeta' =>
            array(
                'form' =>
                array(
                    'hidden' => array(
                        '<input type="hidden" name="copyChildren" value="{$copyChildren}">',
                    ),
                ),
            ),
        ),
    ),
);

$config = new Soulware\EditMetadataOnInstall\metadataMergeConfig('Project', 'editviewdefs.php', 'metadata', 'viewdefs', $content);
$meta_merge_configs[]=$config;
?>
