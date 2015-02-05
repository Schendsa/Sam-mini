<?php

class GameModel
{
	public function getPhoto($id)
	{
		$sql = "SELECT id, title, fileType FROM photo WHERE id = :id LIMIT 1";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));

		return $query->fetch();
	}

	public function getRandomPhoto()
	{
		$sql = "SELECT id, title, fileType FROM photo ORDER BY RAND() LIMIT 1";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetch();
	}

	public function getLatLon($id)
	{
		$sql = "SELECT id, latitude, longitude FROM photo WHERE id = :id LIMIT 1";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $id));

		return $query->fetch();
	}

	public function saveScore($photo_id, $score)
	{
		$sql = "INSERT INTO score (user_id, photo_id, score) VALUES (:user_id, :photo_id, :score)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':user_id' => Session::get('user_id'),
							  ':photo_id' => $photo_id,
							  ':score' => $score));
	}
}