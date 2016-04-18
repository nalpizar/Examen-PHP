CREATE TABLE videGame(
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(255),
  developer  VARCHAR(255),
  description  VARCHAR(255),
  console  VARCHAR(255),
  releaseDate  VARCHAR(255),
  rate  VARCHAR(255),
  url   VARCHAR(255),
  PRIMARY KEY (id),
  UNIQUE KEY `id_UNIQUE` (`id`)
);
