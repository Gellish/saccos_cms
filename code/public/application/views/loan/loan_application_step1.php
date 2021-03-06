<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery.autocomplete.js" ></script>
<link href="<?php echo base_url(); ?>media/css/jquery.autocomplete.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>media/css/plugins/datapicker/datepicker3.css" rel="stylesheet"/>
<?php echo form_open_multipart(current_lang() . "/loan/loan_application", 'class="form-horizontal"'); ?>

<?php
if (isset($message) && !empty($message)) {
    echo '<div class="label label-info displaymessage">' . $message . '</div>';
} else if ($this->session->flashdata('message') != '') {
    echo '<div class="label label-info displaymessage">' . $this->session->flashdata('message') . '</div>';
} else if (isset($warning) && !empty($warning)) {
    echo '<div class="label label-danger displaymessage">' . $warning . '</div>';
} else if ($this->session->flashdata('warning') != '') {
    echo '<div class="label label-danger displaymessage">' . $this->session->flashdata('warning') . '</div>';
}
?>

<div class="col-lg-12">
    <div class="col-lg-7">
        <div class="form-group"><label class="col-lg-4 control-label"><?php echo lang('member_pid'); ?>  : <span class="required">*</span></label>
            <div class="col-lg-7">
                <div class="input-group">
                    <?php
                   if (!$this->ion_auth->in_group('Members')) {
                    ?>
                    <input type="text" id="pid"  name="pid" value="<?php echo set_value('pid'); ?>"  class="form-control"/> 
                   <?php }else{ 
                       $users = current_user();
                       $member = $this->db->get_where('members',array('member_id'=>$users->member_id))->row();
                       set_value('pid', $member->PID);
                       ?>
                    <input type="text" disabled="disabled" value="<?php echo $member->PID; ?>"  class="form-control"/> 
                    <input type="hidden" id="pid"   name="pid" value="<?php echo $member->PID; ?>"  class="form-control"/> 
                   <?php } ?>
                    <span class="input-group-addon" id="search_pid" style="cursor: pointer;">
                        <span class="fa fa-search"  ></span>
                    </span>
                </div>
                <?php echo form_error('pid'); ?>
            </div>
        </div>
        <div class="form-group"><label class="col-lg-4 control-label"><?php echo lang('member_member_id'); ?>  : <span class="required">*</span></label>
            <div class="col-lg-7">
                <div class="input-group">
                     <?php
                   if (!$this->ion_auth->in_group('Members')) {
                    ?>
                    <input type="text" id="member_id" name="member_id" value="<?php echo set_value('member_id'); ?>"  class="form-control"/> 
                    <?php }else{ 
                       $users = current_user();
                       $member = $this->db->get_where('members',array('member_id'=>$users->member_id))->row();
                       ?>
                    <input type="text" disabled="disabled" value="<?php echo $member->member_id; ?>"  class="form-control"/> 
                    <input type="hidden" id="member_id" name="member_id" value="<?php echo $member->member_id; ?>"  class="form-control"/> 
                    <?php } ?>
                    <span class="input-group-addon" id="search_mid" style="cursor: pointer;">
                        <span class="fa fa-search"  ></span>
                    </span>
                </div>
                <?php echo form_error('member_id'); ?>
            </div>
        </div>

        <div style="color: brown;margin: 20px; font-weight: bold; font-size: 13px; border-bottom: 1px solid #ccc;">
            <?php echo lang('loan_basic_info'); ?>
        </div> 
        <div class="form-group"><label class="col-lg-4 control-label"><?php echo lang('loan_applicationdate'); ?>  : <span class="required">*</span></label>
            <div class=" col-lg-7">
                <div class="input-group date" id="datetimepicker" >
                    <input type="text" name="applicationdate" placeholder="<?php echo lang('hint_date'); ?>" value="<?php echo set_value('applicationdate'); ?>"  data-date-format="DD-MM-YYYY" class="form-control"/> 
                    <span class="input-group-addon">
                        <span class="fa fa-calendar "></span>
                    </span>
                </div>
                <?php echo form_error('applicationdate'); ?>
            </div>
        </div>

        <div class="form-group"><label class="col-lg-4 control-label"><?php echo lang('loan_product'); ?>  : <span class="required">*</span></label>
            <div class="col-lg-7">
                <select name="product" class="form-control">
                    <option value=""><?php echo lang('select_default_text'); ?></option>
                    <?php
                    $selected = set_value('product');
                    foreach ($loan_product_list as $key => $value) {
                        ?>
                        <option <?php echo ($value->id == $selected ? 'selected="selected"' : ''); ?> value="<?php echo $value->id; ?>"><?php echo $value->name ?></option>
                    <?php } ?>
                </select>
                <?php echo form_error('product'); ?>
            </div>
        </div>

        <div class="form-group"><label class="col-lg-4 control-label"><?php echo lang('loan_applied_amount'); ?>  : <span class="required">*</span></label>
            <div class="col-lg-7">
                <input type="text"  name="amount" value="<?php echo set_value('amount'); ?>"  class="form-control  amountformat"/> 
                <?php echo form_error('amount'); ?>
            </div>
        </div>
        <div class="form-group"><label class="col-lg-4 control-label"><?php echo lang('loan_installment'); ?>  : <span class="required">*</span></label>
            <div class="col-lg-7">
                <input type="text"  name="installment" value="<?php echo set_value('installment'); ?>"  class="form-control  amountformat"/> 
                <?php echo form_error('installment'); ?>
            </div>
        </div>
        <div class="form-group"><label class="col-lg-4 control-label"><?php echo 'Monthly Income'; ?>  : <span class="required">*</span></label>
            <div class="col-lg-7">
                <input type="text"  name="income" value="<?php echo set_value('income'); ?>"  class="form-control  amountformat"/> 
                <?php echo form_error('income'); ?>
            </div>
        </div>

        <div class="form-group"><label class="col-lg-4 control-label"><?php echo lang('loan_paysource'); ?>  : <span class="required">*</span></label>
            <div class="col-lg-7">
                <select name="source" class="form-control">
                    <option value=""><?php echo lang('select_default_text'); ?></option>
                    <?php
                    $selected = set_value('source');
                    foreach ($paysource_list as $key => $value) {
                        ?>
                        <option <?php echo ($value->name == $selected ? 'selected="selected"' : ''); ?> value="<?php echo $value->name; ?>"><?php echo $value->name ?></option>
                    <?php } ?>
                </select>
                <?php echo form_error('source'); ?>
            </div>
        </div>
        
         <div class="form-group"><label class="col-lg-4 control-label"><?php echo 'Loan Processing Fee'; ?>  : <span class="required">*</span></label>
            <div class="col-lg-7">
                <input type="text"  name="procesingfee" value="<?php echo set_value('procesingfee'); ?>"  class="form-control  amountformat"/> 
                <?php echo form_error('procesingfee'); ?>
            </div>
        </div>
        

        <div class="form-group"><label class="col-lg-4 control-label"><?php echo lang('loan_purpose'); ?>  : <span class="required">*</span></label>
            <div class="col-lg-7">
                <textarea rows="3" name="purpose" class="form-control" > <?php echo set_value('purpose'); ?> </textarea>
                <?php echo form_error('purpose'); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">&nbsp;</label>
            <div class="col-lg-6">
                <input class="btn btn-primary" value="<?php echo lang('loan_addbtn'); ?>" type="submit"/>
            </div>
        </div>

    </div>

    <div class="col-lg-5" id="member_info">

    </div>

