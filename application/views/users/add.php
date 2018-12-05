<div class="main-content container">
	<div class="row">
		<div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading panel-heading-divider">Add Users<span class="panel-subtitle">Add users and assign them tasks</span></div>
              <div class="panel-body">
                  <?php $attributes = array( 'name' => 'adduser', 'id' => 'adduser', 'data-parsley-validate' => '', 'novalidate' => ''); ?>
                  <?php echo form_open_multipart('user/create', $attributes); ?>
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                      <input name="full_name" id="full_name" type="text" required="" placeholder="Title" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input name="username" id="username" type="text" required="" placeholder="Username" class="form-control" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input name="password" id="password" type="password" required="" placeholder="Password" class="form-control" data-parsley-minlength="6" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input name="email" id="email" type="email" required="" placeholder="Email" class="form-control" parsley-type="email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="attach" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                      <label for="userfile" class="btn btn-primary"> <i class="icon s7-upload"></i><span>Browse photo...</span></label>
                      <input type="file" name="userfile" id="userfile" data-multiple-caption="{count} files selected" multiple="" class="inputfile" required="" >
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Biography</label>
                    <div class="col-sm-10">
                      <textarea name="biography" id="biography" required=""  data-parsley-minlength="20" placeholder="Biography" class="form-control"></textarea>
                    </div>
                  </div>               
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                      <input name="role" id="role" type="text" required="" placeholder="Role" class="form-control">
                    </div>
                  </div>



                  <div class="row pt-5">
                    <div class="col-6">
                      &nbsp;
                    </div>
                    <div class="col-6">
                      <p class="text-right">
                        <button type="submit" name="submit" class="btn btn-space btn-primary">Submit</button>
                        <a href="<?= base_url(); ?>tasks" class="btn btn-space btn-secondary">Cancel</a>
                      </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
	</div>
</div>


  