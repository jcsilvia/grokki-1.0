#Create grokki admin account
INSERT INTO members (MemberId, UserName, UserPassword, PasswordSalt, EmailAddress)
VALUES(1, 'Administator', 'c5792a8f1e5f27c40b41e4e2e964892b073f0968', '7030228762', 'admin@grokki.com');

INSERT INTO addresses (MemberId, Zipcode)
VALUES(1, 02790);

COMMIT;