<template>
    <div class="container">
        <h1 class="my-5">Contattaci</h1>
        <section class="row">
            <div class="col">
                <form @submit.prevent="postForm">
                    <div class="mb-3">
                        <label class="form-label" for="name">Nome*</label>
                        <input class="form-control" type="text" id="name" placeholder="Inserisci il tuo Nome" v-model="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">email*</label>
                        <input class="form-control" type="text" id="email" placeholder="Inserisci la tua email" v-model="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="message">Messaggio*</label>
                        <textarea class="form-control" id="message" rows="5" v-model="message"></textarea>
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
                console.log(res.data);
            })
            .catch(err => log.error(err));
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