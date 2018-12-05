<div class="main-content container">
	<div class="row">
		<div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading panel-heading-divider">Add Tasks<span class="panel-subtitle">Add tasks and assign it to the worker</span></div>
              <div class="panel-body">
                  <?php $attributes = array( 'name' => 'addtask', 'id' => 'addtask', 'data-parsley-validate' => '', 'novalidate' => ''); ?>
                  <?php echo form_open_multipart('tasks/update/'.$task['id'], $attributes); ?>
                  <input type="hidden" name="idforupdate" value="<?= $task['id']; ?>">
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input value="<?= $task['title']; ?>" name="title" id="title" type="text" required="" placeholder="Title" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea name="desc" id="description" required=""  data-parsley-minlength="20" placeholder="Description" class="form-control"><?= $task['description']; ?></textarea>
                    </div>
                  </div>               
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deadline</label>
                    <div class="col-sm-10">
                      <input value="<?= $task['deadline']; ?>" name="deadline" required="" id="datepicker2" type="date" class="form-control datepicker">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="attach" class="col-sm-2 col-form-label">Attachement</label>
                    <div class="col-sm-10">
                      <label for="userfile" class="btn btn-primary"> <i class="icon s7-upload"></i><span>Browse files...</span></label>
                      <input type="file" name="userfile" id="userfile" data-multiple-caption="{count} files selected" multiple="" class="inputfile">
                    </div>
                  </div>
                  <input value="<?= $task['attach']; ?>" type="hidden" name="kohneattach">

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Select users</label>
                    <div class="col-sm-10">
                      <select name="assignto" required=""  class="form-control custom-select">
                        <option value=""></option>
                        <?php foreach($users as $user): ?>
                          <option <?php if($user['id'] == $task['user_id']){ echo "selected"; } ?> value="<?= $user['id']; ?>"><?= $user['full_name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="jobtype" class="col-sm-2 col-form-label">Job type</label>
                    <div class="col-sm-10">
                      <input value="<?= $task['type']; ?>" name="jobtype" id="jobtype" required=""  type="text" placeholder="jobtype" class="form-control">
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


  