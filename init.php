<?php

class Init
{
    const TABLE_NAME = 'notifications';

    static function activation()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . self::TABLE_NAME;
        $wpdb->query("CREATE TABLE IF NOT EXISTS $table_name (id INT AUTO_INCREMENT NOT NULL, date DATETIME DEFAULT CURRENT_TIMESTAMP, description LONGTEXT NOT NULL, type VARCHAR(255) NOT NULL, action VARCHAR(255) DEFAULT NULL, user_id INT NOT NULL, visualized TINYINT(1) DEFAULT 0, UNIQUE KEY id (id)) $charset_collate;");
    }

    static function uninstall()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . self::TABLE_NAME;
        $wpdb->query("DROP TABLE IF EXISTS $table_name");
    }
}
