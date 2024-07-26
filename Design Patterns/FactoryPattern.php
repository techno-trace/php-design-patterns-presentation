<?php 

/* 
We consider the use of the factory pattern in those cases when we want the main part of our code (a.k.a. business logic) to address only the management of objects rather than their making. 

For these cases, the factory pattern instructs us to separate the making of objects into a factory class while leaving the main part of the app to handle the management of the objects.


-- If a class manages a shopping cart, it should deal only with shopping cart management (e.g., adding or removing products from the cart) and not be concerned with the manufacturing of those products.


-- A warehouse management class follows the quantities of items entering and leaving the warehouse but has no interest in making those items.


-- A car buying agency should simply track orders and not have to also deal with the details of how the cars are made.

*/