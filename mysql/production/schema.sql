CREATE DATABASE music2score_test;
USE music2score_test;
CREATE TABLE `user` (
  `id` bigint NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(400) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
ALTER TABLE `user`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;
  COMMIT;
  
CREATE TABLE `jobs` (
  `jobid` bigint NOT NULL,
  `filename` text NOT NULL,
  `processing` int NOT NULL DEFAULT '0',
  `completed` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobid`);
  
ALTER TABLE `jobs`
  MODIFY `jobid` bigint NOT NULL AUTO_INCREMENT;
COMMIT;

CREATE DATABASE testdb;
USE testdb;
CREATE TABLE `user` (
  `id` bigint NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(400) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
ALTER TABLE `user`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;
  COMMIT;

CREATE TABLE `jobs` (
  `jobid` bigint NOT NULL,
  `filename` text NOT NULL,
  `processing` int NOT NULL DEFAULT '0',
  `completed` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobid`);
  
ALTER TABLE `jobs`
  MODIFY `jobid` bigint NOT NULL AUTO_INCREMENT;
COMMIT;
