<template>
    <div>
        <h1>Create User</h1>
        <form @submit.prevent="submit">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" v-model="form.name" />
                <div v-if="form.errors.name" class="error">{{ form.errors.name }}</div>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" v-model="form.email" />
                <div v-if="form.errors.email" class="error">{{ form.errors.email }}</div>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" v-model="form.password" />
                <div v-if="form.errors.password" class="error">{{ form.errors.password }}</div>
            </div>
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" v-model="form.password_confirmation" />
                <div v-if="form.errors.password_confirmation" class="error">{{ form.errors.password_confirmation }}</div>
            </div>
            <button type="submit">Create User</button>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post('/users');
};
</script>

<style scoped>
.error {
    color: red;
}
</style>