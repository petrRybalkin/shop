const app = new Vue({
    el: '#product-items',
    data: {
        items: [],
    },
    async mounted() {
        this.items = await window.listItems;
    },
    methods: {
        randomId(prefix, max) {
            // случайное число от min до (max+1)
            let rand = Math.random() * (max + 1);
            return prefix + Math.floor(rand).toString();
        },
        addItem () {
            this.items.push({
                id: this.randomId('new_', 100000),
                title: '',
                sort: 0,
                price: 0,
                image: '/img/empty.png',
                product_1c_id: '',
            });
        },
        rmItem: function (index) {
            this.items.splice(index, 1);
        }
    }
});
