CREATE TABLE IF NOT EXISTS Users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(40) NOT NULL,
  email VARCHAR(40) NOT NULL,
  password VARCHAR(40) NOT NULL
);

CREATE TABLE IF NOT EXISTS Channels (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(40) NOT NULL,
  description VARCHAR(40) NOT NULL,
  isLike INT NOT NULL
);

CREATE TABLE IF NOT EXISTS Hashtags (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(40) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS Messages (
  id INT PRIMARY KEY AUTO_INCREMENT,
  hashtag_id INT,
  user_id INT,
  channel_id INT,
  description INT,
  FOREIGN KEY (hashtag_id) REFERENCES Hashtags (id),
  FOREIGN KEY (user_id) REFERENCES Users (id),
  FOREIGN KEY (channel_id) REFERENCES Channels (id)
);

CREATE TABLE IF NOT EXISTS Categories (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(40) NOT NULL,
  description VARCHAR(40) NOT NULL
);

CREATE TABLE IF NOT EXISTS Categories_hashtags_relations (
  hashtag_id INT,
  category_id INT,
  FOREIGN KEY (hashtag_id) REFERENCES Hashtags (id),
  FOREIGN KEY (category_id) REFERENCES Categories (id)
);