<div class="container">
    <h1>Blog</h1>
	<div class="box">
		<h3>Add a blog</h3>
		<form action="<?php echo URL; ?>blogs/addblog" method="POST">
			<label>Title: </label>
			<input type="text" name="title" value="" placeholder="Title." required />
			<br>
			<label>Content: </label>
			<textarea type="text" name="content" value="" placeholder="Write a blog." required></textarea>
			<input type="submit" name="submit_add_blog" value="Submit" />
		</form>
	</div>
	<div class="box">
		<?php foreach ($this->blogs as $blog) { ?>
			<h1><?php if (isset($blog->title)) echo $blog->title; ?></h1>
			<p><?php if (isset($blog->content)) echo $blog->content; ?></p>
			<a href="<?php echo URL . 'blogs/editblog/' . $blog->id; ?>">edit</a>
			<a href="<?php echo URL . 'blogs/deleteblog/' . $blog->id; ?>">delete</a>
		<?php } ?>
	</div>
</div>