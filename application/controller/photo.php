<?php

class photo extends controller
{
	public function index()
	{
		$this->photos_model = $this->loadModel('Photos');
		$this->view->photos = $this->photos_model->getAllPhotos();
		$this->view->render('photo/index');
	}

	public function addPhoto()
	{
		$this->photos_model = $this->loadModel('Photos');
		$this->view->render('photo/addphoto');
	}

	public function addPhotoAction()
	{
		$this->photos_model = $this->loadModel('Photos');
		if (isset($_POST["submit_add_photo"])) {
			$this->photos_model->addPhoto($_POST['title']);
		}
		header('Location: ' . URL . 'photo');
	}

	public function showPhoto($id)
	{
		if (isset($id)) {
			$this->photos_model = $this->loadModel('Photos');
			$this->view->photo = $this->photos_model->getPhoto($id);
			$this->view->render('photo/showphoto');
		} else {
			header('Location: ' . URL . 'photo');
		}	
	}
}