<?php
namespace RepositoryContracts;

/* 

A repository represents an architectural layer that handles communication between the application and data source. 

It is a widely used pattern whose main point is that the application does not have to know which data source is implemented and how it is implemented. 

This makes it easier to switch to another data source or implement structural changes to the existing data source.

The repository pattern introduces a repository interface, which defines how the application and the data sources should communicate. 

Each data source has its own class which implements the repository interface.

The controller class will call the methods defined in the repository interface and will not know how and from where the data is being fetched from. 

*/

interface ProductContract
{
   public function search($name);

   public function allBy($user);
}

class FoodProduct implements ProductContract
{

   public function search($name)
   {
      // Return Database query or any implementation of search

      var_dump('searching in all food products');
   }

   public function allBy($user)
   {
      // Return Database query or any implementation of getting all records filtered by some argument

      var_dump('searching in all food products by userid');
   }

}

class ElectricalProduct implements ProductContract
{

   public function search($name)
   {
      // Return Database query or any implementation of search

      var_dump('searching in all electrical products');
   }

   public function allBy($user)
   {
      // Return Database query or any implementation of getting all records filtered by some argument

      var_dump('searching in all electrical products by userid');
   }

}

class App {

    public function find($name, ProductContract $product){
    
        return $product->search($name);
    }
}

echo (new App)->find("user", new FoodProduct);

echo (new App)->find("user", new ElectricalProduct);