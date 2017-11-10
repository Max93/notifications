<?php
namespace SimpleNotifications\Models;

use SimpleNotifications\Interfaces\NotificationInterface;
use SimpleNotifications\Interfaces\UserInterface;
use \DateTime;

class Notification implements NotificationInterface
{
    private $id;
    private $date;
    private $description;
    private $type;
    private $userId;
    private $action;

    public function __construct($description, $type, $userId = null, $action = null)
    {
        $this->description = $description;
        $this->type = $type;
        $this->userId = $userId;
        $this->action = $action;
    }

    public static function createFromData($data)
    {
        $notification = new self($data['description'], $data['type'], $data['user_id'], $data['action']);
        $notification->setId($data['id']);
        $notification->setDate(new \DateTime($data['date']));
        $notification->setUserId($data['user_id']);
        return $notification;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setDate(DateTime $date)
    {
        $this->date = $date;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    public function getAction()
    {
        return $this->action;
    }
}
