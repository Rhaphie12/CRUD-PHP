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
    if (isset($_GET['updateID'])) {
        $updateID = $_GET['updateID'];
        $SQLquery = "SELECT * FROM `gradeeleven` WHERE Student_ID = $updateID";
        $result = mysqli_query($connection, $SQLquery);
        $row = mysqli_fetch_assoc($result);

        $id = $row["Student_ID"];
        $Lastname = $row["Lastname"];
        $Firstname = $row["Firstname"];
        $Middlename = $row["Middlename"];
        $Birthday = $row['Birthday'];
        $Citizenship = $row['Citizenship'];

        $Yearlevel = $row["Year_Level"];
        $Course = $row['Course'];

        $House_number = $row['House_number'];
        $Street = $row['Street'];
        $Barangay = $row['Barangay'];
        $City = $row['City'];
    }

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

        $SQLquery = "UPDATE `gradeeleven` set Lastname = '$Lastname', 
            Firstname = '$Firstname', 
            Middlename = '$Middlename', 
            Birthday = '$Birthday', 
            Citizenship = '$Citizenship', 
            Year_Level = '$Yearlevel', 
            Course = '$Course', 
            House_number = '$House_number',
            Street = '$Street', 
            Barangay = '$Barangay', 
            City = '$City'
            WHERE Student_ID = $Student_ID
            ";
        $result = mysqli_query($connection, $SQLquery);
        if ($result) {
            echo '
                <script>
                    alert("Updated Successfully ");
                    window.location.href="grade11Table.php";
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
            <a class="nav-link " href="./registerStudent.php" aria-current="page"> College Form</a>
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
        <div class="container mt-auto ">
            <div class="wrapper-container">
                <div class="card-header d-flex justify-content-center align-items-center mb-4">
                    <div class="col-1.5 m-2 text-center">
                        <img src="./dcsa.png" class="img-fluid" width="100">
                    </div>
                    <div class="text-center">
                        <h2 class="text-center mb-2 text-white">COLLEGE</h2>
                        <h5 class="text-center mb-1 text-white">REGISTRATION FORM</h5>
                    </div>
                </div>
                <form action="./updateGradeEleven.php" id="registrationForm" method="post">
                    <div class="name-section">
                        <label>Name</label>
                        <input type="text" required placeholder="Enter your Student ID" name="student_ID" id="student_ID" value="<?php echo $id; ?>" />
                        <input type="text" required placeholder="Enter your Last Name" name="Lastname" id="Lastname" value="<?php echo $Lastname; ?>" />
                        <input type="text" required placeholder="Enter your First Name" name="Firstname" id="Firstname" value="<?php echo $Firstname; ?>" />
                        <input type="text" placeholder="Enter your Middle Name" name="Middlename" id="Middlename" value="<?php echo $Middlename; ?>" />
                    </div>

                    <div class="information-section">
                        <label>Info-section</label>
                        <input type="text" required placeholder="Enter your Birthday (MM/DD/YYYY)" onfocus="(this.type='date')" name="Birthday" id="Birthday" value="<?php echo $Birthday; ?>" />
                        <input type="text" placeholder="Enter your citizenship" name="Citizenship" id="Citizenship" value="<?php echo $Citizenship; ?>" />
                        <?php
                        echo "<select id='yearLevel' name='yearlevel' required>";
                        echo "<option value='' selected disabled>Select your Year Level</option>";
                        echo "<option value='Grade 11" . ($Yearlevel == 'Grade 11' ? 'selected' : '') . ">Grade 11/option>";
                        echo "<option value='Grade 12'" . ($Yearlevel == 'Grade 12' ? 'selected' : '') . ">Grade 12</option>";
                        echo "</select>";
                        ?>
                        <?php
                        echo "<select id='course' name='course' required>";
                        echo "<option value=''</option>";
                        echo "<option value='STEM'" . ($Course == 'STEM' ? 'selected' : '') . ">STEM</option>";
                        echo "<option value='ABM'" . ($Course == 'ABM' ? 'selected' : '') . ">ABM</option>";
                        echo "<option value='HUMSS'" . ($Course == 'HUMSS' ? 'selected' : '') . ">HUMSS</option>";
                        echo "<option value='GAS'" . ($Course == 'GAS' ? 'selected' : '') . ">GAS</option>";
                        echo "<option value='HE'" . ($Course == 'HE' ? 'selected' : '') . ">HE</option>";
                        echo "<option value='ICT'" . ($Course == 'ICT' ? 'selected' : '') . ">ICT</option>";
                        echo "</select>";
                        ?>
                    </div>
                    <div class="address-section">
                        <label>Address</label>
                        <input type="text" required placeholder="Enter House No." name="block" id="block" value="<?php echo $House_number; ?>" />
                        <input type="text" required placeholder="Enter Street" name="street" id="street" value="<?php echo $Street; ?>" />
                        <input type="text" required placeholder="Enter Barangay" name="brgy" id="brgy" value="<?php echo $Barangay; ?>" />
                        <input type="text" required placeholder="Enter City" name="city" id="city" value="<?php echo $City; ?>" />
                    </div>
                    <div class="input-button">
                        <input type="submit" value="Update Info" name="submitButton" class="btntext">
                    </div>
                </form>
            </div>
    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>