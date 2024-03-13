<?php
require_once('./connection.php');

$query = "SELECT * FROM gradetwelve";
$result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Grade 12</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="./registerStudent.css">
</head>

<body>
    <header>
        <!-- place navbar here -->
        <nav class="nav justify-content-space-between">
            <a class="nav-link" href="./registerStudent.php" aria-current="page">College Form
            </a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="./college table.php" role="button" aria-haspopup="true" aria-expanded="false">College Table
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item text-secondary" href="./firstyear.php">First year</a>
                    <a class="dropdown-item text-secondary" href="./secondyear.php">Second year</a>
                    <a class="dropdown-item text-secondary" href="./thirdyear.php">Third year</a>
                    <a class="dropdown-item text-secondary" href="./fourthyear.php">Fourth year</a>
                </div>
            </li>
            <a class="nav-link" href="./shsForm.php">SHS Form</a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="./shs table.php" role="button" aria-haspopup="true" aria-expanded="false">SHS Table
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item text-secondary" href="./grade11Table.php">Grade 11</a>
                    <a class="dropdown-item text-secondary" href="./grade12Table.php">Grade 12</a>
                </div>
            </li>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <div class="card mt-1">
                        <div class="card-header">
                            <h2 class="display-6 text-center">Senior High School (Grade 12)</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered text-center">
                                <tr class="bg-dark">
                                    <th>Student ID</th>
                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                    <th>Middlename</th>
                                    <th>Birthday</th>
                                    <th>Citizenship</th>
                                    <th>Year level</th>
                                    <th>Course</th>
                                    <th>House Number</th>
                                    <th>Street</th>
                                    <th>Barangay</th>
                                    <th>City</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "
                                            <tr>
                                                <td>" . $row["Student_ID"] . "</td>
                                                <td>" . $row["Lastname"] . "</td>
                                                <td>" . $row["Firstname"] . "</td>
                                                <td>" . $row["Middlename"] . "</td>
                                                <td>" . $row["Birthday"] . "</td>
                                                <td>" . $row["Citizenship"] . "</td>
                                                <td>" . $row["Year_Level"] . "</td>
                                                <td>" . $row["Course"] . "</td>
                                                <td>" . $row["House_number"] . "</td>
                                                <td>" . $row["Street"] . "</td>
                                                <td>" . $row["Barangay"] . "</td>
                                                <td>" . $row["City"] . "</td>
                                                <td><a href='./updateGradeTwelve.php?updateID=" . $row["Student_ID"] . "'class='btn btn-success'>Update</a></td>
                                                <td><a href='./deleteGradeTwelve.php?deleteID=" . $row["Student_ID"] . "'class='btn btn-danger'>Delete</a></td>
                                            </tr>
                                            ";
                                    }
                                } else {
                                    echo "
                                        <tr>
                                            <td colspan='14'>No results found</td>
                                        </tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>