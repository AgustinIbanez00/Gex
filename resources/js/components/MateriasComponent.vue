<template>
  <div>
    <header class="bg-white shadow" id="app">
      <div class=" py-6 sm:px-6  text-center">
      	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
      		<span v-if="modo == modos.materias">
      			Materias
      			<button class="btn btn-outline-primary float-right" @click="agregar_materia"><i class="fas fa-plus"></i> Agregar</button>
      		</span>
      		<span v-else>
      			{{modo == modos.editar ? materia.nombre : "Nueva materia"}}
      			<button class="btn btn-outline-dark float-right" @click="ver_lista"><i class="fas fa-angle-left"></i> Materias</button>
      		</span>
      	</h2>
      </div>
    </header>
    <div class="py-2 px-2">
      <div class="mx-auto">
				<!-- TABLA MATERIAS -->
        <div v-if="modo == modos.materias" class="bg-white overflow-hidden shadow-xl sm:rounded-lg">				
					<table class="table table-bordered table-hover">
						<thead class="thead-dark">
							<tr>
								<th width="1%"><i class="fas fa-book"></i></th>
								<th class="text-center">nombre</th>
								<th class="text-center" width="5%">acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr v-if="cargando_materias">
								<td  colspan="3" class="text-center">
									<div class="text-lg text-info">
										<i class="fas fa-spinner fa-pulse fa-lg"></i> Cargando materias...
									</div>
								</td>
							</tr>
							<tr v-else-if="materias.length == 0">
								<td  colspan="3" class="text-center">
									<div v-if="cargando_materias" class="text-lg text-info">
										<i class="fas fa-spinner fa-pulse fa-lg"></i> Cargando materias...
									</div>
									<span v-else> No posée materias</span>
								</td>
							</tr>
							<tr v-else v-for="materia in materias">
								<td><i class="fas fa-book"></i></td>
								<template v-if="!materia.eliminar">
									<td>{{ materia.nombre }}</td>
									<td>
										<div class="btn-group">
											<button class="btn btn-primary" @click="ver_materia(materia)"><i class="far fa-eye"></i></button>
											<button class="btn btn-outline-danger" @click="eliminar(materia)"><i class="fas fa-trash-alt"></i></button>
										</div>
									</td>
								</template>
								<td v-else colspan="2" class="text-center font-weight-bold h5">
									¿Está seguro que desea <span class="text-danger">eliminar</span> la materia <span class="text-danger">{{materia.nombre}}</span>?
									<button class="btn btn-danger float-right"><i class="fas fa-trash-alt"></i> Confirmar</button>
								</td>
							</tr>
						</tbody>
					</table>		
				</div>
				<!-- /TABLA MATERIAS -->

				<!-- MATERIA -->
				<div v-else class="card text-center shadow-xl" id="f_materia">
					<div class="card-header bg-info text-white">Propiedades</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="f_materia_nombre" class="col-sm-2 col-form-label">Nombre</label>
							<div class="col-sm-10">
								<input name="f_materia_nombre" placeholder="Nombre" class="form-control" type="text" v-model="materia.nombre" data-toggle="tooltip" data-placement="right" title="Requerido">
							</div>
						</div>
					</div>
					<div class="card-footer text-muted">
						<button class="btn btn-primary float-right" @click="guardar_materia" :disabled="ajax"><i v-show="ajax" class="fas fa-spinner fa-pulse"></i> {{modo == modos.agregar ?  "Agregar" : "Guardar"}}</button>
						<button class="btn btn-outline-dark float-right mr-2" @click="ver_lista">Cancelar</button>
					</div>
				</div>
				<!-- /MATERIA -->
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data: function () {
    return {
      modo: 0,
      modos: {
        materias: 0,
        agregar: 1,
        editar: 2,
      },
      materias: [],
      cargando_materias: false,
      cambios_materias: true,
      ajax: false
    };
  },
  mounted() {
    var v = this;
   	v.ver_lista();
   	v.tooltip();
  },
  methods: {
		cargar_materias: function(){
			var v = this;
			v.cargando_materias = true;
			axios.get('/api/materias/')
			.then(res => {
				if(!res.error){
					v.materias = res.data;
					v.cambios_materias = false;
				}
			}).catch(err => {console.log(err)})
			.finally(function() { v.cargando_materias = false; });
		},
		agregar_materia: function(){
			var v = this;
			v.modo = v.modos.agregar;
			v.materia = JSON.parse(JSON.stringify(materia_default));
			Vue.nextTick(function() {
				v.limpiar_form_error('f_materia');
				v.tooltip();
			});
		},
    ver_materia: function (materia) {
      var v = this;
      v.modo = v.modos.editar;
      v.materia = materia;
      Vue.nextTick(function() {
      	v.limpiar_form_error('f_materia');
      	v.tooltip();
      });
     
		},
		eliminar: function(materia){
			Vue.set(materia, "eliminar", true);
			setTimeout(() => materia.eliminar = false, 6000);
		},
		ver_lista: function(){
			var v = this;
			v.materias.forEach(m => m.eliminar = false);
			v.modo = v.modos.materias;
			if(v.cambios_materias) v.cargar_materias();
		},
		guardar_materia: function(){
			var v = this;
			var error = 0;
    	v.limpiar_form_error('f_materia');
			
			if(v.materia.nombre == ''){
				v.error('f_materia_nombre');
				error++;
			}
			if(error > 0) return;
			v.ajax = true;
			axios.post('/materias/', v.materia)
			.then(res => {
				v.cambios_materias = true;
			}).catch(err => { console.log(err)})
			.finally(function(){ v.ajax = false; });
		},
		tooltip: function(){
			$('[data-toggle="tooltip"]').tooltip()
		},
		error: function(input){
			var input = 'input[name="'+input+'"]';
			$(input).addClass('is-invalid');
			$(input).tooltip('enable');
			$(input).tooltip('show');
		},
		limpiar_form_error: function(form){
			$('#'+form+' input').removeClass('is-invalid');
			$('#'+form+' input').tooltip('disable');
		}
  },
};

const materia_default = {
	nombre: '',
};
</script>