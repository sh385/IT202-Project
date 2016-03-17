drop table if exists clients;
create table clients
(
  clientID int(50) primary key auto_increment, 
  clientName varchar(100), 
  clientPassword varchar(150)
);