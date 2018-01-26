
<?php $this->load->view('admin/header');?>
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Manage User</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>  Users  <span style="float:right;"><a href="">Add New</a></span></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>CreatedAt</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>SN</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>CreatedAt</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
			  
			   <?php 
			  $i=0;
			  foreach($list as $response){?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $response->username;?></td>
                  <td><?php echo $response->email;?></td>
				   <td><?php echo $response->phone_number;?></td>
                  <td><?php echo date('d-m-Y',strtotime($response->created_at));?></td>
                  <td><a href=""> Edit | Delete </a></td>
                </tr>
			  <?php } ?>
               
              </tbody>
            </table>
          </div>
        </div>
      
      </div>
    </div>
	
	
   <?php $this->load->view('admin/footer');?>