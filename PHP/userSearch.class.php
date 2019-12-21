<?php

class userSearch
{
    function search($searchField, $id)
    {
        //Retrieve database connection
        $pdo = dataBaseConnection::getConnection();

        //Prepare database query and bind parameters
        $statement = $pdo->prepare("SELECT * FROM Users WHERE $searchField = :searchField");
        $statement->execute(array(':searchField' => $id));
        
        //Return result
        return $statement->fetch();
    }
}
