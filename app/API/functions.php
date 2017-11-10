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
	  'type' => $notification->getType(),
	  'user_id' => $user->getId()
	], ['%s', '%s', '%d']);

	if(!$result)
		return null;

	$notificationData = (array)$wpdb->get_row('SELECT * FROM ' . $wpdb->prefix . 'notifications WHERE id = ' . $wpdb->insert_id);

	return Notification::createFromData($notificationData, $user);
}

function findNotificationsByUser(UserInterface $user, $limit = 6)
{
	global $wpdb;

	return array_map(function($notificationData) use ($user) {
		return Notification::createFromData((array)$notificationData, $user);
	}, $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'notifications WHERE user_id = ' . $user->getId() .' LIMIT ' . $limit .' ;'));
}
