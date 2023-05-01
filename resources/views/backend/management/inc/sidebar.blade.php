<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eurosia Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...">

  </head>

    <style>

/*       body {
        background-color: #f8f9fa;
      } */
      
      .list-group-item {
        background-color: #fff;
        color: #495057;
        border: none;
        border-radius: 0;
        margin-bottom: 1px;
      }
      
      .list-group-item:hover {
        background-color: #e9ecef;
      }
      
      .list-group-item i {
        margin-right: 10px;
      }
    </style>
 
  <body>
    <div class="col-md-4">
        <div class="list-group">
            <a href="{{url('management/categories')}}" class="list-group-item list-group-item-action"><i class="fas fa-utensils"></i> Category</a>
            <a href="{{url('management/menu')}}" class="list-group-item list-group-item-action"><i class="fas fa-clipboard-list"></i>Menu</a>
            <a href="{{url('management/table')}}" class="list-group-item list-group-item-action"><i class="fas fa-chair"></i>  Table</a>
            <a href="{{url('management/users')}}" class="list-group-item list-group-item-action"><i class="fas fa-user"></i> User</a>
        </div>
      </div>
  </body>
