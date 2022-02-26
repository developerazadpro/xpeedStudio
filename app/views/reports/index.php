<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php flash('post_message'); ?>
  <div class="row ">
      <div class="col-md-2">
          <h3>Reports List</h4>
      </div>
      <div class="col-md-8">
        <form class="form-inline my-2 my-lg-0" action="javascript:void(0)" method="POST" id="searchForm" autocomplete="off">
            <input class="form-control mr-sm-2" type="date" name="from_date" id="from_date" value="">
            <input class="form-control mr-sm-2" type="date" name="to_date" id="to_date" value="">            
            <div class="form-group mr-sm-2">
                <select id="user_id" class="form-control" name="user_id">
                    <option value="">Select One</option>
                    <?php foreach ($data['users'] as $user) : ?>
                        <option value="<?php echo $user->id;?>"><?php echo  $user->name;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
           <div class="custom-message"></div>
      </div>
      <div class="col-md-2">
          <a class="btn btn-sm btn-primary pull-right" href="<?php echo URLROOT ;?>/reports/add"><i class="fa fa-pencil"></i> Add Report</a>
      </div>
  </div>
                        
    <?php if (!empty($data['reports'])): ?>           
    <div class="card mb-3 mt-5">                 
            <table class="table table-bordered table-striped" id="report-table">
                <tbody>
                    <tr>
                        <th>Sl</th>
                        <th>Amount</th>
                        <th>Buyer Name</th>
                        <th>Receipt ID</th>
                        <th>Items</th>
                        <th>Buyer Email</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($data['reports'] as $key => $report) : ?>
                    <tr>
                        <td><?php echo  ++$key;?></td>
                        <td>$<?php echo number_format($report->amount);?></td>
                        <td><?php echo  $report->buyer;?></td>
                        <td><?php echo  $report->receipt_id;?></td>
                        <td>
                            <?php                                 
                                $items = json_decode($report->items);                                
                                $item = '';
                                foreach($items as $list) {
                                    $item .= $list.', ';
                                }
                                $item = rtrim($item,', ');
                                echo $item;
                            ?>
                            
                        </td>
                        <td><?php echo  $report->buyer_email;?></td>
                        <td><?php echo  $report->city;?></td>
                        <td>+880 <?php echo  $report->phone;?></td>
                        <td>
                            <a href="#" data-id="<?php echo $report->id ;?>" class="btn btn-sm btn-danger delete-report">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>            
        </div>
        <?php endif;?>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>