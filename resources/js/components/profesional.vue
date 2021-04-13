<template>
        <!-- Main content -->
      <!-- Default box -->
      <main class="main">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Categorías</h3>
          <button type="button" class="btn btn-secondary">
              <i class="icon-plus"></i>&nbsp;Nuevo
          </button>
        
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="display" style="width:100%" id="tabla">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 15%">
                          Nro Documento
                      </th>
                      <th style="width: 15%">
                          Nombre
                      </th>
                      <th style="width: 15%">
                          Apellido
                      </th>
                      <th style="width: 15%">
                          Habilidades
                      </th>
                      <th style="width: 15%">
                          Salario
                      </th>
                      <th style="width: 20%">
                          Estado
                      </th>
                      <th style="width: 19%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr v-for="profesional in arrayProfesional" :key="profesional.id"> 
                      <td>
                          #
                      </td>
                      <td>Nro Documento

                      </td>
                      <td>
                          <a>Nombre
                          </a>
                          <br/>
                          <small>
                            Creado
                          </small>
                      </td>
                      <td>Apellido
                         
                      </td>
                      <td>Habilidades

                      </td>
                      <td>Salario

                      </td>
                      <td class="project-state">
                          <div>
                              <span class="badge badge-success">Activo</span>
                          </div>
                          <div>
                              <span class="badge badge-danger">Desactivado</span>
                          </div>
                      </td>
                      <td class="project-actions text-right">
                          <!--<a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              Ver
                          </a>
                          -->
                          <a class="btn btn-info btn-sm" href="#" >
                              <i class="fas fa-pencil-alt">
                              </i>
                              Editar
                          </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Eliminar
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-check">
                                </i>
                                Activar
                            </a>
                      </td>
                  </tr>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->


      </div>
      <!-- /.card -->


        <!--Inicio del modal agregar/actualizar-->
        <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title" ></h4>
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                               <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Nombre de categoría">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" placeholder="Descripción Categoria">
                                </div>
                            </div>
                            <div class="form-group row div-error">
                                <div class="text-center text-error">
                                    <div>

                                    </div>
                                </div>
                            
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary">Cerrar</button>
                        <button type="button" class="btn btn-primary" >Guardar</button>
                        <button type="button" class="btn btn-primary" >Actualizar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->

        </div>
        <!--Fin del modal-->
      </main>

      
</template>

<script>
    export default {
        data (){
            arrayProfesional : []
        },
        methods : {
            listarProfesional (){//Declrar todas las funciones
                let me = this;
               //alert('Listar Categoria');
               // Make a request for a user with a given ID
                axios.get('/profesional').then(response => {
                    me.arrayProfesional = response.data
                    this.tabla();//Cargar el DataTable
                    // handle success
                    console.log(me.arrayProfesional);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            }
        },
        mounted() {
            this.listarProfesional();
        },
    }
</script>