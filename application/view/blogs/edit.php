<div class="container">
	<div>
		<h3>Edit a blog</h3>
		<form action="<?php echo URL; ?>blogs/updateblog" method="POST">
			<label>Title: </label>
			<input type="text" name="title" value="<?php echo $this->blog->title; ?>" placeholder="Title." required />
			<label>Content: </label>
			<textarea type="text" name="content" placeholder="Write a blog." required><?php echo $this->blog->content; ?></textarea>
			<input type="hidden" name="blog_id" value="<?php echo $this->blog->id; ?>" />
			<input type="submit" name="submit_update_blog" value="Update" />
		</form>
	</div>
</div>