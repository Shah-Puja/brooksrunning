<template>
<div>
  <heading class="mb-6">Mising Images</heading>
    <table style="padding-bottom: .625em;">
        <tbody>
            <tr>
            <td style="border: 1px solid #fff;">
                <table>
                    <caption>Future</caption>
                    <caption class="total-count">Total Count : {{ future.length }}</caption>
                    <thead>
                        <tr>
                            <th scope="col">Style Name</th>
                            <th scope="col">Style</th>
                            <th scope="col">Style Idx</th>
                            <th scope="col">Color Code</th>
                            <th scope="col">Color Idx</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="futuredata in future">
                            <td data-label="Account">{{ futuredata.stylename }}</td>
                            <td data-label="Due Date">{{ futuredata.style }}</td>
                            <td data-label="Amount">{{ futuredata.style_idx }}</td>
                            <td data-label="Period">{{ futuredata.color_code }}</td>
                            <td data-label="Period">{{ futuredata.id }}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td class="prod-data" >
                <table>
                    <caption>Production</caption>
                    <caption class="total-count">Total Count : {{ production.length }}</caption>
                    <thead>
                        <tr>
                            <th scope="col">Style Name</th>
                            <th scope="col">Style</th>
                            <th scope="col">Style Idx</th>
                            <th scope="col">Color Code</th>
                            <th scope="col">Color Idx</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="productiondata in production">
                            <td data-label="Account">{{ productiondata.stylename }}</td>
                            <td data-label="Due Date">{{ productiondata.style }}</td>
                            <td data-label="Amount">{{ productiondata.style_idx }}</td>
                            <td data-label="Period">{{ productiondata.color_code }}</td>
                            <td data-label="Period">{{ productiondata.id }}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            </tr>
        </tbody>
    </table>
    <img src='/images/loader.gif' v-if="showLoader" class="loader" >
</div>

</template>
<script>
export default {
   
    data: function () {
        return {
            future: [],
            production: [],
            showLoader: true
        }
    },
    methods: {
    },
    created: function () {
        Nova.request().get('/nova-vendor/mising-images/data').then(response => {
            this.future = response.data.future;
            this.production = response.data.production;
            this.showLoader = false
        })
    }
}
</script>

<style>
.loader{
    margin: auto;
    display: block;
}
.total-count
{
    font-size: 0.8em;
    margin: 0.2em 36.00em 0.75em 0.1em;
}

table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #fff;
  border: 1px solid #ddd;
  padding: .35em;
}
table td {
font-size: .85em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
  border: 1px solid #ddd;
}
.prod-data{
    vertical-align: text-top; border: 1px solid #fff;
}

table th {
  font-size: .80em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}
</style>
