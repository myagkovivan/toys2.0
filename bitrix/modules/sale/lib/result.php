<?php
namespace Bitrix\Sale;

use Bitrix\Main\Entity;

class Result
	extends Entity\Result
{
	/** @var  int */
	protected $id;
	protected $data = array();


	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * Returns id of added record
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	public function __destruct()
	{
		//just quietly die in contrast Entity\Result either checked errors or not.
	}

	public function addData(array $data)
	{
		$this->data = array_merge($this->data, $data);
	}

	/**
	 * Adds array of FieldError objects
	 *
	 * @param Entity\EntityError[] $errors
	 */
	public function addErrors(array $errors)
	{
		if(is_array($errors))
		{
			foreach($errors as $error)
				$this->addError($error);
		}
	}

	/**
	 * Returns array of FieldError objects
	 *
	 * @return Entity\EntityError[]
	 */
	public function getErrors()
	{
		$this->wereErrorsChecked = true;
		return $this->errors;
	}

}

class ResultError
	extends Entity\EntityError
{

}