<?php
/**
 * Created by PhpStorm.
 * User: Helen Harle
 * Date: 15/02/2020
 * Time: 13:40
 */

//  ALL THE FUNCTIONS REQUIRED FOR READING, CHECKING AND SETTING UP THE DATABASES

function checkUserLogin($db, $userID, $password) {
    $return = null;
    $query = "SELECT email FROM User WHERE userID = ? and password = ?";
    $stmt = $db->prepare($query);
    //Prepared statement, string only
    $stmt->bind_param('ss', $userID, $password);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($return);
    $stmt->fetch();
    $stmt->free_result();
    return $return;
}
function createUser($db, $firstName, $lastName, $email, $password) {
    $query = "INSERT INTO User (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ssss', $firstName, $lastName, $email, $password);
    $stmt->execute();
}

function getUserData($db, $userID) {
    $result = array();
    $query = "SELECT firstname, lastname, email, userID FROM User WHERE userID = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result( $result['firstName'], $result['lastName'], $result['email'], $result['userID']);
    $stmt->fetch();
    $stmt->free_result();
    return $result;
}
function createUserTableIfNeeded($db) {
    $query = "CREATE TABLE IF NOT EXISTS User (
                          userID int NOT NULL AUTO_INCREMENT,
                          firstname nvarchar(20),
                          lastname nvarchar(20),
                          email nvarchar(50) not null,
                          password nvarchar(256),
                          PRIMARY KEY(userID))";
    $result = $db->query($query);

    $query = "ALTER TABLE User AUTO_INCREMENT = 1000000";
    $result = $db->query($query);
}