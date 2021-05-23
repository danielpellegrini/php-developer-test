<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Guest Landing Page</div>

                    <!-- CONTENT -->
                    <form-wizard @on-complete="onComplete"
                                 title="Sign Up Your User Account"
                                 subtitle="Fill all form field to go next step">

                        <!-- STEP 1 - PERSONAL INFO-->
                        <tab-content title="Personal details">
                            <form @submit.prevent="submit">

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">First Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" v-model="fields.name" required autofocus>
                                        <div class="alert alert-danger" v-if="errors && errors.name">
                                            {{ errors.name[0] }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lastname" class="col-md-4 col-form-label text-md-right">Last Name</label>

                                    <div class="col-md-6">
                                        <input id="lastname" type="text" class="form-control" name="lastname" v-model="fields.lastname" required autofocus>
                                        <div class="alert alert-danger" v-if="errors && errors.lastname">
                                            {{ errors.lastname[0] }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control" name="username" v-model="fields.username" required autofocus>
                                        <div class="alert alert-danger" v-if="errors && errors.username">
                                            {{ errors.username[0] }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" v-model="fields.email" required autocomplete="email">
                                        <div class="alert alert-danger" v-if="errors && errors.email">
                                            {{ errors.email[0] }}
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </tab-content>

                        <!-- STEP 2 - ADDRESS-->
                        <tab-content title="Additional Info">

                            <div class="form-group row">
                                <label for="street" class="col-md-4 col-form-label text-md-right">Street</label>

                                <div class="col-md-6">
                                    <input id="street" type="text" class="form-control" name="street" v-model="fields.street" required autofocus>
                                    <div class="alert alert-danger" v-if="errors && errors.street">
                                        {{ errors.street[0] }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" v-model="fields.city" required autofocus>
                                    <div class="alert alert-danger" v-if="errors && errors.city">
                                        {{ errors.city[0] }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="zip" class="col-md-4 col-form-label text-md-right">Zip Code</label>

                                <div class="col-md-6">
                                    <input id="zip" type="text" class="form-control" name="zip" v-model="fields.zip" required autofocus>
                                    <div class="alert alert-danger" v-if="errors && errors.zip">
                                        {{ errors.zip[0] }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="country" name="default" v-model="fields.country">
                                        <option value="default" selected disabled>Select a Country</option>
                                        <option v-for="country in countries" :key="country"
                                                :value="country.name">{{ country.name }}
                                        </option>
                                    </select>
                                    <div class="alert alert-danger" v-if="errors && errors.country">
                                        {{ errors.country[0] }}
                                    </div>
                                </div>
                            </div>
                        </tab-content>

                        <!-- STEP 3 - COMPANY -->
                        <tab-content title="Company" v-if="{'d-none': company}">
                            <div class="form-group row">
                                <label for="company_name" class="col-md-4 col-form-label text-md-right">Company name</label>

                                <div class="col-md-6">
                                    <input id="company_name" type="text" class="form-control" name="company_name" v-model="fields.company_name" required autofocus>
                                    <div class="alert alert-danger" v-if="errors && errors.company_name">
                                        {{ errors.company_name[0] }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" rows="5" class="form-control" name="description" v-model="fields.description" required autofocus></textarea>
                                    <div class="alert alert-danger" v-if="errors && errors.description">
                                        {{ errors.description[0] }}
                                    </div>
                                </div>
                            </div>

                        </tab-content>

                        <!-- FINAL STEP -->
                        <tab-content title="Last step">

                        <!-- SUCCESS MESSAGE -->
                            <div class="alert alert-success" v-show="success">User created successfully.</div>
                            <h2 class="text-center mb-5">Check your entries:</h2>
                            <!-- FIRST NAME -->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">First Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" v-model="fields.name" required autofocus>
                                    <div class="alert alert-danger" v-if="errors && errors.name">
                                        {{ errors.name[0] }}
                                    </div>
                                </div>
                            </div>
                            <!-- LAST NAME -->
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Last Name</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="lastname" v-model="fields.lastname" required autofocus>
                                    <div class="alert alert-danger" v-if="errors && errors.lastname">
                                        {{ errors.lastname[0] }}
                                    </div>
                                </div>
                            </div>
                            <!-- USERNAME -->
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" v-model="fields.username" required autofocus>
                                    <div class="alert alert-danger" v-if="errors && errors.username">
                                        {{ errors.username[0] }}
                                    </div>
                                </div>
                            </div>
                            <!-- EMAIL -->
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" v-model="fields.email" required autocomplete="email">
                                    <div class="alert alert-danger" v-if="errors && errors.email">
                                        {{ errors.email[0] }}
                                    </div>
                                </div>
                            </div>
                            <!-- ADDRESS -->
                            <h4 class="text-center mt-2 col-md-6">ADDRESS:</h4>
                            <!-- STREET -->
                            <div class="form-group row">
                                <label for="street" class="col-md-4 col-form-label text-md-right">Street</label>

                                <div class="col-md-6">
                                    <input id="street" type="text" class="form-control" name="street" v-model="fields.street" required autofocus>
                                    <div class="alert alert-danger" v-if="errors && errors.street">
                                        {{ errors.street[0] }}
                                    </div>
                                </div>
                            </div>
                            <!-- CITY -->
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" v-model="fields.city" required autofocus>
                                    <div class="alert alert-danger" v-if="errors && errors.city">
                                        {{ errors.city[0] }}
                                    </div>
                                </div>
                            </div>
                            <!-- ZIP CODE -->
                            <div class="form-group row">
                                <label for="zip" class="col-md-4 col-form-label text-md-right">Zip Code</label>

                                <div class="col-md-6">
                                    <input id="zip" type="text" class="form-control" name="zip" v-model="fields.zip" required autofocus>
                                    <div class="alert alert-danger" v-if="errors && errors.zip">
                                        {{ errors.zip[0] }}
                                    </div>
                                </div>
                            </div>
                            <!-- COUNTRY -->
                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="country" name="default" v-model="fields.country">
                                        <option value="default" selected disabled>Select a Country</option>
                                        <option v-for="country in countries" :key="country"
                                                :value="country.name">{{ country.name }}
                                        </option>
                                    </select>
                                    <div class="alert alert-danger" v-if="errors && errors.country">
                                        {{ errors.country[0] }}
                                    </div>
                                </div>
                            </div>


                            <!-- COMPANY -->
                            <h4 class="text-center mt-2 col-md-6">COMPANY:</h4>
                            <!-- COMPANY NAME -->
                            <div class="form-group row">
                                <label for="company_name" class="col-md-4 col-form-label text-md-right">Company name</label>

                                <div class="col-md-6">
                                    <input id="company_name" type="text" class="form-control" name="company_name" v-model="fields.company_name" required autofocus>
                                    <div class="alert alert-danger" v-if="errors && errors.company_name">
                                        {{ errors.company_name[0] }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" rows="5" class="form-control" name="description" v-model="fields.description" required autofocus></textarea>
                                    <div class="alert alert-danger" v-if="errors && errors.description">
                                        {{ errors.description[0] }}
                                    </div>
                                </div>
                            </div>
                            <!-- DESCRIPTION -->


                        </tab-content>

                    </form-wizard>
                    <!-- /CONTENT -->

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            countries: null,
            fields: {},
            success: false,
            errors: {},
            company: false
        }
    },
    mounted() {
        axios.get('https://restcountries.eu/rest/v2/all').then(resp =>{
            this.countries = resp.data;
        })

    },
    methods: {
        onComplete(){
            let send  = axios.post('https://jsonplaceholder.typicode.com/users', this.fields)
            .then(resp => {
                this.fields= {};
                this.success = true;
                this.company = true;
                this.errors = {};
            }).catch(error => {
                if (error.resp.status == 422) {
                    this.errors = error.resp.errors;
                }
                alert(error);
            })
            // once the form it has been submitted, the page will reload
            setTimeout(function () {
                send = location.reload();
            }, 8000);

        },

    }
}
</script>



