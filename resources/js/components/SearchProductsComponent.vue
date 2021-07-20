<template>
    <ais-instant-search :search-client="searchClient" index-name="pizza">
        <ais-search-box v-on:focus="showSearchResults()" v-on:blur="blur()" v-on:reset="reset()"
                        placeholder="Search products..."  :class-names="{
        'ais-SearchBox-input': 'form-control',
        'ais-SearchBox-form': 'd-flex',
        'ais-SearchBox-submit': 'd-btn btn-danger',
        'ais-SearchBox-reset': 'd-btn btn-dark'
      }"></ais-search-box>

        <transition
            name="contact-details"
            enter-active-class="animate__animated animate__fadeInDown"
            leave-active-class="animate__animated animate__fadeOutUp"
        >
            <ais-hits v-if="isShownSearchResults" class="searchResultsShow" >

                <template slot="item" slot-scope="{ item }">
                    <div class="row my-1 result">
                            <div class="col-2" leftBlock>
                                <a :href="'/item/'+item.id"><img :src="item.image" alt=""></a>
                            </div>
                            <div class="col-10 rightBlock">
                                <div class="row">
                                    <div class="col">
                                        <a :href="'/item/' + item.id"><strong>{{ item.name }}</strong></a> <br>
                                    </div>
                                    <div class="col">
                                        <strong>{{item.price}} Mdl</strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        {{ item.description }}
                                    </div>
                                </div>

                            </div>
                    </div>

                </template>


            </ais-hits>



        </transition>
        <ais-configure
            :hits-per-page.camel="8"
            :distinct="true"
            :enable-personalization.camel="true"
        />



    </ais-instant-search>
</template>

<script>

import algoliasearch from 'algoliasearch/lite';


export default {
    name: "SearchProductsComponent",
    data() {
        return {
            searchClient: algoliasearch(
                "TXM2UHVKK8",
            "fd5fd2c8130220beae37bfd6a7c74539",
    )
        }
    },
    methods: {
        showSearchResults(){
            this.$store.commit('changeSearchResult', true)
        },
        blur() {
            setTimeout(this.reset, 500)
            // this.$store.commit('changeSearchResult', false)
        },
        reset() {
            this.$store.commit('changeSearchResult', false)
        }

    },
    computed: {
        isShownSearchResults() {
          return  this.$store.getters.showSearchResult
        }
        // inputListeners: function () {
        //     let vm = this
        //     // `Object.assign` объединяет объекты вместе, чтобы получить новый объект
        //     return Object.assign({},
        //         // Мы добавляем все слушатели из родителя
        //         this.$listeners,
        //         // Затем мы можем добавить собственные слушатели или
        //         // перезаписать поведение некоторых существующих.
        //         {
        //             // Это обеспечит, что будет работать v-model на компоненте
        //             focus: function (event) {
        //                 vm.$emit('focus', event.target.value)
        //             }
        //         }
        //     )
        // }
    },
}
</script>

<style scoped>
    a {
        color: red;
    }
    img {
        height: 75px;
        width: 75px;

    }
    .result{
        width: 520px;
    }


    .rightBlock{
        max-height: 75px;
        overflow: hidden;
    }
</style>
