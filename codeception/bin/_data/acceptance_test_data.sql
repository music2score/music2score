USE music2score_test;

INSERT IGNORE INTO user (fname, lname, email, pass)
VALUES ('test', 'user', 'testuser@test.com', 1234);

-- docker exec -i docker_mysql_server_1 mysql -u root -p12345 < ../codeception/bin/_data/acceptance_test_data.sql