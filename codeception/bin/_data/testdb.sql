USE testdb;
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

DROP TABLE IF EXISTS `jobs`;
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

DROP TABLE IF EXISTS `music`;
CREATE TABLE `music` (
  `id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `instrument` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `music`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `filename` (`filename`);
ALTER TABLE `music` ADD FULLTEXT KEY `name` (`name`);

ALTER TABLE `music`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` bigint NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `feedback`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;
COMMIT;