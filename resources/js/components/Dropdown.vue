<template>
    <div class="l-dropdown l-row l-row--end">
            <div  class="c-dropdown--wrapper">
                <button 
                class="c-dropdown--button"
                @click="toggleMenu"
                >
                    <i class="fas fa-ellipsis-h"></i>
                </button>

                <div 
                class="c-dropdown--content"
                v-show="openMenu"
                >
                    <ul class="c-dropdown--list" >
                        <li class="c-dropdown--item">
                            <a :href=this.endpointEdit>
                                Edit
                            </a>
                        </li>
                        
                        <li class="c-dropdown--item">
                                <modal
                                :delete-data-name=this.deleteDataName
                                :endpoint-delete=this.endpointDelete
                                >
                                </modal>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</template>

<script>
import Modal from './Modal'

export default {
    props: {
        endpointEdit: {
            type: String,
        },
        endpointDelete: {
            type: String,
        },
        deleteDataName: {
            type: String,
        },
    },
    data() {
        return {
            openMenu: false
        }
    },
    methods: {
        toggleMenu() {
            this.openMenu = !this.openMenu
        }
    },
    components: {
        Modal,
    }
}
</script>