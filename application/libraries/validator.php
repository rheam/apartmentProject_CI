<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validator {

	protected $errors;

	public function __construct(){
		$this->errors = array();
	}
	
	public function make($data, $rules = null){
		if(is_null($rules)){
			return false;
		}

		return $this->validate($data, $rules);
	}

	protected function validate($data, $rules){
		array_walk($rules, [$this, 'extractFields'], $data);
		return $this;
	}

	protected function extractFields($fieldRules, $fieldName, $data){
		$requiredData = [];
		$requiredData['fieldName'] = $fieldName;
		$requiredData['field'] = $data[$fieldName];
		array_walk($fieldRules, [$this, 'extractRules'], $requiredData);
	}

	protected function extractRules($ruleValue, $ruleName, $requiredData){
		call_user_func_array([$this, $ruleName], [$requiredData['fieldName'], $requiredData['field'], $ruleValue]);
	}

	protected function addError($error = ''){
		$this->errors[] = $error;
		return true;
	}

	public function errors(){
		return $this->errors;
	}

	public function passes(){
		return (count($this->errors) > 0) ? false : true;
	}

	public function fails(){
		return $this->passes() === false? true: false;
	}

	protected function required($key, $data, $required){
		if($required){
			return empty($data) ? $this->addError(ucfirst($this->removeSpecialCharacters($key)) . ' field is required.') : false;
		}
		return true;
	}

	protected function min($key, $data, $length){
		if(strlen($data) < $length){
			$this->addError(ucfirst($this->removeSpecialCharacters($key)) . ' field has to be at least ' . $length . ' characters.');
			return false;
		}
		return true;
	}

	protected function max($key, $data, $length){
		if(strlen($data) > $length){
			$this->addError(ucfirst($this->removeSpecialCharacters($key)) . ' field has to be maximum of ' . $length . ' characters.');
			return false;
		}
		return true;
	}

	protected function email($key, $data, $mustBeAnEmail){
		if($mustBeAnEmail){
			if(!preg_match_all('/[a-zA-Z0-9\.-]+[@{1}][a-zA-Z0-9]+[\.{1}][a-zA-Z]+/i', $data)){
				$this->addError(ucfirst($this->removeSpecialCharacters($key)) . ' must be a valid e-mail address.');
				return false;
			}
		}
		return true;
	}

	protected function confirmed($key, $data, $comparedValue){
		if($data != $comparedValue){
			preg_match('/-(\w+)/', $key, $tmp);
			$this->addError(ucfirst($this->removeSpecialCharacters($key))) . ' must be equal to ' . ucfirst($this->removeSpecialCharacters(ltrim($tmp[0], '-')) . '.');
			return false;
		}
		return true;
	}

	private function removeSpecialCharacters($value){
		return preg_replace('/_|-/', ' ', $value);
	}
}