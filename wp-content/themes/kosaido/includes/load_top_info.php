<?php
	$obj = get_queried_object();
	$GLOBALS['h2'] = get_the_title();
	$GLOBALS['bodyID'] = $post->post_name;
?>
<div id="top_info">
    <div class="inner">
        <h2><?php echo $GLOBALS['h2'] ?></h2>
    </div>
</div>