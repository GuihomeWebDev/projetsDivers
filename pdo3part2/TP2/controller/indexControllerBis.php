<?php

$user = new signIn();
$department = new department();
$departmentList = $department->getDepartement();
$deptSelected = 1;
if (isset($_POST['submit'])) {
    $deptSelected = $_POST['depList'];
    if (is_numeric($deptSelected)) {
        $userByDep = $user->getUsersListByDpt($deptSelected);
    }
} else {
    $userByDep = $user->getUsersListByDpt(1);
}


if (isset($_POST['delete'])) {
    $userId = array_keys($_POST['delete'])[0];
    if (is_numeric($userId)) {
        $deleteSelected = $user->deleteUser($userId);
    }
}
