<?php
    echo "
      *************   MENU   **************
      *                                   *
      *  1. DATA INDONESIA                *
      *  2. DATA PROVINSI DI INDONESIA    *
      *  3. DATA DI SELURUH DUNIA         *
      *                                   *
      *************************************
              
  Data diambil dari 'https://api.kawalcorona.com/'
                        
    ";

   

 do{
    
    echo "Pilih Nomor : ";
    $input = trim(fgets(STDIN));

   
    if($input == 1){
      $indo = json_decode(file_get_contents('http://api.kawalcorona.com/indonesia/'))[0];
      
      echo "
         Data Covid-19 di Indonesia :
         
           Total Sembuh    : $indo->sembuh
           Total Positif   : $indo->positif
           Total Meninggal : $indo->meninggal
         
      ";
   
    }else if($input == 2){
      $provinsi = json_decode(file_get_contents('http://api.kawalcorona.com/indonesia/provinsi/'));
      
     echo " Data Covid-19 Provinsi di Indonesia : \n";
      foreach($provinsi as $p){
       $data = $p->attributes;
        echo "
         Nama Provinsi   : $data->Provinsi
         Total Positif   : $data->Kasus_Posi
         Total Sembuh    : $data->Kasus_Semb
         Total Meninggal : $data->Kasus_Meni
           
         ";
    }
    
    }else if($input == 3){
      $sembuh = json_decode(file_get_contents('http://api.kawalcorona.com/sembuh/'));
      $meninggal = json_decode(file_get_contents('http://api.kawalcorona.com/meninggal/'));
      $positif = json_decode(file_get_contents('http://api.kawalcorona.com/positif/'));     
      
      echo "
        Data Covid-19 di seluruh Dunia : 
          
          Total Positif   : $positif->value
          Total Sembuh    : $sembuh->value
          Total Meninggal : $meninggal->value 
      ";
    
    }else{
      echo " Masukan Nomor Sesuai Menu! \n";
      exit();
    }
    
    echo "Mau cek Data lagi ? y / n : ";
    $ulang = trim(fgets(STDIN));
    
  }while($ulang === "y");
  
 ?>
