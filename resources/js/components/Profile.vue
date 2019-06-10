<template>
    
    <div class="container"> 

        <!-- start profile -->

        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user mt-3">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <!-- style="background: url('../dist/img/photo1.png') center center;" -->
            <div class="widget-user-header text-white">
            <h3 class="widget-user-username" v-text="form.name"></h3>
            <h5 class="widget-user-desc">Web Developer</h5>
            </div>
            <div class="widget-user-image">
            <img class="img-circle" :src="PhotoProfile()" alt="User Avatar">
            </div>
            <div class="card-footer">
            <div class="row">
                <div class="col-sm-4 border-right">
                <div class="description-block">
                    <h5 class="description-header">3,200</h5>
                    <span class="description-text">SALES</span>
                </div>
                <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                <div class="description-block">
                    <h5 class="description-header">13,000</h5>
                    <span class="description-text">FOLLOWERS</span>
                </div>
                <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                <div class="description-block">
                    <h5 class="description-header">35</h5>
                    <span class="description-text">PRODUCTS</span>
                </div>
                <!-- /.description-block -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-user -->
        
        <!-- start body of profile -->
        
        <div class="card mt-3">
            <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active show" href="#settings" data-toggle="tab">Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
            </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
            <div class="tab-content">
                  <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <li class="time-label">
                    <span class="bg-danger">
                        10 Feb. 2014
                    </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                    <i class="fa fa-envelope bg-primary"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                        <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                        </div>
                        <div class="timeline-footer">
                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                    <i class="fa fa-user bg-info"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                        </h3>
                    </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                    <i class="fa fa-comments bg-warning"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                        <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                        </div>
                        <div class="timeline-footer">
                        <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                        </div>
                    </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <li class="time-label">
                    <span class="bg-success">
                        3 Jan. 2014
                    </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                        <div class="timeline-body">
                        <img  class="margin">
                        <img  class="margin">
                        <img  class="margin">
                        <img  class="margin">
                        </div>
                    </div>
                    </li>
                    <!-- END timeline item -->
                    <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                </ul>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane  active show" id="settings">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                            <input :class="{ 'is-invalid': form.errors.has('name') }" v-model="form.name" type="email" class="form-control" id="inputName" placeholder="Name">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input :class="{ 'is-invalid': form.errors.has('email') }" v-model="form.email" type="email" class="form-control" id="inputEmail" placeholder="Email">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                            <input :class="{ 'is-invalid': form.errors.has('password') }" v-model="form.password" type="text" class="form-control" id="inputPassword2" placeholder="Password">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">biography</label>

                        <div class="col-sm-10">
                            <textarea :class="{ 'is-invalid': form.errors.has('bio') }" v-model="form.bio" class="form-control" id="inputbiography" placeholder="biography"></textarea>
                            <has-error :form="form" field="bio"></has-error>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Upload Photo</label>

                        <div class="col-sm-10">
                            <input :class="{ 'is-invalid': form.errors.has('photo') }" type="file" @change="userPhoto" class="form-control" name="photo" placeholder="groupID">
                            <has-error :form="form" field="photo"></has-error>
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button  type="submit" @click.prevent="updateinfo" class="btn btn-danger">Update Profile</button>
                    </div>
                    </div>
                </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>      
</template>

<script>
    export default {
        data(){
            return{
                users:{},
                form: new Form({
                    id:'',
                    name:'',
                    email:'',
                    password:'',
                    bio:'',
                    photo:''
                })
            }
        },
        methods: {
            PhotoProfile(){
                let photo = (this.form.photo.length>200) ? this.form.photo :"/img/profile/"+this.form.photo;
                //return "/img/profile/"+this.form.photo;
                return photo;
            },
            updateinfo(){
                this.$Progress.start();
                this.form.put('api/updateinfo')
                .then(()=>{
                    fire.$emit('UpdateUser')
                    swal(
                        'Updated!',
                        'Updated Successfully.',
                        'success'
                    ),
                    this.$Progress.finish();
                    //this.$router.push({path: '/users' });
                })
                .catch(
                    ()=>{
                        this.$Progress.fail()
                    }
                );
                this.form.fill(data);
            },
            userPhoto(e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                if(file['size']<5279437.5){
                    reader.onloadend = (file)=> {
                        this.form.photo = reader.result;
                    }
                    reader.readAsDataURL(file);
                }else{
                    swal(
                        'oops!',
                        'Oops the Image is Larger than 2M.',
                        'error'
                    );
                }
                
            },
        },
        created(){
            axios('api/profile')
            .then(({data})=>{
                this.form.fill(data)
            });
            fire.$on('UpdateUser',()=>{
                axios('api/profile')
                    .then(({data})=>{
                    this.form.fill(data)
                });
            });
        },
        
    }     
</script>
