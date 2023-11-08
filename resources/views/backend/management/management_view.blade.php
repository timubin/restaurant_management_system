@extends('admin.admin_master')
@section('content')




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eurosia Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...">
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
  </head>
  <body>

    <x-app-layout>
       <div class="container mt-5">
        <div class="row">
          @include('backend.management.inc.sidebar')
          <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center">
              <h2 class="text-primary"><i class="fas fa-utensils"></i> Category</h2>
              <a href="#" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Create Category</a>
            </div>
            <hr class="my-4">
          </div>
          
        </div>
       </div>
    </x-app-layout>
    
  </body>
</html>
@endsection