-- mysql -h localhost -u root -p your_database_name < book_course_database.sql

-- MariaDB dump 10.19  Distrib 10.11.6-MariaDB, for debian-linux-gnu (aarch64)
--
-- Host: localhost    Database: course_book_store
-- ------------------------------------------------------
-- Server version	10.11.6-MariaDB-0+deb12u1


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES
(1,'The Catcher in the Rye','J.D. Salinger',19.99,'https://example.com/new_image.jpg'),
(2,'To Kill a Mockingbird','Harper Lee',14.99,NULL),
(3,'1984','George Orwell',18.99,NULL),
(4,'Moby-Dick','Herman Melville',22.50,NULL),
(5,'War and Peace','Leo Tolstoy',25.00,NULL),
(6,'The Great Gatsby','F. Scott Fitzgerald',16.95,NULL),
(7,'Pride and Prejudice','Jane Austen',12.99,NULL),
(8,'The Lord of the Rings: The Fellowship of the Ring','J.R.R. Tolkien',29.95,NULL),
(9,'Brave New World','Aldous Huxley',17.49,NULL),
(10,'The Hobbit','J.R.R. Tolkien',15.99,NULL),
(11,'The Picture of Dorian Gray','Oscar Wilde',13.50,NULL),
(12,'Fahrenheit 451','Ray Bradbury',14.00,NULL),
(13,'The Brothers Karamazov','Fyodor Dostoevsky',21.99,NULL),
(14,'Frankenstein','Mary Shelley',19.50,NULL),
(15,'Dracula','Bram Stoker',18.00,NULL),
(16,'The Divine Comedy','Dante Alighieri',22.99,NULL),
(17,'Crime and Punishment','Fyodor Dostoevsky',20.99,NULL),
(18,'The Odyssey','Homer',19.99,NULL),
(19,'Don Quixote','Miguel de Cervantes',24.95,NULL),
(20,'Catch-22','Joseph Heller',18.00,NULL),
(21,'Catch-22','Joseph Heller',18.00,'https://example.com/images/catch_22.jpg');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES
(1,'Introduction to Computer Science','This course introduces the fundamentals of computer science, including algorithms, data structures, and programming concepts.',199.99,'https://example.com/new_image.jpg'),
(2,'Web Development Bootcamp','Learn how to build dynamic, responsive websites using HTML, CSS, JavaScript, and popular frameworks like React and Node.js.',249.50,'https://example.com/images/web_dev_bootcamp.jpg'),
(3,'Data Science with Python','This course covers the basics of data science, including data manipulation, visualization, and machine learning using Python.',299.00,'https://example.com/images/data_science_python.jpg'),
(4,'Introduction to Java Programming','A comprehensive course for beginners to learn Java programming, object-oriented concepts, and core Java libraries.',150.00,'https://example.com/images/java_programming.jpg'),
(5,'Advanced JavaScript and Node.js','Deep dive into advanced JavaScript features, ES6+, and building back-end applications using Node.js.',220.00,'https://example.com/images/advanced_javascript.jpg'),
(6,'Mastering SQL and Database Management','Learn the basics of SQL, database design, and how to manage and manipulate data in relational databases.',199.99,'https://example.com/images/sql_database.jpg'),
(7,'Machine Learning Fundamentals','An introduction to machine learning algorithms, including supervised and unsupervised learning methods using Python.',299.99,'https://example.com/images/machine_learning.jpg'),
(8,'Full Stack Web Development with React & Node.js','A complete guide to becoming a full-stack developer using React for the front end and Node.js for the back end.',299.50,'https://example.com/images/full_stack_web.jpg'),
(9,'Artificial Intelligence for Beginners','A beginner-friendly course introducing AI concepts, tools, and algorithms, including a basic introduction to neural networks.',179.99,'https://example.com/images/artificial_intelligence.jpg'),
(10,'DevOps and Continuous Integration/Continuous Deployment (CI/CD)','Learn DevOps tools and practices for automated deployment and building scalable systems using CI/CD pipelines.',220.00,'https://example.com/images/devops.jpg');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'tony','tonystark@gmail.com','$2y$10$ZtR8HrZHAQX3sTy9PEh2D.hMRVM35.jqNtyrw0nmKipUKw9/yJ3X2');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-16  1:39:47
