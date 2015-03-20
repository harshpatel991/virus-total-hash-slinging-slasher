CREATE TABLE users (
  userID INT UNIQUE AUTO_INCREMENT,
  email VARCHAR(50),
  password VARCHAR(50)
);

CREATE TABLE query (
  queryID INT UNIQUE AUTO_INCREMENT,
  userID INT
);

CREATE TABLE hashes (
  hashID INT UNIQUE AUTO_INCREMENT,
  queryID INT,
  hash varchar(100)
);