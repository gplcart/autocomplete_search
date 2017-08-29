<?php
/**
 * @package Autocomplete Search
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<a href="<?php echo $this->url("product/{$item['product_id']}", array(), true); ?>">
  <span class="media suggestion">
    <span class="media-left">
      <img class="media-object" src="<?php echo $this->e($item['thumb']); ?>">
    </span>
    <span class="media-body">
      <span class="media-heading title">
        <?php echo $this->e($item['title']); ?>
      </span>
      <span class="price">
        <?php echo $this->e($item['price_formatted']); ?>
      </span>
    </span>
  </span>
</a>