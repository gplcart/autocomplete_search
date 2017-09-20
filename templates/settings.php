<?php
/**
 * @package Autocomplete search
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */
?>
<form method="post" class="form-horizontal">
  <input type="hidden" name="token" value="<?php echo $_token; ?>">
  <div class="form-group required<?php echo $this->error('selector', ' has-error'); ?>">
    <label class="col-md-2 control-label"><?php echo $this->text('Selector'); ?></label>
    <div class="col-md-4">
      <input name="settings[selector]" class="form-control" value="<?php echo isset($settings['selector']) ? $this->e($settings['selector']) : ''; ?>">
      <div class="help-block">
        <?php echo $this->error('selector'); ?>
        <div class="text-muted">
          <?php echo $this->text('CSS selector of an input element you want to make autocomplete'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group required<?php echo $this->error('min_length', ' has-error'); ?>">
    <label class="col-md-2 control-label"><?php echo $this->text('Min input'); ?></label>
    <div class="col-md-4">
      <input name="settings[min_length]" class="form-control" value="<?php echo isset($settings['min_length']) ? $this->e($settings['min_length']) : ''; ?>">
      <div class="help-block">
        <?php echo $this->error('min_length'); ?>
        <div class="text-muted">
          <?php echo $this->text('The minimum number of characters a user must type before a search is performed'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group required<?php echo $this->error('max_result', ' has-error'); ?>">
    <label class="col-md-2 control-label"><?php echo $this->text('Max suggestions'); ?></label>
    <div class="col-md-4">
      <input name="settings[max_result]" class="form-control" value="<?php echo isset($settings['max_result']) ? $this->e($settings['max_result']) : ''; ?>">
      <div class="help-block">
        <?php echo $this->error('max_result'); ?>
        <div class="text-muted">
          <?php echo $this->text('The maximum number of suggestions to show to a user'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4 col-md-offset-2">
      <div class="btn-toolbar">
        <a href="<?php echo $this->url("admin/module/list"); ?>" class="btn btn-default"><?php echo $this->text("Cancel"); ?></a>
        <button class="btn btn-default save" name="save" value="1"><?php echo $this->text("Save"); ?></button>
      </div>
    </div>
  </div>
</form>