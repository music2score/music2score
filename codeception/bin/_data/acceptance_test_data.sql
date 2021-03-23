USE music2score_test;
DROP TABLE IF EXISTS `jobs`;
DROP TABLE IF EXISTS `user`;

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
  `filename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `userid` bigint NOT NULL,
  `processing` int NOT NULL DEFAULT '0',
  `completed` int NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobid`),
  ADD UNIQUE KEY `filename` (`filename`);

ALTER TABLE `jobs`
  MODIFY `jobid` bigint NOT NULL AUTO_INCREMENT;
COMMIT;


INSERT IGNORE INTO user (fname, lname, email, pass)
VALUES ('test', 'user', 'testuser@test.com', 1234);

DELETE FROM jobs;

-- docker exec -i docker_mysql_server_1 mysql -u root -p12345 < ../codeception/bin/_data/acceptance_test_data.sql