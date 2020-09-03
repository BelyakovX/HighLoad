<?php

/**
 * @var array $images
 */

$m = New Memcache();
$m->addServer('localhost', 11211);
$str = $m->get('g2');

if ($str) {
    echo $str;
} else {

    $str = '';

    for ($i = 0; $i < 1000; $i++) {
        foreach ($images as $image) {
            $src = "/../../mysite.local/imgs/$image.jpg";
            if (file_exists(__DIR__ . $src)) {
                $src = "/imgs/$image.jpg";
                $str .= '<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="' . $src . '" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Текст</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>';
            }
        }
    }

    $m->set('g2', $str, null, time() + 3000);
    echo $str;
}
?>