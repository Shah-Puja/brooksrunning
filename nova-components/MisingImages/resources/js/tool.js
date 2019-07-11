Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'mising-images',
            path: '/mising-images',
            component: require('./components/Tool'),
        },
    ])
})
