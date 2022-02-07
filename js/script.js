const app = new Vue({
    el: '#app',
    data: {
        cards: [],
        fitredCards: null,
        cambio: [],
        size: [],
        bagagli: [],
        selected: {
            cambio: 'all',
            size: 'all',
            bagagli: 'all',
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

                if (!this.bagagli.includes(element.Bagagli)) {  
                    this.bagagli.push(element.Bagagli);  
                }

            });
            
        }, 100);
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

            if(this.selected.bagagli != 'all')
            {
                this.fitredCards = this.cards.filter((card) => {
                    return card.Bagagli >= parseInt(this.selected.bagagli);
                });
            }
            else
            {
                this.fitredCards = null;
            }
       }
    },
});