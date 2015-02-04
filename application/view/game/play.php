<div id="map-canvas"></div>
<button id="answer">Answer</button>
<img class="game" src="<?php echo URL . 'public/img/' . $this->gamephoto->title . '.' . $this->gamephoto->fileType ?>">
<p><?php echo URL . "game/getLatLon/" . $this->gamephoto->id ?></p>