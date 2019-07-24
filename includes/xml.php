<?php

if($result->school_board = "CSMB"){
    if($max_grade > 8){
        $status = "passed";
    }else {
        $status = "failed";
    }
    $xml = new DomDocument('1.0');
    $xml->formatOutput = true;
    $student = $xml->createElement("student");
    $student->setAttribute("id", $result->id);
    $xml->appendChild($student);
    $firstName = $xml->createElement("first_name", $result->first_name);
    $student->appendChild($firstName);
    $lastName = $xml->createElement("lastName", $result->last_name);
    $student->appendChild($lastName);
    $studentID = $xml->createElement("studentID", $result->id);
    $student->appendChild($studentID);
    $average = $xml->createElement("average", $average);
    $student->appendChild($average);
    foreach($gradeArray as $grade){
        $grades = $xml->createElement("grade", $grade);
         $student->appendChild($grades);
    }
    $firstName = $xml->createElement("status", $status);
    $student->appendChild($firstName);
    echo "<xmp>" . $xml->saveXML() . "</xmp>";
}
?>