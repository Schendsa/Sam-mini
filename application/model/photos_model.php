<?php

class PhotosModel
{
   
    public function getAllPhotos()
    {
        $sql = "SELECT * FROM photo ORDER BY id desc";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addPhoto($title)
    {
		$exif = exif_read_data($_FILES["fileToUpload"]["tmp_name"], 0, true);
		if (isset($exif["GPS"]["GPSLongitude"]) AND isset($exif["GPS"]["GPSLongitudeRef"]) AND isset($exif["GPS"]["GPSLatitude"]) AND isset($exif["GPS"]["GPSLatitudeRef"])) {
			$uploadOk = 1;
			$lon = $this->getGps($exif["GPS"]["GPSLongitude"], $exif["GPS"]['GPSLongitudeRef']);
			$lat = $this->getGps($exif["GPS"]["GPSLatitude"], $exif["GPS"]['GPSLatitudeRef']);
		} else {
			$uploadOk = 0;
		}
		if ($uploadOk == 1){
			$fileType = explode(".", $_FILES["fileToUpload"]["name"]);
			$newFileName = $title . '.' . end($fileType);
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], ROOT . "public/img/" . $newFileName);
			$sql = "INSERT INTO photo (title, fileType, latitude, longitude) VALUES (:title, :fileType, :latitude, :longitude)";
			$query = $this->db->prepare($sql);
			$query->execute(array(':title' => $title,
								  ':fileType' => end($fileType),
								  ':latitude' => $lat,
								  ':longitude' => $lon));
		}
	}

	public function getPhoto($photo_id)
    {
    	$query = $this->db->prepare("SELECT id, title, fileType FROM photo WHERE id = :id LIMIT 1");
		$query->execute(array(':id' => $photo_id));

		return $query->fetch();
    }

    function getGps($exifCoord, $hemi) {

	    $degrees = count($exifCoord) > 0 ? $this->gps2Num($exifCoord[0]) : 0;
	    $minutes = count($exifCoord) > 1 ? $this->gps2Num($exifCoord[1]) : 0;
	    $seconds = count($exifCoord) > 2 ? $this->gps2Num($exifCoord[2]) : 0;

	    $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;

	    return $flip * ($degrees + $minutes / 60 + $seconds / 3600);
	}

	function gps2Num($coordPart) {

	    $parts = explode('/', $coordPart);

	    if (count($parts) <= 0)
	        return 0;

	    if (count($parts) == 1)
	        return $parts[0];

	    return floatval($parts[0]) / floatval($parts[1]);
	}
}