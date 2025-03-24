<template>
    <div>
        <h1>Users</h1>
        <ul>
            <li v-for="user in users" :key="user.id">{{ user.name }}</li>
        </ul>
    </div>
    <div>
        <inertia-link href="users.create">Create User</inertia-link>
        </div>
</template>

<script setup>
    defineProps({
        users: Array,
    });
</script>