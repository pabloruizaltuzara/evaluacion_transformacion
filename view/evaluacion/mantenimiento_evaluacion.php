<script src="../js/evaluacion.js?rev=<?php echo time(); ?>"></script>


<div class="container-pts">
  <div class="btn-mas">
    <label for="btn-mas">
      <p class="card-description">
        Porcentaje
      </p>
      <h3 class="card-description text-white text-center" id="totalpts">
        0 %
      </h3>
    </label>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title text-center">EVALUACIÓN</h4>
        <p class="card-description">
          Evaluacion semestral a obreros
        </p>
        <?php
        session_start();
        ?>

        <p><b>Evaluador:</b><?= " " . $_SESSION['S_NOMBRE']; ?></p>
        <p id="txtNombreEvaluado"> <b>Evaluado:</>
        </p>

        <div class="form-group">
          <label for="txtSemestre">Mes:</label>
          <select class="form-control mb-2 " id="txtSemestre">
            
          </select>
        </div>

        <input type="text" id="txtIdEvaluado" hidden>
        <button type="button" class="btn btn-primary btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#seleccionaObrero" onclick="AbrirModalRegistroEvaluacion()">
          <i class="ti-user"> </i>
          Elegir obrero
        </button>


      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">ESCALA DE CALIFICACIÓN</h4>

        <p><b>(5)</b> Excelente</p>
        <p><b>(4)</b> Muy bueno</p>
        <p><b>(3)</b> Aceptable</p>
        <p><b>(2)</b> Regular</p>
        <p><b>(1)</b> Insuficiente</p>

        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card" style=" background-color: rgba(200, 188, 207,0.548);">
              <div class="card-body">
                <p class="card-description">
                  Puntualidad
                </p>
                <div class="container">
                  <div class="radio-tile-group">

                    <div class="input-container">
                      <input id="r1" value="1" type="radio" name="preg1" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r1">1</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r2" value="2" type="radio" name="preg1" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r2">2</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r3" value="3" type="radio" name="preg1" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r3">3</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r4" value="4" type="radio" name="preg1" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r4">4</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r5" value="5" type="radio" name="preg1" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r5">5</label>
                      </div>
                    </div>

                  </div>
                </div>

              </div>

              <div class="card-body">
                <p class="card-description">
                  Compromiso
                </p>
                <div class="container">
                  <div class="radio-tile-group">

                    <div class="input-container">
                      <input id="r6" value="1" type="radio" name="preg2" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r6">1</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r7" value="2" type="radio" name="preg2" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r7">2</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r8" value="3" type="radio" name="preg2" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r8">3</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r9" value="4" type="radio" name="preg2" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r9">4</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r10" value="5" type="radio" name="preg2" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r10">5</label>
                      </div>
                    </div>

                  </div>
                </div>

              </div>

              <div class="card-body">
                <p class="card-description">
                  Trabajo bajo presión
                </p>
                <div class="container">
                  <div class="radio-tile-group">

                    <div class="input-container">
                      <input id="r11" value="1" type="radio" name="preg3" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r11">1</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r12" value="2" type="radio" name="preg3" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r12">2</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r13" value="3" type="radio" name="preg3" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r13">3</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r14" value="4" type="radio" name="preg3" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r14">4</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r15" value="5" type="radio" name="preg3" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r15">5</label>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="card-body">
                <p class="card-description">
                  Trabajo en equipo
                </p>
                <div class="container">
                  <div class="radio-tile-group">

                    <div class="input-container">
                      <input id="r16" value="1" type="radio" name="preg4" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r16">1</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r17" value="2" type="radio" name="preg4" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r17">2</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r18" value="3" type="radio" name="preg4" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r18">3</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r19" value="4" type="radio" name="preg4" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r19">4</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r20" value="5" type="radio" name="preg4" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r20">5</label>
                      </div>
                    </div>

                  </div>
                </div>

              </div>

              <div class="card-body">
                <p class="card-description">
                  Sujeción y obediencia
                </p>
                <div class="container">
                  <div class="radio-tile-group">

                    <div class="input-container">
                      <input id="r21" value="1" type="radio" name="preg5" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r21">1</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r22" value="2" type="radio" name="preg5" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r22">2</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r23" value="3" type="radio" name="preg5" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r23">3</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r24" value="4" type="radio" name="preg5" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r24">4</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r25" value="5" type="radio" name="preg5" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r25">5</label>
                      </div>
                    </div>

                  </div>
                </div>

              </div>

              <div class="card-body">
                <p class="card-description">
                  Iniciativa
                </p>
                <div class="container">
                  <div class="radio-tile-group">

                    <div class="input-container">
                      <input id="r26" value="1" type="radio" name="preg6" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r26">1</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r27" value="2" type="radio" name="preg6" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r27">2</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r28" value="3" type="radio" name="preg6" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r28">3</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r29" value="4" type="radio" name="preg6" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r29">4</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r30" value="5" type="radio" name="preg6" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r30">5</label>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="card-body">
                <p class="card-description">
                  Responsabilidad
                </p>
                <div class="container">
                  <div class="radio-tile-group">

                    <div class="input-container">
                      <input id="r31" value="1" type="radio" name="preg7" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r31">1</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r32" value="2" type="radio" name="preg7" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r32">2</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r33" value="3" type="radio" name="preg7" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r33">3</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r34" value="4" type="radio" name="preg7" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r34">4</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r35" value="5" type="radio" name="preg7" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r35">5</label>
                      </div>
                    </div>

                  </div>
                </div>

              </div>

              <div class="card-body">
                <p class="card-description">
                  Disposición
                </p>
                <div class="container">
                  <div class="radio-tile-group">

                    <div class="input-container">
                      <input id="r36" value="1" type="radio" name="preg8" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r36">1</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r37" value="2" type="radio" name="preg8" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r37">2</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r38" value="3" type="radio" name="preg8" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r38">3</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r9" value="4" type="radio" name="preg8" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r39">4</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r40" value="5" type="radio" name="preg8" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r40">5</label>
                      </div>
                    </div>

                  </div>
                </div>

              </div>

              <div class="card-body">
                <p class="card-description">
                  Testimonio
                </p>
                <div class="container">
                  <div class="radio-tile-group">

                    <div class="input-container">
                      <input id="r41" value="1" type="radio" name="preg9" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r41">1</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r42" value="2" type="radio" name="preg9" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r42">2</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r43" value="3" type="radio" name="preg9" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r43">3</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r44" value="4" type="radio" name="preg9" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r44">4</label>
                      </div>
                    </div>

                    <div class="input-container">
                      <input id="r45" value="5" type="radio" name="preg9" onchange="mySumador()">
                      <div class="radio-tile">
                        <label for="r45">5</label>
                      </div>
                    </div>

                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>

      </div>


    </div>

  </div>

</div>

<button type="button" class="btn btn-primary btn-lg btn-block" onclick="Registrar_Evaluacion()">
  Guardar evaluación
</button>



<div class="modal fade" id="seleccionaObrero" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" style="background-color: rgb(222,222,222);">
        <div class="table-responsive">
          <table class="table" id="obreros_select">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>





<script>



  var area = "<?= $_SESSION['S_AREA']; ?>";

  validarArea(area);

  listarSemestre();
</script>