<?php namespace Insight\Users; 
/**
 * Insight Client Management Portal:
 * Date: 7/27/14
 * Time: 3:30 PM
 */

class AddNewUserCommand
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $company;
    public $permissionsAllowed;
    public $groups;
    public $permissionsDenied;

    public function __construct($first_name, $last_name, $email, $password, $company, $permissionsAllowed, $permissionsDenied, $groups)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->company = $company;
        $this->permissionsAllowed = $permissionsAllowed;
        $this->permissionsDenied = $permissionsDenied;
        $this->groups = $groups;
    }
} 