<?php
class User extends Model
{

    public static function instance($array)
    {
        $user = new User;
        $user->id = $array['id'];
        $user->user_type = $array['user_type'];
        $user->firstname = $array['firstname'];
        $user->lastname = $array['lastname'];
        $user->email = $array['email'];
        $user->password = $array['password'];

        return $user;
    }

    public static function create(PDO $conn, UserRequest $request)
    {
        $sql = 'INSERT INTO users(user_type, firstname, lastname, email, password)
                         VALUES (:user_type, :firstname, :lastname, :email, :password)';

        $statement = $conn->prepare($sql);
        $statement->execute($request->toArray());

        return User::instance(array_merge(
            ['id' => $conn->lastInsertId()],
            $request->toArray()
        ));
    }

    public static function login(PDO $conn, UserRequest $request)
    {

        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';

        $statement = $conn->prepare($sql);
        $statement->execute($request->getCredentials());

        return $statement->fetchObject('User');
    }

    public static function checkEmailDuplicate(PDO $conn, $email)
    {
        $sql = "SELECT email FROM users WHERE email=:email";

        $statement = $conn->prepare($sql);
        $statement->execute([
            'email' => $email
        ]);

        return $statement->rowCount();
    }

    public static function countUsers(PDO $conn)
    {
        $sql = "SELECT email FROM users WHERE user_type='user'";

        $statement = $conn->prepare($sql);
        $statement->execute();

        return $statement->rowCount();
    }
}
