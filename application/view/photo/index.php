<div class="container">
	<h1>Photo</h1>
	<a href="<?php echo URL . 'photo/addphoto'?>">Add a photo</a>
	<div class="box">
		<?php foreach ($this->photos as $photo) { ?>
			<h3><?php echo $photo->title ?></h3>
			<a href="<?php echo URL . 'photo/showPhoto/' . $photo->id ?>"><img src="<?php echo URL . 'public/img/' . $photo->title . '.' . $photo->fileType ?>" height="64" width="64"></a>
		<?php } ?>
    </div>
</div>