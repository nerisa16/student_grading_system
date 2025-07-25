<?php

namespace Caraballo\Gs\Models;
use Caraballo\Gs\Core\Crud;
use Caraballo\Gs\Core\Database;

class StudentModel extends Database implements Crud {

    public int $id;
    public string $name;
    public string $course;
    public int $year_level;
    public string $section;

    public function __construct()
    {
        parent::__construct();
        $this->id = 0;
        $this->name = "";
        $this->couse = "";
        $this->year_level = 0;
        $this->section = "";
    }
    
    public function create(){
        $query = $this->conn->prepare("INSERT INTO `students`(`id`,`name`,`course`,`year_level`,`section`)
        VALUES('$this->id','$this->name','$this->course','$this->year_level','$this->section')");
        if($query->execute()) {
            echo "Student inserted successfully!";
        }
    }
    public function read(){
        try {
            $sql = "SELECT * FROM students";
            $results = $this->conn->query($sql);
            return $results->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

    }
    public function update($id){
        $this->id = $id;
        $sql = "UPDATE students SET name = '$this->name', course = '$this->course', 
        year_level = '$this->year_level', section = '$this->section' WHERE id = '$this->id'";
        if($this->conn->query($sql)) {
            echo "Student successfully updated!";
        } else {
            echo "Update failed:" .$this->conn->error;
        }

    }
    public function delete($id){
        $this->id = $id;
        $sql = "DELETE FROM `students` WHERE id = $this->id";
        if($this->conn->query($sql)) {
            echo "Student successfully deleted!";
        } else {
            echo "Student delete failed!" .$this->conn->error;
        }
        
    }

}
