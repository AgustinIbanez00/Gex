<template>
  <div>
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
					<th></th>
          <th>comisión</th>
          <th>cuatrimestre</th>
          <th>ciclo lectivo</th>
          <th>cant. alumnos</th>
          <th>acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="curso in cursos">
          <td width="1%"><i class="far fa-calendar-alt"></i></td>
					<td>{{curso.comision}}</td>
					<td width="1%">{{curso.cuatrimestre}}</td>
					<td>{{curso.ciclo_lectivo}}</td>
					<td width="10%">{{curso.cant_alumnos}}</td>
					<td width="1%">
						<div class="btn-group">
							<button class="btn btn-primary"><i class="far fa-eye"></i></button>
							<button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
						</div>
					</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
 
<script>
export default {
  data: function () {
    return {
      cursos: [
        {
          id: 0,
          comision: "5C",
          cuatrimestre: 1,
          ciclo_lectivo: 2020,
          cant_alumnos: 3,
          estado: 1,
        },
        {
          id: 1,
          comision: "4B",
          cuatrimestre: 1,
          ciclo_lectivo: 2020,
          cant_alumnos: 6,
          estado: 1,
        },
        {
          id: 2,
          comision: "1A",
          cuatrimestre: 1,
          ciclo_lectivo: 2020,
          cant_alumnos: 5,
          estado: 1,
        },
      ],
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
  },
};
</script>