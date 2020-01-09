<template>

<div>
        <h1>Users</h1>
        <hr>

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions #</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(user, index) in users"
                            :key="user.id" scope="row">
                            <td>{{ index + 1 }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <button class="btn btn-warning">View</button>
                               <a :href="'delete-user/' + user.id"> <button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

<script>
export default{
    name:'users',
    props:{
        users:{
            type:Array,
            required:true
        }
    },
    data(){
        return {
            user:{
                id:'',
                name:'',
                email:''
            }
        }
    },
    methods:{
        
    },
    mounted(){
        console.log(this.users);
    }
}
</script>