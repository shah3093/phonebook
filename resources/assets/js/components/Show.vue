<template>
    <div class="modal" :class='openmodal'>
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Show details</p>
                <button class="delete" aria-label="close" @click='closemodal'></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" :value="list.name" readonly  placeholder="Name" >
                    </div>
                </div>
                <div class="field">
                    <label class="label">Phone Number</label>
                    <div class="control">
                        <input class="input" type="text" readonly :value="list.phone"  placeholder="Phone Number" >
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input " type="email" readonly :value="list.email" placeholder="Email">
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
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
                list: {},
                errors:{}
            }
        },
        methods: {
            closemodal() {
                this.$emit('closeRequest')
            }
        }
    }
</script>
