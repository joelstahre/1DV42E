<?php

//INSERT SCRIPT
try
{
    $DBConn = new PDO('mysql:host=localhost; dbname=testSkola;', 'root', '');

    $postsToInsert = 1000;

    $startTime = microtime(true);

    for($i = 0; $i < $postsToInsert; $i++)
    {
        $res = $DBConn->prepare("INSERT INTO InsertTest (firstname, lastname, age) VALUES('Joel', 'Stahre', 26)");
        $res->execute();
    }

    $endTime = microtime(true);

    $totalTime = $endTime - $startTime;

    echo "$postsToInsert has been inserted.  <br/>";
    echo "Finished in $totalTime ms.\n";

    $DBConn = null;
}
catch ( PDOException $e )
{
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}




//READ SCRIPT
try
{
    $DBConn = new PDO('mysql:host=localhost;dbname=testSkola', 'root', '');

    $startTime = microtime(true);

    $res = $DBConn->prepare('SELECT * from ReadTest');
    $res->execute();

    $endTime = microtime(true);

    $totalTime = $endTime - $startTime;

    $count = $res->rowCount();

    echo "Fetched $count posts <br/> Finished in $totalTime ms.<br/>";

    $DBConn = null;
}
catch ( PDOException $e )
{
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


//MYSQL VERSION 5.6.17

//MARIADB VERSION 5.5