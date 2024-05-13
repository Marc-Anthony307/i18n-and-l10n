<?php
namespace app\models;

use PDO;

class PublicationComment extends \app\core\Model
{
    public $publication_comment_id;
    public $profile_id;
    public $publication_id;
    public $publication_comment_text;
    public $timestamp;

    public function deleteByPublicationId($publication_id)
{
    $SQL = 'DELETE FROM publication_comment WHERE publication_id = :publication_id';
    $STMT = self::$_conn->prepare($SQL);
    $STMT->execute(['publication_id' => $publication_id]);
}


    public function getById($publication_id)
	{
		$SQL = 'SELECT * FROM publication_comment WHERE publication_id = :publication_id LIMIT 1';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(['publication_id' => $publication_id]);
		$STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\PublicationComment'); // Set the type of data returned by fetches
		return $STMT->fetch(); // Return the record
	}

    public function insert()
    {
        $SQL = 'INSERT INTO publication_comment(profile_id, publication_id, publication_comment_text, timestamp) 
                VALUES (:profile_id, :publication_id, :publication_comment_text, NOW())';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'profile_id' => $this->profile_id,
            'publication_id' => $this->publication_id,
            'publication_comment_text' => $this->publication_comment_text
        ]);
    }

    public function update()
    {
        $SQL = 'UPDATE publication_comment SET publication_comment_text = :publication_comment_text WHERE publication_comment_id = :publication_comment_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'publication_comment_text' => $this->publication_comment_text,
            'publication_comment_id' => $this->publication_comment_id
        ]);
    }

    public function delete()
    {
        $SQL = 'DELETE FROM publication_comment WHERE publication_comment_id = :publication_comment_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'publication_comment_id' => $this->publication_comment_id
        ]);
    }

    public function getAllCommentsForPublication($publication_id)
    {
        $SQL = 'SELECT * FROM publication_comment WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_id' => $publication_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\PublicationComment');
        return $STMT->fetchAll();
    }
}
?>
