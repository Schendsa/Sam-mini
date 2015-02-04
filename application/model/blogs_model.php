<?php

class BlogsModel
{
   
    public function getAllBlogs()
    {
        $sql = "SELECT * FROM blog ORDER BY id desc";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addBlog($title, $content)
    {
        $sql = "INSERT INTO blog (title, content) VALUES (:title, :content)";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title, ':content' => $content);

        $query->execute($parameters);
    }

    public function deleteBlog($blog_id)
    {
        $sql = "DELETE FROM blog WHERE id = :blog_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':blog_id' => $blog_id);

        $query->execute($parameters);
    }

    public function updateBlog($title, $content, $blog_id)
    {
        $sql = "UPDATE blog SET title = :title, content = :content WHERE id = :blog_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title, ':content' => $content, ':blog_id' => $blog_id);

        $query->execute($parameters);
    }

    public function getBlog($blog_id)
    {
        $sql = "SELECT * FROM blog WHERE id = :blog_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':blog_id' => $blog_id);

        $query->execute($parameters);

        return $query->fetch();
    }
}
