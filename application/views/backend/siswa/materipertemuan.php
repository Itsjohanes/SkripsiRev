
<?php 
  $link = $materi['materi'];
  $pdf = base_url('assets/materi/').$link;
?>


<object data="<?php echo $pdf;?>" width="1000" height="2000"></object>