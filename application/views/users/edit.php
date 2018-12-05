<div class="main-content container">
	<div class="row">
		<div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading panel-heading-divider">Edit User Information<span class="panel-subtitle">Edit user information and assign them tasks</span></div>
              <div class="panel-body">
                  <?php $attributes = array( 'name' => 'edituser', 'id' => 'edituser', 'data-parsley-validate' => '', 'novalidate' => ''); ?>
                  <?php echo form_open_multipart('user/update/'.$users['id'], $attributes); ?>
                  <input type="hidden" name="idforupdate" value="<?= $users['id']; ?>">
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                      <input name="full_name" id="full_name" type="text" required="" placeholder="Title" class="form-control" value="<?= $users['full_name']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input name="username" id="username" type="text" required="" placeholder="Username" class="form-control" value="<?= $users['username']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input name="email" id="email" type="email" required="" placeholder="Email" class="form-control" parsley-type="email" value="<?= $users['email']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="attach" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                      <label for="userfile" class="btn btn-primary"> <i class="icon s7-upload"></i><span>Browse photo...</span></label>
                      <input type="file" name="userfile" id="userfile" data-multiple-caption="{count} files selected" multiple="" class="inputfile">  
                    </div>
                    <input type="hidden" name="profph" value="<?= $users['photo']; ?>">
                  </div>
                  <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Biography</label>
                    <div class="col-sm-10">
                      <textarea name="biography" id="biography" required=""  data-parsley-minlength="20" placeholder="Biography" class="form-control"><?= $users['biography']; ?></textarea>
                    </div>
                  </div>               
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                      <input name="role" id="role" type="text" required="" placeholder="Role" class="form-control" value="<?= $users['role']; ?>">
                    </div>
                  </div>



                  <div class="row pt-5">
                    <div class="col-6">
                      &nbsp;
                    </div>
                    <div class="col-6">
                      <p class="text-right">
                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
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


  