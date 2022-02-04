const app = new Vue({
    el: '#app',
    data: {
        cards: [],
        selected: 'all',
    },
    created() {
        this.getCard();
    },
    methods: {
        getCard() 
        {
            axios.get(`http://localhost/php-snacks-b1/server/controller.php?query=${this.selected}`)
            .then((result) => {
                this.cards = result.data.response;
                })
            .catch((err) => {
                    console.log(err);
            });
       }
    },
    watch: {
        cards:
            function()
            {
                console.log(this.cards);
            }
    }
});