<?php
class User
{
    private $username;
    private $email;
    private $password;
    private $searchEngine;
    private $showMoreSpecs;
    private $hideToolTips;

    function __construct($username, $email, $password, $searchEngine, $showMoreSpecs, $hideToolTips) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->searchEngine = $searchEngine;
        $this->showMoreSpecs = $showMoreSpecs;
        $this->hideToolTips = $hideToolTips;
    }

    function getUsername() {
        return $this->username;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getSearchEngine() {
        return $this->searchEngine;
    }
    
    function getShowMoreSpecs() {
        return $this->showMoreSpecs;
    }
    
    function getHideToolTips() {
        return $this->hideToolTips;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setSearchEngine($searchEngine) {
        $this->searchEngine = $searchEngine;
    }
    
    function setShowMoreSpecs($showMoreSpecs) {
        $this->showMoreSpecs = $showMoreSpecs;
    }
    
    function setHideToolTips($hideToolTips) {
        $this->hideToolTips = $hideToolTips;
    }
}
?>
