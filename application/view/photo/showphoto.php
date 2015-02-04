<div class="container">
	<h1><?php echo $this->photo->title ?></h1>
	<div class="box">
		<img src="<?php echo URL . 'public/img/' . $this->photo->title . '.' . $this->photo->fileType ?>"><br>
		<a href="<?php echo URL . 'game/play/' . $this->photo->id ?>">Play game with this photo</a>
    </div>
</div>