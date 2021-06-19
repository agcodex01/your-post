<?php

class PostRequest
{

    public function __construct($array)
    {
        $this->title = $array['title'];
        $this->author = $array['author'] ?? null;
        $this->category = $array['category'];
        $this->body = $array['body'];
    }


    public function toArray()
    {
        return [
            'title' => $this->title,
            'author_id' => $_SESSION['user']->id,
            'author' => $this->author,
            'category' => $this->category,
            'body' => $this->body,
            'status' => Auth::getRole() == 'admin' ? 'published' : 'pending'
        ];
    }

    public function postUpdate()
    {
        return [
            'title' => $this->title,
            'category' => $this->category,
            'body' => $this->body
        ];
    }

}
