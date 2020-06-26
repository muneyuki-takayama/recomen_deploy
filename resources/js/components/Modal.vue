<template>
    <div>
        <button 
        class="c-button--delete"
        @click.prevent="openModal">
            Delete
        </button>

        <div id="overlay" v-show="showContent" @click="closeModal">
            <div class="l-row--central l-row--colum" id="content" @click="stopEvent">
                <p class="c-modal--confirm">本当に{{deleteDataName}}を削除しますか？</p>
                    <div class="l-row--colum">
                        <button 
                        class="c-modal--button c-modal--cancel"
                        @click.prevent="closeModal">Cancel</button>
                        <button 
                        class="c-modal--button c-modal--delete"
                        type="submit">Delete</button>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        deleteDataName: {
            type: String,
        },
        endpointDelete: {
            type: String,
        }
    },
    data() {
        return {
            showContent: false
        }
    },
    methods: {
        openModal() {
            this.showContent = true
        },
        closeModal() {
            this.showContent = false
        },
        stopEvent() {
            event.stopPropagation()
        },
        async clickDelete() {
            const response = await axios.delete(this.endpointDelete)
        }
    },
}
</script>
