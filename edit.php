 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
     <title></title>
   </head>
   <body>
     <?php
     require_once('config.php');
     $mysqli = openConnection();
     $kodekota = $_GET['kodekota'];
     $sql = "select * from kota_15n10020 where kodekota=$kodekota";
     $result = $mysqli->query($sql);
     while($row = $result->fetch_object()){
       $kkota = $row->kodekota;
       $kota = $row->kota;
     }
      ?>

     <div class="container">
     <form class="form-group" action="updatekota.php" method="post">
       <div class="form-group">
       <label class="control-label col-sm-2">Kode Kota:</label>
       <div class="col-sm-10">
         <div class="input-group">
           <input type="text" class="form-control" value="<?php echo $kkota; ?>" name="kodekota" placeholder="Masukkan kode kota">
           <span class="input-group-addon">
             <i class="fa fa-home"></i>
           </span>
         </div>
       </div>
       <label class="control-label col-sm-2">Kota:</label>
       <div class="col-sm-10">
         <div class="input-group">
           <input type="text" class="form-control" value="<?php echo $kota;?>" name="kota" placeholder="Masukkan nama kota">
           <span class="input-group-addon">
             <i class="fa fa-home"></i>
           </span>
         </div>
       </div>
       <input type="hidden" name="id" value="<?php echo $kodekota;?>">
     </div>
     <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
       <button type="submit" class="btn btn-success">EDIT</button>
       <button type="reset" class="btn btn-danger">RESET</button>
     </div>

     </div>
     </form>
     </div>

   </body>
 </html>
