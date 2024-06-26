<?php
namespace app\models;

use PDO;

class Profile extends \app\core\Model{
	public $profile_id;//PK
	public $user_id;
	public $first_name;
	public $middle_name;
	public $last_name;

	//CRUD

	//create
	public function insert(){
		$SQL = 'INSERT INTO profile(user_id,first_name,middle_name,last_name) VALUE (:user_id,:first_name,:middle_name,:last_name)';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['user_id'=>$this->user_id,
			'first_name'=>$this->first_name,
			'middle_name'=>$this->middle_name,
			'last_name'=>$this->last_name]
		);
		$this->profile_id = self::$_conn->lastInsertId();
	}

	//read
	public function getForUser($user_id){
		$SQL = 'SELECT * FROM profile WHERE user_id = :user_id';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['user_id'=>$user_id]
		);
		//there is a mistake in the next line
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\profile');//set the type of data returned by fetches
		return $STMT->fetch();//return (what should be) the only record
	}

	public function getAll(){
		$SQL = 'SELECT * FROM profile';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Profile');//set the type of data returned by fetches
		return $STMT->fetchAll();//return all records
	}

	public function getByName($name){//search
		$SQL = 'SELECT * FROM profile WHERE CONCAT(first_name,\' \',last_name) = :name';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['name'=>$name]
		);
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Profile');//set the type of data returned by fetches
		return $STMT->fetchAll();//return all records
	}


	//update
	//you can't change the user_id that's a business logic choice that gets implemented in the model
	public function update(){
		$SQL = 'UPDATE profile SET first_name=:first_name,middle_name=:middle_name,last_name=:last_name WHERE profile_id = :profile_id';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['profile_id'=>$this->profile_id,
			'first_name'=>$this->first_name,
			'middle_name'=>$this->middle_name,
			'last_name'=>$this->last_name]
		);
	}

	//delete
	public function delete(){
		$publicationSQL = 'DELETE FROM publication WHERE profile_id = :profile_id';
		$publicationSTMT = self::$_conn->prepare($publicationSQL);
		$publicationSTMT->execute(['profile_id' => $this->profile_id]);

		$profileSQL = 'DELETE FROM profile WHERE profile_id = :profile_id';
		$profileSTMT = self::$_conn->prepare($profileSQL);
		$profileSTMT->execute(['profile_id' => $this->profile_id]);

		$userSQL = 'DELETE FROM user WHERE user_id = :user_id';
		$userSTMT = self::$_conn->prepare($userSQL);
		$userSTMT->execute(['user_id' => $this->user_id]);
	
	}
	


}