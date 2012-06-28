<?php

class node {
    
    private $id;
    
    private $author;
    
    private $title = "";
	private $message = "";
	private $outgoingLinks = array();
	private $incomingLinks = array();
	private $score;
    
    
    
    function __construct($new_id){
    	$this->id = $new_id;
    	$this->score = 0;
    }
	
	
	function set_author($new_author) {
		$this->author = $new_author;
	}
	function get_author() {
		return $this->author;
	}
	
	
	function set_message($new_message) {
		$this->message = $new_message;
	}
	function get_message() {
		return $this->message;
	}
	
	
	
	function set_title($new_title) {
		$this->title = $new_title;
	}
	function get_title() {
		return $this->title;
	}
	
	function vote_up() {
		$this->score=$this->score+1;
	}
	
	
	
	function vote_down() {
		$this->score=$this->score-1;
	}
    
    
    
    function add_outgoing_link($id){
    	array_push($this->outgoingLinks, $id);
    }
    	
}

?>
