<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<!-- <h1>Welcome to <i><?php //echo CHtml::encode(Yii::app()->name); ?></i></h1> -->
<?php 
      $i=0;
      $images = array();
      foreach ($entries as $entry) {
        $class = 'item';
        if ( $i == 0 ) {
          $class = 'item active';
          $i = 1;
        }
        $images[] = array('image'=>Yii::app()->baseUrl.'/images/'.$entry->image, 'label'=>$entry->house_number.' '.$entry->street, 'caption'=>$entry->bedrooms.' bedrooms,  '.$entry->price.' per month');
        
      }
?>

<div class="row offset4">
  <div class="span14">
  <?php 
      $this->widget('bootstrap.widgets.TbCarousel', array(
        'items'=> $images,
      ));  
  ?>
  </div>
</div>

  	<?php 
  		// $i=0;
  		// foreach ($entries as $entry) {
  		// 	$class = 'item';
  		// 	if ( $i == 0 ) {
  		// 		$class = 'item active';
  		// 		$i = 1;
  		// 	}

  		// 	echo '<div class="'.$class.'"><a href="index.php/?r=/entry/view&id='.$entry->id.'" ><img src="'.Yii::app()->baseUrl.'/images/'.$entry->image.'" /></a>
  		// 	<div class="carousel-caption">
    //               	<h4>'.$entry->house_number.' '.$entry->street.'</h4>
    //                 <p>'.$entry->bedrooms.' bedrooms,  '.$entry->price.' per month</p>
    //               </div>
  		// 	</div>';

  			
  		// }

  	?>

<!--   </div>
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
</div> -->
