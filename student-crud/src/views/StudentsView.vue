<script>
import axios from "axios";

export default {
  data() {
    return {
      students: [],
    };
  },

  methods: {
    destroy(id) {
      axios
        .delete(`http://localhost:8000/api/student/${id}`)
        .then(() => {
          window.location.reload();
        })
        .catch((error) => {
          alert(error);
        });
    },

    get() {
      axios
        .get("http://localhost:8000/api/student")
        .then((response) => {
          this.students = response.data.data;
        })
        .catch((error) => {
          alert(error);
        });
    },
  },

  mounted() {
    this.get();
  },
};
</script>

<template>
  <button @click="$router.push('add')">Create Student</button>
  <table class="styled-table">
    <thead>
      <tr>
        <th>Student ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(student, index) in students" :key="index" class="active-row">
        <td>{{ student.id }}</td>
        <td>{{ student.first_name }}</td>
        <td>{{ student.last_name }}</td>
        <td>{{ student.email }}</td>
        <td>
          <button
            @click="$router.push({ name: 'edit', params: { id: student.id } })"
          >
            Edit</button
          ><button @click="destroy(student.id)">Delete</button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<style scoped>
button {
  background-color: blueviolet;
  color: #ffffff;
  border: none;
  padding: 0.5rem 1.3rem;
  border-radius: 0.3rem;
  font-size: 1.3rem;
}
.styled-table {
  border-collapse: collapse;
  font-size: 0.9em;
  font-family: sans-serif;
  min-width: 100%;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
  background-color: blueviolet;
  color: #ffffff;
  text-align: center;
}

.styled-table th,
.styled-table td {
  padding: 0.8rem 0.9rem;
}

.styled-table tbody tr {
  border-bottom: 0.2rem solid #dddddd;
  text-align: center;
}

.styled-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
  border-bottom: 0.2rem solid blueviolet;
}
</style>
