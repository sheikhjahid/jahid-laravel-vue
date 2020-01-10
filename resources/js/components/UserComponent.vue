<template>

<div>
        <h1>Users</h1>
        
        <div v-if="view" class="mb-2">
            <h3>User Details</h3>
            <button  class="btn btn-primary" v-on:click="close">Close</button>
            <hr>
            <div class="user-name">
            <label class="label label-success">User : {{getData.name}}</label>
            </div>
            <div class="user-email">
            <label class="label label-success">Email : {{getData.email}}</label>
            </div>
        </div>
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
                               <button class="btn btn-warning" v-on:click="viewUser(user)">View</button>
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
            },
            view:false,
            getData:{}
        }
    },
    methods:{
        viewUser(user)
        {
            this.view = true;
            this.getData = {
                id:user.id,
                name:user.name,
                email:user.email
            };
        },
        close()
        {
            this.view=false;
        }
    },
    mounted(){
        console.log(this.users);
    }
}
</script>