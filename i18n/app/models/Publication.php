<?php
namespace app\models;

use PDO;

class Publication extends \app\core\Model
{
	public $publication_id; //PK
	public $profile_id;
	public $publication_title;
	public $publication_text;
	public $timestamp;
	public $publication_status;

	//CRUD

	//create
	public function insert()
	{
		$SQL = 'INSERT INTO publication(profile_id,publication_title,publication_text,timestamp,publication_status) VALUES (:profile_id,:publication_title,:publication_text,NOW(),:publication_status)';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute([
			//'publication_id' => $this->publication_id,
			'profile_id' => $this->profile_id,
			'publication_title' => $this->publication_title,
			'publication_text' => $this->publication_text,
			//'timestamp'=>$this->timestamp,
			'publication_status' => $this->publication_status
		]);
	}

	public static function get($publication_id)
	{
		$SQL = 'SELECT * FROM publication WHERE publication_id = :publication_id';//define the SQL
		$STMT = self::$_conn->prepare($SQL);//prepare
		$STMT->execute(['profile_id' => $publication_id]);//run
		$STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');//choose the type of return from fetch
		return $STMT->fetch();//fetch
	}

	//read
	public function getForUser($profile_id)
	{
		$SQL = 'SELECT * FROM publication WHERE profile_id = :profile_id';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['profile_id' => $profile_id]
		);
		$STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');//set the type of data returned by fetches
		return $STMT->fetch();//return (what should be) the only record
	}

	public function getAllPublications()
	{
		$SQL = 'SELECT * FROM publication WHERE publication_status = 1';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');
		return $STMT->fetchAll();
	}

	public function getAllUserPublications($profile_id)
	{
		//var_dump($profile_id);
		//var_dump(self::$_conn);die();
		$SQL = 'SELECT * FROM publication WHERE profile_id = :profile_id';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(['profile_id' => $profile_id]);
		$STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');//set the type of data returned by fetches
		return $STMT->fetchAll();//return all records
	}

	public function getByTitle($publication_title)
	{//search
		$SQL = 'SELECT * FROM publication WHERE publication_title = :publication_title';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['publication_title' => $publication_title]
		);
		$STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');//set the type of data returned by fetches
		return $STMT->fetchAll();//return all records
	}

	public function getTitlesForUser($profile_id)
	{
		$SQL = 'SELECT publication_title FROM publication WHERE profile_id = :profile_id';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(['profile_id' => $profile_id]);
		return $STMT->fetchAll(PDO::FETCH_COLUMN);
	}

	public function getById($publication_id)
	{
		$SQL = 'SELECT * FROM publication WHERE publication_id = :publication_id LIMIT 1';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(['publication_id' => $publication_id]);
		$STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication'); // Set the type of data returned by fetches
		return $STMT->fetch(); // Return the record
	}

	public static function getById2($publication_id)
	{
		$SQL = 'SELECT * FROM publication WHERE publication_id = :publication_id LIMIT 1';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(['publication_id' => $publication_id]);
		$STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication'); // Set the type of data returned by fetches
		return $STMT->fetch(); // Return the record
	}

	//update
	// public function update()
	// {
	// 	$SQL = 'UPDATE publication SET publication_title=:publication_title,publication_text=:publication_text,publication_status=:publication_status WHERE publication_id = :publication_id';
	// 	$STMT = self::$_conn->prepare($SQL);
	// 	$STMT->execute(
	// 		[
	// 			'publication_title' => $this->publication_title,
	// 			'publication_text' => $this->publication_text,
	// 			'publication_status' => $this->publication_status
	// 		]
	// 	);
	// }
	public function update() {
        $SQL = 'UPDATE publication SET publication_title = :publication_title, publication_text = :publication_text, publication_status = :publication_status WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'publication_title' => $this->publication_title,
            'publication_text' => $this->publication_text,
            'publication_status' => $this->publication_status,
            'publication_id' => $this->publication_id
        ]);
    }

	//delete
	public function delete()
	{
		$SQL = 'DELETE FROM publication WHERE publication_id = :publication_id';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['publication_id' => $this->publication_id]
		);

	}
	public function searchPublications($query)
	{
		$SQL = 'SELECT * FROM publication WHERE publication_title LIKE :query OR publication_text LIKE :query';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(['query' => "%$query%"]);
		$STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');
		return $STMT->fetchAll();
	}
	
}