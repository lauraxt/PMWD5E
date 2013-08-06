# Basic syntax to create a function

delimiter //

create function add_tax (price float) returns float no sql
begin
  declare tax float default 0.10;
  return price*(1+tax);
end
//

delimiter ;
