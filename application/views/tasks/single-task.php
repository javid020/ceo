<?php 
  $query = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'))); 
  $usersinformation = $query->row_array();  
?>

<div class="main-content container">
<div class="row">
<div class="col-md-12 email-content">
            <div class="email-detail-head">
              <div class="email-head-sender">
                
                <div class="avatar"><img src="<?= base_url(); ?>assets/img/avatars/img2.jpg" alt="Avatar"></div>
                <div class="sender"><a href="<?= base_url(); ?>users/jabbasov2019">Javid Abbasov</a> to <a href=""><?= $tasks['user_full_name']; ?></a>
                  <div class="actions"><a href="#" data-toggle="dropdown" class="icon toggle-dropdown"><i class="s7-angle-down"></i></a>
                    <div role="menu" class="dropdown-menu">
                      <?php if($tasks['done'] == 0): ?>
                        <a href="<?= base_url(); ?>tasks/markasdone/<?= $tasks['id']; ?>" class="dropdown-item">Mark as done</a>
                      <?php endif; ?>
                      <?php if($this->session->userdata('user_id') == 1): ?>
                      <div class="dropdown-divider"></div><a href="<?= base_url(); ?>tasks/delete/<?= $tasks['id']; ?>"  class="dropdown-item">Delete</a>
                    <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="options">
                  <div class="mail-info">
                    <div class="date"><?= $tasks['date_created']; ?></div>
                  </div>
                </div>
              </div>
              <div class="email-head-subject">
                <div class="title"><span><?= $tasks['title']; ?></span> </div>
              </div>
            </div>
            <div class="email-body">
              <p><?= $tasks['description']; ?></p>
            </div>
            <div class="email-attachments">
              <div class="attachements-resume">
                <div class="title">Attachment</div>
              </div>
              <div class="attachements-files">
                <div class="file">
                  <div class="file-name"><span class="icon s7-paperclip"></span> <a target="_blank" href="<?= site_url('assets/documents/'. $tasks['attach']); ?>"> <?= $tasks['attach']; ?></a></div>
                </div>
              </div>
            </div>

            
            <div class="panel-body" style="border-top: 1px solid #e6e6e6; margin-top: 20px; padding-top: 20px;">
                <?php $attributes = array( 'name' => 'addcmnnt', 'id' => 'addcmnnt', 'data-parsley-validate' => '', 'novalidate' => ''); ?>
                  <?php echo form_open_multipart('comments/create', $attributes); ?>
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input name="email"  id="email" type="email" required="" parsley-type="email" class="form-control" placeholder="yourmail@example.com">
                    </div>
                  </div>
                  <input type="hidden" name="work_id" value="<?= $tasks['id']; ?>">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input name="name"  type="text" required="" class="form-control" placeholder="Your Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="content" class="col-sm-2 col-form-label">Comment</label>
                    <div class="col-sm-10">
                      <textarea name="content" placeholder="Your Comment" required="" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="row pt-5">
                    <div class="col-6">
                      &nbsp;
                    </div>
                    <div class="col-6">
                      <p class="text-right">
                        <button type="submit" class="btn btn-space btn-primary">Submit</button>
                        <button class="btn btn-space btn-secondary">Cancel</button>
                      </p>
                    </div>
                  </div>
                </form>
              </div>

              <div style="margin-bottom: 40px;" class="commments col-md-12">
                <?php foreach($comments as $comment): ?>
                <div class="container" style="border: 1px solid #e6e6e6; padding-top: 20px; margin-bottom: 20px;">
                  <h4><?= $comment['name']; ?>  &nbsp;&nbsp;   <?= $comment['date_created']; ?></h4>  <br>
                  <p><?= $comment['content']; ?></p>
                </div>
              <?php endforeach; ?>
              </div>



          </div>
          </div>
        </div>