<?php

  if(isset($_SESSION['notification'])):
    
    switch ($_SESSION['notification'])
    {

      case 'success':
        echo '<div class="alert alert-success">Successfully Added.</div>';
      break;

      case 'delete':
        echo '<div class="alert alert-danger">Successfully Deleted.</div>';
      break;

      case 'update':
        echo '<div class="alert alert-info">Successfully Updated.</div>';
      break;

      case 'duplicated':
        echo '<div class="alert alert-warning">Lastname is already exist.</div>';
      break;

      default:
      break;
    }

  endif;
  