<?php

/**
 * @var $pizza
 */

?>

<div class="row">
  <div class="col-lg-6">
    <form action="/site/pizza" method="POST">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="введи название пиццы" name="pizza">
        <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Go!</button>
      </span>
      </div><!-- /input-group -->

    </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<?= $pizza ?>