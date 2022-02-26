<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-10 mx-auto">
        
        <div class="card bg-light mt-5">
        
            <div class="card-header card-text">
                <div class="row">
                    <div class="col">
                        <h4 class="card-text">Add New Report</h4>
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT ;?>/reports" class="btn btn-light pull-right"><i class="fa fa-backward"></i> Back</a>
                    </div>
                    
                </div>
            </div>
        
            <div class="card-body">
            <form action="javascript:void(0)" method="POST" id="reportForm" autocomplete="off">
                <div class="success"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div id="amount-group" class="form-group">
                            <label for="amount">Amount<sup>*</sup></label>
                            <input type="text" name="amount" id="amount" class="form-control form-control-lg" value=""  onkeyup="javascript:validateNumber('amount')">
                        </div>
                        <div id="buyer-email-group" class="form-group">
                            <label for="buyer_email">Buyer Email<sup>*</sup></label>
                            <input type="email" name="buyer_email" id="buyer_email" class="form-control form-control-lg" value="">
                        </div>
                        <div id="receipt-group" class="form-group">
                            <label for="receipt_id">Receipt ID<sup>*</sup></label>
                            <input type="text" name="receipt_id" id="receipt_id" class="form-control form-control-lg" onkeyup="javascript:validateText('receipt_id')">
                        </div>
                        <input type="hidden" id="item_index" value="1" />                        
                        <div class="form-group">
                            <label for="items">Items<sup>*</sup></label>
                            <div id="items-group" class="row">
                                <div class="col-md-10">
                                    <input type="text" name="items[]" id="items" class="form-control form-control-lg" value="" onkeyup="javascript:validateText('items')">
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:addItem()" class="btn btn-icon btn-lg btn-info" title="Add">
                                        <i class="icon-plus">+</i>
                                    </a>
                                </div>
                            </div>                            
                        </div>
                        <span id="item_more"></span>
                        
                    </div>
                    <div class="col-md-6">
                        <div id="buyer-group" class="form-group">
                            <label for="buyer">Buyer Name<sup>*</sup></label>
                            <input type="text" name="buyer" id="buyer" class="form-control form-control-lg" value="" onkeyup="javascript:validateAlphaNumeric('buyer')" maxlength="20">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="ext">Phone<sup>*</sup></label>
                                <input type="text" class="form-control form-control-lg"  value="+880" disabled="disabled">
                            </div>
                            <div id="phone-group" class="form-group col-md-9">
                                <label for="phone" style="visibility:hidden">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control form-control-lg" onkeyup="javascript:validateNumber('phone')" maxlength="10" value="">
                            </div> 
                            
                        </div>
                        <div id="city-group" class="form-group">
                            <label for="city">City<sup>*</sup></label>
                            <input type="text" name="city" id="city" class="form-control form-control-lg" value="" onkeyup="javascript:validateText('city')">
                        </div>
                        <div id="note-group" class="form-group">
                            <label for="note">Note<sup>*</sup></label>
                            <textarea rows="1" type="text" name="note" id="note" class="form-control form-control-lg" value="" maxlength="30"></textarea>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit">
                        </div>
                        
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>