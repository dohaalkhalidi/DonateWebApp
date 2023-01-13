<?php

    Define('DB_dsn', 'mysql:host=localhost');
    Define('DB_user', 'root');
    Define('DB_password', '');
    define('API_KEY', 'sandbox-kdNRCQYVm9c8hTrfxm22dWKFjXTiSKpc');
    define('API_SECRET_KEY', 'sandbox-VBvIrs4scYHbSu0sYHjzNke6Z5Z45t1Z');
    
    $db;
    
        //Establish Database Connection
    try {
    
        $db = new PDO(DB_dsn, DB_user, DB_password);
        
        try {
            
            $db->query("use Donators_db");

         } catch(PDOException $e){

            $db->query("CREATE DATABASE IF NOT EXISTS Donators_db");
            $db->query("use Donators_db");
            $db->query("CREATE TABLE `donators` (
                `id` int(255) NOT NULL,
                `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
              ALTER TABLE `donators`
                ADD PRIMARY KEY (`id`);
              ALTER TABLE `donators`
                MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;");

         }
       
        
    } catch (PDOException $err) { 
        
        die("Could not connect to database");
        
    }
    
    
    
    
    ?>