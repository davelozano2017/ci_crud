<div class="col-md-12">
<?php include 'notification-system.php';
$errors = $this->session->flashdata('errors');
if($errors):
echo '<div class="alert alert-danger">'.$errors.'</div>';
endif;
?>
  <form method="POST" action="<?php echo base_url()?>execute/insert">
        <div class="form-group">
          <label for="exampleInputEmail1">Last Name</label>
          <input type="text" class="form-control" name="lastname">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">First Name</label>
          <input type="text" class="form-control" name="firstname">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Middle Name</label>
          <input type="text" class="form-control" name="middlename">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"></label>
          <button type="submit" class="btn btn-primary btn-flat">Submit</button>
        </div>
      </form>
  </div>
</div>

<div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Action</th>
          </thead>
          <tbody>
            
          <?php foreach ($result as $row):
            ?>
            <tr>
            <td><?php echo $row->lastname?></td>
            <td><?php echo $row->firstname?></td>
            <td><?php echo $row->middlename?></td>
            <td>
              <a href="#" onClick="modify('<?php echo $url?>','edit/','<?php echo $row->id?>')" class="btn btn-primary">Edit</a>
              <a href="#" onClick="modify('<?php echo $url?>','delete/','<?php echo $row->id?>')" class="btn btn-danger">Delete</a>
            </td>
            </tr>
          <?php endforeach; ?>
            
          </tbody>
        </table>
      </div>
  </div>

  