# Basic syntax to create a function

delimiter //

create function add_tax (price float) returns float no sql
  return price*1.1;

//

delimiter ;
