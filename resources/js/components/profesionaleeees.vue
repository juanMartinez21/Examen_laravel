<template>
        <!-- Main content -->
      <!-- Default box -->
      <main class="main">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Profesional</h3>
          <button @click="abrirModal('profesional','registrar')" type="button" class="btn btn-secondary">
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
                      <td v-text="profesional.nroDocumento">

                      </td>
                      <td v-text="profesional.nombre">

                      </td>
                      <td v-text="profesional.apellido">

                      </td>
                      <td v-text="profesional.habilidades">
                         
                      </td>
                      <td v-text="profesional.salario">
                         
                      </td>
                      <td class="project-state">
                          <div v-if="profesional.disponible">
                              <span class="badge badge-success">Activo</span>
                          </div>
                          <div v-else>
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
                          <a  class="btn btn-info btn-sm" href="#" @click="abrirModal('profesional','actualizar',profesional)">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Editar
                          </a>
                            <a v-if="profesional.disponible" class="btn btn-danger btn-sm" href="#" @click="desactivarProfesional(profesional.id)">
                                <i class="fas fa-trash">
                                </i>
                                Desactivar
                            </a>
                            <a v-else class="btn btn-info btn-sm" href="#" @click="activarProfesional(profesional.id)">
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
                        <button @click="cerrarModal()" type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                               <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Documento</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" placeholder="Documento">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="email-input">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Nombre Profesional">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="email-input">Apellido</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Apellido Profesional">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="email-input">Habilidades</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Habilidades Profesional">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="email-input">Salario</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" placeholder="Salario Profesional">
                                </div>
                            </div>
                            <div class="form-group row div-error">
                                <div class="text-center text-error">
                                    <div v-for="error in errorMostrarMsjProfesional" :key="error" v-text="error">

                                    </div>
                                </div>
                            
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button @click="cerrarModal()" type="button" class="btn btn-secondary">Cerrar</button>
                        <button @click="registrarProfesional()" type="button" class="btn btn-primary" >Guardar</button>
                        <button @click="actulizarProfesional()" type="button" class="btn btn-primary" >Actualizar</button>
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
            return{
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                profesional_id : 0,
                nroDocumento : 0,
                nombre : '',
                apellido : '',
                habilidades : '',
                salario : 0,
                arrayProfesional : [],
                errorprofesional : 0,//Determinar si hay o no errores
                errorMostrarMsjProfesional : []
            }
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
            },
            tabla (){//DataTable
            this.$nextTick(()=>{
                $('#tabla').DataTable();//Llamar el DataTable
            })
            },
            abrirModal(modelo,accion,data = []){
                switch(modelo){
                    case "profesional":
                    {
                        switch(accion){
                            case "registrar":
                            {
                            this.modal = 1;
                            this.tituloModal = 'Registrar Profesional';
                            this.nroDocumento = 0;
                            this.nombre = '';
                            this.apellido = '';
                            this.habilidades = '';
                            this.salario = 0;
                            this.tipoAccion = 1;
                            this.errorprofesional = 0;
                            break;
                            }

                            case "actualizar":
                            {
                            this.modal = 1;
                            this.tituloModal = 'Actualizar Profesional';
                            this.profesional_id = data['id'];
                            this.nroDocumento = data['nroDocumento'];
                            this.nombre = data['nombre'];
                            this.apellido = data['apellido'];
                            this.descripcion = data['descripcion'];
                            this.salario = data['salario'];
                            this.tipoAccion = 2;
                            this.errorprofesional = 0;
                            break;
                            }
                        }
                        break;
                    }
                }
            },
            cerrarModal(){
                this.modal = 0;//VAriable para cerrar el modal
                this.tituloModal = '';
                this.nroDocumento = 0;
                this.nombre = '';
                this.apellido = '';
                this.habilidades = '';
                this.salario = 0;
            },
            registrarProfesional(){
                if(this.validarProfesional()){
                    return;
                }

                let me = this;
                axios.post('/profesional/registrar',{
                    'nroDocumento' : this.nroDocumento,
                    'nombre' : this.nombre,
                    'apellido' : this.apellido,
                    'habilidades' : this.habilidades,
                    'salario' : this.salario
                })
                .then(function (response) {
                    me.cerrarModal();
                    me.listarProfesional();
                    console.log(response);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            },
            actulizarProfesional(){
                if(this.validarProfesional()){
                    return;
                }

                let me = this;
                axios.put('/profesional/actualizar',{
                    'id' : this.profesional_id,
                    'nroDocumento' : this.nroDocumento,
                    'nombre' : this.nombre,
                    'apellido' : this.apellido,
                    'habilidades' : this.habilidades,
                    'salario' : this.salario
                })
                .then(function (response) {
                    me.cerrarModal();
                    me.listarProfesional();
                    console.log(response);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            },
            validarProfesional(){
                this.errorprofesional = 0;
                this.errorMostrarMsjProfesional = [];
                
                if (!this.nombre) this.errorMostrarMsjProfesional.push("Nombre del profesional no puede estar vacio");

                if(this.errorMostrarMsjProfesional.length) this.errorprofesional = 1;//Mostrar el error

                return this.errorprofesional;
            },
            desactivarProfesional(id){
                let me = this;
                axios.put('/profesional/desactivar',{
                    'id' : id
                })
                .then(function (response) {
                    me.listarProfesional();
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            },
            activarProfesional(id){
                let me = this;
                axios.put('/profesional/activar',{
                    'id' : id
                })
                .then(function (response) {
                    me.listarProfesional();
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
<style>
    .modal-content{
        width: 100% !important;
        margin-top: 50px;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;/*Distribuir div a la pantalla principal*/
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
</style>