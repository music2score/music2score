USE music2score_test;
DROP TABLE IF EXISTS `jobs`;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `music`;

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

INSERT INTO `music` (`id`, `name`, `filename`, `instrument`, `date`) VALUES
(1, 'Beethoven Ode to Joy ', 'beethoven_ode_to_joy_vn', 'Violin', '2021-03-26 12:07:23'),
(2, 'Scene Finale', 'scene_finaleVLN', 'Violin', '2021-03-26 12:10:52'),
(3, 'Vivaldi Spring', 'vivaldi_spring_vn', 'Violin', '2021-03-26 12:13:14'),
(4, 'Garden Por', 'gardel_por_vn', 'Violin', '2021-03-27 16:54:44'),
(5, 'Bach Minuet', 'bach_minuet-2AVLN', 'Violin', '2021-03-27 16:55:35'),
(6, 'vivaldi Concertoam 3rd MVT', 'vivaldi_concertoam3rdmvt_vn', 'Violin', '2021-03-27 16:56:50'),
(7, 'Beethoven Fur Elise', 'beethoven_fur_elise_vn', 'Violin', '2021-03-27 16:57:40'),
(8, 'Massenet Meditation PNO', 'massenet_meditationPNO', 'Violin', '2021-03-27 16:58:29'),
(9, 'Irish Jig Medley PN', 'irish_jig_medley_pn', 'Violin', '2021-03-27 16:59:19'),
(10, 'Joy To The World', 'joy_to_the_worldVLN', 'Violin', '2021-03-27 16:59:45'),
(11, 'Tchaikovsky Nutcracker', 'tchaikovsky_nutcrackerVLN', 'Violin', '2021-03-27 17:00:30'),
(12, 'Happy Birthday', 'happy_birthday_vln', 'Violin', '2021-03-27 17:01:42'),
(13, 'Moonlight Sonata', 'moonlight_sonata_VN', 'Violin', '2021-03-27 17:02:29'),
(14, 'Danse Macabre', 'danse_macabre_vn', 'Violin', '2021-03-27 17:02:57'),
(15, 'Carol of The Bells', 'carol_of_the_bells_vn', 'Violin', '2021-03-27 17:03:31'),
(16, 'House of The Rising Sun', 'House_of_the_rising_sunVLN', 'Violin', '2021-03-27 17:04:23'),
(17, 'Schubert Ave Maria', 'schubert_ave_maria', 'Violin', '2021-03-27 17:06:25'),
(18, 'Bumble Bee', 'bumble_bee_vn', 'Violin', '2021-03-27 17:06:58'),
(19, 'Amazing Grace', 'amazing_grace', 'Violin', '2021-03-27 17:07:23'),
(20, 'Bach Air', 'bach_air_vn', 'Violin', '2021-03-27 17:07:45'),
(21, 'Silent Night Violin', 'silent_night_violin', 'Violin', '2021-03-27 17:08:19'),
(22, 'Spanish Violin', 'spanish_violin', 'Violin', '2021-03-27 17:08:48'),
(23, 'Liebesleid Loves Sorrow', 'liebesleid_loves_sorrow_VLN_vn', 'Violin', '2021-03-27 17:09:28'),
(24, 'Danny Boy', 'danny_boy', 'Violin', '2021-03-27 17:09:54'),
(25, 'Tchaikovksy Sugar Plum', 'tchaikovksy_sugar_plum', 'Violin', '2021-03-27 17:10:27'),
(26, 'Green Sleeves', 'greensleeves_vn', 'Violin', '2021-03-27 17:26:42'),
(27, 'SUM 1st MVT Four Seasons', 'sum_1stmvt_fourseasonsVLN', 'Violin', '2021-03-27 17:27:27'),
(28, 'Bella Ciao', 'bella_ciao_VLN', 'Violin', '2021-03-27 17:28:00'),
(29, 'Away in a Manger', 'away_in_a_mangerVLN', 'Violin', '2021-03-27 17:28:29'),
(30, 'Mozart Sym 25 IVLN', 'mozart_sym25_ivln_vn', 'Violin', '2021-03-27 17:29:19'),
(31, 'Tchaikovsky Waltz', 'tchaikovsky_waltz_vn', 'Violin', '2021-03-27 17:29:44'),
(32, 'Bach Cello Suite', 'bach_cello_suite_1', 'Violin', '2021-03-27 17:30:06'),
(33, 'Czardasz', 'czardaszvln_vn', 'Violin', '2021-03-27 17:30:44'),
(34, 'O Holy Night', 'o_holy_night', 'Violin', '2021-03-27 17:31:11'),
(35, 'It is Well', 'it_is_wellVLN', 'Violin', '2021-03-27 17:31:32'),
(36, 'El Choclo', 'el_chocloVLNvn', 'Violin', '2021-03-27 17:31:58'),
(37, 'Cool Blues', 'cool_blues', 'Violin', '2021-03-27 17:32:23'),
(38, 'Schubert Serenade', 'schubert_serenade_VLN', 'Violin', '2021-03-27 17:33:05'),
(39, 'Vivaldi Gloria', 'vivaldi_gloriaVLN_vn', 'Violin', '2021-03-27 17:33:37'),
(40, 'Jingle Bells', 'jingle_bells', 'Violin', '2021-03-27 17:33:57'),
(41, 'Cotton Eyed Joe', 'cotton_eyed_joeVLN', 'Violin', '2021-03-27 17:34:21'),
(42, 'Rossini William Tell', 'rossini_william_tell_vn', 'Violin', '2021-03-27 17:35:18'),
(43, 'How Great Thou Art', 'how_great_thou_art_VLN', 'Violin', '2021-03-27 17:35:44'),
(44, 'Winter', 'winter_VLN', 'Violin', '2021-03-27 17:36:12'),
(45, 'bach VLN Concerto in AMVLN VN SOLO', 'bach_vlnconcerto_in_amvln_vn_solo', 'Violin', '2021-03-27 17:36:55'),
(46, 'We Wish You A Jazzy Xmas', 'we_wish_you_a_jazzy_xmas_VLN', 'Violin', '2021-03-27 17:37:32'),
(47, 'Gavotte Gossec', 'Gavotte_GossecVLN', 'Violin', '2021-03-27 17:39:03'),
(48, 'Gavotte_Gossec 1', 'Gavotte_GossecVLN (1)', 'Violin', '2021-03-27 17:39:35'),
(49, 'Mozart Sym 40', 'mozart_sym40_vn', 'Violin', '2021-03-27 17:40:09'),
(50, 'Pirates', 'pirates', 'Violin', '2021-03-27 17:40:32'),
(51, 'Beethoven Fur Elise', 'beethoven_fur_elise_fl', 'Flute', '2021-03-27 17:41:25'),
(52, 'We Wish You A Merry Christmas', 'we_wish_you_a_merry_christmas_fl', 'Flute', '2021-03-27 17:42:06'),
(53, 'Tchaikovsky Waltz', 'tchaikovsky_waltz_fl', 'Flute', '2021-03-27 17:42:43'),
(54, 'bach Air', 'bach_air_fl', 'Flute', '2021-03-27 17:43:02'),
(55, 'Carol of The Bells', 'carol_of_the_bells_fl', 'Flute', '2021-03-27 17:43:26'),
(56, 'Beethoven Ode To Joy', 'beethoven_ode_to_joy_fl', 'Flute', '2021-03-27 17:44:00'),
(57, 'Scene Finale', 'scene_finale_fl', 'Flute', '2021-03-27 17:44:21'),
(58, 'Auclair', 'auclair_fl', 'Flute', '2021-03-27 17:44:40'),
(59, 'Satie Gymnopedie No 1', 'satie_gymnopedie_no1_fl', 'Flute', '2021-03-27 17:45:08'),
(60, 'KV 545 Allegro', 'kv545-allegrofl_fl', 'Flute', '2021-03-27 17:45:33'),
(61, 'Faure Pavane', 'faure_pavane_fl', 'Flute', '2021-03-27 17:45:57'),
(62, 'El Condor Passa', 'el_condor_passa_fl', 'Flute', '2021-03-27 17:46:23'),
(63, 'Bach Minuet', 'bach_minuet_fl_fl', 'Flute', '2021-03-27 17:46:44'),
(64, 'Bach Bist Du Bei Mir Vo', 'bach_bist_du_bei_mir_vo', 'Flute', '2021-03-27 17:47:13'),
(65, 'Gound Ave Maria', 'gounod_ave_maria_fl', 'Flute', '2021-03-27 17:47:33'),
(66, 'Mozart Queen', 'mozart_queen_fl', 'Flute', '2021-03-27 17:47:51'),
(67, 'Mozart Sym 40', 'mozart_sym40_fl', 'Flute', '2021-03-27 17:48:09'),
(68, 'Maple Leaf Rag', 'maple_leaf_rag_fl', 'Flute', '2021-03-27 17:48:35'),
(69, 'God Rest', 'god_rest_fl', 'Flute', '2021-03-27 17:49:13'),
(70, 'bob Cat', 'bob_cat', 'Flute', '2021-03-27 17:49:34'),
(71, 'Saint Saens Swan', 'saint_saens_swan', 'Flute', '2021-03-27 17:49:59'),
(72, 'Gesu Bambino', 'gesu_bambinoFL', 'Flute', '2021-03-27 17:50:25'),
(73, 'Schubert Serenade', 'schubert_serenade_FL', 'Flute', '2021-03-27 17:50:54'),
(74, 'Tchaikovsky Flower Waltz', 'tchaikovsky_flower_waltz_FL', 'Flute', '2021-03-27 17:51:18'),
(75, 'Romeo', 'romeo', 'Flute', '2021-03-27 17:51:36'),
(76, 'Rossini William Tell', 'rossini_william_tell', 'Flute', '2021-03-27 17:51:59'),
(77, 'Bach Vln Concerto BWV 1056 Mvt 2', 'BachVlnConcertoBWV1056Mvt2FL', 'Flute', '2021-03-27 17:52:44'),
(78, 'the Doll Song', 'the_doll_song_FL', 'Flute', '2021-03-27 17:53:02'),
(79, 'Bellini Casta Diva', 'bellini_casta_diva', 'Flute', '2021-03-27 17:53:30'),
(80, 'Tico Tico', 'tico_tico_fl', 'Flute', '2021-03-27 17:53:53'),
(81, 'Irish jig Medley', 'irish_jig_medley', 'Flute', '2021-03-27 17:54:11'),
(82, 'A Blast of Wind', 'a_blast_of_wind_FL', 'Flute', '2021-03-27 17:54:34'),
(83, 'El Choclo', 'el_chocloFL', 'Flute', '2021-03-27 17:54:55'),
(84, 'William Tell Flex', 'william_tell_FLex', 'Flute', '2021-03-27 17:55:17'),
(85, 'All To Jesus', 'all_to_jesus_FL', 'Flute', '2021-03-27 17:55:37'),
(86, 'Drunken Sailor', 'drunken_sailor', 'Flute', '2021-03-27 17:55:57'),
(87, 'Arndt Nola', 'arndt_nolaFL', 'Flute', '2021-03-27 17:56:15'),
(88, 'Mendelssohn Nocturne', 'mendelssohn_nocturne', 'Flute', '2021-03-27 17:56:39'),
(89, 'Memphis Blues', 'memphis_blues_FL', 'Flute', '2021-03-27 17:56:59'),
(90, 'Carnival Aquarium', 'carnival_aquariumFL', 'Flute', '2021-03-27 17:57:21'),
(91, 'St Louis', 'st_louisFL', 'Flute', '2021-03-27 17:57:46'),
(92, 'Little Town', 'little_townFL', 'Flute', '2021-03-27 17:58:03'),
(93, 'Grey Plover 1544', 'grey_plover_1544_FL', 'Flute', '2021-03-27 17:58:37'),
(94, 'Whole World', 'whole_worldFL', 'Flute', '2021-03-27 17:59:21'),
(95, 'Midnight Dance ON1608', 'midnight_dance_ON1608_FL', 'Flute', '2021-03-27 18:00:21'),
(96, 'Mozart K315', 'mozart_k315_FL', 'Flute', '2021-03-27 18:00:53'),
(97, 'God Glory', 'god_gloryFL', 'Flute', '2021-03-27 18:01:13'),
(98, 'Bach Arioso BWV 156', 'BachAriosoBWV156FL', 'Flute', '2021-03-27 18:01:43'),
(99, 'Beautiful Dreamer', 'beautiful_dreamer_FL', 'Flute', '2021-03-27 18:02:04'),
(100, 'Borodin Polovtsian', 'borodin_polovtsian', 'Flute', '2021-03-27 18:02:30');

ALTER TABLE `music`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;