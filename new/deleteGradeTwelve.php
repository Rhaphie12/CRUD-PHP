<?php
require('connection.php');

if (isset($_GET['deleteID'])) {
    $Student_ID = $_GET['deleteID'];
    $query = "DELETE FROM `gradetwelve` WHERE Student_ID = $Student_ID";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // header('Location: firstyear.php');
        echo '
            <script>
                alert("Deleted Successfully ");
                window.location.href="Grade12Table.php";
            </script>
        ';
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}
