import './bootstrap'
import Vue from 'vue'
import ProductLike from './components/ProductLike'
import ProductTagsInput from './components/ProductTagsInput'
import FollowButton from './components/FollowButton'
import ImgView from './components/ImgView'
import Modal from './components/Modal'
import Dropdown from './components/Dropdown'

new Vue({
    el: '#app',
    components: {
        ProductLike,
        ProductTagsInput,
        FollowButton,
        ImgView,
        Modal,
        Dropdown,
    }
})