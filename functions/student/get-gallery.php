<?php

function get_gallery()
{
    $path = "../functions/images/gallery/*.*";
    $files = glob($path);
    foreach ($files as $file) {
    ?>
            <div class="col item"><a href="<?php echo $file ?>"><img class="img-fluid" src="<?php echo $file ?>"></a></div>
    <?php
    }
}
