const app = new Vue({
    el: '#app',
    data: {
        cards: [],
        cambio: [],
        size: [],
        selected: {
            cambio: 'all',
            size: 'all'
        },
    },
    created() {
        this.getCard();
        setTimeout(() => {
            this.cards.forEach(element => {
                if (!this.cambio.includes(element.Cambio)) {  
                    this.cambio.push(element.Cambio);  
                }

                if (!this.size.includes(element.Tipo)) {  
                    this.size.push(element.Tipo);  
                }
            });
            
        }, 500);
    },
    methods: {
        getCard() 
        {
            const params = {
                cambio: this.selected.cambio,
                size: this.selected.size,
            };

            axios.get(`http://localhost/php-snacks-b1/server/controller.php`, { params })
            .then((result) => {
                this.cards = result.data.response;
                })
            .catch((err) => {
                    console.log(err);
            });
       }
    }
});