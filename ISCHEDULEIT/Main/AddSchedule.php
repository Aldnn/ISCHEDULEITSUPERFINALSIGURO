<?php include "dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content ="width=device-width, initial-scale=1.0">
     <title> Add Schedule</title>
     <link rel="stylesheet" href="style.css">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     </head>
    </head>
  <body>

  <div class="wrapper">
<div class="AddSchedule">

    <form action="submit_form.php" method="post">
        <select id="select-Subject" name="subject_description">
            <option value="">Select Subject</option>
            <?php include_once "GetSubject.php"; echo $options ?>
        </select>

        <select id="select-Teacher" name="teacher">
            <option value="">Select Teacher</option>
            <option value="">TBA</option>
            <?php include_once "GetTeacher.php"; echo $options ?>
        </select>

        <div id="select-Day" name="day">
            <label><input type="checkbox" name="day[]" value="M"> Monday</label>
            <label><input type="checkbox" name="day[]" value="T"> Tuesday</label>
            <label><input type="checkbox" name="day[]" value="W"> Wednesday</label>
            <label><input type="checkbox" name="day[]" value="TH"> Thursday</label>
            <label><input type="checkbox" name="day[]" value="F"> Friday</label>
            <label><input type="checkbox" name="day[]" value="Sat"> Saturday</label>
        </div>

        <select id="select-Room" name="room">
            <option value="">Select Room</option>
            <?php include_once "GetRoom.php"; echo $options ?>
        </select>

        <div class="timeStart">
            <input autocomplete="off" required="" type="time" name="start_time" id="start_time">
            <label for="Time">Time from</label>
        </div>

        <div class="timeEnd">
            <input autocomplete="off" required="" type="time" name="end_time" id="end_time">
            <label for="Time">Time to</label>
        </div>

        <div class="inputGroup3">
            <input autocomplete="off" required="" type="text" name="course">
            <label for="Course">Course</label>
        </div>

        <select id="select-department" name="department" required>
            <option value="">Select Department</option>
            <option value="CET">CET</option>
            <option value="CASE">CASE</option>
            <option value="CHTM">CHTM</option>
            <option value="CBMA">CBMA</option>
            <option value="Law">Law</option>
            <option value="Marine">Marine</option>
            <option value="Crim">Criminology</option>
        </select>

        <div class="button-submit">
            <button type="submit">SUBMIT</button>
        </div>
    </form>
</div>
</div>

<div class="button-back">
<button type="button" onclick="window.location.href='Schedule.php'">BACK</button>
</div>

</div>
  </body>
<script> 

new MultiSelectTag('select-Day')
</script>

  <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
      *{
        font-family: "Montserrat", sans-serif;
      }
      body {
              background-image: url("cpc4.jpg");
              background-repeat: no-repeat;
              background-attachment: fixed;
              background-size: cover;
              
          }
          .wrapper{
          border-radius: 50px;
          background-color:#fff;
          height: 900px;
          width: 700px;
          margin-top: 150px;
          margin-left: 500px;
          display: flex;
          justify-content: center;
          align-items: center;
      }
      .btn {
  background-color: #4CAF50;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.btn:hover {
  background-color: #3e8e41;
}

#select-Subject,
#select-Teacher,
#select-Room,
#select-department {
    position: relative; 
    width: 200px;
    padding: 10px;
    border: 2px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    margin: 10px 0;
}


#select-Day {
    position: relative; 
    border: 1px solid #ccc;
    padding: 10px;
    width: 100%; 
    height: auto; 
    overflow-y: auto;
    margin: 10px 0; 
}


#select-Day label {
    display: block;
    margin-bottom: 10px;
}

.timeStart,
.timeEnd,
.inputGroup3 {
    font-family: 'Montserrat', sans-serif;
    margin: 1em 0;
    max-width: 200px;
    position: relative; 
}

.timeStart input,
.timeEnd input,
.inputGroup3 input {
    font-size: 100%;
    padding: 0.8em;
    outline: none;
    border: 2px solid rgb(200, 200, 200);
    background-color: transparent;
    width: 100%;
}

.button-submit button {
    margin-left: 100px;
    margin-top: 50px;
    display: flex;
    padding: 1.4em 4.5em;
    font-size: 12px;
    width: 15em;
    text-transform: uppercase;
    letter-spacing: 3.5px;
    font-weight: 500;
    color: #fff;
    background-color: #0652b5c6;
    border: none;
    border-radius: 25px;
    transition: all 0.3s ease 0s;
    cursor: pointer;
    outline: none;
}

.button-back button {
    display: flex;
    font-size: 20px;
    text-transform: uppercase;
    width: 65px;
    color: #fff;
    background-color: #670d04c6;
    border: none;
    border-radius: 13%;
    transition: all 0.3s ease 0s;
    cursor: pointer;
    outline: none;
    margin: 20px 0;
    margin-left: 520px; 
    margin-top:-880px;
}

@media (max-width: 768px) {

.wrapper {
    height: auto; 
    width: 90%; 
    margin-left: 5%; 
    margin-top: 50px; 
}


#select-Subject,
#select-Teacher,
#select-Room,
#select-department {
    width: 100%; 
}


.timeStart,
.timeEnd,
.inputGroup3 {
    max-width: 100%; 
}

.button-submit button {
    margin-left: 100; 
    margin-top: 10px; 
    width: 45%; 
}

.button-back button {
    width: 8%; 
    margin-left: 105px;
    font-size: 10px; 
}

}

@media (max-width: 480px) {
.button-submit button {
    padding: 1em 2em; 
}

.button-back button {
    font-size: 14px; 
}

}