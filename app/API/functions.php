<?php

use SimpleNotifications\Interfaces\UserInterface;
use SimpleNotifications\Interfaces\NotificationInterface;

use SimpleNotifications\Models\User;
use SimpleNotifications\Models\Notification;

function getUserModel($id)
{
	return new User($id);
}

function getNotificationModel($id)
{
	global $wpdb;
	$notificationData = (array)$wpdb->get_row('SELECT * FROM ' . $wpdb->prefix . 'notifications WHERE id = ' . $id);
	return Notification::createFromData($notificationData);
}

function createNotificationModel($data)
{
	if((! array_key_exists('description', $data) && data['description']) || (! array_key_exists('type', $data) && data['type']))
		return null;

	return new Notification($data['description'], $data['type']);
}

function createNotification(UserInterface $user, NotificationInterface $notification)
{
	global $wpdb;

	$result = $wpdb->insert($wpdb->prefix . 'notifications', [
      'description' => $notification->getDescription(),
      'type' => $notification->getType()
	], ['%s', '%s']);

	if(!$result)
		return null;

	$notificationData = (array)$wpdb->get_row('SELECT * FROM ' . $wpdb->prefix . 'notifications WHERE id = ' . $wpdb->insert_id);

	return Notification::createFromData($notificationData);
}