  <div class="col-md-12">
  <?php 
  if($this->session->flashdata('errors')):
  echo '<div class="alert alert-danger">'.$this->session->flashdata('errors').'</div>';
  endif;

  if(isset($_SESSION['notification'])):
    switch ($_SESSION['notification'])
    {

      case 'success':
        echo '<div class="alert alert-info">Successfully Added.</div>';
      break;

      case 'delete':
        echo '<div class="alert alert-danger">Successfully Deleted.</div>';
      break;

      case 'update':
        echo '<div class="alert alert-success">Successfully Updated.</div>';
      break;

      default:
      break;

    }
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
    if(action == 'delete')
    {
      window.location.href='<?php echo base_url()?>execute/'+action+'/'+id;
    }
    if(action == 'edit')
    {
      window.location.href='<?php echo base_url()?>execute/'+action+'/'+id;
    }
  }
</script>