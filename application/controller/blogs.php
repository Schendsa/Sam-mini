<?php

class Blogs extends controller
{
	public function index()
	{
		$this->blogs_model = $this->loadModel('blogs');

		$this->view->blogs = $this->blogs_model->getAllBlogs();

		$this->view->render('blogs/index');
	}

	public function addBlog()
	{
		$this->blogs_model = $this->loadModel('blogs');

		if (isset($_POST["submit_add_blog"])) {
			$this->blogs_model->addBlog($_POST["title"], $_POST["content"]);
		}

		header('location: ' . URL . 'blogs/index');
	}

	public function deleteBlog($blog_id)
	{
		$this->blogs_model = $this->loadModel('blogs');

		if (isset($blog_id)) {
			$this->blogs_model->deleteBlog($blog_id);
		}

		header('location: ' . URL . 'blogs/index');
	}

	public function editBlog($blog_id)
	{
		$this->blogs_model = $this->loadModel('blogs');

		if (isset($blog_id)) {
			$this->view->blog = $this->blogs_model->getBlog($blog_id);
			$this->view->render('blogs/edit');
		} else {
			header('location: ' . URL . 'blogs/index');
		}
	}

	public function updateBlog()
	{
		$this->blogs_model = $this->loadModel('blogs');

		if (isset($_POST["submit_update_blog"])) {
			$this->blogs_model->updateBlog($_POST['title'], $_POST['content'], $_POST['blog_id']);
		}

		header('location: ' . URL . 'blogs/index');
	}
}