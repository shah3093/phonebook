<template>
    <div>
        <nav class="panel column is-offset-2 is-8">
            <p class="panel-heading">
                Phonebook
                <button class="button is-link is-outlined" @click="openAdd">
                    Add new
                </button>
            </p>
            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
                    <span class="icon is-small is-left">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </span>
                </p>
            </div>

            <a class="panel-block" v-for='item,key in temp'>
                <span class="column is-9">{{item.name}}</span>

                <span class="panel-icon is-1 column">
                    <i class="fas fa-eye has-text-info" @click="openShowModal(key)"></i>
                </span>

                <span class="panel-icon is-1 column">
                    <i class="fas fa-edit has-text-primary" @click="openEdit(key)"></i>
                </span>

                <span class="panel-icon is-1 column">
                    <i class="fas fa-trash has-text-danger" @click="del(key,item.id)"></i>
                </span>

            </a>


            <div class="panel-block">

            </div>
        </nav>
        <Add :openmodal='addActive' @closeRequest='close'></Add>
        <Show :openmodal='showActive' @closeRequest='close'></Show>
        <Update :openmodal='updateActive' @closeRequest='close'></Update>
    </div>
</template>

<script>
    let Add = require('./Add.vue');
    let Show = require('./Show.vue');
    let Update = require('./Update.vue');
    export default{
        components: {Add, Show, Update},
        data() {
            return{
                addActive: '',
                showActive: '',
                updateActive: '',
                searchQuery: '',
                temp: '',
                lists: {},
                errors: {}
            }
        },
        mounted() {
            axios.get('/getData', ).then((response) => this.lists = this.temp = response.data)
                    .catch((error) => this.errors = error.response.data.errors)
        },
        watch: {
            searchQuery() {
                if (this.searchQuery.length > 0) {
                    this.temp = this.lists.filter((item) => {
                        return Object.keys(item).some((key) => {
                            let str = String(item[key])
                            return str.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1
                        })
                    });
                } else {
                    this.temp = this.lists
                }
            }
        },
        methods: {
            openAdd() {
                this.addActive = 'is-active'
            },
            close() {
                this.addActive = this.showActive = this.updateActive = ''
            },
            openShowModal(key) {
                this.$children[1].list = this.temp[key];
                this.showActive = 'is-active'
            },
            openEdit(key) {
                this.$children[2].list = this.temp[key];
                this.updateActive = 'is-active'
            },
            del(key, id) {
                if (confirm("Are you sure ?")) {
                    axios.delete(`/phonebook/${id}`, ).then((response) => this.temp.splice(key, 1))
                            .catch((error) => this.errors = error.response.data.errors)
                }
            }
        }
    }
</script>
