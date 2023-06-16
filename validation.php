<?php
function isEmailExist($conn, $email)
{
    $sql = "select * from user where email = '$email'";
    $result = getQuery($conn, $sql);
    $dataLen = count($result);
    if ($dataLen > 0) {
        return true;
    } else {
        return false;
    }
}
