<?= $this->extend("crudapp") ?>

<?= $this->section("body") ?>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="https://www.onlyxcodes.com/">onlyxcodes</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="https://www.onlyxcodes.com/2021/11/insert-update-delete-codeigniter-4.html">Back to Tutorial</a></li>
        </ul>
      </div>
    </div>
</nav>
	
<div class="wrapper">
	
<div class="container">
			
	<div class="col-lg-12">
		
		<?php if(isset($validation)) : ?>

            <div class="alert alert-danger" role="alert">
            	<strong><?= $validation->listErrors() ?></strong>
            </div>
        
		<?php endif; ?>   
		
		<form action="<?= base_url('edit-person/' . $person['person_id']) ?>" method="post" class="form-horizontal">
				
			<div class="form-group">
			<label class="col-sm-3 control-label">Firstname</label>
			<div class="col-sm-6">
			<input type="text" name="txt_firstname" value="<?= $person['firstname'] ?>" id="txt_firstname" class="form-control"/>
			</div>
			</div>
					
			<div class="form-group">
			<label class="col-sm-3 control-label">Lastname</label>
			<div class="col-sm-6">
			<input type="text" name="txt_lastname" value="<?= $person['lastname'] ?>" id="txt_lastname" class="form-control" />
			</div>
			</div>
											
			<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9 m-t-15">
			<button type="submit" class="btn btn-primary">Update</button>
			<a href="<?= base_url('/') ?>" class="btn btn-danger">Cancel</a>
			</div>
			</div>
					
		</form>
			
	</div>
		
</div>
			
</div>

<?= $this->endSection() ?>