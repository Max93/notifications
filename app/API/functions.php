<?php

use SimpleNotifications\Interfaces\UserInterface;
use SimpleNotifications\Interfaces\NotificationInterface;

use SimpleNotifications\Models\User;
use SimpleNotifications\Models\Notification;

function getUserModel($id)
{
	return new User();
}

function getNotificationModel($id)
{
	return new Notification();
}

function createNotification(UserInterface $user)
{
	return new Notification();
}
