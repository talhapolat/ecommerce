<?php
include_once('../config.php');
if (!empty($_FILES['files'])) {
    $n = 0;
    $s = 0;
    $prepareNames = array();
    foreach ($_FILES['files']['name'] as $val) {
        $infoExt = getimagesize($_FILES['files']['tmp_name'][$n]);
        $s++;
        $filesName = str_replace(" ", "", trim($_FILES['files']['name'][$n]));
        $files = explode(".", $filesName);
        $File_Ext = substr($_FILES['files']['name'][$n], strrpos($_FILES['files']['name'][$n], '.'));

        if ($infoExt['mime'] == 'image/gif' || $infoExt['mime'] == 'image/jpeg' || $infoExt['mime'] == 'image/png') {
            $srcPath = '../../../../galleries/';
            $fileName = $s . rand(0, 999) . time() . $File_Ext;
            $path = trim($srcPath . $fileName);
            if (move_uploaded_file($_FILES['files']['tmp_name'][$n], $path)) {
                $prepareNames[] .= $fileName; //need to be fixed.
                $Sflag = 1; // success
            } else {
                $Sflag = 2; // file not move to the destination
            }
        } else {
            $Sflag = 3; //extention not valid
        }
        $n++;

        if ($Sflag == 1) {
            echo $fileName . 'ppp';
        } else if ($Sflag == 2) {
            echo '{File not move to the destination.}';
        } else if ($Sflag == 3) {
            echo '{File extention not good. Try with .PNG, .JPEG, .GIF, .JPG}';
        }
    }

    if (!empty($prepareNames)) {
        $count = 1;
        foreach ($prepareNames as $name) {
            $data = array(
                'img_name' => $name,
                'img_order' => $count++,
            );
            $db->insert(TB_IMG, $data);

            echo $db->lastInsertId() . '#';

            if ($_GET['pid'] != null) {
                $getProduct = $pdo->prepare("SELECT * FROM products WHERE id=?");
                $getProduct->execute([$_GET['pid']]);
                $product = $getProduct->fetch();
            } else {
                $getProduct = $pdo->prepare("SELECT * FROM products ORDER BY ID DESC LIMIT 1");
                $getProduct->execute();
                $product = $getProduct->fetch();
            }

            $getMedia = $pdo->prepare("SELECT * FROM images ORDER BY ID DESC LIMIT 1");
            $getMedia->execute();
            $media = $getMedia->fetch();

            $getOptions = $pdo->prepare("SELECT * FROM product_options WHERE product_id=? GROUP BY suboption1");
            $getOptions->execute([$product['id']]);
            $options = $getOptions->fetchAll();

            $getImgOrder = $pdo->prepare("SELECT MAX(no) AS max_no FROM product_media WHERE product_id=?");
            $getImgOrder->execute([$product['id']]);
            $getOrder = $getImgOrder->fetch();

            if ($options != null) {
                foreach ($options as $option) {
                    $dataa = array(
                        'product_id' => $product['id'],
                        'option_id' => $option['suboption1'],
                        'media_id' => $media['id'],
                        'no' => $media['img_order']+$getOrder['max_no']
                    );
                    $db->insert('product_media', $dataa);
                }
            } else {
                $dataa = array(
                    'product_id' => $product['id'],
                    'media_id' => $media['id'],
                    'no' => $media['img_order']+$getOrder['max_no']
                );
                $db->insert('product_media', $dataa);
            }

        }

        $getfimage = $pdo->prepare("SELECT * FROM product_media WHERE product_id=? and no=1 LIMIT 1");
        $getfimage->execute([$product['id']]);
        $getfimg = $getfimage->fetchAll();

        $getpmedia = $pdo->prepare("SELECT * FROM images WHERE id=?");
        $getpmedia->execute([$getfimg['media_id']]);
        $getpmd = $getpmedia->fetchAll();

        $updateimg = $pdo->prepare("UPDATE products SET image=? WHERE id=?");
        $updateimg->execute([$getpmd['img_name'], $product['id']]);
        $updatei = $updateimg->fetchAll();


    }
}
//$getfimage = $pdo->prepare("SELECT media_id FROM product_media WHERE product_id=? and no=1 LIMIT 1");
//$getfimage->execute([$_GET['pid']]);
//$getfimg = $getfimage->fetchAll();
//
//$getpmedia = $pdo->prepare("SELECT img_name FROM images WHERE id=?");
//$getpmedia->execute([$getfimg[0][0]]);
//$getpmd = $getpmedia->fetchAll();
//
//$updateimg = $pdo->prepare("UPDATE products SET image=? WHERE id=?");
//$updateimg->execute([$getpmd[0][0], $product['id']]);
//$updatei = $updateimg->fetchAll();

?>
