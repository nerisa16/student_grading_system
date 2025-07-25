<?php

use Fat\Gs\Core\Database;
use Fat\Gs\Models\StudentModel;

require 'vendor/autoload.php';

$student = new StudentModel;

$students->id = 123456;
$students->name = "Rea Magtubo";
$students->course = "BSED";
$students->year_level = 3;
$students->section = "B";

$students->delete(123456);
