<?php

class game extends Controller
{
	public function index()
	{
		$this->view->render('game/index');
	}

	public function play($id = null)
	{
		$this->game_model = $this->loadModel('Game');
		if ($id != null) {
			$this->view->gamephoto = $this->game_model->getPhoto($id);
		} else {
			$this->view->gamephoto = $this->game_model->getRandomPhoto();
		}
		$this->view->render('game/play');
	}

	public function getLatLon($id)
	{
		$this->game_model = $this->loadModel('Game');
        $LatLon = $this->model->getLatLon($id);
        echo $LatLon->latitude . "," . $LatLon->longitude;
	}

	public function score()
	{
		
	}
}