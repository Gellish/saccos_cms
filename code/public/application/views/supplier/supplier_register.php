
<?php echo form_open_multipart(current_lang() . "/supplier/supplier_register/".$id, 'class="form-horizontal"'); ?>

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

<div class="form-group"><label class="col-lg-3 control-label"><?php echo lang('supplier_name'); ?>  : <span class="required">*</span></label>
    <div class="col-lg-6">
        <input type="text" name="name" value="<?php echo (isset($supplierinfo) ? $supplierinfo->name : set_value('name')); ?>"  class="form-control"/> 
        <?php echo form_error('name'); ?>
    </div>
</div>
<div class="form-group"><label class="col-lg-3 control-label"><?php echo lang('supplier_id'); ?>  : <span class="required">*</span></label>
    <div class="col-lg-6">
        <input type="text" name="identity"  <?php echo (isset($supplierinfo) ? 'disabled="disabled"':''); ?> value="<?php echo (isset($supplierinfo) ? $supplierinfo->supplierid : set_value('identity')); ?>"  class="form-control"/> 
        <?php echo form_error('identity'); ?>
    </div>
</div>
<div class="form-group"><label class="col-lg-3 control-label"><?php echo lang('supplier_address'); ?>  : <span class="required">*</span></label>
    <div class="col-lg-6">
        <textarea type="text" name="address" class="form-control"><?php echo (isset($supplierinfo) ? $supplierinfo->address : set_value('address')); ?> </textarea>
        <?php echo form_error('address'); ?>
    </div>
</div>
<div class="form-group"><label class="col-lg-3 control-label"><?php echo lang('supplier_email'); ?>  : </label>
    <div class="col-lg-6">
        <input type="text" name="email" value="<?php echo (isset($supplierinfo) ? $supplierinfo->email : set_value('email')); ?>"  class="form-control"/> 
        <?php echo form_error('email'); ?>
    </div>
</div>


  <div class="form-group"><label class="col-lg-3 control-label"><?php echo lang('supplier_phone'); ?>  : <span class="required">*</span></label>
            <div class="col-lg-6">
                <div class="input-group"><span class="input-group-addon" style="border: 0px; padding: 0px 5px 0px 0px; margin: 0px"> <select name="pre_phone1" style="background: transparent; padding: 7px;  border:  1px solid #E5E6E7">
                            <?php
                            $select = isset($supplierinfo) ? substr($supplierinfo->phone, 0, -9) : set_value('pre_phone1');
                            foreach (mobile_code() as $key => $value) {
                                ?>
                                <option <?php echo ($select == $value->name ? 'selected="selected"' : ''); ?> value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                            <?php } ?>
                        </select> </span><input type="text" name="phone" value="<?php echo (isset($supplierinfo) ? substr($supplierinfo->phone, -9):set_value('phone')); ?>"  class="form-control"/> </div>
                <?php echo form_error('phone'); ?>
            </div>
        </div>
<div class="form-group"><label class="col-lg-3 control-label"><?php echo lang('supplier_fax'); ?>  : </label>
    <div class="col-lg-6">
        <input type="text" name="fax" value="<?php echo (isset($supplierinfo) ? $supplierinfo->fax : set_value('fax')); ?>"  class="form-control"/> 
        <?php echo form_error('fax'); ?>
    </div>
</div>

<div class="form-group"><label class="col-lg-3 control-label"><?php echo lang('supplier_additional'); ?>  : </label>
    <div class="col-lg-6">
        <textarea type="text" name="additional" class="form-control"><?php echo (isset($supplierinfo) ? $supplierinfo->additional : set_value('additional')); ?> </textarea>
        <?php echo form_error('additional'); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-3 control-label">&nbsp;</label>
    <div class="col-lg-6">
        <input class="btn btn-primary" value="<?php echo lang('supplier_addbtn'); ?>" type="submit"/>
    </div>
</div>

<?php echo form_close(); ?>
