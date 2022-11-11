<?php

$datos = simplexml_load_file("agenda.xml");
    
                $sql = "DROP TABLE IF EXISTS `personas`;
                CREATE TABLE IF NOT EXISTS `personas` (
                  `nombre` varchar(50) NOT NULL,
                  `apellidos` varchar(50) NOT NULL, `direccion` varchar(50) NOT NULL,`telefono` varchar(50) NOT NULL
                );";
                
               // $registros = $bd->query($sql);
               // $nombres = $datos->xpath("//nombre");
              //  $apellidos = $datos->xpath("//apellidos");
             // $telefono = $datos->xpath("//telefono");
               //$personas=$datos->xpath("//contacto");
               $personas=$datos->xpath("/agenda/contacto[@tipo='persona']/*");
              
          //      foreach($personas as $usuario){
                    //echo "<pre>";
                   //  var_dump($personas);

                   
                   $datospersona=[];
               //    echo count($personas)/4;
               $cont=0;
               for ($j=0;$j<count($personas)/4;$j++){
                    
                for($i = 0;$i<4;$i++){
     
                  $datospersona[]=$personas[$i+$cont];
                  
                 }
                 $sql=$sql."insert into `personas`(`nombre`, `apellidos`, `direccion`, `telefono`) VALUES ('".$datospersona[0+$cont]."','".$datospersona[1+$cont]."','".$datospersona[2+$cont]."','".$datospersona[3+$cont]."');";
                 
                 $cont=$cont+4;
             } 
             echo $sql;
                

                  //   echo "/<pre>";
          //          }
                   
                