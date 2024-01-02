<?php
session_start();
include "./api/connection.php";
//userID
if (!isset($_SESSION['user_id'])) {
    header('Location: ./login.php');
}
$user_name = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
echo "<script> console.log('" . $user_name . "');</script>";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
        <!-- Sidenav Toggle Button-->
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
        <!-- Navbar Brand-->
        <!-- * * Tip * * You can use text or an image for your navbar brand.-->
        <!-- * * * * * * When using an image, we recommend the SVG format.-->
        <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
        <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="adminmonitor.php">Program Head </a>
        <!-- Navbar Search Input-->
        <!-- * * Note: * * Visible only on and above the lg breakpoint-->
        <form class="form-inline me-auto d-none d-lg-block me-3">
            <div class="input-group input-group-joined input-group-solid">
                <input class="form-control pe-0" type="search" placeholder="Search" aria-label="Search" />
                <div class="input-group-text"><i data-feather="search"></i></div>
            </div>
        </form>
        <!-- Navbar Items-->
        <ul class="navbar-nav align-items-center ms-auto">
            <!-- Documentation Dropdown-->
            <li class="nav-item dropdown no-caret d-none d-md-block me-3">

                <div class="dropdown-menu dropdown-menu-end py-0 me-sm-n15 me-lg-0 o-hidden animated--fade-in-up" aria-labelledby="navbarDropdownDocs">
                    <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro" target="_blank">
                        <div class="icon-stack bg-primary-soft text-primary me-4"><i data-feather="book"></i></div>
                        <div>
                            <div class="small text-gray-500">Documentation</div>
                            Usage instructions and reference
                        </div>
                    </a>
                    <div class="dropdown-divider m-0"></div>
                    <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro/components" target="_blank">
                        <div class="icon-stack bg-primary-soft text-primary me-4"><i data-feather="code"></i></div>
                        <div>
                            <div class="small text-gray-500">Components</div>
                            Code snippets and reference
                        </div>
                    </a>
                    <div class="dropdown-divider m-0"></div>
                    <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro/changelog" target="_blank">
                        <div class="icon-stack bg-primary-soft text-primary me-4"><i data-feather="file-text"></i></div>
                        <div>
                            <div class="small text-gray-500">Changelog</div>
                            Updates and changes
                        </div>
                    </a>
                </div>
            </li>
            <!-- Navbar Search Dropdown-->
            <!-- * * Note: * * Visible only below the lg breakpoint-->
            <li class="nav-item dropdown no-caret me-3 d-lg-none">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="tables.html#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="search"></i></a>
                <!-- Dropdown - Search-->
                <div class="dropdown-menu dropdown-menu-end p-3 shadow animated--fade-in-up" aria-labelledby="searchDropdown">
                    <form class="form-inline me-auto w-100">
                        <div class="input-group input-group-joined input-group-solid">
                            <input class="form-control pe-0" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                            <div class="input-group-text"><i data-feather="search"></i></div>
                        </div>
                    </form>
                </div>
            </li>
            <!-- Alerts Dropdown-->
            <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="bell"></i></a>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                    <h6 class="dropdown-header dropdown-notifications-header">
                        <i class="me-2" data-feather="bell"></i>
                        Alerts Center
                    </h6>
                    <!-- Example Alert 1-->
                    <a class="dropdown-item dropdown-notifications-item" href="tables.html#!">
                        <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">December 29, 2021</div>
                            <div class="dropdown-notifications-item-content-text">This is an alert message. It's nothing
                                serious, but it requires your attention.</div>
                        </div>
                    </a>
                    <!-- Example Alert 2-->
                    <a class="dropdown-item dropdown-notifications-item" href="tables.html#!">
                        <div class="dropdown-notifications-item-icon bg-info"><i data-feather="bar-chart"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">December 22, 2021</div>
                            <div class="dropdown-notifications-item-content-text">A new monthly report is ready. Click
                                here to view!</div>
                        </div>
                    </a>
                    <!-- Example Alert 3-->
                    <a class="dropdown-item dropdown-notifications-item" href="tables.html#!">
                        <div class="dropdown-notifications-item-icon bg-danger"><i class="fas fa-exclamation-triangle"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">December 8, 2021</div>
                            <div class="dropdown-notifications-item-content-text">Critical system failure, systems
                                shutting down.</div>
                        </div>
                    </a>
                    <!-- Example Alert 4-->
                    <a class="dropdown-item dropdown-notifications-item" href="tables.html#!">
                        <div class="dropdown-notifications-item-icon bg-success"><i data-feather="user-plus"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">December 2, 2021</div>
                            <div class="dropdown-notifications-item-content-text">New user request. Woody has requested
                                access to the organization.</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-footer" href="tables.html#!">View All Alerts</a>
                </div>
            </li>
            <!-- Messages Dropdown-->
            <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="mail"></i></a>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownMessages">
                    <h6 class="dropdown-header dropdown-notifications-header">
                        <i class="me-2" data-feather="mail"></i>
                        Message Center
                    </h6>
                    <!-- Example Message 1  -->
                    <a class="dropdown-item dropdown-notifications-item" href="tables.html#!">
                        <img class="dropdown-notifications-item-img" src="assets/img/illustrations/profiles/profile-2.png" />
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                            <div class="dropdown-notifications-item-content-details">Thomas Wilcox · 58m</div>
                        </div>
                    </a>
                    <!-- Example Message 2-->
                    <a class="dropdown-item dropdown-notifications-item" href="tables.html#!">
                        <img class="dropdown-notifications-item-img" src="assets/img/illustrations/profiles/profile-3.png" />
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                            <div class="dropdown-notifications-item-content-details">Emily Fowler · 2d</div>
                        </div>
                    </a>
                    <!-- Example Message 3-->
                    <a class="dropdown-item dropdown-notifications-item" href="tables.html#!">
                        <img class="dropdown-notifications-item-img" src="assets/img/illustrations/profiles/profile-4.png" />
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                            <div class="dropdown-notifications-item-content-details">Marshall Rosencrantz · 3d</div>
                        </div>
                    </a>
                    <!-- Example Message 4-->
                    <a class="dropdown-item dropdown-notifications-item" href="tables.html#!">
                        <img class="dropdown-notifications-item-img" src="assets/img/illustrations/profiles/profile-5.png" />
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                            <div class="dropdown-notifications-item-content-details">Colby Newton · 3d</div>
                        </div>
                    </a>
                    <!-- Footer Link-->
                    <a class="dropdown-item dropdown-notifications-footer" href="tables.html#!">Read All Messages</a>
                </div>
            </li>
            <!-- User Dropdown-->
            <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="assets/img/illustrations/profiles/profile-1.png" /></a>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img" src="assets/img/illustrations/profiles/profile-1.png" />
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name"><?php echo $user_name ?></div>
                            <!-- <div class="dropdown-user-details-email"><a href="cdn-cgi/l/email-protection.html" class="__cf_email__" data-cfemail="d8aeb4adb6b998b9b7b4f6bbb7b5">[email&#160;protected]</a></div> -->
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="studentprofile.php">
                        <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                        Account
                    </a>
                    <a class="dropdown-item" href="login.php">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                        <!-- Sidenav Menu Heading (Account)-->
                        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                        <div class="sidenav-menu-heading d-sm-none">Account</div>
                        <!-- Sidenav Link (Alerts)-->
                        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                        <a class="nav-link d-sm-none" href="tables.html#!">
                            <div class="nav-link-icon"><i data-feather="bell"></i></div>
                            Alerts
                            <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                        </a>
                        <!-- Sidenav Link (Messages)-->
                        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                        <a class="nav-link d-sm-none" href="tables.html#!">
                            <div class="nav-link-icon"><i data-feather="mail"></i></div>
                            Messages
                            <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                        </a>
                        <!-- Sidenav Heading (Addons)-->
                        <div class="sidenav-menu-heading">Plugins</div>
                        <!-- Sidenav Link (Charts)-->
                        <!-- Sidenav Link (Profile)-->
                        <!-- <a class="nav-link" href="instrucprofile.php">
                            <div class="nav-link-icon"><i data-feather="user"></i></div>
                            Profile
                        </a> -->
                        <a class="nav-link" href="adminprofile.php">
                            <div class="nav-link-icon"><i data-feather="plus-square"></i></div>
                            Profile
                        </a>

                        <!-- <a class="nav-link" href="adminaddstud.php">
                            <div class="nav-link-icon"><i data-feather="plus-square"></i></div>
                            Students
                        </a> -->
                        <a class="nav-link" href="adminaddsched.php">
                            <div class="nav-link-icon"><i data-feather="plus-square"></i></div>
                            Sections
                        </a>
                        <a class="nav-link" href="adminaddinstruc.php">
                            <div class="nav-link-icon"><i data-feather="plus-square"></i></div>
                            Add Instructors
                        </a>

                        <!-- <a class="nav-link" href="admindropstud.php">
                            <div class="nav-link-icon"><i data-feather="plus-square"></i></div>
                            Dropping Students
                        </a> -->
                        <a class="nav-link" href="adminmonitor.php">
                            <div class="nav-link-icon"><i data-feather="plus-square"></i></div>
                            Monitor Student Attendance
                        </a>
                        <!-- <a class="nav-link" href="admindropstud.php">
                            <div class="nav-link-icon"><i data-feather="plus-square"></i></div>
                            Dropping Students
                        </a> -->
                    </div>
                </div>
                <!-- Sidenav Footer-->
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle">Logged in as:</div>
                        <div class="sidenav-footer-title"><?php echo $user_name ?></div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                    <div class="container-xl px-4">
                        <div class="page-header-content pt-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mt-4">
                                    <!-- <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="filter"></i></div>
                                            Tables
                                        </h1> -->
                                    <!-- <div class="page-header-subtitle">An extension of the Simple DataTables library, customized for SB Admin Pro</div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container-xl px-4 mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Add Classes</div>
                        <div class="card-body">
                            <?php
                            function sanitizeID($str)
                            {
                                $sanitizedStr = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $str));
                                return preg_replace('/^[^A-Za-z]/', 'a', $sanitizedStr);
                            }
                            ?>

                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Class Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // First loop for the first set of user data
                                    $users = $conn->query("SELECT * FROM `tblclasses` ");
                                    while ($row = $users->fetch()) :
                                    ?>
                                        <tr>
                                            <td>
                                                <nav class="sidenav shadow-right sidenav-light">
                                                    <div class="sidenav-menu">
                                                        <div class="nav accordion" id="accordionSidenav">
                                                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#<?php echo sanitizeID($row['class_name']) ?>" aria-expanded="false" aria-controls="collapseComponents">
                                                                <div class="nav-link-icon"><i data-feather="package"></i>
                                                                </div>
                                                                <?php echo $row['class_code'] ?> -
                                                                <?php echo $row['class_name'] ?>
                                                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                            </a>
                                                            <div class="collapse" id="<?php echo sanitizeID($row['class_name']) ?>" data-bs-parent="#accordionSidenav">
                                                                <nav class="sidenav-menu-nested nav">
                                                                    <input type="hidden" class="form-control" id="classID" value="<?php echo $row['class_id']; ?>">
                                                                    <?php
                                                                    // Second loop for the second set of user data within the collapse element
                                                                    $classID = $row['class_id']; // Get the class_id value
                                                                    $users2 = $conn->query("SELECT * FROM `tblsection` a INNER JOIN tblclasses b  ON a.section_class = b.class_id WHERE b.class_id = '$classID'  ");
                                                                    while ($row2 = $users2->fetch()) :
                                                                    ?>
                                                                        <br>
                                                                        <input data-user-id="<?php echo $row2['section_id']; ?>" data-class-ids="<?php echo $row['class_id']; ?>" type="button" class="btn btn-primary view-user-btn" value="<?php echo $row2['class_code'] ?> <?php echo $row2['section_name'] ?>" data-toggle="modal" data-target="#myModal">
                                                                    <?php endwhile; ?>
                                                                </nav>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </nav>
                                            </td>
                                            <td>
                                                <input data-class-id="<?php echo $row['class_id']; ?>" type="button" class="btn btn-info add-user-btn" value="Add Class" data-toggle="modal" data-target="#classModal">
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Class Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="classModal" tabindex="-1" role="dialog" aria-labelledby="classModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="classModalLabel">Class Information</h4>
                                </div>
                                <!-- modal body -->
                                <div class="modal-body">
                                    <!-- <p>Class ID: <span id="classIDDisplay"></span></p> -->
                                    <input type="hidden" class="form-control" id="schedID">
                                    <div class="form-group">
                                        <label for="sectionName">Section Name:</label>
                                        <input type="text" class="form-control" id="sectionName">
                                    </div>
                                    <div class="form-group">
                                        <label for="absentTime">Class Start:</label>
                                        <input type="time" class="form-control" id="startTime">
                                    </div>
                                    <div class="form-group">
                                        <label for="absentTime">Class End:</label>
                                        <input type="time" class="form-control" id="endTime">
                                    </div>
                                    <div class="form-group">
                                        <label for="lateTime">Late Time:</label>
                                        <input type="time" class="form-control" id="lateTime">
                                    </div>
                                    <div class="form-group">
                                        <label for="absentTime">Absent Time:</label>
                                        <input type="time" class="form-control" id="absentTime">
                                    </div>
                                    <div class="form-group">
                                        <label for="daySelect">Choose a day:</label>
                                        <select class="form-control" id="dayTime">
                                            <option value="1">Monday</option>
                                            <option value="2">Tuesday</option>
                                            <option value="3">Wednesday</option>
                                            <option value="4">Thursday</option>
                                            <option value="5">Friday</option>
                                            <option value="6">Saturday</option>
                                            <option value="7">Sunday</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveClassBtn">Save Class</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $(".add-user-btn").click(function() {
                            var classID = $(this).data("class-id");
                            // Display the class ID in the modal
                            $("#schedID").val(classID);

                        });
                        $("#saveClassBtn").click(function() {
                            var classID = $("#schedID").val();
                            var sectionName = $("#sectionName").val();
                            var lateTime = $("#lateTime").val();
                            var absentTime = $("#absentTime").val();
                            var startTime = $("#startTime").val();
                            var endTime = $("#endTime").val();
                            var dayTime = $("#dayTime").val();
                            console.log(classID + sectionName + lateTime + absentTime);
                            var randomColor = getRandomColor();
                            const formData = new FormData();
                            formData.append("job", "addClass");
                            formData.append(
                                "json",
                                JSON.stringify({
                                    classID: classID,
                                    sectionName: sectionName,
                                    lateTime: lateTime,
                                    absentTime: absentTime,
                                    startTime: startTime,
                                    endTime: endTime,
                                    dayTime: dayTime,
                                    userID: <?php echo $_SESSION['user_id'] ?>,
                                    color: randomColor
                                })
                            );
                            axios({
                                url: "./api/api.php",
                                method: "post",
                                data: formData,
                            }).then((response) => {
                                if (response.data != "0") {
                                    alert("added success");
                                    window.location.href = 'instrucAddclass.php';
                                } else {
                                    alert("added failed");
                                }
                            });
                        });

                        function getRandomColor() {
                            var letters = '0123456789ABCDEF';
                            var color = '#';
                            for (var i = 0; i < 6; i++) {
                                color += letters[Math.floor(Math.random() * 16)];
                            }
                            return color;
                        }
                    });
                </script>
                <!-- if mag error tanan tan awa tawon ni -->
                <style>
                    .hidden {
                        display: none;
                    }
                </style>
                <script>
                    $(document).ready(function() {
                        $(".view-user-btn").click(function() {
                            var sectionID = $(this).data("user-id");
                            var classID = $(this).data("class-ids");
                            console.log("sectionID" + sectionID);
                            console.log("classID" + classID);
                            $("#modalUserId").text(sectionID);
                            $("#section_ID").val(sectionID);
                            document.getElementById("classIDni").value = classID;
                            document.getElementById("sectionIDni").value = sectionID;
                            document.getElementById("classIDnii").value = classID;
                            document.getElementById("sectionIDnii").value = sectionID;
                            const formData = new FormData();
                            formData.append("job", "viewStudentInClass");
                            formData.append(
                                "json",
                                JSON.stringify({
                                    sectionID: sectionID,
                                    // classID: classID
                                })
                            );

                            axios({
                                url: "./api/api.php",
                                method: "post",
                                data: formData,
                            }).then((response) => {
                                if (response.data != "0") {
                                    const studentInformation = response.data;
                                    const tableBody = $("#datatablesInModal tbody");
                                    tableBody.empty();
                                    // Clear existing rows


                                    studentInformation.forEach((user) => {

                                        const row = `
                            <tr>
                                <td>${user.idnumber}</td>
                                <td>${user.firstname}</td>
                                <td>${user.lastname}</td>
                                <td>${user.middlename}</td>
                                <td class="hidden">${user.user_id}</td>
                                <td> <select class="form-select user-status-select" aria-label="Default select example">
  <option value="0" ${user.student_status === 0 ? "selected" : ""}>Drop</option>
  <option value="1"${user.student_status === 1 ? "selected" : ""}>Ongoing</option>
</select>
</td>
                            </tr>
                        `;

                                        tableBody.append(row);

                                    });
                                    $(".user-status-select").on("change", function() {
                                        const selectedOptionValue = $(this).val();
                                        const userIDs = $(this).closest("tr").find(
                                                "td:nth-child(4)")
                                            .text(); // 3rd column is user_id
                                        // console.log(`Selected option: ${selectedOptionValue}, UserID: ${userID}`);

                                        // Handle "Ongoing" option
                                        const formData = new FormData();
                                        formData.append("job", "studentChangeStatus");
                                        formData.append(
                                            "json",
                                            JSON.stringify({
                                                selectedOptionValue: selectedOptionValue,
                                                userID: userIDs,
                                            })
                                        );
                                        axios({
                                            url: "./api/api.php",
                                            method: "post",
                                            data: formData,
                                        }).then((response) => {
                                            if (response.data != "0") {
                                                alert("status change success");
                                                window.location.href =
                                                    'instrucAddclass.php';
                                            } else {
                                                alert("status change failed");
                                            }
                                        });

                                    });
                                } else {
                                    const noDataMessage = `
                        <tr>
                            <td colspan="4">No data available</td>
                        </tr>
                    `;
                                    tableBody.empty();
                                    tableBody.append(noDataMessage);
                                }

                            });
                        });

                    });
                </script>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Student List
                                    <br>
                                    <!-- <button class="btn btn-primary" id="openModal">
                                        <i class="fas fa-plus"></i> Add Class Schedule
                                    </button> -->
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal fade" id="classModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Enter Class Schedule</h5>

                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="modal-body">
                                                    <!-- <p>Class ID: <span id="classIDDisplay"></span></p> -->

                                                    <div class="form-group">
                                                        <label for="absentTime">Class Start:</label>
                                                        <input type="time" class="form-control" id="classStart">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="absentTime">Class End:</label>
                                                        <input type="time" class="form-control" id="classEnd">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lateTime">Late Time:</label>
                                                        <input type="time" class="form-control" id="classLate">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="absentTime">Absent Time:</label>
                                                        <input type="time" class="form-control" id="classAbsent">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="daySelect">Choose a day:</label>
                                                        <select class="form-control" id="classDay">
                                                            <option value="1">Monday</option>
                                                            <option value="2">Tuesday</option>
                                                            <option value="3">Wednesday</option>
                                                            <option value="4">Thursday</option>
                                                            <option value="5">Friday</option>
                                                            <option value="6">Saturday</option>
                                                            <option value="7">Sunday</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeSchedule">Close</button>
                                            <button type="button" class="btn btn-primary" id="saveSchedule">Save Schedule</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    // Open the modal when the button is clicked
                                    $("#openModal").click(function() {
                                        $("#classModals").modal('show');
                                    });


                                    $("#saveSchedule").click(function() {
                                        // Function to generate a random color

                                        // Retrieve the entered class start and end times
                                        var classStartTime = $("#classStart").val();
                                        var classEndTime = $("#classEnd").val();
                                        var classLate = $("#classLate").val();
                                        var classAbsent = $("#classAbsent").val();
                                        var classroomID = $("#classIDni").val();
                                        var sectionIDs = $("#sectionIDni").val();
                                        var classDay = $("#classDay").val();

                                        // Generate a random color


                                        const formData = new FormData();
                                        formData.append("job", "addNewClassSchedule");
                                        formData.append(
                                            "json",
                                            JSON.stringify({
                                                sectionIDs: sectionIDs,
                                                classStartTime: classStartTime,
                                                classEndTime: classEndTime,
                                                classLate: classLate,
                                                classAbsent: classAbsent,
                                                classDay: classDay,

                                            })
                                        );

                                        axios({
                                            url: "./api/api.php",
                                            method: "post",
                                            data: formData,
                                        }).then((response) => {
                                            if (response.data != '0') {
                                                alert("Add Schedule Success");
                                                $("#classModals").modal('hide');
                                            } else {
                                                alert("Add Schedule Failed");
                                            }
                                            // Close the modal
                                        });
                                        // Close the modal
                                        $("#classModals").modal('hide');
                                    });



                                    $("#closeSchedule").click(function() {

                                        // Close the modal
                                        $("#classModals").modal('hide');
                                    });
                                });
                            </script>
                            <!-- modal body -->
                            <div class="modal-body">
                                <!-- <p>Section ID: <span id="modalUserId"></span></p> -->

                                <input type="hidden" class="form-control" id="section_ID">
                                <div class="table-responsive">
                                    <!-- Add this div for responsive table behavior -->
                                    <!-- <input type="text" id="searchInput" placeholder="Search..."> -->
                                    <table id="datatablesInModal" class="table table-bordered table-striped">
                                        <!-- Thead and Tfoot sections remain the same -->
                                        <thead>
                                            <tr>
                                                <th>ID number</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Middle Name</th>
                                                <th>Student Status</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID number</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Middle Name</th>
                                                <th>Student Status</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            </div>


                            <div class="modal-footer">
                                <!-- <button id="export-buttons" class="btn btn-warning">Scan for Attendance</button> -->


                                <!-- <button id="viewattendace" class="btn btn-info" data-toggle="modal" data-target="#viewAttendacel">
                                    View Attendance
                                </button> -->
                                <button id="export-button" class="btn btn-success ">Export to Excel</button>
                                <!-- <button type="button" class="btn btn-primary add-student-btn" data-toggle="modal" data-target="#addStudentModal">
                                    Add Student
                                </button> -->
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    const viewattendace = document.getElementById("viewattendace");
                    viewattendace.addEventListener("click", () => {
                        var classIDni = document.getElementById("classIDni").value;
                        var sectionIDni = document.getElementById("sectionIDni").value;
                        console.log("classIDni", classIDni);
                        console.log("sectionIDni", sectionIDni);
                        const formData = new FormData();
                        formData.append("job", "viewAttendance");
                        formData.append(
                            "json",
                            JSON.stringify({
                                classIDni: classIDni,
                                sectionIDni: sectionIDni,
                            })
                        );
                        axios({
                            url: "./api/api.php",
                            method: "post",
                            data: formData,
                        }).then((response) => {
                            console.log(response.data);
                            if (response.data != "0") {
                                const studentInformation = response.data;
                                const tableBody = $("#attendaceTable");
                                tableBody.empty();

                                // Extract unique attendance dates from the response
                                const uniqueDates = [...new Set(studentInformation.map(user => user.attendance_date))];

                                // Clear existing rows
                                const headerRow = $("<tr>");
                                headerRow.append("<th style='text-align:center'>Student Name</th>");

                                // Dynamically generate header columns based on unique dates
                                uniqueDates.forEach((date) => {
                                    headerRow.append(`<th style='text-align:center'>DATE: ${date}</th>`);
                                });

                                // Add "Present," "Absent," "Late" columns
                                headerRow.append("<th style='text-align:center'>Total Present</th>");
                                headerRow.append("<th style='text-align:center'>Total Absent</th>");
                                headerRow.append("<th style='text-align:center'>Total Late</th>");

                                // Add the header row to the thead
                                const thead = $("<thead>").append(headerRow);

                                tableBody.append(thead);

                                studentInformation.forEach((user) => {
                                    const totalPresent = uniqueDates.filter(date => user.attendance_status == 1).length;
                                    const totalAbsent = uniqueDates.filter(date => user.attendance_status == 3).length;
                                    const totalLate = uniqueDates.filter(date => user.attendance_status == 2).length;

                                    const row = `
                    <tr style="text-align:center">
                        <td>${user.lastname}, ${user.firstname} ${user.middlename}.</td>
                        ${uniqueDates.map(date => `
                            <td>
                                ${user.attendance_status == 1 ? "present" : user.attendance_status == 2 ? "late" :  "absent"}
                            </td>
                        `).join('')}
                        <td>${totalPresent}</td>
                        <td>${totalAbsent}</td>
                        <td>${totalLate}</td>
                    </tr>
                `;
                                    tableBody.append(row);
                                });
                            } else {
                                const noDataMessage = `
                <tr>
                    <td colspan="${response.data.length + 4}">No data available</td>
                </tr>
            `;
                                tableBody.empty();
                                tableBody.append(noDataMessage);
                            }
                        });
                    });
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
                <!-- Your modal with the id "viewAttendacel" -->
                <div class="modal fade" id="viewAttendacel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog custom-modal-dialog" role="document">
                        <div class="modal-content custom-modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">View Attendance</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <input type="hidden" class="form-control" id="classIDnii">
                                <input type="hidden" class="form-control" id="sectionIDnii">
                            </div>
                            <div class="modal-body">
                                <!-- Table for displaying attendance information -->
                                <table class="table table-bordered table-striped" id="attendaceTable">
                                    <!-- Your table content here -->
                                </table>
                            </div>
                            <!-- Modify the modal-footer section -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" onclick="exportToExcel()">Export to Excel</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                <script>
                    function exportToExcel() {
                        const table = document.getElementById("attendaceTable");
                        const sheet = XLSX.utils.table_to_sheet(table);
                        const wb = XLSX.utils.book_new();
                        XLSX.utils.book_append_sheet(wb, sheet, "Attendance Report");

                        // Generate a unique filename for the Excel file
                        const date = new Date().toLocaleDateString().replace(/\//g, "-");
                        const filename = `AttendanceReport_${date}.xlsx`;

                        // Save the Excel file
                        XLSX.writeFile(wb, filename);
                    }
                </script>
                <style>
                    /* Custom styles for enlarging the modal both in height and width */
                    .custom-modal-dialog {
                        width: 90%;
                        /* Adjust as needed */
                        max-width: none;
                        /* Allow the modal to expand beyond its default max-width */
                    }

                    .custom-modal-content {
                        height: 80vh;
                        /* Adjust the height as needed */
                        max-height: none;
                        /* Allow the modal to expand beyond its default max-height */
                    }
                </style>

                <!-- Bootstrap Modal -->
                <div class="modal fade" id="qr-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 680px;"> <!-- Set a custom max-width value -->
                        <div class="modal-content">
                            <input type="hidden" class="form-control" id="classIDni">
                            <input type="hidden" class="form-control" id="sectionIDni">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">QR Code Scanner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <video id="camera-feed" autoplay></video>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Your custom JavaScript -->
                <script src="https://cdn.jsdelivr.net/npm/jsqr@1.0.0/dist/jsQR.min.js"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const exportButton = document.getElementById("export-buttons");
                        const modal = new bootstrap.Modal(document.getElementById("qr-modal"));
                        const video = document.getElementById("camera-feed");

                        exportButton.addEventListener("click", () => {
                            // Check for camera access
                            navigator.mediaDevices
                                .getUserMedia({
                                    video: {
                                        facingMode: "environment"
                                    }
                                })
                                .then(function(stream) {
                                    video.srcObject = stream;
                                    video.play();

                                    // Show the Bootstrap modal
                                    modal.show();

                                    // Set up the QR code scanner using jsQR
                                    const canvas = document.createElement("canvas");
                                    const context = canvas.getContext("2d");

                                    video.addEventListener("loadedmetadata", function() {
                                        canvas.width = video.videoWidth;
                                        canvas.height = video.videoHeight;

                                        const scanQRCode = () => {
                                            context.drawImage(video, 0, 0, canvas.width, canvas.height);
                                            const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                                            const code = jsQR(imageData.data, canvas.width, canvas.height);

                                            if (code) {
                                                var classIDni = document.getElementById("classIDni").value;
                                                var sectionIDni = document.getElementById("sectionIDni").value;

                                                console.log("QR Code Value:", code.data);
                                                console.log("classIDni", classIDni);
                                                console.log("sectionIDni", sectionIDni);
                                                if (code.data && classIDni && sectionIDni) {
                                                    // All three variables have values
                                                    console.log("All variables have values.");
                                                    const formData = new FormData();
                                                    formData.append("job", "insertStudentAttendance");
                                                    formData.append(
                                                        "json",
                                                        JSON.stringify({
                                                            userID: code.data,
                                                            classID: classIDni,
                                                            sectionID: sectionIDni,

                                                        })
                                                    );
                                                    axios({
                                                        url: "./api/api.php",
                                                        method: "post",
                                                        data: formData,
                                                    }).then((response) => {
                                                        if (response.data.message === "Student Attendance Added to class.") {
                                                            alert("Student ADD Attendance In Class Success!");

                                                        } else if (response.data.message === "Student Attendance Already Added to class.") {
                                                            alert("Student Already Attendance In Class!");
                                                        }
                                                    }).catch((error) => {
                                                        console.error("Error:", error);
                                                    });
                                                } else {
                                                    // At least one of the variables is undefined or falsy
                                                    console.log("At least one of the variables is undefined or falsy.");

                                                }



                                            }

                                            requestAnimationFrame(scanQRCode);
                                        };

                                        scanQRCode();
                                    });
                                })
                                .catch(function(err) {
                                    console.error("Error accessing the camera:", err);
                                });
                        });

                        // Close the modal when the Bootstrap modal close button is clicked
                        modal._element.addEventListener("hidden.bs.modal", function() {
                            video.srcObject.getTracks()[0].stop(); // Stop the camera feed
                        });
                    });
                </script>




                <!-- export to excell -->
                <script>
                    document.getElementById("export-button").addEventListener("click", function() {
                        const table = document.getElementById("data-table");
                        const rows = table.querySelectorAll("tr");

                        let csvContent = "data:text/csv;charset=utf-8,";
                        rows.forEach(function(row) {
                            const rowData = [];
                            row.querySelectorAll("td").forEach(function(cell) {
                                rowData.push(cell.textContent);
                            });
                            csvContent += rowData.join(",") + "\n";
                        });

                        const encodedUri = encodeURI(csvContent);
                        const link = document.createElement("a");
                        link.setAttribute("href", encodedUri);
                        link.setAttribute("download", "StudentList.csv");
                        document.body.appendChild(link); // Required for Firefox
                        link.click();
                        document.body.removeChild(link);
                    });
                </script>
                <!-- view the modal of adding students -->
                <script>
                    $(document).ready(function() {
                        // Using event delegation for dynamically loaded elements
                        $(document).on("click", ".add-student-btn", function() {
                            var inputValue = $("#section_ID").val();

                            $("#classchedID").val(inputValue);
                        });
                    });
                </script>
                <!-- Add Student Modal -->
                <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Table for displaying student information -->
                                <input type="hidden" class="form-control" id="classchedID">
                                <table id="datatablesInModalAdd" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Middle Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // PHP loop for user data
                                        $users = $conn->query("SELECT * FROM `tblusers` WHERE status = 1 ");
                                        $i = 1;
                                        while ($row = $users->fetch()) :
                                        ?>
                                            <tr>
                                                <td><?php echo $row['firstname'] ?></td>
                                                <td><?php echo $row['lastname'] ?></td>
                                                <td><?php echo $row['middlename'] ?></td>
                                                <td>
                                                    <input type="checkbox" class="form-check-input" value="<?php echo $row['user_id'] ?>" id="singleCheckbox">
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Middle Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>

                                </table>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-primary " id="saveClassBtn">Add Students to Class</button> -->
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        // Initialize DataTables for the main table


                        // Initialize DataTables for the modal table
                        $('#datatablesInModalAdd').DataTable();
                    });
                    // Change event listener for checkboxes
                    function handleCheckboxChange(checkbox) {
                        if (checkbox.checked) {
                            var classIDs = $("#classchedID").val();
                            console.log(classIDs);
                            console.log("Checked: " + checkbox.value);
                            const formData = new FormData();
                            formData.append("job", "studentAddToClass");
                            formData.append(
                                "json",
                                JSON.stringify({
                                    classID: classIDs,
                                    studentID: checkbox.value
                                })
                            );

                            axios({
                                url: "./api/api.php",
                                method: "post",
                                data: formData,
                            }).then((response) => {
                                if (response.data.message === "Student already in the class.") {
                                    alert("Student Already Exist In Class!");
                                    checkbox.checked = false;
                                } else if (response.data.message === "Student added to class.") {
                                    alert("Student Added In Class Success!");
                                }
                            }).catch((error) => {
                                console.error("Error:", error);
                            });

                        } else {
                            console.log("Unchecked: " + checkbox.value);
                        }
                    }

                    $(document).ready(function() {
                        $('.form-check-input').change(function() {
                            handleCheckboxChange(this);
                        });

                        $('#saveClassBtn').click(function() {
                            const selectedUserIds = $('.form-check-input:checked').map(function() {
                                return this.value;
                            }).get();
                            console.log("Selected User IDs: ", selectedUserIds);
                        });
                    });
                </script>


            </main>
            <footer class="footer-admin mt-auto footer-light">
                <div class="container-xl px-4">
                    <div class="row">
                        <!-- <div class="col-md-6 small">Copyright © Your Website 2021</div> -->
                        <div class="col-md-6 text-md-end small">
                            <a href="tables.html#!">Privacy Policy</a>
                            ·
                            <a href="tables.html#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables/datatables-simple-demo.js"></script>

    <script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script>
    <!-- <sb-customizer project="sb-admin-pro"></sb-customizer> -->
    <script>
        (function() {
            var js =
                "window['__CF$cv$params']={r:'750b4c0328bd073a',m:'.HiyQhu917PceUTU7o6cB47JuH7V.gSJ51PDRzeeJ38-1664187940-0-AeVWbTj/6lylimTmYFfhoGHbSD0nGiDc7AO1s5qeWgLFLRwMjVgrLlfXI/e2OQkjqtr4uccOiF5srcP183thoI4HZFz9YMc98CY1fovMTGTziOaBCQE8DCoDu6hEjKMfkg==',s:[0xdf5eafb168,0xade158f463],u:'/cdn-cgi/challenge-platform/h/g'};var now=Date.now()/1000,offset=14400,ts=''+(Math.floor(now)-Math.floor(now%offset)),_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='/cdn-cgi/challenge-platform/h/g/scripts/alpha/invisible.js?ts='+ts,document.getElementsByTagName('head')[0].appendChild(_cpo);";
            var _0xh = document.createElement('iframe');
            _0xh.height = 1;
            _0xh.width = 1;
            _0xh.style.position = 'absolute';
            _0xh.style.top = 0;
            _0xh.style.left = 0;
            _0xh.style.border = 'none';
            _0xh.style.visibility = 'hidden';
            document.body.appendChild(_0xh);

            function handler() {
                var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
                if (_0xi) {
                    var _0xj = _0xi.createElement('script');
                    _0xj.nonce = '';
                    _0xj.innerHTML = js;
                    _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
                }
            }
            if (document.readyState !== 'loading') {
                handler();
            } else if (window.addEventListener) {
                document.addEventListener('DOMContentLoaded', handler);
            } else {
                var prev = document.onreadystatechange || function() {};
                document.onreadystatechange = function(e) {
                    prev(e);
                    if (document.readyState !== 'loading') {
                        document.onreadystatechange = prev;
                        handler();
                    }
                };
            }
        })();
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"750b4c0328bd073a","token":"6e2c2575ac8f44ed824cef7899ba8463","version":"2022.8.1","si":100}' crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</body>

</html>