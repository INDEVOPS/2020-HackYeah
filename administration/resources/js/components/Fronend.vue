<template>
    <div class="frontend">
        <div class="header">
            <h1>
                Koronawirus FAQ
                <small>Interaktywne narzędzie odpowiadające na pytania dotyczące pandemii COVID-19</small>
            </h1>
        </div>
        <div class="container input-area">
            <input type="text" placeholder="Zadaj pytanie..." v-model="question" />
        </div>
        <div class="container" v-if="fetching">
            <Loader />
        </div>
        <div class="container">
            <div class="data" :class="{closed: data !== null}">
                {{ data }}
            </div>
        </div>        
        
    </div>
</template>

<script>
import debounce from 'lodash/debounce';
import Loader from './Loader';

export default {
    components: {
        Loader,
    },
    data: () => ({
        question: '',
        data: null,
        fetching: false,
        error: false,
    }),
    methods: {
        questionWatcher: debounce(function() {

            if(this.question.trim() === '')
            {
                this.fetching = false;
                this.data = null;
                
                return;
            }

            setTimeout(() => {
                this.fetching = false;
                this.data = 'Nie udało nam się znaleźć odpowiedzi na twoje pytanie!';
            }, 500);

        }, 500),
    },
    watch: {
        question(){
            this.fetching = true;
            this.data = null;
            this.questionWatcher();
        } 
    }
}
</script>

<style lang="scss" scoped>
.frontend {
    font-family: 'Ubuntu', sans-serif;

    font-size: 16px;
    word-spacing: 1px;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;

    background: #dcdcdc;
    color: #1d1d1d;
}

.header {
    padding: 10px 20px;

    background: #1a72e0;
    color:#f5f5f5;

    h1 {
        margin: 0;
        width: 100%;
        max-width: 1000px;
        font-size: 3rem;
        font-weight: normal;

        small {
            display: block;
            font-size: 1.2rem;
        }
    }
}

.container {
    padding: 10px;
    max-width: 1000px;
    margin: 0 auto;

    text-align: center;

    &.input-area {
        max-width: 100%;
        background: #fff;
        padding: 40px 10px;
    }
}

input {
    display: inline-block;
    padding: .5em;

    width: 100%;
    max-width: 800px;
    
    background: #fff;
    color: #000;
    border: 4px solid #1a72e08c;
    
    font-size: 2rem;

    outline: none;
}

.data {
    margin: 20px 0;
    padding: 30px 30px;



    // background: #ff8989;
    // border: 2px solid #ff3434;
    font-size: 1.5em;
    display: inline-block;

    transition: all 0s;
    opacity: 0;

    &.closed {
        opacity: 1;
        transition: all ease-in-out 0.5s;
    }
}
</style>