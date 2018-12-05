<div class="main-content container">
        <div class="user-profile">
          <div class="row">
            <div class="col-md-12">
              <div class="user-display">
                <div class="user-display-cover"><img src="<?= base_url(); ?>assets/img/cover.jpg" alt="cover"></div>
                <div class="user-display-bottom">
                  <div class="user-display-id"><img src="<?= base_url(); ?>assets/img/avatars/<?= $user['photo']; ?>" alt="avatar" class="user-display-avatar">
                    <div class="user-display-name"><?= $user['full_name']; ?></div>
                  </div>
                  <div class="user-display-stats">
                    
                    <div class="user-display-stat"><span class="user-display-stat-counter"><?= count($works); ?></span><span class="user-display-stat-title">Tasks</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div style="background-color: white; margin-bottom: 40px;" class="panel-body">
                <p><?= $user['biography']; ?></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="user-info-list panel panel-default">
                <div class="panel-heading panel-heading-divider">About Me</div>
                <div class="panel-body">
                  <table class="no-border no-strip skills">
                    <tbody class="no-border-x no-border-y">
                      <tr>
                        <td class="icon"><span class="icon s7-user"></span></td>
                        <td class="item">Username</td>
                        <td><a href="#"><?= $user['username']; ?></a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="icon s7-portfolio"></span></td>
                        <td class="item">Ocupation</td>
                        <td><a href="#"><?= $user['role']; ?></a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="icon s7-mail"></span></td>
                        <td class="item">Mail</td>
                        <td> <a href="#"><?= $user['email']; ?></a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="icon s7-map-marker"></span></td>
                        <td class="item">Location</td>
                        <td> <a href="#">Montreal, Canada</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="widget widget-fullwidth user-develop-chart">
                <div class="widget-head">
                  <span class="title">Tasks</span>
                </div>
                <div class="widget-chart-container">
                  <div class="chart-table pt-3">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th style="width:37%; font-weight: bold;">Title</th>
                          <th style="width:36%; font-weight: bold;">Status</th>
                          <th style="font-weight: bold;">Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($works as $work): ?>
                        <tr>
                          <td class="user-avatar"><a href="<?= base_url(); ?>tasks/<?= $work['id']; ?>"><?= $work['title']; ?></a></td>
                          <td><?php if($work['done'] == 0): ?>In Progress <?php else: ?> Done <?php endif; ?></td>
                          <td><?= $work['deadline']; ?></td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
             
              <div class="widget widget-tile widget-tile-wide">
                <div class="tile-info">
                  <div class="icon"><span class="s7-graph1"></span></div>
                  <div class="data-info">
                    <div class="title">Tasks</div>
                  </div>
                </div>
                <div class="tile-value"><span data-toggle="counter" data-end="<?= count($works); ?>"><?= count($works); ?></span></div>
              </div>
            </div>
          </div>
        </div>