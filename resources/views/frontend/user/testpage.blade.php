@extends('frontend.layouts.master')

@section('content')

<link rel="stylesheet" href="{{asset('css/vue_search.css')}}">

<div class="main store_body">
<!-- component template -->
<!-- component template -->
<script type="text/x-template" id="grid-template">
  <table>
    <thead>
      <tr>
        <th v-for="key in columns">
          @{{key | capitalize}}
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="entry in data | limitBy rowsPerPage startRow">
        <td v-for="key in columns">
          @{{entry[key]}}
        </td>
      </tr>
    </tbody>
  </table>
  <div id="page-navigation">
    <button @click=movePages(-1)>Back</button>
    <p>@{{startRow / rowsPerPage + 1}} out of @{{Math.ceil(data.length / rowsPerPage)}}</p>
    <button @click=movePages(1)>Next</button>
  </div>
</script>

<!-- demo root element -->
<div id="grid-view-model">
  <form id="search">
    Search
    <input name="query" v-model="searchQuery" @keyup="resetStartRow">
  </form>
  <grid :data="gridData | orderByBusinessRules | filterBy searchQuery" :columns="gridColumns" :move-pages="movePages" :start-row="startRow" :rows-per-page="rowsPerPage">
  </grid>
</div>

</div>

@endsection

@section('before-scripts-end')

<script type="text/javascript">
  // register the grid component
// Make a list of 100 of random dummy data
var baseData = [{
  name: 'Chuck Norris',
  power: Infinity
}, {
  name: 'Bruce Lee',
  power: 9000
}, {
  name: 'Jackie Chan',
  power: 7000
}, {
  name: 'Jet Li',
  power: 8000
}];
var gridData = Array(100).fill(null).map(function() {
  return Object.assign({}, baseData[Math.floor(Math.random() * 4)]);
});

// register the grid component
Vue.component('grid', {
  template: '#grid-template',
  props: {
    data: Array,
    columns: Array,
    movePages: Function,
    startRow: Number,
    rowsPerPage: Number
  }
});

// Create the view-model
var gridViewModel = new Vue({
  el: '#grid-view-model',
  data: {
    searchQuery: '',
    gridColumns: ['name', 'power'],
    gridData: gridData,
    startRow: 0,
    rowsPerPage: 10
  },
  methods: {
    movePages: function(amount) {
      var newStartRow = this.startRow + (amount * this.rowsPerPage);
      if (newStartRow >= 0 && newStartRow < gridData.length) {
        this.startRow = newStartRow;
      }
    },
    resetStartRow: function() {
      this.startRow = 0;
    }
  },
  filters: {
    orderByBusinessRules: function(data) {
      return data.slice().sort(function(a, b) {
        return a.power - b.power;
      });
    }
  }
})


</script>

@endsection