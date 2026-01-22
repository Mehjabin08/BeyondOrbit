<?php
 
require_once '../models/AstronautModel.php';
 
$conn = dbConnect();
$userId = $_SESSION['user_id'];
 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'submit_log') {
        $missionId = $_POST['mission_id'];
        $content = $_POST['log_content'];
       
        if (createMissionLog($conn, $missionId, $userId, $content)) {
            header("Location: index.php?action=my_missions&success=Log Transmitted");
        } else {
            header("Location: index.php?action=my_missions&error=Transmission Failed");
        }
        exit();
 
    } elseif ($action === 'request_supply') {
        $missionId = $_POST['mission_id'];
        $item = $_POST['item_name'];
        $qty = $_POST['quantity'];
       
        $success = createSupplyRequest($conn, $missionId, $userId, $item, $qty);
       
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            header('Content-Type: application/json');
            if ($success) {
                echo json_encode(['success' => true, 'data' => [
                    'item_name' => htmlspecialchars($item),
                    'quantity' => $qty,
                    'request_date' => date('Y-m-d H:i:s'),
                    'status' => 'PENDING'
                ]]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Database error']);
            }
            exit();
        }
 
        if ($success) {
            header("Location: index.php?action=request_supply&success=Request Queued");
        } else {
            header("Location: index.php?action=request_supply&error=Request Failed");
        }
        exit();
    }
}
 
 
if ($action === 'astronaut_dashboard') {
    $myMissions = getAssignedMissionsForAstronaut($conn, $userId);
    $myLogs = getLogsByAstronaut($conn, $userId);
    $myRequests = getSupplyRequestsByAstronaut($conn, $userId);
   
    include '../views/astronaut/dashboard.php';
 
} elseif ($action === 'my_missions') {
    $myMissions = getAssignedMissionsForAstronaut($conn, $userId);
    include '../views/astronaut/missions.php';
 
} elseif ($action === 'request_supply') {
    $myMissions = getAssignedMissionsForAstronaut($conn, $userId);
    $myRequests = getSupplyRequestsByAstronaut($conn, $userId);
    include '../views/astronaut/requestSupply.php';
}
?>
