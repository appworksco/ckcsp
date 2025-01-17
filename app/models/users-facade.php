<?php

class UsersFacade extends DBConnection
{

    // Admin
    function verifyAdminEmailPassword($email, $password)
    {
        $sql = $this->connect()->prepare("SELECT * FROM tbl_admin WHERE email = ? AND password = ?");
        $sql->execute([$email, $password]);
        $count = $sql->rowCount();
        return $count;
    }

    function loginAdmin($email, $password)
    {
        $sql = $this->connect()->prepare("SELECT * FROM tbl_admin WHERE email = ? AND password = ?");
        $sql->execute([$email, $password]);
        return $sql;
    }


    // Faculty
    function fetchFaculty()
    {
        $sql = $this->connect()->prepare("SELECT * FROM tbl_faculty");
        $sql->execute();
        return $sql;
    }

    function fetchFacultyById($facultyId)
    {
        $sql = $this->connect()->prepare("SELECT * FROM tbl_faculty WHERE id = ?");
        $sql->execute([$facultyId]);
        return $sql;
    }

    function addFaculty($idNumber, $firstName, $lastName, $email, $password)
    {
        $sql = $this->connect()->prepare("INSERT INTO tbl_faculty (id_number, first_name, last_name, email, password) VALUES (?, ?, ?, ?, ?)");
        $sql->execute([$idNumber, $firstName, $lastName, $email, $password]);
        return $sql;
    }

    function updateFaculty($idNumber, $firstName, $lastName, $email, $facultyId)
    {
        $sql = $this->connect()->prepare("UPDATE tbl_faculty SET id_number = '$idNumber', first_name = '$firstName', last_name = '$lastName', email = '$email' WHERE id = '$facultyId'");
        $sql->execute();
        return $sql;
    }

    function changePasswordFaculty($password, $facultyId)
    {
        $sql = $this->connect()->prepare("UPDATE tbl_faculty SET password = '$password' WHERE id = '$facultyId'");
        $sql->execute();
        return $sql;
    }
    
    // Student










    function createAccount($userRole, $firstName, $lastName, $email, $password)
    {
        $sql = $this->connect()->prepare("INSERT INTO tbl_users (user_role, first_name, last_name, email, password) VALUES (?, ?, ?, ?, ?)");
        $sql->execute([$userRole, $firstName, $lastName, $email, $password]);
        return $sql;
    }

    function verifyEmail($email)
    {
        $sql = $this->connect()->prepare("SELECT * FROM tbl_users WHERE email = ?");
        $sql->execute([$email]);
        $count = $sql->rowCount();
        return $count;
    }

    function verifyEmailPassword($email, $password)
    {
        $sql = $this->connect()->prepare("SELECT * FROM tbl_users WHERE email = ? AND password = ?");
        $sql->execute([$email, $password]);
        $count = $sql->rowCount();
        return $count;
    }

    function login($email, $password)
    {
        $sql = $this->connect()->prepare("SELECT * FROM tbl_users WHERE email = ? AND password = ?");
        $sql->execute([$email, $password]);
        return $sql;
    }

    function update($data, $dataId)
    {
        $sql = $this->connect()->prepare("UPDATE dalira_table SET data = '$data' WHERE id = '$dataId'");
        $sql->execute();
        return $sql;
    }

    function delete($dataId)
    {
        $sql = $this->connect()->prepare("DELETE FROM dalira_table WHERE id = ?");
        $sql->execute([$dataId]);
        return $sql;
    }
}
