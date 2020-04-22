# dcsp_project

# Cart.php
Stores a list of item numbers and quanitities. 
Whenever an item is added or removed, the cart is searched for the item number. If the item is in the cart already, then the quantity value is update either +/- . 
Adding or Removing things does not actively update the inventory. 
Inventory is only updated upon checkout.
-- TO DO: Lots. Currently, need to figure out list vs array and then focus on adding and removing things. 

# CreateDB.php
This creates the User, PlantInventory, and FishInventory tables with dummy values for testing. This is the updated and working Database creator. 
Also contains the ability to add to all tables with the add_user, add_plant, and add_fish functions. 
-- TO DO: Not much, this is pretty much finished. As we adjust what values the tables store, this will need to be updated. 

# Inventory.php
Links the database for the inventory to the site and the user. Primarily displays both sets of inventory, both the plants and the fish. 
--TO DO: 
(1) make it pretty 
(2) finalize the search functions 
(3) add user input for the search functions

# login.php
Used to access the AWS database. 

