<?php

  if(isset($_SESSION['notification'])):
    
    switch ($_SESSION['notification'])
    {

      case 'success':
        echo '<div class="alert alert-success"><i class="fa fa-check-circle"></i> Successfully Added.</div>';
      break;

      case 'delete':
        echo '<div class="alert alert-danger"><i class="fa fa-trash"></i> Successfully Deleted.</div>';
      break;

      case 'update':
        echo '<div class="alert alert-info"><i class="fa fa-check-circle"></i> Successfully Updated.</div>';
      break;

      case 'duplicated':
        echo '<div class="alert alert-warning"><i class="fa fa-refresh"></i> Username is already exist.</div>';
      break;

      default:
      break;
    }

  endif;
