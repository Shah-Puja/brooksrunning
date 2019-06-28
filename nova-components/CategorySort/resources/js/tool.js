Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'category-sort',
            path: '/plp-rank',
            component: require('./components/Tool'),
        },
    ])
})
