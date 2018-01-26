
<?php $this->load->view('admin/header');?>
  <script>
  
  tinymce.init({
  selector: '#mytextarea',
  height: 500,
  plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools wordcount"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  // imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});

  </script>
  
  
  
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
          <i class="fa fa-table"></i> ADD CMS <span style="float:right;"><a href="<?php echo base_url()?>admin/cms/">Back</a></span></div>
		  <?php if(!empty($this->session->flashdata('message'))){ echo '<font color="red">'.$this->session->flashdata('message').'</font>';}?>
        <div class="card-body">
         <form name="addCMS" method="POST" action="<?php echo base_url()?>admin/cms/saveCMS">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Page Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="title" name="title" required />
    </div>
  </div>
  <div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">Page URL</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="page_url" placeholder="this-is-example-url-pattern" required />
    </div>
  </div>
  
   <div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">Category Name</label>
    <div class="col-sm-10">
     <select name="category_id" class="form-control" required>
		<option value="">Select Category</option>
		<?php foreach($categoryList as $responseCat){?>
		<option value="<?php echo $responseCat->id;?>"><?php echo $responseCat->name;?></option>
		<?php } ?>
	 </select>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">Page Description</label>
    <div class="col-sm-10">
     <textarea name="page_content" id="mytextarea" required class="form-control"> </textarea>
    </div>
  </div>
  
  
  <div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">Meta Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="meta_title" placeholder="" required />
    </div>
  </div>
  
  <div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">Meta Keywords</label>
    <div class="col-sm-10">
      <textarea name="meta_keyword" class="form-control" required> </textarea>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">Meta Description</label>
    <div class="col-sm-10">
      <textarea name="meta_desc" class="form-control" required> </textarea>
    </div>
  </div>
  
   <div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">Banner H1 Text</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="banner_h1text" />
    </div>
  </div>
  
   <div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">Banner Text</label>
    <div class="col-sm-10">
     <textarea name="banner_text" class="form-control" > </textarea>
    </div>
  </div>
  
   <div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">Meta Noindex Tag</label>
    <div class="col-sm-10">
      <input type="checkbox" class="form-checkbox" name="meta_noindex"  />
    </div>
  </div>
  
  <div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">Select Theme</label>
    <div class="col-sm-10">
     <select name="select_theme" class="form-control" required>
		<option value="1">Test</option>
	 </select>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-5 pull-right">
     <button type="submit" class="btn btn-primary" name="save">SAVE</button>
	  <a href="<?php echo base_url()?>admin/cms/"><button type="button" class="btn btn-danger" name="save">CANCEL</button></a>
    </div>
  </div>
  
</form>
          
        </div>
        <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
      </div>
    </div>
	
	
   <?php $this->load->view('admin/footer');?>