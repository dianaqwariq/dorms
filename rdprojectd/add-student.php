
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>An-Najah Dorms</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">



    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
          rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Spinner Start -->
    <div id="spinner"
         class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-transparent ">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4  ">
            <a href="index.php" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="img/icon-logo.gif" alt="Icon" style="width: 30px; height: 30px;">
                </div>
                <h1 class="m-0 text-primary">ANNU Droms</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dorms</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="property-list.php" class="dropdown-item">All Dorms</a>
                            <a href="master-dorms.php" class="dropdown-item">Master Dorms</a>
                            <a href="twin-dorms.php" class="dropdown-item">Twin Dorms</a>
                            <a href="double-dorms.php" class="dropdown-item">Double Dorms</a>
                        </div>
                    </div>

                    <a href="testimonial.php" class="nav-item nav-link">Testimonial</a>
                    <a href="add-student.php" class="nav-item nav-link">students</a>

                </div>
                <a href="index.php" class="btn btn-primary px-3 d-none d-lg-flex">logout</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


</head>

<!-- start table-->
<section id="students" class="students">
    <div class="container">
        <div class="section-title">
            <h3>Student Information</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">StudentID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Gender</th>
                        <th scope="col">DateOfBirth</th>
                        <th scope="col">Address</th>
                        <th scope="col">University</th>
                        <th scope="col">Course</th>
                        <th scope="col">RoomPreference</th>
                        <th scope="col">Budget</th>
                        <th scope="col">Spassword</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Create database connection
                    $conn = mysqli_connect('localhost', 'root', '', 'annudorms');

                    //Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Handle add student form submission
                    if (isset($_POST['add_student'])) {
                        $name = $_POST['Name'];
                        $email = $_POST['Email'];
                        $phone = $_POST['Phone'];
                        $gender = $_POST['Gender'];
                        $dob = $_POST['DateOfBirth'];
                        $address = $_POST['Address'];
                        $university = $_POST['University'];
                        $course = $_POST['Course'];
                        $room_preference = $_POST['RoomPreference'];
                        $budget = $_POST['Budget'];
                        $spassword = $_POST['Spassword'];

                        $sql = "INSERT INTO student (Name, Email, Phone, Gender, DateOfBirth, Address, University, Course, RoomPreference, Budget, Spassword) VALUES ('$name', '$email', '$phone', '$gender', '$dob', '$address', '$university', '$course', '$room_preference', '$budget', '$spassword')";

                        if (mysqli_query($conn, $sql)) {
                            echo '<div class="alert alert-success" role="alert">Student added successfully!</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Error: ' . mysqli_error($conn) . '</div>';
                        }
                    }

                    // Handle delete student request
                    if (isset($_GET['delete_student'])) {
                        $id = $_GET['delete_student'];

                        $sql = "DELETE  * FROM student WHERE StudentID=$id";

                        if (mysqli_query($conn, $sql)) {
                            echo '<div class="alert alert-success" role="alert">Student deleted successfully!</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Error: ' . mysqli_error($conn) . '</div>';
                        }
                    }

                    // Fetch student data from database
                    $sql = "SELECT * FROM student";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['StudentID'] . '</td>';
                            echo '<td>' . $row['Name'] . '</td>';
                            echo '<td>' . $row['Email'] . '</td>';
                            echo '<td>' . $row['Phone'] . '</td>';
                            echo '<td>' . $row['Gender'] . '</td>';
                            echo '<td>' . $row['DateOfBirth'] . '</td>';
                            echo '<td>' . $row['Address'] . '</td>';
                            echo '<td>' . $row['University'] . '</td>';
                            echo '<td>' . $row['Course'] . '</td>';
                            echo '<td>' . $row['RoomPreference'] . '</td>';
                            echo '<td>' . $row['Budget'] . '</td>';
                            echo '<td>' . $row['Spassword'] . '</td>';
                            echo '<td><a href="edit_student.php?id=' . $row['StudentID'] . '" class="btn btn-primary">Edit</a> <a href="?delete_student=' . $row['StudentID'] . '" class="btn btn-danger">Delete</a></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="12">No students found.</td></tr>';
                    }

                    mysqli_close($conn);
                    ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                    Add Student
                </button>
                <form action="" method="GET" class="d-inline-block">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search by name or email" name="search">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
                <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            <option value="">-- Select Gender --</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" name="dob" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="university" class="form-label">University</label>
                                        <input type="text" class="form-control" id="university" name="university" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="course" class="form-label">Course</label>
                                        <input type="text" class="form-control" id="course" name="course" required>
                                    </div>
                                    <<div class="mb-3">
                                        <label for="room_preference" class="form-label">Room Preference</label>
                                        <select class="form-control" id="room_preference" name="room_preference" required>
                                            <option value="">-- Select Room Preference --</option>
                                            <option value="Single">Single Room</option>
                                            <option value="Double">Double Room</option>
                                            <option value="Triple">Triple Room</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="budget" class="form-label">Budget</label>
                                        <input type="number" class="form-control" id="budget" name="budget" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Spassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="Spassword" name="Spassword" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="add_student">Add Student</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!--  End Rigester Page  -->





<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Get In Touch</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Nablus Al-Makhfyah</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+970599158596</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>ANNUdorms@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="https://twitter.com/qwariq"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/diana.qwariq"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Quick Links</h5>
                <a class="btn btn-link text-white-50" href="">About Us</a>
                <a class="btn btn-link text-white-50" href="">Contact Us</a>
                <a class="btn btn-link text-white-50" href="">Our Services</a>
                <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Photo Gallery</h5>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/property-1.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/property-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/property-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/property-4.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/property-5.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/property-6.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" style="height:100px;">

                <div  class="position-relative  "   style=" margin-right: 100px; >

    <form  method="POST">
                <button id="box" type="button" class="animate__zoomOutUp btn btn-primary btn-lg position-absolute top-0 end-0 mt-9" style="height:110px;" onclick="window.open('index.php', '_blank')">
                    logout
                </button>
    </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="copyright">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0 ">
                &copy; <a class="border-bottom" href="#">ANNU Dorms</a>, All Right Reserved.


                Designed By <a class="border-bottom" href="https://www.facebook.com/diana.qwariq">Diana Qwariq</a> & <a class="border-bottom" href="https://www.facebook.com/profile.php?id=100011195175081"> Rayhan Mahmoud</a>
            </div>

        </div>
    </div>
</div>

<!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>