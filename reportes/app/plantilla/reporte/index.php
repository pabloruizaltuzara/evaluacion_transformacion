<?php

  function getPlantilla($evaluados){


  $plantilla= '<body style="font-family: poppins;">
    <header class="clearfix">
      <div id="logo">
        <img src="img/logo.png" width="160px" >
      </div>
      <div id="company">
        <h2 class="name"><b>PROCEDIMIENTO DE DESEMPEÑO DEL PERSONAL DE PLANTA</b></h2>
        <h2 class="name"><b>ISOCRET</b></h2>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">';
      foreach($evaluados as $evaluado){
        $plantilla.='<div id="client">
          <div class="to"><b>SUPERVISOR:</b>'." ". $evaluado["evaluador"] .' </div>
          <div class="to"><b>EVALUADO:</b>'." ".$evaluado["evaluado"] .' </div>
          <div class="to"><b>ÁREA:</b>'." ". $evaluado["puesto"] .' </div>
          

        </div>';
        }
      $plantilla.='</div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="desctitle"><b>PREGUNTAS</b></th>
            <th class="notitle">1</th> 
            <th class="notitle">2</th>  
            <th class="notitle">3</th>  
            <th class="notitle">4</th>  
            <th class="notitle">5</th>            
            
          </tr>
        </thead>
        <tbody>
          <tr style="height: 100px;">
            <td colspan="6" class="descsubtitle"><b>CONDUCTA</b></td>
          </tr>
        ';
        
        foreach($evaluados as $evaluado){
         

          $plantilla.='
           <tr>
            <td class="desc">¿ Respeta a sus superiores ?</td>';

            if($evaluado["p1"]=="1"){
              $plantilla.='<td class="no"id="uno1">X</td>';
            }else{
              $plantilla.='<td class="no"id="uno1"></td>';
            }
            if($evaluado["p1"]=="2"){
              $plantilla.='<td class="no" id="dos1">X</td>';
            }else{
              $plantilla.='<td class="no" id="dos1"></td>';
            }
            if($evaluado["p1"]=="3"){
              $plantilla.='<td class="no" id="tres1">X</td>';
            }else{
              $plantilla.='<td class="no" id="tres1"></td>';
            }
            if($evaluado["p1"]=="4"){
              $plantilla.='<td class="no" id="cuatro1">X</td>';
            }else{
              $plantilla.='<td class="no" id="cuatro1"></td>';
            }
            if($evaluado["p1"]=="5"){
              $plantilla.='<td class="no" id="cinco1">X</td>';
            }else{
              $plantilla.='<td class="no" id="cinco1"></td>';
            }
            $plantilla.='       
            </tr>';

            $plantilla.='
           <tr>
            <td class="desc">¿ Trabaja en equipo ?</td>';

            if($evaluado["p2"]=="1"){
              $plantilla.='<td class="no"id="uno2">X</td>';
            }else{
              $plantilla.='<td class="no"id="uno2"></td>';
            }
            if($evaluado["p2"]=="2"){
              $plantilla.='<td class="no" id="dos2">X</td>';
            }else{
              $plantilla.='<td class="no" id="dos2"></td>';
            }
            if($evaluado["p2"]=="3"){
              $plantilla.='<td class="no" id="tres2">X</td>';
            }else{
              $plantilla.='<td class="no" id="tres2"></td>';
            }
            if($evaluado["p2"]=="4"){
              $plantilla.='<td class="no" id="cuatro2">X</td>';
            }else{
              $plantilla.='<td class="no" id="cuatro2"></td>';
            }
            if($evaluado["p2"]=="5"){
              $plantilla.='<td class="no" id="cinco2">X</td>';
            }else{
              $plantilla.='<td class="no" id="cinco2"></td>';
            }
            $plantilla.='       
            </tr>';

            $plantilla.='
           <tr>
            <td class="desc">¿ Es responsable en su trabajo ?</td>';

            if($evaluado["p3"]=="1"){
              $plantilla.='<td class="no"id="uno3">X</td>';
            }else{
              $plantilla.='<td class="no"id="uno3"></td>';
            }
            if($evaluado["p3"]=="2"){
              $plantilla.='<td class="no" id="dos3">X</td>';
            }else{
              $plantilla.='<td class="no" id="dos3"></td>';
            }
            if($evaluado["p3"]=="3"){
              $plantilla.='<td class="no" id="tres3">X</td>';
            }else{
              $plantilla.='<td class="no" id="tres3"></td>';
            }
            if($evaluado["p3"]=="4"){
              $plantilla.='<td class="no" id="cuatro3">X</td>';
            }else{
              $plantilla.='<td class="no" id="cuatro3"></td>';
            }
            if($evaluado["p3"]=="5"){
              $plantilla.='<td class="no" id="cinco3">X</td>';
            }else{
              $plantilla.='<td class="no" id="cinco3"></td>';
            }
            $plantilla.='       
            </tr>';

            $plantilla.='
            <tr style="height: 100px;">
              <td colspan="6" class="descsubtitle"><b>PRESENTACIÓN PERSONAL</b></td>
            </tr>
           <tr>
            <td class="desc">¿ Su vestimenta se encuentra en buen estado ?</td>';

            if($evaluado["p4"]=="1"){
              $plantilla.='<td class="no"id="uno3">X</td>';
            }else{
              $plantilla.='<td class="no"id="uno3"></td>';
            }
            if($evaluado["p4"]=="2"){
              $plantilla.='<td class="no" id="dos3">X</td>';
            }else{
              $plantilla.='<td class="no" id="dos3"></td>';
            }
            if($evaluado["p4"]=="3"){
              $plantilla.='<td class="no" id="tres3">X</td>';
            }else{
              $plantilla.='<td class="no" id="tres3"></td>';
            }
            if($evaluado["p4"]=="4"){
              $plantilla.='<td class="no" id="cuatro3">X</td>';
            }else{
              $plantilla.='<td class="no" id="cuatro3"></td>';
            }
            if($evaluado["p4"]=="5"){
              $plantilla.='<td class="no" id="cinco3">X</td>';
            }else{
              $plantilla.='<td class="no" id="cinco3"></td>';
            }
            $plantilla.='       
            </tr>';

            $plantilla.='
           <tr>
            <td class="desc">¿ Utiliza un vocabulario apropiado ?</td>';

            if($evaluado["p5"]=="1"){
              $plantilla.='<td class="no"id="uno3">X</td>';
            }else{
              $plantilla.='<td class="no"id="uno3"></td>';
            }
            if($evaluado["p5"]=="2"){
              $plantilla.='<td class="no" id="dos3">X</td>';
            }else{
              $plantilla.='<td class="no" id="dos3"></td>';
            }
            if($evaluado["p5"]=="3"){
              $plantilla.='<td class="no" id="tres3">X</td>';
            }else{
              $plantilla.='<td class="no" id="tres3"></td>';
            }
            if($evaluado["p5"]=="4"){
              $plantilla.='<td class="no" id="cuatro3">X</td>';
            }else{
              $plantilla.='<td class="no" id="cuatro3"></td>';
            }
            if($evaluado["p5"]=="5"){
              $plantilla.='<td class="no" id="cinco3">X</td>';
            }else{
              $plantilla.='<td class="no" id="cinco3"></td>';
            }
            $plantilla.='       
            </tr>';

            $plantilla.='
            <tr>
             <td class="desc">¿ Se corta el pelo y las uñas ?</td>';
 
             if($evaluado["p6"]=="1"){
               $plantilla.='<td class="no"id="uno3">X</td>';
             }else{
               $plantilla.='<td class="no"id="uno3"></td>';
             }
             if($evaluado["p6"]=="2"){
               $plantilla.='<td class="no" id="dos3">X</td>';
             }else{
               $plantilla.='<td class="no" id="dos3"></td>';
             }
             if($evaluado["p6"]=="3"){
               $plantilla.='<td class="no" id="tres3">X</td>';
             }else{
               $plantilla.='<td class="no" id="tres3"></td>';
             }
             if($evaluado["p6"]=="4"){
               $plantilla.='<td class="no" id="cuatro3">X</td>';
             }else{
               $plantilla.='<td class="no" id="cuatro3"></td>';
             }
             if($evaluado["p6"]=="5"){
               $plantilla.='<td class="no" id="cinco3">X</td>';
             }else{
               $plantilla.='<td class="no" id="cinco3"></td>';
             }
             $plantilla.='       
             </tr>';


             $plantilla.='
             <tr style="height: 100px;">
               <td colspan="6" class="descsubtitle"><b>SEGURIDAD</b></td>
             </tr>
            <tr>
             <td class="desc">¿ Usa adecuadamente los elementos de protección ?</td>';
 
             if($evaluado["p7"]=="1"){
               $plantilla.='<td class="no"id="uno3">X</td>';
             }else{
               $plantilla.='<td class="no"id="uno3"></td>';
             }
             if($evaluado["p7"]=="2"){
               $plantilla.='<td class="no" id="dos3">X</td>';
             }else{
               $plantilla.='<td class="no" id="dos3"></td>';
             }
             if($evaluado["p7"]=="3"){
               $plantilla.='<td class="no" id="tres3">X</td>';
             }else{
               $plantilla.='<td class="no" id="tres3"></td>';
             }
             if($evaluado["p7"]=="4"){
               $plantilla.='<td class="no" id="cuatro3">X</td>';
             }else{
               $plantilla.='<td class="no" id="cuatro3"></td>';
             }
             if($evaluado["p7"]=="5"){
               $plantilla.='<td class="no" id="cinco3">X</td>';
             }else{
               $plantilla.='<td class="no" id="cinco3"></td>';
             }
             $plantilla.='       
             </tr>';
 
             $plantilla.='
            <tr>
             <td class="desc">¿ Tiene una actitud de cuidarse y cuidar a sus compañeros ?</td>';
 
             if($evaluado["p8"]=="1"){
               $plantilla.='<td class="no"id="uno3">X</td>';
             }else{
               $plantilla.='<td class="no"id="uno3"></td>';
             }
             if($evaluado["p8"]=="2"){
               $plantilla.='<td class="no" id="dos3">X</td>';
             }else{
               $plantilla.='<td class="no" id="dos3"></td>';
             }
             if($evaluado["p8"]=="3"){
               $plantilla.='<td class="no" id="tres3">X</td>';
             }else{
               $plantilla.='<td class="no" id="tres3"></td>';
             }
             if($evaluado["p8"]=="4"){
               $plantilla.='<td class="no" id="cuatro3">X</td>';
             }else{
               $plantilla.='<td class="no" id="cuatro3"></td>';
             }
             if($evaluado["p8"]=="5"){
               $plantilla.='<td class="no" id="cinco3">X</td>';
             }else{
               $plantilla.='<td class="no" id="cinco3"></td>';
             }
             $plantilla.='       
             </tr>';
 
             $plantilla.='
             <tr>
              <td class="desc">¿ Después de haber terminado su trabajo deja limpio y ordenado ?</td>';
  
              if($evaluado["p9"]=="1"){
                $plantilla.='<td class="no"id="uno3">X</td>';
              }else{
                $plantilla.='<td class="no"id="uno3"></td>';
              }
              if($evaluado["p9"]=="2"){
                $plantilla.='<td class="no" id="dos3">X</td>';
              }else{
                $plantilla.='<td class="no" id="dos3"></td>';
              }
              if($evaluado["p9"]=="3"){
                $plantilla.='<td class="no" id="tres3">X</td>';
              }else{
                $plantilla.='<td class="no" id="tres3"></td>';
              }
              if($evaluado["p9"]=="4"){
                $plantilla.='<td class="no" id="cuatro3">X</td>';
              }else{
                $plantilla.='<td class="no" id="cuatro3"></td>';
              }
              if($evaluado["p9"]=="5"){
                $plantilla.='<td class="no" id="cinco3">X</td>';
              }else{
                $plantilla.='<td class="no" id="cinco3"></td>';
              }
              $plantilla.='       
              </tr>';

              $plantilla.='
              <tr style="height: 100px;">
                <td colspan="6" class="descsubtitle"><b>INICIATIVA</b></td>
              </tr>
             <tr>
              <td class="desc">¿ Muestra nuevas ideas ?</td>';
  
              if($evaluado["p10"]=="1"){
                $plantilla.='<td class="no" id="uno3">X</td>';
              }else{
                $plantilla.='<td class="no"id="uno3"></td>';
              }
              if($evaluado["p10"]=="2"){
                $plantilla.='<td class="no" id="dos3">X</td>';
              }else{
                $plantilla.='<td class="no" id="dos3"></td>';
              }
              if($evaluado["p10"]=="3"){
                $plantilla.='<td class="no" id="tres3">X</td>';
              }else{
                $plantilla.='<td class="no" id="tres3"></td>';
              }
              if($evaluado["p10"]=="4"){
                $plantilla.='<td class="no" id="cuatro3">X</td>';
              }else{
                $plantilla.='<td class="no" id="cuatro3"></td>';
              }
              if($evaluado["p10"]=="5"){
                $plantilla.='<td class="no" id="cinco3">X</td>';
              }else{
                $plantilla.='<td class="no" id="cinco3"></td>';
              }
              $plantilla.='       
              </tr>';
  
              $plantilla.='
             <tr>
              <td class="desc">¿ Se anticipa a las dificultades ?</td>';
  
              if($evaluado["p11"]=="1"){
                $plantilla.='<td class="no"id="uno3">X</td>';
              }else{
                $plantilla.='<td class="no"id="uno3"></td>';
              }
              if($evaluado["p11"]=="2"){
                $plantilla.='<td class="no" id="dos3">X</td>';
              }else{
                $plantilla.='<td class="no" id="dos3"></td>';
              }
              if($evaluado["p11"]=="3"){
                $plantilla.='<td class="no" id="tres3">X</td>';
              }else{
                $plantilla.='<td class="no" id="tres3"></td>';
              }
              if($evaluado["p11"]=="4"){
                $plantilla.='<td class="no" id="cuatro3">X</td>';
              }else{
                $plantilla.='<td class="no" id="cuatro3"></td>';
              }
              if($evaluado["p11"]=="5"){
                $plantilla.='<td class="no" id="cinco3">X</td>';
              }else{
                $plantilla.='<td class="no" id="cinco3"></td>';
              }
              $plantilla.='       
              </tr>';
  
              $plantilla.='
              <tr>
               <td class="desc">¿ Se muestra accesible al cambio y trabajar bajo presión ?</td>';
   
               if($evaluado["p12"]=="1"){
                 $plantilla.='<td class="no"id="uno3">X</td>';
               }else{
                 $plantilla.='<td class="no"id="uno3"></td>';
               }
               if($evaluado["p12"]=="2"){
                 $plantilla.='<td class="no" id="dos3">X</td>';
               }else{
                 $plantilla.='<td class="no" id="dos3"></td>';
               }
               if($evaluado["p12"]=="3"){
                 $plantilla.='<td class="no" id="tres3">X</td>';
               }else{
                 $plantilla.='<td class="no" id="tres3"></td>';
               }
               if($evaluado["p12"]=="4"){
                 $plantilla.='<td class="no" id="cuatro3">X</td>';
               }else{
                 $plantilla.='<td class="no" id="cuatro3"></td>';
               }
               if($evaluado["p12"]=="5"){
                 $plantilla.='<td class="no" id="cinco3">X</td>';
               }else{
                 $plantilla.='<td class="no" id="cinco3"></td>';
               }
               $plantilla.='       
               </tr>';

               $plantilla.='
               <tr style="height: 100px;">
                 <td colspan="6" class="descsubtitle"><b>CALIDAD</b></td>
               </tr>
              <tr>
               <td class="desc">¿ No comete errores en el trabajo ?</td>';
   
               if($evaluado["p13"]=="1"){
                 $plantilla.='<td class="no"id="uno3">X</td>';
               }else{
                 $plantilla.='<td class="no"id="uno3"></td>';
               }
               if($evaluado["p13"]=="2"){
                 $plantilla.='<td class="no" id="dos3">X</td>';
               }else{
                 $plantilla.='<td class="no" id="dos3"></td>';
               }
               if($evaluado["p13"]=="3"){
                 $plantilla.='<td class="no" id="tres3">X</td>';
               }else{
                 $plantilla.='<td class="no" id="tres3"></td>';
               }
               if($evaluado["p13"]=="4"){
                 $plantilla.='<td class="no" id="cuatro3">X</td>';
               }else{
                 $plantilla.='<td class="no" id="cuatro3"></td>';
               }
               if($evaluado["p13"]=="5"){
                 $plantilla.='<td class="no" id="cinco3">X</td>';
               }else{
                 $plantilla.='<td class="no" id="cinco3"></td>';
               }
               $plantilla.='       
               </tr>';
   
               $plantilla.='
              <tr>
               <td class="desc">¿ Hace uso correcto de los recursos ?</td>';
   
               if($evaluado["p14"]=="1"){
                 $plantilla.='<td class="no"id="uno3">X</td>';
               }else{
                 $plantilla.='<td class="no"id="uno3"></td>';
               }
               if($evaluado["p14"]=="2"){
                 $plantilla.='<td class="no" id="dos3">X</td>';
               }else{
                 $plantilla.='<td class="no" id="dos3"></td>';
               }
               if($evaluado["p14"]=="3"){
                 $plantilla.='<td class="no" id="tres3">X</td>';
               }else{
                 $plantilla.='<td class="no" id="tres3"></td>';
               }
               if($evaluado["p14"]=="4"){
                 $plantilla.='<td class="no" id="cuatro3">X</td>';
               }else{
                 $plantilla.='<td class="no" id="cuatro3"></td>';
               }
               if($evaluado["p14"]=="5"){
                 $plantilla.='<td class="no" id="cinco3">X</td>';
               }else{
                 $plantilla.='<td class="no" id="cinco3"></td>';
               }
               $plantilla.='       
               </tr>';
   
               $plantilla.='
               <tr>
                <td class="desc">¿ No requiere de supervisión frecuente ?</td>';
    
                if($evaluado["p15"]=="1"){
                  $plantilla.='<td class="no"id="uno3">X</td>';
                }else{
                  $plantilla.='<td class="no"id="uno3"></td>';
                }
                if($evaluado["p15"]=="2"){
                  $plantilla.='<td class="no" id="dos3">X</td>';
                }else{
                  $plantilla.='<td class="no" id="dos3"></td>';
                }
                if($evaluado["p15"]=="3"){
                  $plantilla.='<td class="no" id="tres3">X</td>';
                }else{
                  $plantilla.='<td class="no" id="tres3"></td>';
                }
                if($evaluado["p15"]=="4"){
                  $plantilla.='<td class="no" id="cuatro3">X</td>';
                }else{
                  $plantilla.='<td class="no" id="cuatro3"></td>';
                }
                if($evaluado["p15"]=="5"){
                  $plantilla.='<td class="no" id="cinco3">X</td>';
                }else{
                  $plantilla.='<td class="no" id="cinco3"></td>';
                }
                $plantilla.='       
                </tr>';

                $plantilla.='
                <tr style="height: 100px;">
                  <td colspan="6" class="descsubtitle"><b>ORIENTACIÓN DE RESULTADOS</b></td>
                </tr>
               <tr>
                <td class="desc">¿ Cumple con las tareas que se le encomiendan ?</td>';
    
                if($evaluado["p16"]=="1"){
                  $plantilla.='<td class="no"id="uno3">X</td>';
                }else{
                  $plantilla.='<td class="no"id="uno3"></td>';
                }
                if($evaluado["p16"]=="2"){
                  $plantilla.='<td class="no" id="dos3">X</td>';
                }else{
                  $plantilla.='<td class="no" id="dos3"></td>';
                }
                if($evaluado["p16"]=="3"){
                  $plantilla.='<td class="no" id="tres3">X</td>';
                }else{
                  $plantilla.='<td class="no" id="tres3"></td>';
                }
                if($evaluado["p16"]=="4"){
                  $plantilla.='<td class="no" id="cuatro3">X</td>';
                }else{
                  $plantilla.='<td class="no" id="cuatro3"></td>';
                }
                if($evaluado["p16"]=="5"){
                  $plantilla.='<td class="no" id="cinco3">X</td>';
                }else{
                  $plantilla.='<td class="no" id="cinco3"></td>';
                }
                $plantilla.='       
                </tr>';
    
                $plantilla.='
               <tr>
                <td class="desc">¿ Termina su trabajo a tiempo ?</td>';
    
                if($evaluado["p17"]=="1"){
                  $plantilla.='<td class="no"id="uno3">X</td>';
                }else{
                  $plantilla.='<td class="no"id="uno3"></td>';
                }
                if($evaluado["p17"]=="2"){
                  $plantilla.='<td class="no" id="dos3">X</td>';
                }else{
                  $plantilla.='<td class="no" id="dos3"></td>';
                }
                if($evaluado["p17"]=="3"){
                  $plantilla.='<td class="no" id="tres3">X</td>';
                }else{
                  $plantilla.='<td class="no" id="tres3"></td>';
                }
                if($evaluado["p17"]=="4"){
                  $plantilla.='<td class="no" id="cuatro3">X</td>';
                }else{
                  $plantilla.='<td class="no" id="cuatro3"></td>';
                }
                if($evaluado["p17"]=="5"){
                  $plantilla.='<td class="no" id="cinco3">X</td>';
                }else{
                  $plantilla.='<td class="no" id="cinco3"></td>';
                }
                $plantilla.='       
                </tr>';
    
                $plantilla.='
                <tr>
                 <td class="desc">¿ Realiza un desarrollo adecuado de su trabajo ?</td>';
     
                 if($evaluado["p18"]=="1"){
                   $plantilla.='<td class="no"id="uno3">X</td>';
                 }else{
                   $plantilla.='<td class="no"id="uno3"></td>';
                 }
                 if($evaluado["p18"]=="2"){
                   $plantilla.='<td class="no" id="dos3">X</td>';
                 }else{
                   $plantilla.='<td class="no" id="dos3"></td>';
                 }
                 if($evaluado["p18"]=="3"){
                   $plantilla.='<td class="no" id="tres3">X</td>';
                 }else{
                   $plantilla.='<td class="no" id="tres3"></td>';
                 }
                 if($evaluado["p18"]=="4"){
                   $plantilla.='<td class="no" id="cuatro3">X</td>';
                 }else{
                   $plantilla.='<td class="no" id="cuatro3"></td>';
                 }
                 if($evaluado["p18"]=="5"){
                   $plantilla.='<td class="no" id="cinco3">X</td>';
                 }else{
                   $plantilla.='<td class="no" id="cinco3"></td>';
                 }
                 $plantilla.='       
                 </tr>';


                 $plantilla.='
                 <tr style="height: 100px;">
                   <td colspan="6" class="descsubtitle"><b>PRODUCTIVIDAD</b></td>
                 </tr>
                <tr>
                 <td class="desc">¿ Consigue sus objetivos ?</td>';
     
                 if($evaluado["p19"]=="1"){
                   $plantilla.='<td class="no"id="uno3">X</td>';
                 }else{
                   $plantilla.='<td class="no"id="uno3"></td>';
                 }
                 if($evaluado["p19"]=="2"){
                   $plantilla.='<td class="no" id="dos3">X</td>';
                 }else{
                   $plantilla.='<td class="no" id="dos3"></td>';
                 }
                 if($evaluado["p19"]=="3"){
                   $plantilla.='<td class="no" id="tres3">X</td>';
                 }else{
                   $plantilla.='<td class="no" id="tres3"></td>';
                 }
                 if($evaluado["p19"]=="4"){
                   $plantilla.='<td class="no" id="cuatro3">X</td>';
                 }else{
                   $plantilla.='<td class="no" id="cuatro3"></td>';
                 }
                 if($evaluado["p19"]=="5"){
                   $plantilla.='<td class="no" id="cinco3">X</td>';
                 }else{
                   $plantilla.='<td class="no" id="cinco3"></td>';
                 }
                 $plantilla.='       
                 </tr>';
     
                 $plantilla.='
                <tr>
                 <td class="desc">¿ Alcanza los estándares de productividad ?</td>';
     
                 if($evaluado["p20"]=="1"){
                   $plantilla.='<td class="no"id="uno3">X</td>';
                 }else{
                   $plantilla.='<td class="no"id="uno3"></td>';
                 }
                 if($evaluado["p20"]=="2"){
                   $plantilla.='<td class="no" id="dos3">X</td>';
                 }else{
                   $plantilla.='<td class="no" id="dos3"></td>';
                 }
                 if($evaluado["p20"]=="3"){
                   $plantilla.='<td class="no" id="tres3">X</td>';
                 }else{
                   $plantilla.='<td class="no" id="tres3"></td>';
                 }
                 if($evaluado["p20"]=="4"){
                   $plantilla.='<td class="no" id="cuatro3">X</td>';
                 }else{
                   $plantilla.='<td class="no" id="cuatro3"></td>';
                 }
                 if($evaluado["p20"]=="5"){
                   $plantilla.='<td class="no" id="cinco3">X</td>';
                 }else{
                   $plantilla.='<td class="no" id="cinco3"></td>';
                 }
                 $plantilla.='       
                 </tr>';


          }


        


        $plantilla.='</tbody>
        <tfoot>
          <tr>
            <td colspan="5" class="totaltitle"><b>Puntaje total
            </b></td>
            <td class="no" style="border-bottom: 1px solid black;"><b>'.$evaluado["total"].'
            </b></td>
          </tr>
        </tfoot>
      </table>


    </main>
    <footer>
    " ISOCRET " INDUSTRIA DE STYROPOR EXPANDIDO Y CONCRETO
    </footer>
  </body>';

  return $plantilla;

}
