<template>
  <div>
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
					<th><i class="fas fa-clipboard-check"></i></th>
          <th>materia</th>
          <th>título</th>
          <th>fecha</th>
          <th>min. tardanza</th>
          <th>nota regular</th>
          <th>nota promoción</th>
          <th>acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="examen in examenes">
          <td width="1%"><i class="fas fa-clipboard-check"></i></td>
					<td>{{examen.materia}}</td>
					<td>{{examen.nombre}}</td>
					<td>{{examen.fecha_creacion}}</td>
					<td width="10%">{{examen.min_tardanza}}</td>
					<td width="10%">{{examen.nota_regular}}</td>
					<td width="10%">{{examen.nota_promo}}</td>
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
      examenes: [
        {
          id: 0,
          curso_id: 1,
          materia_id: 1,
          nombre: "WEB II Final",
          fecha_creacion: null,
          min_tardanza: 3,
          nota_regular: 6,
          nota_promo: 8,
          estado: 1,
        },
        {
          id: 1,
          curso_id: 1,
          materia_id: 1,
          nombre: "Android Final",
          fecha_creacion: null,
          min_tardanza: 6,
          nota_regular: 6,
          nota_promo: 8,
          estado: 1,
        },
        {
          id: 2,
          curso_id: 1,
          materia_id: 1,
          nombre: "Redes Final",
          fecha_creacion: null,
          min_tardanza: 5,
          nota_regular: 6,
          nota_promo: 8,
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