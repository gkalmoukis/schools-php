<?php
require 'database.php';
/*
 * giokalm
 *
 * class: authentication library
 * */

class Authentication
{
    /*
     * Login
     *
     * @param $username, $password
     * @return $mixed
     * */
    public function login($email, $password)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT `usr_id`,`usr_name`,`usr_role` FROM user WHERE  `usr_email`=:email AND usr_key=:key");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $query->bindParam("key", $enc_password, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() == 1) {
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}