
<?php $this->load->view('admin/header');?>
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Manage CMS</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>  Content Management System  <span style="float:right;"><a href="<?php echo base_url()?>admin/cms/addCMS">Add New</a></span></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Category Name</th>
                  <th>Title</th>
                  <th>URL</th>
                  <th>CreatedAt</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>SN</th>
                  <th>Category Name</th>
                  <th>Title</th>
                  <th>URL</th>
                  <th>CreatedAt</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
			   <?php 
			   if(isset($list)){
			  $i=1;
			  foreach($list as $response){?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $response->category_id;?></td>
                  <td><?php echo $response->title;?></td>
				   <td><?php echo $response->page_url;?></td>
                  <td><?php echo date('d-m-Y',strtotime($response->created));?></td>
                  <td><a href="<?php echo base_url()?>admin/cms/editCMS" class="btn btn-primary"> Edit </a> 
				  <a href="<?php echo base_url()?>admin/cms/deleteCMS" class="btn btn-danger"> Delete </a></td>
                </tr>
			   <?php }} ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
	
	
   <?php  $this->load->view('admin/footer');?>