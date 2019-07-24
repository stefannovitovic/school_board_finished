<?php

include("includes/init.php");
$id=$_GET['student'];

$student = new Student;
$json = "";
$gradeArray = array();
$status = "";
$grades = $student->get_grades($id);
$average = $student->get_average($id);
$result = $student->find_by_id($id);
$max_grade = $student->get_max_grade($id);
while($row = mysqli_fetch_object($grades)){
 array_push($gradeArray, $row->grade_value);
 }

if($result->school_board == "CSM"){
        if($average >= 7.0000){
            $status = "passed";
        }else{
            $status = "failed";
        }
        $data = [
            'first_name' => $result->first_name,
            'last_name'  => $result->last_name,
            'id' => $result->id,
            'grades' => $gradeArray,
            'average' => $average,
            'status' => $status
        ];
    $json = json_encode($data);
 }elseif($result->school_board == "CSMB") {
    include("includes/xml.php");
}

?>

<body>

<?php
  if(!empty($json)){
  $object = json_decode($json);
  echo "<p>First name: " . $object->first_name . "</p>";
  echo "<p>Last name: " . $object->last_name . "</p>";
  echo "<p>Student id: " . $object->id . "</p>";
  echo "<p>Grades: ";
  foreach($object->grades as $grade){
    echo  $grade . " ";

  }
  echo "</p>";
 echo "<p>Status: " . $object->status . " <br> average: " . $object->average;
  }
?>

</body>