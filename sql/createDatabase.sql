CREATE TABLE report (
  reportID INT UNIQUE AUTO_INCREMENT,
  scanDate DATETIME,
  resource VARCHAR(100),
  permalink VARCHAR(150)
);

CREATE TABLE scan (
  scanID INT UNIQUE AUTO_INCREMENT,
  reportID INT,
  scanner VARCHAR(50),
  detected BOOL,
  version VARCHAR(50),
  result VARCHAR(50),
  updateVer VARCHAR(50)

);

