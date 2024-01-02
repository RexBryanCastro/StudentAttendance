<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

class capstone
{
    function getDocuments()
    {
        include 'connection.php';

        $sql = 'SELECT * FROM tbldocuments ORDER BY doc_name';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function getStudDetails($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql = ' SELECT * FROM tblstudents WHERE student_schoolID = :studsID ';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':studsID', $decoded_json['studsID']);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function addInstructor($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'INSERT INTO `tblusers`(`user_name`, `user_pass`, `status`, `firstname`, `lastname`, `middlename`) VALUES (:firstname,:lastname ,2,:firstname , :lastname , :middlename)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstname', $decoded_json['firstname']);
        $stmt->bindParam(':lastname', $decoded_json['lastname']);
        $stmt->bindParam(':middlename', $decoded_json['middlename']);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function deleteInstructor($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql = 'DELETE FROM `tblusers` WHERE user_id = :instructorID';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':instructorID', $decoded_json['instructorID']);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function viewInstructor($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'SELECT `user_id`, `user_name`, `user_pass`, `status`, `user_class`, `firstname`, `lastname`, `middlename` FROM `tblusers` WHERE user_id =  :instructorIDs';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':instructorIDs', $decoded_json['instructorIDs']);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function updateInstructor($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'UPDATE `tblusers` SET firstname=:firstname, lastname=:lastname, middlename=:middlename WHERE user_id = :insID';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':insID', $decoded_json['insID']);
        $stmt->bindParam(':firstname', $decoded_json['firstname']);
        $stmt->bindParam(':lastname', $decoded_json['lastname']);
        $stmt->bindParam(':middlename', $decoded_json['middlename']);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function addStudent($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'INSERT INTO `tblusers`( `status`, `idnumber`, `firstname`, `lastname`, `middlename`, `extension`, `gender`, `birthdate`, `address`) VALUES (1 , :schoolID , :firstname , :lastname , :middlename ,:extension , :gender , :birthdate , :address)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':schoolID', $decoded_json['schoolID']);
        $stmt->bindParam(':firstname', $decoded_json['firstname']);
        $stmt->bindParam(':lastname', $decoded_json['lastname']);
        $stmt->bindParam(':middlename', $decoded_json['middlename']);
        $stmt->bindParam(':extension', $decoded_json['extension']);
        $stmt->bindParam(':gender', $decoded_json['gender']);
        $stmt->bindParam(':birthdate', $decoded_json['birthdate']);
        $stmt->bindParam(':address', $decoded_json['address']);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function deleteStudent($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql = 'DELETE FROM `tblusers` WHERE user_id = :studentID';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':studentID', $decoded_json['studentID']);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function viewStudent($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql = 'SELECT * FROM `tblusers` WHERE user_id =  :studentIDs';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':studentIDs', $decoded_json['studentIDs']);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function updateStudent($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'UPDATE `tblusers` SET firstname=:firstname, lastname=:lastname, middlename=:middlename ,`extension`= :extension ,`gender`=:gender ,`birthdate`=:birthdate ,`address`=:address  WHERE user_id = :studID';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':studID', $decoded_json['studID']);
        $stmt->bindParam(':firstname', $decoded_json['firstname']);
        $stmt->bindParam(':lastname', $decoded_json['lastname']);
        $stmt->bindParam(':middlename', $decoded_json['middlename']);
        $stmt->bindParam(':extension', $decoded_json['extension']);
        $stmt->bindParam(':gender', $decoded_json['gender']);
        $stmt->bindParam(':birthdate', $decoded_json['birthdate']);
        $stmt->bindParam(':address', $decoded_json['address']);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function addSchedule($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'INSERT INTO `tblclasses`(`class_code`, `class_name`) VALUES (:classcode,:classname)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':classcode', $decoded_json['classcode']);
        $stmt->bindParam(':classname', $decoded_json['classname']);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function deleteSchedule($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql = 'DELETE FROM `tblclasses` WHERE class_id = :schedID';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':schedID', $decoded_json['schedID']);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function viewSchedule($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql = 'SELECT * FROM `tblclasses` WHERE class_id = :schedIDs';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':schedIDs', $decoded_json['schedIDs']);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function updateSchedule($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'UPDATE `tblclasses` SET class_code=:iclasscode, class_name=:iclassname WHERE class_id = :scheID';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':scheID', $decoded_json['scheID']);
        $stmt->bindParam(':iclasscode', $decoded_json['iclasscode']);
        $stmt->bindParam(':iclassname', $decoded_json['iclassname']);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function viewStudentInClass($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'SELECT * FROM `tblsection` a INNER JOIN tblclasses b ON a.section_class = b.class_id INNER JOIN tblstudents c ON a.section_id = c.student_section INNER JOIN tblusers d ON c.student_section = a.section_id AND c.student_user = d.user_id WHERE a.section_id =  :sectionID ';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':sectionID', $decoded_json['sectionID']);
        // $stmt->bindParam(':classID', $decoded_json['classID']);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function addClass($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'INSERT INTO `tblsection` ( `section_class`, `section_name`, `section_late`, `section_absent`, section_start , section_end , section_date , section_user , section_color) VALUES (:classID, :sectionName, :lateTime, :absentTime, :startTime, :endTime , :dayTime, :userID , :color)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':classID', $decoded_json['classID']);
        $stmt->bindParam(':sectionName', $decoded_json['sectionName']);
        $stmt->bindParam(':lateTime', $decoded_json['lateTime']);
        $stmt->bindParam(':absentTime', $decoded_json['absentTime']);
        $stmt->bindParam(':startTime', $decoded_json['startTime']);
        $stmt->bindParam(':endTime', $decoded_json['endTime']);
        $stmt->bindParam(':dayTime', $decoded_json['dayTime']);
        $stmt->bindParam(':userID', $decoded_json['userID']);
        $stmt->bindParam(':color', $decoded_json['color']);
        $stmt->execute();

        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function studentAddToClass($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'SELECT * FROM `tblstudents` WHERE student_user = :classID AND student_section = :studentID';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':classID', $decoded_json['classID']);
        $stmt->bindParam(':studentID', $decoded_json['studentID']);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) === 0) {
            $insertSql =
                'INSERT INTO `tblstudents`(`student_user`, `student_section`) VALUES (:studentID, :classID )';
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bindParam(':classID', $decoded_json['classID']);
            $insertStmt->bindParam(':studentID', $decoded_json['studentID']);
            $insertStmt->execute();

            return json_encode(['message' => 'Student added to class.']);
        } else {
            return json_encode(['message' => 'Student already in the class.']);
        }
    }
    function studentChangeStatus($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'UPDATE `tblstudents` SET `student_status`=:selectedOptionValue WHERE student_user = :userID';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(
            ':selectedOptionValue',
            $decoded_json['selectedOptionValue']
        );
        $stmt->bindParam(':userID', $decoded_json['userID']);
        $stmt->execute();

        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function adminCancelDrop($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'UPDATE `tblstudents` SET `student_status`= 1  WHERE student_id = :studentID ';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':studentID', $decoded_json['studentID']);
        $stmt->execute();

        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function adminConfirmDropStudent($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql = 'DELETE FROM `tblstudents` WHERE student_id = :studentID ';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':studentID', $decoded_json['studentID']);
        $stmt->execute();

        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function viewStudentProfile($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql = 'SELECT * FROM `tblusers` WHERE user_id = :studentID ';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':studentID', $decoded_json['studentID']);
        $stmt->execute();

        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function updateStudentInformation($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql = 'UPDATE `tblusers` SET `user_name`=:inputUsername,`user_pass`=:inputPassword
       ,`firstname`=:inputFirstName,`lastname`=:inputLastName,`middlename`=:inputMiddlename WHERE user_id = :studentID';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':studentID', $decoded_json['studentID']);
        $stmt->bindParam(':inputUsername', $decoded_json['inputUsername']);
        $stmt->bindParam(':inputPassword', $decoded_json['inputPassword']);
        $stmt->bindParam(':inputFirstName', $decoded_json['inputFirstName']);
        $stmt->bindParam(':inputLastName', $decoded_json['inputLastName']);
        $stmt->bindParam(':inputMiddlename', $decoded_json['inputMiddlename']);

        $stmt->execute();

        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function insertStudentAttendance($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);
        $currentDate = date('Y-m-d'); // Change the format as needed

        $sql =
            'SELECT * FROM `tblattendance` WHERE attendance_student = :userID AND attendance_section = :sectionID AND attendance_class = :classID AND attendance_date = :date ';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userID', $decoded_json['userID']);
        $stmt->bindParam(':classID', $decoded_json['classID']);
        $stmt->bindParam(':sectionID', $decoded_json['sectionID']);
        $stmt->bindParam(':date', $currentDate);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) === 0) {
            $insertSql =
                'INSERT INTO `tblattendance`(`attendance_student`, `attendance_section`, `attendance_class`, `attendance_date`, `attendance_status`) VALUES (:userID, :sectionID, :classID, :date, 1)';
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bindParam(':userID', $decoded_json['userID']);
            $insertStmt->bindParam(':classID', $decoded_json['classID']);
            $insertStmt->bindParam(':sectionID', $decoded_json['sectionID']);
            $insertStmt->bindParam(':date', $currentDate);
            $insertStmt->execute();
            return json_encode([
                'message' => 'Student Attendance Added to class.',
            ]);
        } else {
            return json_encode([
                'message' => 'Student Attendance Already Added to class.',
            ]);
        }
    }
    function viewAttendance($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'SELECT * FROM `tblattendance` a INNER JOIN tblsection b ON  a.attendance_section = b.section_id INNER JOIN tblclasses  c ON a.attendance_class = c.class_id INNER JOIN tblusers d ON a.attendance_student = d.user_id  WHERE a.attendance_section = :sectionIDni AND a.attendance_class = :classIDni';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':classIDni', $decoded_json['classIDni']);
        $stmt->bindParam(':sectionIDni', $decoded_json['sectionIDni']);
        $stmt->execute();

        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function getSection($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'SELECT * FROM `tblsection` WHERE section_user = :user_id ';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $decoded_json['user_id']);

        $stmt->execute();

        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function getStudentAttendance($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        $sql =
            'SELECT * FROM `tblattendance` a INNER JOIN tblsection b ON a.attendance_section = b.section_id INNER JOIN tblclasses c ON a.attendance_class = c.class_id INNER JOIN tblusers d ON a.attendance_student = d.user_id WHERE a.attendance_section = :selectSection AND a.attendance_date = :datevalue';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':datevalue', $decoded_json['datevalue']);
        $stmt->bindParam(':selectSection', $decoded_json['selectSection']);

        $stmt->execute();

        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    function addNewClassSchedule($json)
    {
        include 'connection.php';

        $decoded_json = json_decode($json, true);

        // Retrieve data from 'tblsection' based on 'sectionIDs'.
        $sectionIDs = $decoded_json['sectionIDs'];
        $classStartTime = $decoded_json['classStartTime'];
        $classEndTime = $decoded_json['classEndTime'];
        $classLate = $decoded_json['classLate'];
        $classAbsent = $decoded_json['classAbsent'];
        $classDay = $decoded_json['classDay'];
   
        $sql = 'SELECT * FROM `tblsection` WHERE section_id = :sectionID';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':sectionID', $sectionIDs);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch instead of fetchAll since we expect one row.

        if ($result) {
            // Assuming 'section_class' is a column in 'tblsection'.
            $section_class = $result["section_class"];
            $section_name = $result["section_name"];
            $section_user = $result["section_user"];
            $section_color = $result["section_color"];

            // Insert data into 'tblattendance'.
            $insertSql = 'INSERT INTO `tblsection`(`section_class`, `section_name`, `section_start`, `section_end`, `section_late`, `section_absent`, `section_date`, `section_user` , `section_color`) VALUES (:section_class , :section_name , :classStartTime , :classEndTime , :classLate , :classAbsent , :classDay , :section_user , :section_color)';
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bindParam(':section_class', $section_class);
            $insertStmt->bindParam(':section_name', $section_name);
            $insertStmt->bindParam(':classStartTime', $classStartTime);
            $insertStmt->bindParam(':classEndTime', $classEndTime);
            $insertStmt->bindParam(':classLate', $classLate);
            $insertStmt->bindParam(':classAbsent', $classAbsent);
            $insertStmt->bindParam(':classDay', $classDay);
            $insertStmt->bindParam(':section_user', $section_user);
            $insertStmt->bindParam(':section_color', $section_color);
            $insertStmt->execute();
            return json_encode($insertStmt->fetchAll(PDO::FETCH_ASSOC));
        }
    }
}

