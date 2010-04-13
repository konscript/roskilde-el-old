<?php
//include javascript for image upload
if(isset($javascript)):
        echo $javascript->link('jquery-1.2.6.min.js');
        echo $javascript->link('jquery.imgareaselect-0.4.2.min.js');
endif;
?>

<?php
        echo $form->create('Project', array('action' => 'createimage_step3',"enctype" => "multipart/form-data"));
        echo $cropimage->createForm($uploaded["imagePath"], 151, 151);
        echo $form->submit('Done', array("id"=>"save_thumb"));
        echo $form->end();?>

?>
