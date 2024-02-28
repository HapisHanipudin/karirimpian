<?php
header('Content-Type: application/json');

$server = "localhost";
$user = "root";
$password = "";
$database = "karirimpian";

$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    http_response_code(500); // Internal Server Error
    echo json_encode(["error" => "Connection Failed"]);
    exit;
}




if (isset($_GET["lokerid"])) {
                $lokerId = $_GET["lokerid"];
                $sql = "SELECT l.*, c.* FROM loker l 
                JOIN company c ON l.company = c.user_id 
                WHERE l.id = '$lokerId'";
        $result = mysqli_query($conn, $sql);
    
    $data = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data = [
                "id" => $row['id'],
                "company" => $row['companyname'],
                "company_id" => $row['company'],
                "logo" => $row['profile_img'],
                "nama" => $row['name'],
                "desc" => $row['short_desc'],
                "detail" => $row['detail'],
            ];
        }
        echo json_encode($data);
    } else {
        http_response_code(404); // Not Found
        echo json_encode(["error" => "Data not found."]);
    }
} else {
if (isset($_GET['lokersrch']) || isset($_GET['filter'])) {
    $sql = "SELECT l.*, c.* FROM loker l 
            JOIN company c ON l.company = c.user_id 
            WHERE 1";  // Always true condition to start the WHERE clause

    if (isset($_GET['lokersrch']) && !empty($_GET['lokersrch'])) {
        $search = $_GET['lokersrch'];
        $sql .= " AND l.name LIKE '%" . $search . "%' OR l.short_desc LIKE '%" . $search . "%' OR l.detail LIKE '%" . $search . "%' OR c.companyname LIKE '%" . $search . "%' "; 
    }       
    
    if (isset($_GET['filter']) && !empty($_GET['filter'])) {
        $filter = $_GET['filter'];
        $sql .= " AND l.company = '$filter'";
    }

    $result = mysqli_query($conn, $sql);

    $data = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = [
                "id" => $row['id'],
                "company" => $row['companyname'],
                "company_id" => $row['company'],
                "logo" => $row['profile_img'],
                "nama" => $row['name'],
                "desc" => $row['short_desc'],
                "detail" => $row['detail'],
            ];
        }
        echo json_encode($data);
    } else {
        http_response_code(404); // Not Found
        echo json_encode(["error" => "Data not found."]);
    }
} else {
    $sql = "SELECT l.*, c.* FROM loker l JOIN company c ON l.company = c.user_id";

    $result = mysqli_query($conn, $sql);

    $data = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = [
                "id" => $row['id'],
                "company" => $row['companyname'],
                "company_id" => $row['company'],
                "logo" => $row['profile_img'],
                "nama" => $row['name'],
                "desc" => $row['short_desc'],
                "detail" => $row['detail'],
            ];
        }
        echo json_encode($data);
    } else {
        http_response_code(404); // Not Found
        echo json_encode(["error" => "Data not found."]);
    }
}
}
mysqli_close($conn);
?>
