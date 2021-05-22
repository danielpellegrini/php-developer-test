<template>
    <div class="container" :class="{'loading':loading}">
        <div class="row justify-content-center" :class="{'d-none':loading}">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" >Admin Dashboard</div>

                    <!-- CONTENT -->
                        <span class="list-group-item" v-for="user in users">
                            Name: <a class="text-decoration-none d-block">{{ user.name }}</a>
                            City: <a class="text-decoration-none d-block">{{ user.address.city }}</a>
                        </span>

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



