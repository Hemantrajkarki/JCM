<?php
require_once 'connection.php';

function login()
{
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}

function admin()
{
    global $con;
    $stmt = $con->prepare("SELECT * FROM user_roles WHERE id = ?");
    $stmt->bind_param('i', $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return false;
    }

    $role = $result->fetch_array(MYSQLI_ASSOC);
    if ($role['user_roles'] == 'admin') {
        return true;
    } else {
        return false;
    }
}


function total_users()
{
    global $con;
    $stmt = $con->prepare("SELECT COUNT(*) AS count FROM users");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return 0;
    }

    return $result->fetch_array(MYSQLI_ASSOC)['count'];
}
function total_jobs()
{
    global $con;
    $stmt = $con->prepare("SELECT COUNT(*) AS count FROM jobs");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return 0;
    }

    return $result->fetch_array(MYSQLI_ASSOC)['count'];
}
function total_applications()
{
    global $con;
    $stmt = $con->prepare("SELECT COUNT(*) AS count FROM applications");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return 0;
    }

    return $result->fetch_array(MYSQLI_ASSOC)['count'];
}
function get_job_title_by_id($id)
{
    global $con;
    $stmt = $con->prepare("SELECT job_title FROM jobs WHERE job_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return 0;
    }

    return $result->fetch_array(MYSQLI_ASSOC)['job_title'];
}
function get_all_jobs()
{
    global $con;
    $stmt = $con->prepare("SELECT * FROM jobs");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return false;
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}
function get_all_users()
{
    global $con;
    $stmt = $con->prepare("SELECT * FROM users");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return false;
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}
function get_all_applications()
{
    global $con;
    $stmt = $con->prepare("SELECT * FROM applications");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return false;
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}
function get_applications_profile()
{
    global $con;
    $stmt = $con->prepare("SELECT * FROM applications WHERE user_id = ?");
    $stmt->bind_param('i', $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return false;
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}


function add_job($job_title, $job_description, $job_image)
{
    global $con;


    $pname = rand(1000, 10000) . '-' . $job_image['name'];
    $tname = $job_image['tmp_name'];
    $upload_dir =  '../images/';

    $path = 'images/' . $pname;

    move_uploaded_file($tname, $upload_dir . $pname);

    $stmt = $con->prepare("INSERT INTO jobs( job_title, job_image, job_description) VALUES (?,?,?)");
    $stmt->bind_param('sss', $job_title, $path, $job_description);

    if ($stmt->execute()) {
        echo "<script>alert('Job added successfully')</script>";
    } else {
        echo "<script>alert('There is an error while adding job')</script>";
    }
}
function delete_job($id)
{
    global $con;

    $stmt = $con->prepare("DELETE FROM `jobs` WHERE job_id = ?");
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "<script>alert('Job deleted successfully')</script>";
    } else {
        echo "<script>alert('There is an error while deleting job')</script>";
    }
}

function approve_application($id)
{
    global $con;

    $status = 'Accepted';

    $stmt = $con->prepare("UPDATE applications SET status = ? WHERE id = ?");
    $stmt->bind_param('si', $status, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Application Approved Successfully')</script>";
    } else {
        echo "<script>alert('There is an error while Approving application')</script>";
    }
}
function reject_application($id)
{
    global $con;

    $status = 'Rejected';

    $stmt = $con->prepare("UPDATE applications SET status = ? WHERE id = ?");
    $stmt->bind_param('si', $status, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Application Rejected Successfully')</script>";
    } else {
        echo "<script>alert('There is an error while Rejecting application')</script>";
    }
}
