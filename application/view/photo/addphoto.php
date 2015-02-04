<div class="container">
	<h1>Photo</h1>
	<div class="box">
        <h3>Upload a photo</h3>
        <form action="<?php echo URL; ?>photo/addphotoaction" method="POST" enctype="multipart/form-data">
        	<label>Title: </label>
        	<input type="text" name="title" required/>
            <input type="file" name="fileToUpload" required/>
            <input type="submit" name="submit_add_photo" value="Submit" />
        </form>
    </div>
</div>