<!DOCTYPE html>
<html lang="en">

<head>
    <title>SHS Registration Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./registerStudent.css">
</head>

<body>
    <?php
    require('./connection.php');

    if (isset($_POST['submitButton'])) {

        $Student_ID = $_POST['student_ID'];
        $Lastname = $_POST['Lastname'];
        $Firstname = $_POST['Firstname'];
        $Middlename = $_POST['Middlename'];

        $Birthday = $_POST['Birthday'];
        $Citizenship = $_POST['Citizenship'];
        $Yearlevel = $_POST['yearlevel'];
        $Course = $_POST['course'];

        $House_number = $_POST['block'];
        $Street = $_POST['street'];
        $Barangay = $_POST['brgy'];
        $City = $_POST['city'];

        if ($Yearlevel === "Grade 11") {
            $SQLquery = "INSERT INTO gradeeleven (Student_ID, Firstname, Lastname, Middlename, Birthday, Citizenship, Year_Level, Course, House_number, Street, Barangay, City) 
            VALUES('$Student_ID', '$Firstname', '$Lastname', '$Middlename', '$Birthday', '$Citizenship', '$Yearlevel', '$Course', '$House_number', '$Street', '$Barangay', '$City')";
        } else if ($Yearlevel === "Grade 12") {
            $SQLquery = "INSERT INTO gradetwelve (Student_ID, Firstname, Lastname, Middlename, Birthday, Citizenship, Year_Level, Course, House_number, Street, Barangay, City) 
            VALUES('$Student_ID', '$Firstname', '$Lastname', '$Middlename', '$Birthday', '$Citizenship', '$Yearlevel', '$Course', '$House_number', '$Street', '$Barangay', '$City')";
        } else {
            echo "Invalid Table";
        }

        if ($connection->query($SQLquery) === TRUE) {
            echo '
            <script>
                Swal.fire({
                  text: "Registration Successfully!",
                  icon: "success"
                });
            </script>
            ';
        } else {
            echo "Error: " . $SQLquery . "<br>" . $connection->error;
        }
    }
    ?>
    <header>
        <!-- place navbar here -->
        <nav class="nav justify-content-space-between  ">
            <a class="nav-link " href="./registerStudent.php" aria-current="page">College Form</a>
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
            <div class="wrapper-container">
                <div class="card-header d-flex justify-content-center align-items-center mb-4">
                    <div class="col-1.5 m-2 text-center">
                        <img src="./dcsa.png" class="img-fluid" width="100">
                    </div>
                    <div class="text-center">
                        <h2 class="text-center mb-2 text-white">SENIOR HIGH SCHOOL</h2>
                        <h5 class="text-center mb-1 text-white">REGISTRATION FORM</h5>
                    </div>
                </div>
                <form action="./shsForm.php" id="registrationForm" method="post">
                    <div class="name-section">
                        <label>Name</label>
                        <input type="text" required placeholder="Enter your Student ID" name="student_ID" id="student_ID" />
                        <input type="text" placeholder="Enter your Last Name" name="Lastname" id="Lastname" />
                        <input type="text" required placeholder="Enter your First Name" name="Firstname" id="Firstname" />
                        <input type="text" placeholder="Enter your Middle Name" name="Middlename" id="Middlename" />
                    </div>

                    <div class="information-section">
                        <label>Info-section</label>
                        <input type="text" required placeholder="Enter your Birthday (MM/DD/YYYY)" onfocus="(this.type='date')" name="Birthday" id="Birthday" />
                        <input type="text" placeholder="Enter your citizenship" name="Citizenship" id="Citizenship" />
                        <select id="yearLevel" name="yearlevel" required>
                            <option value="" selected disabled>Select your Year Level</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                        <select id="course" name="course" required>
                            <option value="" selected disabled>Select your Strand</option>
                            <option value="STEM">STEM</option>
                            <option value="ABM">ABM</option>
                            <option value="HUMSS">HUMSS</option>
                            <option value="GAS">GAS</option>
                            <option value="HE">HE</option>
                            <option value="ICT">ICT</option>
                        </select>
                    </div>
                    <div class="address-section">
                        <label>Address</label>
                        <input type="text" required placeholder="Enter House No." name="block" id="block" />
                        <input type="text" required placeholder="Enter Street" name="street" id="street" />
                        <input type="text" required placeholder="Enter Barangay" name="brgy" id="brgy" />
                        <input type="text" required placeholder="Enter City" name="city" id="city" />
                    </div>
                    <input type="submit" value="Register Student" name="submitButton" class="btntext">
                </form>
            </div>
    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>