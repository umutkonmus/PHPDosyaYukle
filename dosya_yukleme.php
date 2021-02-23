<!--

<form action="dosya_yukleme.php" method="post" enctype="multipart/form-data">
  <td><input type="file" name="dosya"></td>
  <td><input name="submit" type="submit" value="Gönder" /></td>
</form>

-->

<?php
### DOSYA YÜKLEME ###
##				         ##
#					          #
if ($_FILES["dosya"]) {
  echo "Dosya gönderildi<br>";
} else {
  echo "Lütfen bir dosya seçin";
}
if ($_FILES["dosya"]) {
  $yol = "images";
  $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_FILES["dosya"]["name"];
  if ( file_exists($yuklemeYeri) ) {
      echo "Dosya daha önceden yüklenmiş";
  } else {
      if ($_FILES["dosya"]["size"]  > 1000000) {
          echo "Dosya boyutu sınırı";
      } else {
          $dosyaUzantisi = pathinfo($_FILES["dosya"]["name"], PATHINFO_EXTENSION);
          if ($dosyaUzantisi != "jpg" && $dosyaUzantisi != "png") { # Dosya uzantı kontrolü
              echo "Sadece jpg ve png uzantılı dosyalar yüklenebilir.";
          } else {

              $sonuc = move_uploaded_file($_FILES["dosya"]["tmp_name"], $yuklemeYeri);
              echo $sonuc ? "Dosya başarıyla yüklendi" : "Hata oluştu";
          }
      }
  }
} else {
  echo "Lütfen bir dosya seçin";
}
#					          #
##				         ##
### DOSYA YÜKLEME ###
?>