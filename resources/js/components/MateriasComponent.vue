<template>
  <div>
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
					<th></th>
          <th>nombre</th>
          <th>acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="materia in materias">
          <td width="1%"><i class="fas fa-book"></i></td>
					<td>{{materia.nombre}}</td>
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
      materias: [
        {
          id: 0,
          nombre:"WEB II",
          estado: 1,
        },
        {
          id: 1,
          nombre:"Android",
          estado: 1,
        },
        {
          id: 2,
          nombre:"Redes",
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