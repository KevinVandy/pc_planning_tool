<?php

function validateUserName($username)
{
    if(isStringBlank($username)) return 'A username is required';
    else if(!preg_match('/^[a-zA-Z][a-zA-Z0-9]{3,29}$/', $username)) return 'Username can contain letters or numbers but must start with a letter and be 4 to 30 characters long.';
    else if(findUserName($username)) return 'This username is already taken';
    else return NULL;
}

function validateEmail($email)
{
    if($email === FALSE || isStringBlank($email)) return 'A Valid Email Address is required';
    else if(findEmail($email)) return 'This email has already been used by someone else';
    else return NULL;
}

function validatePassword($password, $passwordConfirm)
{
    if(isStringBlank($password)) return 'A Password is Required';
    else if($password != $passwordConfirm) return 'Passwords do not match';
    else if(strlen($password) < 8) return 'Password must be at least 8 characters';
    else if(strlen($password) > 60) return 'Password must be less than 60 characters';
    else
    {
        //need 2 out of 4 requirements
        $passedRequirements = 0;
        if(preg_match('/[A-Z]/', $password)) $passedRequirements++;
        if(preg_match('/[a-z]/', $password)) $passedRequirements++;
        if(preg_match('/[0-9]/', $password)) $passedRequirements++;
        if(preg_match('/[!@#\$%\^&\*]/', $password)) $passedRequirements++;
        if($passedRequirements < 2) return 'Password must have at least 2 of the following: UPPERCASE Leter, lowercase letter, number, symbol';
    }
    return NULL;
}

?>