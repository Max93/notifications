<?php
namespace SimpleNotifications\Interfaces;

use \DateTime;

interface NotificationInterface
{
    public function setId($id);
    public function getId();
    public function setDate(DateTime $date);
    public function getDate();
    public function setDescription($description);
    public function getDescription();
    public function setType($type);
    public function getType();
    public function setAction($action);
    public function getAction();
    public function setUserId($userId);
    public function getUserId();
}