</div>
<?php echo form_close(); ?>
<script src="<?php echo base_url() ?>media/js/script/moment.js"></script>
<script src="<?php echo base_url() ?>media/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<script type="text/javascript">

    $(function() {
        $('#datetimepicker').datetimepicker({
            pickTime: false
        });
    });
    $(document).ready(function() {



        $(window).keydown(function(event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });


        $("#pid").autocomplete("<?php echo site_url(current_lang() . '/saving/autosuggest/pid'); ?>",
                {
                    pleasewait: '<?php echo lang("please_wait"); ?>',
                    serverURLq: '<?php echo site_url(current_lang() . '/saving/search_member/'); ?>',
                    secondID: 'member_id',
                    Name: '<?php echo lang('member_fullname'); ?>',
                    gender: '<?php echo lang('member_gender'); ?>',
                    dob: '<?php echo lang('member_dob'); ?>',
                    joindate: '<?php echo lang('member_join_date'); ?>',
                    phone1: '<?php echo lang('member_contact_phone1'); ?> ',
                    phone2: '<?php echo lang('member_contact_phone2'); ?>',
                    email: '<?php echo lang('member_contact_email'); ?>',
                    photourl: '<?php echo base_url(); ?>uploads/memberphoto/',
                    matchContains: true,
                    column: 'PID'
                });

        $("#member_id").autocomplete("<?php echo site_url(current_lang() . '/saving/autosuggest/mid'); ?>", {
            pleasewait: '<?php echo lang("please_wait"); ?>',
            serverURLq: '<?php echo site_url(current_lang() . '/saving/search_member/'); ?>',
            secondID: 'pid',
            Name: '<?php echo lang('member_fullname'); ?>',
            gender: '<?php echo lang('member_gender'); ?>',
            dob: '<?php echo lang('member_dob'); ?>',
            joindate: '<?php echo lang('member_join_date'); ?>',
            phone1: '<?php echo lang('member_contact_phone1'); ?> ',
            phone2: '<?php echo lang('member_contact_phone2'); ?>',
            email: '<?php echo lang('member_contact_email'); ?>',
            photourl: '<?php echo base_url(); ?>uploads/memberphoto/',
            matchContains: true,
            column: 'MID'
        });



        var pid = '<?php echo set_value('pid'); ?>';

        if (pid.length > 0) {
            $('#member_info').html('<?php echo lang("please_wait"); ?>');
            $.ajax({
                url: '<?php echo site_url(current_lang() . '/saving/search_member/'); ?>',
                type: 'POST',
                data: {
                    value: pid,
                    column: 'PID'
                },
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json['success'].toString() == 'N') {
                        $('#member_info').html('<div style="color:red;">' + json['error'].toString() + '</div>');
                    } else {
                        var userdata = json['data'];
                        var contact = json['contact'];
                        $("#member_id").val(userdata["member_id"]);
                        var output = '<div style="border:1px solid  #ccc;font-size:15px;"><table style="width:100%;"><tr><td style="width:70%;">';
                        output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_fullname'); ?> : </strong> ' + userdata["firstname"] + ' ' + userdata["middlename"] + ' ' + userdata["lastname"] + '</div>';
                        output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_gender'); ?> : </strong> ' + userdata["gender"] + '</div>';
                        output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_dob'); ?> : </strong> ' + userdata["dob"] + '</div>';
                        output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_join_date'); ?> : </strong> ' + userdata["joiningdate"] + '</div>';
                        output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_contact_phone1'); ?> : </strong> ' + contact["phone1"] + '</div>';
                        output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_contact_phone2'); ?> : </strong> ' + contact["phone2"] + '</div>';
                        output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_contact_email'); ?> : </strong> ' + contact["email"] + '</div>';
                        output += '</td><td>  <img style=" height:120px;" src="<?php echo base_url(); ?>uploads/memberphoto/' + userdata["photo"].toString() + '"/></td></tr></table>       </div>'
                        $('#member_info').html(output);
                    }


                },
                error: function(xhr, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });



        }


        $("#search_pid").click(function() {

            var pid = $("#pid").val();

            if (pid.length > 0) {
                $('#member_info').html('<?php echo lang("please_wait"); ?>');
                $.ajax({
                    url: '<?php echo site_url(current_lang() . '/saving/search_member/'); ?>',
                    type: 'POST',
                    data: {
                        value: pid,
                        column: 'PID'
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        if (json['success'].toString() == 'N') {
                            $('#member_info').html('<div style="color:red;">' + json['error'].toString() + '</div>');
                        } else {
                            var userdata = json['data'];
                            var contact = json['contact'];
                            $("#member_id").val(userdata["member_id"]);
                            var output = '<div style="border:1px solid  #ccc;font-size:15px;"><table style="width:100%;"><tr><td style="width:70%;">';
                            output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_fullname'); ?> : </strong> ' + userdata["firstname"] + ' ' + userdata["middlename"] + ' ' + userdata["lastname"] + '</div>';
                            output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_gender'); ?> : </strong> ' + userdata["gender"] + '</div>';
                            output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_dob'); ?> : </strong> ' + userdata["dob"] + '</div>';
                            output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_join_date'); ?> : </strong> ' + userdata["joiningdate"] + '</div>';
                            output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_contact_phone1'); ?> : </strong> ' + contact["phone1"] + '</div>';
                            output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_contact_phone2'); ?> : </strong> ' + contact["phone2"] + '</div>';
                            output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_contact_email'); ?> : </strong> ' + contact["email"] + '</div>';
                            output += '</td><td>  <img style=" height:120px;" src="<?php echo base_url(); ?>uploads/memberphoto/' + userdata["photo"].toString() + '"/></td></tr></table>       </div>'
                            $('#member_info').html(output);
                        }


                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });



            } else {
                alert('<?php echo lang("alert_pid"); ?>');
            }
        });


        $("#search_mid").click(function() {
            var pid = $("#member_id").val();
            if (pid.length > 0) {
                $('#member_info').html('<?php echo lang("please_wait"); ?>');
                $.ajax({
                    url: '<?php echo site_url(current_lang() . '/saving/search_member/'); ?>',
                    type: 'POST',
                    data: {
                        value: pid,
                        column: 'MID'
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        if (json['success'].toString() == 'N') {
                            $('#member_info').html('<div style="color:red;">' + json['error'].toString() + '</div>');
                        } else {
                            var userdata = json['data'];
                            var contact = json['contact'];
                            $("#pid").val(userdata["PID"]);
                            var output = '<div style="border:1px solid  #ccc; font-size:15px;"><table style="width:100%;"><tr><td style="width:70%;">';
                            output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_fullname'); ?> : </strong> ' + userdata["firstname"] + ' ' + userdata["middlename"] + ' ' + userdata["lastname"] + '</div>';
                            output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_gender'); ?> : </strong> ' + userdata["gender"] + '</div>';
                            output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_dob'); ?> : </strong> ' + userdata["dob"] + '</div>';
                            output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_join_date'); ?> : </strong> ' + userdata["joiningdate"] + '</div>';
                            output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_contact_phone1'); ?> : </strong> ' + contact["phone1"] + '</div>';
                            output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_contact_phone2'); ?> : </strong> ' + contact["phone2"] + '</div>';
                            output += '<div style="border-bottom:1px dashed #ccc;"><strong><?php echo lang('member_contact_email'); ?> : </strong> ' + contact["email"] + '</div>';
                            output += '</td><td>  <img style=" height:120px;" src="<?php echo base_url(); ?>uploads/memberphoto/' + userdata["photo"].toString() + '"/></td></tr></table>       </div>'
                            $('#member_info').html(output);
                        }


                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });



            } else {
                alert('<?php echo lang("alert_member_id"); ?>');
            }
        });




    });
</script>