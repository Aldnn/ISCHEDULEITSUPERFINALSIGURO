<?php
 
 include "dbconnect.php";


 $sql = "SELECT Subject_Code, Subject_Description FROM subjectlist";
 $result = $conn->query($sql);

 $options='';

 if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        $options .= '<option value="' . $row["Subject_Description"] . '">' . $row["Subject_Code"] . '</option>';

    }

} else {

    $options = '<option value="">No options available</option>';

}








 ?>
