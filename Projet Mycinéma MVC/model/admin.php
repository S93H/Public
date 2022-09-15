<?php

require_once("db.php");


function getName()
{
    if (isset($_GET["employee_name"])) {
        $my_db = getdb();
        $employee_name= $_GET["employee_name"];
        $request = $my_db->prepare("SELECT u.firstname as 'firstname', u.lastname as 'lastname', j.name as 'name', j.salary as 'salary' from user u inner join employee e on u.id = e.id_user inner join job j on e.id_job = j.id where u.firstname like ? or u.lastname like ?");
        $request->execute(array("%$employee_name%", "%$employee_name%"));
        $name_employees = $request->fetchAll();
        return $name_employees;
    }


    var_dump($_GET);
    return [];
}

// function getJob()
// {
//     if (isset($_GET["employee_job"])) {
//         $my_db = getdb();
//         $employee_job = $_GET["employee_job"];
//         $request = $my_db->prepare("SELECT u.firstname as 'firstname', u.lastname as 'lastname', j.name as 'name', j.salary as 'salary' from user u inner join employee e on u.id = e.id_user inner join job j on e.id_job = j.id where j.name like ?");
//         $request->execute(array("%$employee_job%", "%$employee_job%"));
//         $job_employees = $request->fetchAll();
//         return $job_employees;
//     }


//     var_dump($_GET);
//     return [];
// }

// function getSalaire()
// {
//     if (isset($_GET["employee_salaire"])) {
//         $my_db = getdb();
//         $employee_salaire = $_GET["employee_salaire"];
//         $request = $my_db->prepare("SELECT u.firstname, u.lastname, j.name, j.salary from user u inner join employee e on u.id = e.id_user inner join job j on e.id_job = j.id where j.salary like ?");
//         $request->execute(array("%$employee_salaire%", "%$employee_salaire%"));
//         $salaire_employees = $request->fetchAll();
//         return $salaire_employees;
//     }


//     var_dump($_GET);
//     return [];
// }