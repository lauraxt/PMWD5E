# Trigger example

delimiter //

# delete order_items before order to avoid referential integrity error
create trigger delete_order_items 
before delete on orders for each row
begin
  delete from order_items where OLD.orderid = orderid;
end 
//

delimiter ;



