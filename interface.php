<?php

include_once('tDebug.php');

interface iCrud{
	public function create($data);
	public function read();
	public function update($data);
	public function delete();

}

class User implements iCrud{
	use tDebug;
	private $_userId=NULL;
	private $_username=NULL;

	function __construct($data){
		$this->_userId = uniqid();
		$this->_username = $data['username'];
	}

	function create($data){

		self::__construct($data) ;
				
	}

	function read(){

		return array('userId'=>$this->_userId, 'username'=>$this->_username);
	}

	function update($data){
		$this->_username=$data['username'];
	}
	function delete(){
		$this->_username=NULL;
		$this->_userId=NULL;

	}}

	$user=array('username'=> 'Drazan');

	echo '<h2>Stvaram novog korisnika.....</h2><br>';

	$ja=new User($user);
	$info = $ja->read();
	echo 'Ja sam <b>'. $info['username'] ."</b> i imam userID: ". $info['userId'] .
	' i jak sam igrac!!!!<br>';

	$ja->update(array('username'=>'Draza2'));
	$info = $ja->read();
	echo 'Ja sam sada se promenio  '. $info['username'] . " i jak sam igrac!!!! ". $info['userId'] .'<br>';
	$ja->dumpObject();
	$ja->delete();

	unset($me); 




?>
