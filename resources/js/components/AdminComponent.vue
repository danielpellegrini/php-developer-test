<template>
    <div class="container" :class="{'loading':loading}">
        <div class="row justify-content-center" :class="{'d-none':loading}">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" >Admin Dashboard</div>

                    <!-- CONTENT -->
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th class="th-sm">First Name
                            </th>
                            <th class="th-sm">Last Name
                            </th>
                            <th class="th-sm">Username
                            </th>
                            <th class="th-sm">Email address
                            </th>
                            <th class="th-sm">User address
                            </th>
                            <th class="th-sm">Company
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
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
            addresses: [],
            companies: [],
            loading: true
        }
    },

    mounted() {
        this.loadUsers();
        this.loadAddresses();
        this.loadCompanies();
    },

    methods: {
        loadUsers: function() {
            axios.get('https://jsonplaceholder.typicode.com/users')
            .then((resp) => {
                this.users = resp.data;
                this.loading = false;
            })
            .catch( function (error){
                alert(error);
            });
        },
        loadAddresses: function() {

        },
        loadCompanies: function() {

        }
    }
}
</script>



