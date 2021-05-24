<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Guest Landing Page</div>

                    <!-- CONTENT -->
                    <form-wizard @on-complete="onComplete"
                                 title="Sign Up Your User Account"
                                 subtitle="Fill all form fields to proceed"
                                 color="#3B7FBC">                               

                        <!-- STEP 1 - PERSONAL INFO-->
                        <tab-content title="Personal details" icon="far fa-user" :before-change="validate" >
                            <form @submit.prevent="submit">

                                <!-- name -->
                                <div class="form-group row" :class="{ 'form-group--error': $v.form.name.$error }">
                                    <label for="name" class="col-md-3 form__label col-form-label text-md-right">First Name</label>

                                    <div class="col-md-7">
                                        <input id="name" type="text" class="form-control form__input" name="name" v-model.trim="$v.form.name.$model" autofocus>                                        
                                    <div class="error" v-if="!$v.form.name.required">*</div>
                                    <div class="error" v-if="!$v.form.name.alphaNumSpec">Name must not contain numbers or special characters.</div>
                                    </div>
                                </div>                                
                                
                                <!-- lastname -->
                                <div class="form-group row" :class="{ 'form-group--error': $v.form.lastname.$error }">
                                    <label for="lastname" class="col-md-3 col-form-label text-md-right">Last Name</label>

                                    <div class="col-md-7">
                                        <input id="lastname" type="text" class="form-control" name="lastname" v-model.trim="$v.form.lastname.$model" autofocus>
                                    <div class="error" v-if="!$v.form.lastname.required">*</div>
                                    <div class="error" v-if="!$v.form.lastname.alphaNumSpec">Last name must not contain numbers or special characters.</div>                                        
                                    </div>
                                </div>

                                <!-- username -->
                                <div class="form-group row" :class="{ 'form-group--error': $v.form.username.$error }">
                                    <label for="username" class="col-md-3 col-form-label text-md-right">Username</label>

                                    <div class="col-md-7">
                                        <input id="username" type="text" class="form-control" name="username" v-model.trim="$v.form.username.$model" autofocus>
                                    <div class="error" v-if="!$v.form.username.required">*</div>
                                    <div class="error" v-if="!$v.form.username.minLength">Username must be between {{$v.form.username.$params.minLength.min}} and {{ $v.form.username.$params.maxLength.max }} letters or/and numbers.</div>
                                    <div class="error" v-if="!$v.form.username.maxLength"> Username too long!</div>
                                    <div class="error" v-if="!$v.form.username.alphaNumSpecUsername">Username must contain only letters and numbers</div>
                                    </div>
                                </div>

                                <!-- email -->
                                <div class="form-group row" :class="{ 'form-group--error': $v.form.email.$error }">
                                    <label for="email" class="col-md-3 col-form-label text-md-right">E-Mail Address</label>

                                    <div class="col-md-7">
                                        <input id="email" type="email" class="form-control" name="email" v-model.trim="$v.form.email.$model" autocomplete="email">
                                        <div class="error" v-if="!$v.form.email.required">*</div>
                                        <span class="error" v-if="!$v.form.email.emailRegexValidator">Check your email. </span>
                                        <span class="error" v-if="!$v.form.email.email">Specify a correct domain</span>
                                    </div>
                                </div>

                            </form>
                        </tab-content>

                        <!-- STEP 3 - COMPANY (hidden by default) -->
                        <tab-content title="Company" icon="fas fa-building" v-if="hide" >
                            <div class="form-group row">
                                <label for="company_name" class="col-md-3 col-form-label text-md-right">Company name</label>

                                <div class="col-md-7">
                                    <input id="company_name" type="text" class="form-control" name="company_name" v-model="form.company_name" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>

                                <div class="col-md-7">
                                    <textarea id="description" rows="5" class="form-control" name="description" v-model="form.description" required autofocus></textarea>
                                </div>
                            </div>
                        </tab-content>

                        <!-- STEP 2 - ADDRESS-->
                        <tab-content title="Additional Info" icon="fas fa-map-marker-alt" class="text-left">

                            <div class="form-group row">
                                <label for="street" class="col-md-3 col-form-label text-md-right">Street</label>

                                <div class="col-md-7">
                                    <input id="street" type="text" class="form-control" name="street" v-model="form.street" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-3 col-form-label text-md-right">City</label>

                                <div class="col-md-7">
                                    <input id="city" type="text" class="form-control" name="city" v-model="form.city" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="zip" class="col-md-3 col-form-label text-md-right">Zip Code</label>

                                <div class="col-md-7">
                                    <input id="zip" type="text" class="form-control" name="zip" v-model="form.zip" required autofocus>
                                </div>
                            </div>                           

                            <div class="form-group row">
                                <label for="country" class="col-md-3 col-form-label text-md-right">Country</label>

                                <div class="col-md-7">
                                    <select class="form-control" id="default" name="default" v-model="form.country">
                                        <option :value="selected" selected disabled>{{selected}}</option>
                                        <option v-for="country in countries" :value="country.name">{{ country.name }}</option>                                        
                                    </select>
                                </div>
                            </div>
                            <!-- CECKBOX -->
 
                            <!-- Animated Checkbox -->
                            <div class="form-group row">
                                 <label for="country" class="col-md-3 col-form-label text-md-right">Company</label>                                
                                <div class="checkbox-animated col-md-1 mb-5 text-md-right">
                                    <input id="checkbox_animated_1" type="checkbox" v-model="hide">
                                    <label for="checkbox_animated_1">
                                        <span class="check"></span>
                                        <span class="box"></span>
                                    </label>
                                </div>                             
                            </div>                             

                        </tab-content>

                        <!-- FINAL STEP - CHECK ENTRIES -->
                        <tab-content  title="Check you entries" icon="fas fa-user-check" :before-change="validate">

                        <!-- SUCCESS MESSAGE -->
                            <div class="alert alert-success" v-show="success">User created successfully.</div>

                            <h2 class="text-center mb-5">Check your entries:</h2>
                                <!-- name -->
                                <div class="form-group row" :class="{ 'form-group--error': $v.form.name.$error }">
                                    <label for="name" class="col-md-3 form__label col-form-label text-md-right">First Name</label>

                                    <div class="col-md-7">
                                        <input id="name" type="text" class="form-control form__input" name="name" v-model.trim="$v.form.name.$model" autofocus>                                        
                                    <div class="error" v-if="!$v.form.name.required">*</div>
                                    <div class="error" v-if="!$v.form.name.alphaNumSpec">Name must not contain numbers or special characters.</div>
                                    </div>
                                </div>                                
                                
                                <!-- lastname -->
                                <div class="form-group row" :class="{ 'form-group--error': $v.form.lastname.$error }">
                                    <label for="lastname" class="col-md-3 col-form-label text-md-right">Last Name</label>

                                    <div class="col-md-7">
                                        <input id="lastname" type="text" class="form-control" name="lastname" v-model.trim="$v.form.lastname.$model" autofocus>
                                    <div class="error" v-if="!$v.form.lastname.required">*</div>
                                    <div class="error" v-if="!$v.form.lastname.alphaNumSpec">Last name must not contain numbers or special characters.</div>                                        
                                    </div>
                                </div>

                                <!-- username -->
                                <div class="form-group row" :class="{ 'form-group--error': $v.form.username.$error }">
                                    <label for="username" class="col-md-3 col-form-label text-md-right">Username</label>

                                    <div class="col-md-7">
                                        <input id="username" type="text" class="form-control" name="username" v-model.trim="$v.form.username.$model" autofocus>
                                    <div class="error" v-if="!$v.form.username.required">*</div>
                                    <div class="error" v-if="!$v.form.username.minLength">Username must be between {{$v.form.username.$params.minLength.min}} and {{ $v.form.username.$params.maxLength.max }} letters or/and numbers.</div>
                                    <div class="error" v-if="!$v.form.username.maxLength"> Username too long!</div>
                                    <div class="error" v-if="!$v.form.username.alphaNumSpecUsername">Username must contain only letters and numbers</div>
                                    </div>
                                </div>

                                <!-- email -->
                                <div class="form-group row" :class="{ 'form-group--error': $v.form.email.$error }">
                                    <label for="email" class="col-md-3 col-form-label text-md-right">E-Mail Address</label>

                                    <div class="col-md-7">
                                        <input id="email" type="email" class="form-control" name="email" v-model.trim="$v.form.email.$model" autocomplete="email">
                                        <div class="error" v-if="!$v.form.email.required">*</div>
                                        <span class="error" v-if="!$v.form.email.emailRegexValidator">Check your email. </span>
                                        <span class="error" v-if="!$v.form.email.email">Specify a correct domain</span>
                                    </div>
                                </div>
                            <!-- ADDRESS -->
                            <h4 class="text-center mt-2 col-md-7">ADDRESS:</h4>
                            <!-- STREET -->
                            <div class="form-group row">
                                <label for="street" class="col-md-3 col-form-label text-md-right">Street</label>

                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="street" v-model="form.street" required autofocus>
                                </div>
                            </div>
                            <!-- CITY -->
                            <div class="form-group row">
                                <label for="city" class="col-md-3 col-form-label text-md-right">City</label>

                                <div class="col-md-7">
                                    <input  type="text" class="form-control" name="city" v-model="form.city" required autofocus>
                                </div>
                            </div>
                            <!-- ZIP CODE -->
                            <div class="form-group row">
                                <label for="zip" class="col-md-3 col-form-label text-md-right">Zip Code</label>

                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="zip" v-model="form.zip" required autofocus>
                                </div>
                            </div>
                            <!-- COUNTRY -->
                            <div class="form-group row">
                                <label for="country" class="col-md-3 col-form-label text-md-right">Country</label>

                                <div class="col-md-7">
                                    <select class="form-control" name="default" v-model="form.country">
                                        <option>Select a Country</option>
                                        <option v-for="country in countries" :value="country.name">{{ country.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- COMPANY -->
                            <div v-if="hide">                            
                                <h4 class="text-center mt-2 col-md-7">COMPANY:</h4>

                                <!-- COMPANY NAME -->
                                <div class="form-group row">
                                    <label for="company_name" class="col-md-3 col-form-label text-md-right">Company name</label>

                                    <div class="col-md-7">
                                        <input id="company_name" type="text" class="form-control" name="company_name" v-model="form.company_name" required autofocus>
                                    </div>
                                </div>
                                <!-- DESCRIPTION -->
                                <div class="form-group row">
                                    <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>

                                    <div class="col-md-7">
                                        <textarea id="description" rows="5" class="form-control" name="description" v-model="form.description" required autofocus></textarea>
                                    </div>
                                </div>
                            </div>  
                        </tab-content>

                        <!-- CUSTOM BUTTONS -->
                        <template slot="footer" slot-scope="{activeTabIndex,isLastStep, nextTab, prevTab}">
                            <div class=wizard-footer-left>
                                <button v-if="activeTabIndex > 0"
                                        @click="prevTab"
                                        type="button" 
                                        class="btn btn-outline-info"> Back
                                </button>
                            </div>
                            <div class="wizard-footer-right">
                                <button	v-if="!isLastStep" 
                                        @click="nextTab"
                                        type="button" 
                                        class="btn btn-outline-primary wizard-footer-right"> Next
                                </button>
                                
                                <button	v-else 
                                        @click="nextTab"
                                        type="button" 
                                        class="btn btn-outline-success"> Submit
                                </button>
                            </div>
                        </template>  


                    </form-wizard>
                    <!-- /CONTENT -->

                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import { required, email, minLength, maxLength, helpers } from 'vuelidate/lib/validators'
    const alphaNumSpec = helpers.regex('alphaNumSpec', /^[a-zA-Zà-ÿ]*$/i);
    const alphaNumSpecUsername = helpers.regex('alphaNumSpecUsername', /^[a-zA-Zà-ÿ0-9]*$/i);
    const emailRegexValidator = helpers.regex('emailRegex', /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/);

    export default {

        data() {
            return {
                countries: null,
                success: false,
                hide: false,
                //validation
                form: {
                    name: "",
                    lastname: "",
                    username: "",
                    email: ""
                },
                selected: "Select a Country please"           
            }
        },

        validations: {                
            form: {
                name: { required, alphaNumSpec },
                lastname:{ required, alphaNumSpec  },
                username: { required, minLength: minLength(8), maxLength:maxLength(20), alphaNumSpecUsername },
                email: { required, emailRegexValidator, email }
            }
        },    

        mounted() {
            axios.get('https://restcountries.eu/rest/v2/all').then(resp =>{
                this.countries = resp.data;
            });       

        },

        methods: {
            onComplete(){
                let send  = axios.post('https://jsonplaceholder.typicode.com/users', this.form)
                .then(resp => {
                    this.form= {};
                    this.success = true;                
                })
                // once the form it has been submitted, the page will reload
                setTimeout(function () {
                    send = location.reload();
                }, 8000);
            },
            validate() {
                this.$v.form.$touch();
                var isValid = !this.$v.form.$invalid
                this.$emit('on-validate', this.$data, isValid)
                return isValid
            }
        },
    }
</script>





