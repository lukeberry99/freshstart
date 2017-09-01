<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" @submit.prevent="submit">
                            <div class="form-group" v-bind:class="{ 'has-error': errors.first_name }">
                                <label for="name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" autofocus v-model="first_name">

                                    <span class="help-block" v-if="errors.first_name">
                                        {{ errors.first_name[0] }}
                                    </span>
                                </div>
                            </div>

                            <div class="form-group" v-bind:class="{ 'has-error': errors.last_name }">
                                <label for="name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" v-model="last_name">

                                    <span class="help-block" v-if="errors.last_name">
                                        {{ errors.last_name[0] }}
                                    </span>
                                </div>
                            </div>

                            <div class="form-group" v-bind:class="{ 'has-error': errors.email }">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" v-model="email">

                                    <span class="help-block" v-if="errors.email">
                                        {{ errors.email[0] }}
                                    </span>
                                </div>
                            </div>

                            <div class="form-group" v-bind:class="{ 'has-error': errors.password }">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" v-model="password">

                                    <span class="help-block" v-if="errors.password">
                                        {{ errors.password[0] }}
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
    data () {
        return {
            first_name: null,
            last_name: null,
            email: null,
            password: null,
            errors: []
        }
    },
    methods: {
        ...mapActions({
            register: 'auth/register'
        }),
        submit () {
            this.register({
                payload: {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    email: this.email,
                    password: this.password
                },
                context: this
            }).then(() => {
                this.$router.replace({ name: 'home' })
            })
        }
    }
}
</script>
