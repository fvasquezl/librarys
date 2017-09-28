<style>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }
    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }
</style>
<template>
    <div class="container">
        <div v-if="showModal">
            <transition name="modal">
                <div class="modal-mask">
                    <div class="modal-wrapper">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" @click="showModal=false">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">{{title}}</h4>
                                </div>
                                <div class="modal-body">
                                    {{body}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" @click.prevent="yes">Yes</button>
                                    <button type="button" class="btn btn-primary" @click="showModal = false">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>

        <button id="show-modal" @click="showModal = true">Eliminar Libro</button>
    </div>
</template>

<script>
    export default {
        props:['title','body','route'],
        data(){
            return{
                showModal:false
            }
        },
        methods:{
            yes(){
                axios.delete(this.route).then((response)=>{
                    this.$emit('hide');
                });
            },
        }
    }
</script>

