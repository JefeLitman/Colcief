<!DOCTYPE html>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Boletin</title>
    @php
        $infoPeriodos
    @endphp
    <style> 
    #header { 
      position: fixed; 
      /* position: absolute; */
      left: 0px; 
      top: 10px; 
      right: 0px; 
      height: 150px; 
      }
      body{
        border:1px solid black ;
        border-radius: 8px;
        padding-top: 181px;
      }
      .bottom{
        border-bottom:1px solid black ;
      }
      .borde {
        border:1px black solid !important;
        border-collapse: collapse;
      }
      .rojo{
        background-color: red !important;
      }

      .azul{
        background-color: blue;
      }

      .borde-y
      {
        /* border-collapse: collapse; */
        /* border-top: 1px rgb(70,70,70) solid; */
        border-bottom: 1px rgb(70,70,70,0.7) solid;
      }

      th
      {
        /* border: 1px rgb(120,120,120) solid; */
        background-color: rgb(190,190,190);
        margin-bottom: 4px !important;
        margin-right: 0 !important;
        margin-left: 0 !important;
        margin-top: 0 !important;
      }

	</style>
  </head>
  <body>
      <div id="header" >
        <img width="100%" style="text-align: center;" src="storage/header.png">
        <div class="borde" style="padding-left:3px;margin-left: 5px;margin-right:5px;width:100%;">
          Estudiante: <b> {{$boletin->nombre}} {{$boletin->apellido}}</b>
        </div>
      </div>
      
    
      <main>
        <br> 
        <div style="margin-left: 4px;margin-right:5px;width:100%;">
        <table class="borde" width="100%" border="2">
          <tbody  >
            <tr  >
              <td >
                Código: 
              </td>
              <td>
                Acudiente: 
              </td>
            </tr>
            <tr >
              <td>
                Año Escolar:
              </td>
              <td>
                Periodo: 
              </td>
            </tr>
            <tr >
              <td>
                Curso:
              </td>
              <td>
                Director:
              </td>
            </tr>
          </tbody>
        </table>
    </div>

    <div style="margin-left: 4px;margin-right:5px;width:100%;margin-top:10px;border-collapse: collapse;">
        <table class="" width="100%">
          <thead>
            <tr>
              <th align="center">
                Areas y/o Asignaturas
              </th>
              <th align="center">
                Desempeño
              </th>
              <th align="center">
                Inasistencia
              </th>
            </tr>
          </thead>
            <tbody>
              @foreach ($materias as $m)
                <tr>
                  <td class="borde-y">
                    <br><b> {{strtoupper($m->nombre)}} </b>
                  </td>
                  <td class="borde-y" align="center">
                      <br>{{-- BASICO(3.0) --}}
                    {{-- @switch()
                        @case(1)
                            
                            @break
                        @case(2)
                            
                            @break
                        @default
                            
                    @endswitch --}}
                  </td>
                  <td class="borde-y"  align="center">
                      <br>5
                  </td>
                </tr>
                <tr>
                  <td colspan="3" style="padding-left:10px;color:rgb(70,70,70);">
                      <b> Logros evaluados </b>
                  </td>
                </tr>
                <tr>
                  <td colspan="3" style="padding-left:20px;" class="borde-y">
                    {{$m->logros_custom}}
                  </td>
                </tr>
              @endforeach
                
            </tbody>
          </table>
    </div>
  </body>
</html>