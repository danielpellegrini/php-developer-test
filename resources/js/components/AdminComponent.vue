<template>
    <div class="container" :class="{'loading':loading}">
        <div class="row justify-content-center" :class="{'d-none':loading}">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" >Admin Dashboard</div>

                    <!-- CONTENT -->

                                         


                    <table id="dtBasicExample" class="table table-responsive table-hover " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm sorting" @click="sort('name')" >First Name
                                <!-- <i class="fas fa-caret-up" :class="{'is-active': ascName}"  @click="ascName=!ascName"></i>
                                <i class="fas fa-caret-down" :class="{'is-active': descName}" @click="descName=!descName"></i> -->
                                </th>
                                <th class="th-sm sorting" @click="sort('name')">Last Name

                                </th>
                                <th class="th-sm sorting" @click="sort('username')">Username
                                <!-- <i class="fas fa-caret-up" :class="{'is-active': ascUsername}"  @click="ascUsername=!ascUsername"></i>
                                <i class="fas fa-caret-down" :class="{'is-active': descUsername}" @click="descUsername=!descUsername"></i> -->
                                </th>
                                <th class="th-sm sorting" @click="sort('email')">Email address
                                </th>
                                <th class="th-sm">User address
                                </th>
                                <th class="th-sm">Company
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="(user, index) in sorted" data-toggle="modal" :data-target="'#userSelected' + user.id" >
                                <td class="align-middle" >{{ user.name.split(' ').splice(0, 1).join() }}</td>
                                <td class="align-middle">{{ user.name.split(' ').splice(1, 1+2).join(' ') }}</td>
                                <td class="align-middle">{{ user.username }}</td>
                                <td class="align-middle">{{ user.email }}</td>
                                <td class="align-middle">
                                    {{ user.address.city }}<br>
                                    {{ user.address.street }}<br>
                                    {{ user.address.zipcode }}
                                </td>
                                <td class="align-middle">
                                    {{ user.company.name }}<br>
                                    {{ user.company.catchPhrase }}
                                </td>
                                <!-- Modal -->
                                <div class="modal fade" :id="'userSelected' + user.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" class="text-center t-head"><i class="fas fa-user"></i> User details</td>                                                        
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="bold">Name</th>
                                                        <td>{{ user.name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="bold">Username</th>
                                                        <td>{{ user.username }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="bold">Email</th>
                                                        <td>{{ user.email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-center t-head"><i class="fas fa-envelope"></i> Address</td>                                                        
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="bold">City</th>
                                                        <td>{{ user.address.city }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="bold">Street</th>
                                                        <td>{{ user.address.street }}</td>
                                                    </tr> 
                                                    <tr>                                                   
                                                        <th scope="row" class="bold">Zip code</th>
                                                        <td>{{ user.address.zipcode }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-center t-head"><i class="fas fa-building"></i> Company</td>                                                        
                                                    </tr>
                                                    <tr>                                                   
                                                        <th scope="row" class="bold">Company name</th>
                                                        <td>{{ user.company.name }}</td>
                                                    </tr> 
                                                    <tr>                                                   
                                                        <th scope="row" class="bold">Description</th>
                                                        <td>{{ user.company.catchPhrase }}</td>
                                                    </tr>
                                                    
                                                    
                                                </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr> 
                          
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                    <!-- /CONTENT -->
                
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            users: [],
            loading: true,
            currentSort: 'name',
            currentSortDir: 'asc'
        }
    },

    mounted() {
        this.loadUsers();
        
    },

    methods: {
        loadUsers: function() {
            axios.get('https://jsonplaceholder.typicode.com/users')
            .then((resp) => {
                this.users = resp.data;
                this.loading = false;                
            })
            .catch( e => {
                alert(error(e));
            });
        },
        sort(s) {
            if (s === this.currentSort) {
                this.currentSortDir = this. currentSortDir === 'asc'?'desc':'asc';
            }
            this.currentSort = s;
        },
 
    },  
    computed: {
        sorted() {
            return this.users.sort((a, b) =>{
                let modifier = 1;
                if(this.currentSortDir === 'desc') modifier = -1;
                if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
                if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
                return 0;
            })

        }, 
    }
}
</script>



