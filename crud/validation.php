<?php
/**
 * form validation validation 
 */
class validation 
{
	private $passed = false,
	        $errors = array();

	public function validator($data, $items = array()){
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				$value = $data[$item];

				if($rule === 'required' && empty($value)){
					$this->addError("{$item} is required");
				}
				else{

				}
			}
		}
		if(empty($this->errors)){
			return $this->passed = true;
		}
		return $this;
	} 

	private function addError($error){
		$this->errors[] = $error;
	} 

	public function errors(){
		return $this->errors
	}   

	public function passed(){
		return $this->passed;
	}  
}
?>