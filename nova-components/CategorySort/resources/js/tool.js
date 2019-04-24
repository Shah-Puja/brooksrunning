Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'category-sort',
            path: '/category-sort',
            component: require('./components/Tool'),
        },
    ])
})
