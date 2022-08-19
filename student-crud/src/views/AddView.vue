<script>
import axios from "axios";

export default {
  data() {
    return {
      first_name: "",
      last_name: "",
      email: "",
    };
  },
  methods: {
    submit() {
      axios
        .post("http://localhost:8000/api/student", {
          first_name: this.first_name,
          last_name: this.last_name,
          email: this.email,
        })
        .then(() => {
          this.$router.push("/");
        })
        .catch((error) => {
          alert(error);
        });
    },
  },
};
</script>

<template>
  <div class="page">
    <div class="form">
      <div class="form_input">
        <label for="first_name">First Name</label>
        <input v-model="first_name" name="first_name" />
      </div>

      <div class="form_input">
        <label for="last_name">Last Name</label>
        <input v-model="last_name" name="last_name" />
      </div>

      <div class="form_input">
        <label for="email">Email</label>
        <input v-model="email" name="email" />
      </div>

      <button @click="submit">Create Student</button>
    </div>
  </div>
</template>

<style scoped>
.page {
  width: 100%;
  display: flex;
  justify-content: center;
}

.form {
  padding: 2rem;
  box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  display: flex;
  flex-direction: column;
  align-items: center;
}

.form_input {
  display: flex;
  flex-direction: column;
}

.form_input label {
  font-size: 0.9rem;
  font-weight: 500;
}

.form_input input {
  box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
  border: none;
  padding: 0.8rem 1.5rem;
  border-radius: 0.375rem;
  outline: none;
  transition: 1s;
}

.form_input input:hover,
.form_input input:focus {
  box-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
}

button {
  margin-top: 1rem;
  background-color: blueviolet;
  color: #ffffff;
  border: none;
  padding: 0.5rem 1.3rem;
  border-radius: 0.3rem;
  font-size: 1.3rem;
  transition: 1s;
}

button:hover {
  background-color: rgb(132, 0, 255);
}
</style>
