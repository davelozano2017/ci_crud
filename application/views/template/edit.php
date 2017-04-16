<div class="col-md-12">
<?php 
include 'notification-system.php';
extract($result);
if($errors): echo '<div class="alert alert-danger">'.$errors.'</div>'; endif;
?>
  <form method="POST" action="<?php echo base_url()?>execute/update/<?php echo$id?>">
        <div class="form-group">
          <label for="exampleInputEmail1">Last Name</label>
          <input type="text" class="form-control" name="lastname" value="<?php echo$lastname?>">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">First Name</label>
          <input type="text" class="form-control" name="firstname" value="<?php echo$firstname?>">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Middle Name</label>
          <input type="text" class="form-control" name="middlename" value="<?php echo$middlename?>">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"></label>
          <button type="submit" class="btn btn-primary btn-flat">Save Changes</button>
        </div>
      </form>
  </div>
</div>
