<?php
// Generate small delivery variants without changing the source artwork.
foreach (array('fix-call','call','whatsapp') as $name) {
    $base = dirname(__DIR__).'/assets/img/'.$name;
    $source = imagecreatefrompng($base.'.png');
    $target = imagecreatetruecolor(112,112);
    imagealphablending($target,false);
    imagesavealpha($target,true);
    imagecopyresampled($target,$source,0,0,0,0,112,112,imagesx($source),imagesy($source));
    if (!imagewebp($target,$base.'-112.webp',85)) { throw new RuntimeException('WebP failed'); }
    echo $name.': '.filesize($base.'.png').' -> '.filesize($base.'-112.webp')." bytes\n";
    imagedestroy($source); imagedestroy($target);
}
