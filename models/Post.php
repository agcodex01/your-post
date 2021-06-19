<?php

class Post extends Model
{



    public static function create(PDO $conn, PostRequest $request)
    {
        $sql = 'INSERT INTO posts(title, author_id, author,category,body,status)
                         VALUES (:title, :author_id, :author, :category, :body, :status)';

        $statement = $conn->prepare($sql);
        $statement->execute($request->toArray());
    }


    public static function findPostById(PDO $conn, $id)
    {
        $sql = 'SELECT * FROM posts WHERE id = :id';

        $statement = $conn->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);

        return $statement->fetchObject('Post');
    }


    public static function getAllPublishedPost(PDO $conn)
    {
        $statement = $conn->prepare("SELECT * FROM posts WHERE status = 'published'");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, 'Post');
    }

    public static function getPostByAuthorId(PDO $conn, $authorId)
    {
        $statement = $conn->prepare("SELECT * FROM posts WHERE author_id = $authorId");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, 'Post');
    }


    public static function updatePost(PDO $conn, PostRequest $request, $id)
    {
        $sql = "UPDATE posts SET title=:title, category=:category, body=:body WHERE id=:id";
        $statement = $conn->prepare($sql);
        $statement->execute(
            array_merge(
                ['id' => $id],
                $request->postUpdate()
            )
        );

        return $statement->rowCount();
    }

    public static function deleteById(PDO $conn, $id)
    {
        $sql = "DELETE FROM posts WHERE id=:id";
        $statement = $conn->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);

        return $statement->rowCount();
    }

    public static function publishPost(PDO $conn, $id)
    {
        $sql = "UPDATE posts SET status='published' WHERE id=:id";

        $statement = $conn->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);

        return $statement->rowCount();
    }

    public static function countPendingPost(PDO $conn) {
        $sql = "SELECT * FROM posts WHERE status='pending'";

        $statement = $conn->prepare($sql);
        $statement->execute();

        return $statement->rowCount();
    }

    public static function countPublishedPost(PDO $conn) {
        $sql = "SELECT * FROM posts WHERE status='published'";

        $statement = $conn->prepare($sql);
        $statement->execute();

        return $statement->rowCount();
    }


}