$job = $_POST['job'];
$json = isset($_POST['json']) ? $_POST['json'] : '';

$capstone = new capstone();
switch ($job) {
    case 'getDocument':
        echo $capstone->getDocuments();
        break;
    case 'getStudDetails':
        echo $capstone->getStudDetails($json);
        break;
    case 'addInstructor':
        echo $capstone->addInstructor($json);
        break;
    case 'deleteInstructor':
        echo $capstone->deleteInstructor($json);
        break;
    case 'viewInstructor':
        echo $capstone->viewInstructor($json);
        break;
    case 'updateInstructor':
        echo $capstone->updateInstructor($json);
        break;
    case 'addStudent':
        echo $capstone->addStudent($json);
        break;
    case 'deleteStudent':
        echo $capstone->deleteStudent($json);
        break;
    case 'viewStudent':
        echo $capstone->viewStudent($json);
        break;
    case 'updateStudent':
        echo $capstone->updateStudent($json);
        break;
    case 'addSchedule':
        echo $capstone->addSchedule($json);
        break;
    case 'deleteSchedule':
        echo $capstone->deleteSchedule($json);
        break;
    case 'viewSchedule':
        echo $capstone->viewSchedule($json);
        break;
    case 'updateSchedule':
        echo $capstone->updateSchedule($json);
        break;
    case 'viewStudentInClass':
        echo $capstone->viewStudentInClass($json);
        break;
    case 'addClass':
        echo $capstone->addClass($json);
        break;
    case 'studentAddToClass':
        echo $capstone->studentAddToClass($json);
        break;
    case 'studentChangeStatus':
        echo $capstone->studentChangeStatus($json);
        break;
    case 'adminCancelDrop':
        echo $capstone->adminCancelDrop($json);
        break;
    case 'adminConfirmDropStudent':
        echo $capstone->adminConfirmDropStudent($json);
        break;
    case 'viewStudentProfile':
        echo $capstone->viewStudentProfile($json);
        break;
    case 'updateStudentInformation':
        echo $capstone->updateStudentInformation($json);
        break;
    case 'insertStudentAttendance':
        echo $capstone->insertStudentAttendance($json);
        break;
    case 'viewAttendance':
        echo $capstone->viewAttendance($json);
        break;
    case 'getSection':
        echo $capstone->getSection($json);
        break;
    case 'getStudentAttendance':
        echo $capstone->getStudentAttendance($json);
        break;
    case 'addNewClassSchedule':
        echo $capstone->addNewClassSchedule($json);
        break;
}
