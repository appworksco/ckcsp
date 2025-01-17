<?php

class CourseFacade extends DBConnection
{

    function fetchCourse()
    {
        $sql = $this->connect()->prepare("SELECT * FROM tbl_course");
        $sql->execute();
        return $sql;
    }

    function fetchCourseById($courseId)
    {
        $sql = $this->connect()->prepare("SELECT * FROM tbl_course WHERE id = ?");
        $sql->execute([$courseId]);
        return $sql;
    }

    function addCourse($courseCode, $courseDescription)
    {
        $sql = $this->connect()->prepare("INSERT INTO tbl_course (course_code, course_description) VALUES (?, ?)");
        $sql->execute([$courseCode, $courseDescription]);
        return $sql;
    }






    function updateCourse($courseCode, $courseDescription, $courseId)
    {
        $sql = $this->connect()->prepare("UPDATE tbl_course SET course_code = '$courseCode', course_description = '$courseDescription' WHERE id = '$courseId'");
        $sql->execute();
        return $sql;
    }

    function deleteCourse($courseId)
    {
        $sql = $this->connect()->prepare("UPDATE tbl_course SET is_deleted = 1 WHERE id = ?");
        $sql->execute([$courseId]);
        return $sql;
    }

    function restoreCourse($courseId)
    {
        $sql = $this->connect()->prepare("UPDATE tbl_course SET is_deleted = 0 WHERE id = ?");
        $sql->execute([$courseId]);
        return $sql;
    }

}
