<template>
    <div class="container">
        <!-- <router-link to="/profile">profile</router-link> -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">Type</th>
                    <th scope="col">City</th>
                    <th scope="col">Register at</th>
                    <th scope="col">
                        <button type="button" class="btn btn-primary" @click="newModal">
                            Add New User
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <th scope="row">{{user.id}}</th>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.type | capitalize}}</td>
                    <td>{{user.city.name}}</td>
                    <td>{{user.created_at | myDate}}</td>
                    <td>
                        <a href="#" @click="editModal(user)"><i class="fa fa-edit fa-lg blue"></i></a>
                        &nbsp;&nbsp;
                        <a href="#" @click="deleteUser(user.id)"><i class="fa fa-trash fa-lg red"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- start modal  -->

        <!-- Modal -->
        <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="adduserTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-show="!editmode" class="modal-title" id="adduserTitle">Add New User</h5>
                        <h5 v-show="editmode" class="modal-title" id="adduserTitle">Update User Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode?updateUser():creatUser()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form.name" type="text" name="name"
                                placeholder="name"  class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.email" type="text" name="email"
                                placeholder="email"  class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                            <div class="form-group" v-show="!editmode">
                                <input v-model="form.password" type="password" name="password"
                                placeholder="password"  class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                <has-error :form="form" field="password"></has-error>
                            </div>
                            <div class="form-group">
                                <select v-model="form.type" name="type"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                    <option value="none">none</option>
                                    <option value="user">user</option>
                                    <option value="admin">admin</option>
                                    <option value="moderator">moderator</option>
                                </select>
                                <has-error :form="form" field="type"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.bio" type="text" name="bio"
                                placeholder="biography"  class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }">
                                <has-error :form="form" field="bio"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.photo" type="text" name="photo"
                                placeholder="photo"  class="form-control" :class="{ 'is-invalid': form.errors.has('photo') }">
                                <has-error :form="form" field="photo"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Update Data</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>

<script>
    export default {
        data() {
            return {
                editmode:true,
                users:{},
                form: new Form({
                    id:'',
                    name:'',
                    email:'',
                    password:'',
                    type :'',
                    bio:'',
                    photo:'',
                }),
            }
        },
        methods:{
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#adduser').modal('show');
            },
            editModal(user){
                this.editmode = true;
                this.form.reset();
                this.form.fill(user);
                $('#adduser').modal('show');
            },
            loadUser(){
                axios.get('api/users').then(({ data }) => { this.users = data.data });
            },
            updateUser(){
                this.$Progress.start();
                this.form.put('/api/users/'+this.form.id)
                .then(()=>{
                    //this.loadUser();
                    fire.$emit('CreateUser')
                    $('#adduser').modal('hide');
                    this.$Progress.finish();
                    swal(
                        'Updated!',
                        'Your user has been updated.',
                        'success'
                    );
                }).catch(()=>{
                    swal(
                        'problem!',
                        'Your user has been problem.',
                        'error'
                    );
                });
            },
            creatUser(){
                this.$Progress.start();
                this.form.post('/api/users')
                .then(()=>{
                    //this.loadUser();
                    fire.$emit('CreateUser')
                    $('#adduser').modal('hide');
                    this.$Progress.finish();
                    toast({
                        type: 'success',
                        title: 'Created User successfully'
                    });
                }).catch(()=>{
                    swal(
                        'problem!',
                        'Your user has been problem.',
                        'error'
                    );
                    });
            },
            deleteUser(id){
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.value) {
                        this.$Progress.start();
                        axios({
                            method: 'delete',
                            url: '/api/users/'+id,
                        })
                        .then(() => {
                            this.$Progress.finish();
                            swal(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            fire.$emit('CreateUser')
                        })
                        .catch(()=>{
                            swal(
                                'oops!',
                                'Your file has been oops.',
                                'error'
                            );
                        });
                    }
                })
                .catch(()=>{})
            }
        },
        created() {
            this.loadUser();
            fire.$on('CreateUser',()=>{
                this.loadUser();
            });
        }
    }
</script>
