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
		if (isset($id)) {
			$this->game_model = $this->loadModel('Game');
	        $LatLon = $this->game_model->getLatLon($id);
	        echo $LatLon->latitude . '/' . $LatLon->longitude;
	    } else {
			header('Location: ' . URL . 'game');
		}	
	}

	public function score($photo_id, $score)
	{
		if (Session::get('user_logged_in')) {
			$this->game_model = $this->loadModel('Game');
			$this->game_model->saveScore($photo_id, $score);
		}
		header('Location: ' . URL . 'game');
	}
}