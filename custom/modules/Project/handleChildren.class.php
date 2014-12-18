<?php

class handleChildren{

	protected $fieldsToCopy = array(
						'name', 
						'description',
						'duration',
						'duration_unit',
						'priority',
						'email_id',
						'estimated_effort',
						'milestone_flag',
						'order_number',
						'utilization',
						'task_number',
						);

	public function copyChildren($bean, $param1, $param2){

		//check if is duplicated
		if(isset($_REQUEST['duplicateSave']) && $_REQUEST['duplicateSave'] == true){

			//check if the original ID exists
			if(isset($_REQUEST['duplicateId']) && !empty($_REQUEST['duplicateId'])){
		
				//check if we want to duplicate the child tasks as well
				if(isset($_REQUEST['copyChildren']) && $_REQUEST['copyChildren'] == true){

					$old_project = new Project();
					$old_project->retrieve($_REQUEST['duplicateId']);
					$old_project->load_relationship('projecttask');			
					$children = $old_project->projecttask->getBeans();

					foreach($children as $key => $task){

						$new_task = $this->copyTask($task);
						$new_task->project_id = $bean->id;
						
						$new_task->save();

					}

				}
		
			}

		}

	}

	public function copyTask($old_bean){

		global $current_user;

		$new_task = new ProjectTask();
		foreach($this->fieldsToCopy as $field){

			$new_task->$field = $old_bean->$field;

		}

		$new_task->assigned_user_id = $current_user->id;

		return $new_task;

	}

	public function deleteChildren($bean, $param1, $param2){
		
		//check if we want to delete the child tasks as well
		if(isset($_REQUEST['deleteChildren']) && $_REQUEST['deleteChildren'] == true){

			$bean->load_relationship('projecttask');			
			$children = $bean->projecttask->getBeans();

			foreach($children as $key => $task){

				$this->deleteTask($task);

			}

		}

	}

	public function deleteTask($task){

		$task->deleted = 1;
		$task->save();

	}

}

?>
