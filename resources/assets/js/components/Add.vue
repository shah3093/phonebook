<template>
    <div class="modal" :class='openmodal'>
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete" aria-label="close" @click='closemodal'></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" :class="{'is-danger':errors.name}" placeholder="Name" v-model='list.name'>
                    </div>
                    <small v-if='errors.name' class="has-text-danger">{{errors.name[0]}}</small>
                </div>
                <div class="field">
                    <label class="label">Phone Number</label>
                    <div class="control">
                        <input class="input" type="text" :class="{'is-danger':errors.phone}" placeholder="Phone Number" v-model='list.phone'>
                    </div>
                    <small v-if='errors.phone' class="has-text-danger">{{errors.phone[0]}}</small>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input " type="email" :class="{'is-danger':errors.email}" placeholder="Email" v-model='list.email'>
                    </div>
                    <small v-if='errors.email' class="has-text-danger">{{errors.email[0]}}</small>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" @click='save'>Save changes</button>
                <button class="button" @click='closemodal'>Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default{
        props: ['openmodal'],
        data() {
            return{
                list: {
                    email: '',
                    name: '',
                    phone: ''
                },
                errors: {}
            }
        },
        methods: {
            closemodal() {
                this.$emit('closeRequest')
            },
            save() {
                axios.post('/phonebook', this.$data.list).then((response) => {
                    this.closemodal()
                    this.$parent.lists.push(response.data)
                    this.$parent.lists.sort(function (a, b) {
                        if (a.name > b.name) {
                            return 1;
                        } else if (a.name < b.name) {
                            return -1;
                        }
                    })
                    this.list = ""
                })
                        .catch((error) => this.errors = error.response.data.errors)
            }
        }
    }
</script>