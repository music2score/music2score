USE music2score_test;

INSERT IGNORE INTO user (fname, lname, email, pass)
VALUES ('test', 'user', 'testuser@test.com', 1234);

DELETE FROM jobs;

INSERT IGNORE INTO jobs (jobid, filename, userid, processing, completed, date)
VALUES (1, '1_20210315_201243657381_7195952191691151.mid', 1, 1, 1, '2021-03-15 20:12:43');

-- docker exec -i docker_mysql_server_1 mysql -u root -p12345 < ../codeception/bin/_data/acceptance_test_data.sql

-- docker exec -i docker_mysql_server_1 mysql -u root -p12345 < ../backstopJS/vrt_test_data.sql