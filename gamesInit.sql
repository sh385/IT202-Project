drop table if exists games;
create table games
(
  gameId int(200) primary key auto_increment, 
  uploader varchar(100),
  url varchar(100),
  name varchar(200),
  genre varchar(100),
  genre2 varchar(100), 
  genre3 varchar(100), 
  rating int(50), 
  dateAdded dateTime
);