// $phpArray= ...
<script type="text/javascript">

  var jsArray = {};
  <?php 
  	foreach($phpArray as $key => $val)
  	{ 
  ?>
      jsArray.<?php echo $key; ?> = "<?php echo $val; ?>";
  <?php 
  	} 
  ?>
// Add a comment to this line
  console.log(jsArray);
</script>