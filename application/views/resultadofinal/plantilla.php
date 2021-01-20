<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo base_url().'assets_sistema/';?>css/bootstrap.min.css">

<title><?php echo $title[0] ?></title>


<style>
@media all {
   div.saltopagina{
      display: none;
   }
}

@media print {
   div.saltopagina{
      display:block;
      page-break-before:always;
   }
}

div.saltopagina{
   page-break-before:always;
}
</style>
   

</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src=<?= base_url().'application/JavaScript/imprimir.js'?>></script>
<script>

</script>

<body>


</body>





</html>   




