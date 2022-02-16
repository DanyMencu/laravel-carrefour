<template>
    <div class="container">
        <h1 class="my-5">Contattaci</h1>
        <div v-show="success" class="alert alert-success">
            I Dati sono stati invati con successo.
        </div>
        <section class="row">
            <div class="col">
                <form @submit.prevent="postForm">
                    <div class="mb-3">
                        <label class="form-label" for="name">Nome*</label>
                        <input class="form-control" type="text" id="name" placeholder="Inserisci il tuo Nome" v-model="name">
                        <div
                            v-for="(error, index) in errors.name"
                            :key="`err-name-${index}`"
                            class="text-danger"
                        >
                            {{ error }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email*</label>
                        <input class="form-control" type="text" id="email" placeholder="Inserisci la tua email" v-model="email">
                        <div
                            v-for="(error, index) in errors.email"
                            :key="`err-email-${index}`"
                            class="text-danger"
                        >
                            {{ error }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="message">Messaggio*</label>
                        <textarea class="form-control" id="message" rows="5" v-model="message"></textarea>
                        <div
                            v-for="(error, index) in errors.message"
                            :key="`err-message-${index}`"
                            class="text-danger"
                        >
                            {{ error }}
                        </div>
                    </div>

                    <button type="submit" class="btn">
                        Invio
                    </button>
                </form>
            </div>
        </section>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Contact',
    data() {
        return {
            name:'',
            email: '',
            message:'',
            errors: {},
            success: false,
        }
    },
    methods: {
        postForm() {
            axios.post('http://127.0.0.1:8000/api/contacts', {
                name: this.name,
                email: this.email,
                message: this.message,
            })
            .then(res => {
                //console.log(res.data);

                if(res.data.errors) {
                    this.errors = res.data.errors
                    this.success = false;
                } 
                else {
                    this.name = '';
                    this.email = '';
                    this.message = '';

                    //feedback
                    this.errors = {};
                    this.success = true;
                }

            })
            .catch(err => console.log(err));
        }
    }
}
</script>

<style lang="scss" scoped>
    button {
        background-color: #1b3d79;
        color: white;
    }
</style>