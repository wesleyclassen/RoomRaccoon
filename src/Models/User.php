<?php

namespace Wes\Mvc\Models;

use Wes\Mvc\Core\Model;
use Wes\Mvc\Entity\Email;
use Wes\Mvc\Entity\EncryptedPassword;
use Wes\Mvc\Entity\UserId;
use Wes\Mvc\Entity\UserRole;

class User extends Model
{
    private UserId $id;
    private string $name;
    private Email $email;
    private EncryptedPassword $password;
    private UserRole $role;

//    public function __construct(UserId $id, string $name, Email $email, EncryptedPassword $password, UserRole $role)
    public function __construct()
    {
        parent::__construct('users');

    }

    public function changeRole(UserRole $newRole)
    {
        $this->role = $newRole;
    }

    public function getId()
    {
        return $this->id->getValue();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email->getValue();
    }

    public function getPassword()
    {
        return $this->password->getValue();
    }

    public function getRole()
    {
        return $this->role->getValue();
    }

    function getAll(): iterable
    {
        return $this->DB()->query("select * from users")->fetchAll();
    }

    function getByID($id)
    {
        return $this->DB()->query("select * from users where id = $id")->fetch();
    }


}