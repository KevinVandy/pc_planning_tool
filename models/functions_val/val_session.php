<?php

function login($username)
{
    $_SESSION['username'] = $username;
}

function logout()
{
    if(isset($_SESSION['username'])) $_SESSION['username'] = NULL; 
    if(isset($_SESSION['setupID'])) $_SESSION['setupID'] = NULL;
    session_destroy();
}

function hashPassword($passwordPlainText)
{
    $options = ['cost' => 13];
    $passwordHash = password_hash($passwordPlainText, PASSWORD_BCRYPT, $options);
    return $passwordHash;
}

function isLoggedIn()
{
    if(isset($_SESSION['username']) && $_SESSION['username'] != NULL ) return TRUE;
    else return FALSE;
}

function isSetupLoaded()
{
    if(isset($_SESSION['setupID']) && $_SESSION['setupID'] != NULL ) return TRUE;
    else return FALSE;
}

function validateLogin($usernameOrEmail, $password)
{
    if((findUsername($usernameOrEmail) || ($usernameOrEmail != "" && findEmail($usernameOrEmail))) && (password_verify($password, selectPasswordHash($usernameOrEmail)))) return NULL;
    else return 'Login Failed';
}

function validateSignup($username, $email, $password, $passwordConfirm)
{
    $errorMsgs = [];
    $errorMsgs['username'] = validateUsername($username);
    if($email == "" || $email == NULL) $errorMsgs['email'] = NULL;
    else $errorMsgs['email'] = validateEmail($email);
    $errorMsgs['password'] = validatePassword($password, $passwordConfirm);
    if(!isArrayNull($errorMsgs)) $errorMsgs['signup'] = 'There was a problem creating your account';
    else $errorMsgs['signup'] = NULL;
    return $errorMsgs;
}

?>
