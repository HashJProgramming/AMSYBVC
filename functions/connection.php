<!-- Developer: Hash'J ❤️ Programming -->
<?php
    $database = 'ybvc';
    $db = new PDO('mysql:host=localhost', 'root', '');
    $query = "CREATE DATABASE IF NOT EXISTS $database";
    try {
        $db->exec($query);
        $db->exec("USE $database");

        $db->exec("
            CREATE TABLE IF NOT EXISTS `users` (
              id INT PRIMARY KEY AUTO_INCREMENT,
              username VARCHAR(255),
              password VARCHAR(255),
              type VARCHAR(255) DEFAULT 'student',
              status VARCHAR(255) DEFAULT 'pending',
              created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ");

        $db->exec("
            CREATE TABLE IF NOT EXISTS `courses` (
                id INT PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(255),
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ");

        $db->exec("
            CREATE TABLE IF NOT EXISTS `announcements` (
                id INT PRIMARY KEY AUTO_INCREMENT,
                description VARCHAR(255),
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ");

        $db->exec("
            CREATE TABLE IF NOT EXISTS `students` (
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT,
            course INT,
            firstname VARCHAR(255),
            lastname VARCHAR(255),
            birthdate DATE,
            email VARCHAR(255),
            civil VARCHAR(16),
            graduated DATE,
            children INT,
            phone VARCHAR(16),
            present_address VARCHAR(255),
            work_address VARCHAR(255),
            FOREIGN KEY (course) REFERENCES courses(id) ON DELETE CASCADE,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )
        ");

        $db->beginTransaction();
        $stmt = $db->prepare("SELECT COUNT(*) FROM `users` WHERE `username` = 'admin'");
        $stmt->execute();
        $userExists = $stmt->fetchColumn();
        
        if (!$userExists) {
            $stmt = $db->prepare("INSERT INTO `users` (`username`, `password`, `type`, `status`) VALUES (:username, :password, :type, :status)");
            $stmt->bindValue(':username', 'admin');
            $stmt->bindValue(':password', password_hash('admin', PASSWORD_DEFAULT));
            $stmt->bindValue(':type', 'administrator');
            $stmt->bindValue(':status', 'approved');
            $stmt->execute();
        }
        
        $db->commit();

    } catch(PDOException $e) {
        die("Error creating database: " . $e->getMessage());
    }
?>