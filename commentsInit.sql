drop table if exists comments;
create table comments
(
  commentId int(200) primary key auto_increment,
  gameName varchar(100),
  username varchar(100),
  text varchar(255),
  dateAdded timeStamp
);