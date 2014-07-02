<?php


class Node
{
	private $forward_edges;
	private $backward_edges;


	function __construct($forward_edges,$backward_edges)
	{ 	$this->forward_edges = $forward_edges;
		$this->backward_edges = $backward_edges;
	}

	function get_edges($direction=1){

		return ($direction)?$this->forward_edges:$this->backward_edges;
	}

	function set_edges($edges,$direction=1){

		if($direction){
			$forward_edges = $edges;			
		}
		else{
			$backward_edges = $edges;
		}


	}
}