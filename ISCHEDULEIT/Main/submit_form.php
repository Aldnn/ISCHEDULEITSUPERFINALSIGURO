<?php
include "dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $department = $_POST['department'] ?? null;
    $subject = trim($_POST['subject_description'] ?? null);
    $teacher = is_array($_POST['teacher']) ? implode(', ', $_POST['teacher']) : $_POST['teacher'];
    $days = $_POST['day'] ?? [];
    $room = trim($_POST['room'] ?? null);
    $start_time = $_POST['start_time'] ?? null;
    $end_time = $_POST['end_time'] ?? null;
    $course = trim($_POST['course'] ?? null);
    $start_time_12hr = date("h:i A", strtotime($start_time));
    $end_time_12hr = date("h:i A", strtotime($end_time));
    $time = $start_time_12hr . ' - ' . $end_time_12hr;
    $tableName = match ($department) {
        'CET' => 'cetsched',
        'CASE' => 'casesched',
        'CHTM' => 'chtmsched',
        'CBMA' => 'cbmasched',
        'Law' => 'lawsched',
        'Marine' => 'marinesched',
        'Crim' => 'crimsched',
        default => null,
    };

    if (!$tableName) {
        echo "Invalid department selected.";
        exit;
    }

    $daysString = implode(', ', $days);
    $sql = "SELECT * FROM $tableName WHERE day = ? AND room = ? AND time = ? AND course = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $daysString, $room, $time, $course);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $alertMessage = "Conflict detected:\n";
    
        while ($row = $result->fetch_assoc()) {
    
            $alertMessage .= "Subject: " . htmlspecialchars($row['Subject']) . "\n";
            $alertMessage .= "Teacher: " . htmlspecialchars($row['Teacher']) . "\n";
            $alertMessage .= "Days: " . htmlspecialchars($row['Day']) . "\n";
            $alertMessage .= "Room: " . htmlspecialchars($row['Room']) . "\n";
            $alertMessage .= "Time: " . htmlspecialchars($row['Time']) . "\n";
            $alertMessage .= "Course: " . htmlspecialchars($row['Course']) . "\n\n";
        }
        echo "<script type='text/javascript'>
        alert(" . json_encode($alertMessage) . ");
        window.location.href = 'AddSchedule.php';
      </script>";


        
    }
    } else {
        $insert_sql = "INSERT INTO $tableName (subject, teacher, day, room, time, course) VALUES (?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ssssss", $subject, $teacher, $daysString, $room, $time, $course);
        if ($insert_stmt->execute()) {
            echo '<script>alert("Schedule added successfully."); window.location.href = "Schedule.php";</script>';
        } else {
            echo "<script>alert('Error: " . $insert_stmt->error . "');</script>";
        }
    }

    $stmt->close();
    $conn->close();

?>