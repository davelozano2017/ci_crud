  <div class="col-md-12">
<?php 
include 'notification-system.php';
$message = $this->session->flashdata('errors');
if($message):
echo '<div class="alert alert-danger">'.$message.'</div>';
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
          <?php 
            foreach ($result as $row): ?>
              <tr>
              <td><?php echo $row->lastname ?></td>
              <td><?php echo $row->firstname ?></td>
              <td><?php echo $row->middlename ?></td>
              <td>
                <a href="#" onClick="modify('edit','<?php echo $row->id?>')" class="btn btn-primary">Edit</a>
                <a href="#" onClick="modify('delete','<?php echo $row->id?>')" class="btn btn-danger">Delete</a>
              </td>
          <?php
            endforeach;
          ?>
            
          </tbody>
        </table>
      </div>
  </div>
<script type="text/javascript">
  function modify(action,id)
  { 
    var url = '<?php echo base_url()?>';
    if(action == 'delete')
    {
      window.location.href= url+'execute/'+action+'/'+id;
    }
    if(action == 'edit')
    {
      window.location.href= url+'execute/'+action+'/'+id;
    }
  }
</script>