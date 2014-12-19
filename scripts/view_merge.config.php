<?php

if(!isset($view_merge_configs)) $view_merge_configs = array();

//insert method = [append, prepend]
$content = '
        // ChildTaskManage\n
        if(isset($_POST["copyChildren"]) && $_POST["copyChildren"] == true) $copyChildren = true; else $copyChildren = false;
	$this->ss->assign("copyChildren", $copyChildren);
        //ChildTaskManage
        ';
$view_config = new Soulware\EditViewOnInstall\viewMergeConfig('Project','view.edit.php','views','ViewEdit','display','prepend',$content);
$view_merge_configs[]=$view_config;


$content =  '
            //ChildTaskManage\n
                //add custom buttons
		global $mod_strings, $app_strings;

		$this->dv->th->clearCache($this->module);

		$this->dv->defs[\'templateMeta\'][\'form\'][\'buttons\'][] = array(\'customCode\' => \'<form action="index.php" method="post">\' .
						\'<input type="hidden" name="module" id="module" value="Project" />\' .
						\'<input type="hidden" name="record" id="record" value="\' . $this->bean->id . \'" />\' .
						\'<input type="hidden" name="return_module" id="return_module" value="Project" />\' .
						\'<input type="hidden" name="return_action" id="return_action" value="DetailView" />\' .
						\'<input type="hidden" name="isDuplicate" id="isDuplicate" value="true" />\' .
						\'<input type="hidden" name="copyChildren" id="copyChildren" value="true" />\' .
						\'<input type="hidden" name="action" id="action" value="EditView" />\' .
						\'<input type="hidden" name="return_id" id="return_id" value="\' . $this->bean->id . \'" />\' .			
						\'<input title="\' . $mod_strings[\'LBL_DUPLICATE_W_CHILDREN_LABEL\'] . \'" \' .
                        \'accessKey="\' . $mod_strings[\'LBL_DUPLICATE_W_CHILDREN_LABEL\'] . \'" class="button" type="submit" \' .
                        \'name="DuplicateWChildren" id="duplicate_button" value="\' . $mod_strings[\'LBL_DUPLICATE_W_CHILDREN_LABEL\'] . \'" />\' .
						\'</form>\');
		$this->dv->defs[\'templateMeta\'][\'form\'][\'buttons\'][] = array(\'customCode\' => \'<form action="index.php" method="post">\' .
						\'<input type="hidden" name="module" id="module" value="Project" />\' .
						\'<input type="hidden" name="record" id="record" value="\' . $this->bean->id . \'" />\' .
						\'<input type="hidden" name="return_module" id="return_module" value="Project" />\' .
						\'<input type="hidden" name="return_action" id="return_action" value="ListView" />\' .
						\'<input type="hidden" name="deleteChildren" id="deleteChildren" value="true" />\' .
						\'<input type="hidden" name="action" id="action" value="Delete" />\' .			
						\'<input title="\' . $mod_strings[\'LBL_DELETE_W_CHILDREN_LABEL\'] . \'" \' .
                        \'accessKey="\' . $mod_strings[\'LBL_DELETE_W_CHILDREN_LABEL\'] . \'" class="button" type="submit" \' .
                        \'name="DeleteWChildren" id="delete_button" value="\' . $mod_strings[\'LBL_DELETE_W_CHILDREN_LABEL\'] . \'" onclick="confirm(\\\'\' . $app_strings[\'NTC_DELETE_CONFIRMATION\'] . \'\\\')" />\' .
						\'</form>\'); 
                //ChildTaskManage';
$view_config = new Soulware\EditViewOnInstall\viewMergeConfig('Project','view.detail.php','views','ViewDetail','preDisplay','append',$content);

$view_merge_configs[]= $view_config;


?>
