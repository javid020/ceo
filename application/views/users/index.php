<div class="main-content container">
  <div class="row">
          <!--Responsive table-->
          <div class="col-sm-12">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">Responsive Table
              </div>
              <?php if($this->session->userdata('user_id') == 1): ?>
              <div style="float: right; margin-right: 20px; margin-top: -45px;"><a href="<?= base_url(); ?>user/add"><button class="btn btn-space btn-primary"><i class="icon icon-left s7-plus"></i>&nbsp; Add users</button></a></div>
            <?php endif; ?>
              <div class="panel-body">
                <div class="table-responsive noSwipe">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width:5%;">
                        </th>
                        <th style="width:20%;">User</th>
                        <th style="width:17%;">Email</th>
                        <th style="width:15%;">Biography</th>
                        <th style="width:10%;">Work</th>
                        <th style="width:10%;">Date</th>
                        <th style="width:10%;"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($users as $user): ?>
                        
                        <tr>
                        <td>
                        </td>
                        <td class="user-avatar cell-detail user-info"><a href="user/single_profile"><img src="<?= base_url(); ?>assets/img/avatars/<?= $user['photo']; ?>" alt="Avatar"><span><a href="<?= base_url(); ?>user/<?= $user['id']; ?>"><?= $user['full_name']; ?></a> </span><span class="cell-detail-description"><?= $user['role']; ?></span></a></td>
                        <td class="cell-detail"> <span><?= $user['email']; ?></span><span class="cell-detail-description">Bomba kimi</span></td>
                        <td class="milestone"><?= word_limiter($user['biography'], 4); ?>
                        </td>
                        <td class="cell-detail"><span>1</span><span class="cell-detail-description">1</span></td>
                        <td class="cell-detail"><span>Dec 20, 2017</span></td>
                        <td class="text-right">
                          <?php if($this->session->userdata('user_id') == 1): ?>
                          <div class="btn-group btn-hspace">
                            <button type="button" data-toggle="dropdown" class="btn btn-secondary btn-xs dropdown-toggle" aria-expanded="false">Open <span class="icon-dropdown s7-angle-down"></span></button>
                            <div role="menu" class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-97px, 30px, 0px); top: 0px; left: 0px; will-change: transform;"><a href="<?= base_url(); ?>user/edit/<?= $user['id'];?>" class="dropdown-item">Edit user</a><a href="<?= base_url(); ?>user/delete/<?= $user['id'];?>" class="dropdown-item">Delete user</a>
                            </div>
                          </div>
                        <?php endif; ?>
                        </td>
                      </tr>

                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>