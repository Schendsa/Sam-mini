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

	public function getLatLon($photoid)
	{

		$sql = "SELECT latitude, longitude FROM photo WHERE id = :id LIMIT";
		$query = $this->db->prepare($sql);
		$query->execute(array(':id' => $photoid));

		return $query->fetch();
	}
}