<?php

use Fat\Gs\Core\Database;
use Fat\Gs\Models\StudentModel;

require 'vendor/autoload.php';

$student = new StudentModel;

$listOfStudents = $student->read();

print_r($listOfStudents);

