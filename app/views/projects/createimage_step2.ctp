<?php
//include javascript for image upload
if(isset($javascript)):
        echo $javascript->link('jquery.imgareaselect.min.js');
endif;

echo $this->Html->css('imgareaselect-animated.css');

?>

<?php
        echo $cropimage->createJavaScript($uploaded['imageWidth'],$uploaded['imageHeight'],151,151); //kald javscript der muliggør crop

        echo $form->create('Project', array('action' => 'createimage_step3',"enctype" => "multipart/form-data"));

        echo $cropimage->createForm($uploaded["imagePath"], 151, 151); //kald billeder
        echo $form->submit('Done', array("id"=>"save_thumb"));
        echo $form->end();

?>
