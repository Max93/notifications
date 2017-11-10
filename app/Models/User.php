<?php
namespace SimpleNotifications\Models;

use SimpleNotifications\Interfaces\UserInterface;

class User implements UserInterface
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}
