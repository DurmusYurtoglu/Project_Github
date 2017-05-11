<?php

    // connect DB
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "theatre";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    }

    $conn->set_charset("utf8");

    // read POST variables

    $format = 'json' ; // xml is the default
    //$format = strtolower($_POST['format']) == 'json' ? 'json' : 'xml'; // xml is the default



    // prepare, bind and execute SQL statement
    $stmt = $conn->prepare("SELECT idActivity,name,summary,date,category,place,city,director,writer,sponsor,AvailableSeats,price FROM activity ");

    $stmt->execute();
    $stmt->bind_result($idActivity,$name,$summary,$date,$category,$place,$city,$director,$writer,$sponsor,$AvailableSeats,$price);

    $activities = array();
    while ($stmt->fetch()) {
        array_push( $activities, array("idActivity"=>$idActivity, "name"=>$name,"summary"=>$summary,"date"=>$date,"category"=>$category,"place"=>$place,"city"=>$city,"director"=>$director,"writer"=>$writer,"sponsor"=>$sponsor,"AvailableSeats"=>$AvailableSeats,"price"=>$price) );
    }

    $stmt->close(); // close statement


    if($format == 'json') { // JSON output
        header('Content-type: application/json');
        echo json_encode(array('activities'=>$activities));
    }
    else { // XML output
        header('Content-type: text/xml');
        echo '<activities>';

        foreach($activities as $index => $activity) {

            echo '<country>';
            foreach($activity as $key => $value) {
                echo '<',$key,'>';
                echo htmlentities($value);
                echo '</',$key,'>';
            }
            echo '</activity>';

        }

        echo '</countries>';
    }

    $conn->close(); // close DB connection

?>