<?php



class Stage  extends Node
{   private $stage_name;

	private $stage_document_types;

	function __construct($stage_name,$stage_document_types)
	{
		$fe  = array("s3","s4");
	    $be = array("s1");

		parent::__construct($fe,$be);

		$this->stage_name = $stage_name;
		$this->stage_document_types = $stage_document_types;


	}

	function get_stage_name(){return $this->stage_name;}
}









