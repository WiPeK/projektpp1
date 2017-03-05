<div class="row edit_data no_space row_suppan">
  <div class="col-lg-10 col-lg-offset-1">
    <div role="tabpanel">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#nowe" aria-controls="nowe" role="tab" data-toggle="tab">Nowe</a></li>
          <li role="presentation"><a href="#rozpatrzone" aria-controls="rozpatrzone" role="tab" data-toggle="tab">Rozpatrzone</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="nowe">
              <table class="table table_hover">
                        <thead>
                          <tr>
                            <th>Od</th>
                            <th>Data</th>
                            <th>Odpowiedź</th>
                          </tr>
                        </thead>
                        <tbody>
                    <?php if(count($data['support_new'])): foreach($data['support_new'] as $application): ?> 
                        <tr>
                          <td><?php echo e($application['email']); ?></td>
                          <td><?php echo e($application['send_date']); ?></td>
                          <td>
                            <a href="<?php echo base_url() . 'admin_support/answer/' . $application['id']; ?>">
                              <button type="button" class="btn btn-primary">
                                Odpowiedz
                              </button>
                            </a>  
                          </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                          <td colspan="3">Brak zgłoszeń.</td>
                        </tr>
                    <?php endif; ?> 
                        </tbody>
              </table>
          </div>
          <div role="tabpanel" class="tab-pane" id="rozpatrzone">
            <table class="table table_hover">
                        <thead>
                          <tr>
                            <th>Od</th>
                            <th>Data</th>
                            <th>Odpowiedział</th>
                            <th>Data odpowiedzi</th>
                            <th>Pokaż</th>
                          </tr>
                        </thead>
                        <tbody>
                    <?php if(count($data['support_answered'])): foreach($data['support_answered'] as $supp_answered): ?> 
                        <tr>
                          <td><?php echo e($supp_answered['email']); ?></td>
                          <td><?php echo e($supp_answered['send_date']); ?></td>
                          <td><?php echo e($supp_answered['who_answer']); ?></td>
                          <td><?php echo e($supp_answered['answer_date']); ?></td>
                          <td><a href="<?php echo base_url() . 'admin_support/show_answered/' . $supp_answered['id']; ?>">Pokaż</a></td>
                          
                        </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                          <td colspan="3">Brak zgłoszeń.</td>
                        </tr>
                    <?php endif; ?> 
                        </tbody>
              </table>
          </div>
        </div>

      </div>
  </div>
</div>
